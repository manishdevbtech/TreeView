<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ParentController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function manageTree()
    {
        return view('tree.treeview');
    }

    public function get_node(Request $request)
    {
        $parent_entry_id = $request->curNode;
        $childs = DB::table('tree_entry as a')->leftjoin('tree_entry_lang as b','a.entry_id','=','b.entry_id')->select('b.entry_id','b.name')->where('a.parent_entry_id',$parent_entry_id)->get();
        if(count($childs) > 0) {
            $html = '<ul>';
            foreach ($childs as $key => $value) {
                $html .= '<li><i rel="'.$value->entry_id .'" onclick="toggleFN(this)" class="indicator glyphicon glyphicon-plus-sign toggleNodes curParent'.$value->entry_id .'"></i><span class="curSpan'.$value->entry_id .'">'.$value->name.'</span></li>';
            }
            return $html .= '</ul>';
        }
        return null;
    }

} //end
