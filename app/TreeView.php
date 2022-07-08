<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreeView extends Model
{
      protected $table = 'tree_entry';
      public $fillable = ['entry_id','parent_entry_id'];

    /**

     * Get the index name for the model.

     *

     * @return string

     */

    public function childs() {

        return $this->hasMany('App\TreeView','parent_entry_id','entry_id') ;

    }
}
