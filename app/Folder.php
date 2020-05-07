<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public function subfolders(){
        return $this->hasMany('Folder', 'parent_id');
    }
    public function parent() {
        return $this->belongsTo('Folder', 'parent_id');
    }
    public function files(){
        return $this->hasMany('File', 'parent_id');
    }
}
