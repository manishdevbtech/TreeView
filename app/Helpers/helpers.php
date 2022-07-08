<?php
use App\TreeView;
use Illuminate\Support\Facades\DB;

if (!function_exists('callChilds')) {
    function callChilds()
    {
        $categories = TreeView::where('parent_entry_id', '=', 0)->get();
        $html = '';
        foreach($categories as $category) {
            $html .= '<li>'.childName($category->entry_id);
            if(count($category->childs)) {
               $html .= callChildsChild($category->childs);
            }
            $html .= '</li>';
        }
       echo $html;
    }
} 

if (!function_exists('callChildsChild')) {
    function callChildsChild($childsChild)
    {
        $html = '<ul>';
        foreach($childsChild as $child) {
                    $html .= '<li>'.childName($child->entry_id);
                    if(count($child->childs)) {
                        $html .= callChildsChild($child->childs);
                    }
                    $html .= '</li>';
                }
                return $html .= '</ul>';
    }
}

if (!function_exists('childName')) {
    function childName($entry_id)
    {            
        $childName = DB::table('tree_entry_lang')->select('name')->where('entry_id',$entry_id)->first();
        if (isset($childName)) {
            return $childName->name;
        } else {
            return '';
        }
    }
}

if (!function_exists('callChildsAjax')) {
    function callChildsAjax()
    {
        $categories = TreeView::where('parent_entry_id', '=', 0)->get();
        $html = '';
        foreach($categories as $category) {
            $html .= '<li><i rel="'.$category->entry_id .'" onclick="toggleFN(this)" class="indicator glyphicon glyphicon-plus-sign curParent'.$category->entry_id .'"></i><span class="curSpan'.$category->entry_id .'">'.childName($category->entry_id).'</span></li>';
        }
       echo $html;
    }
}