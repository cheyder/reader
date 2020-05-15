<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
  protected $fillable = ['title', 'user_id'];
  
  public function subfolders(){
      return $this->hasMany('App\Folder', 'parent_id');
  }
  public function parent() {
      return $this->belongsTo('App\Folder', 'parent_id');
  }
  public function files(){
      return $this->hasMany('App\File', 'parent_id');
  }
}
