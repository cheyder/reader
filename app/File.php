<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
  protected $fillable = ['title'];
  
  public function parent() {
      return $this->belongsTo('App\Folder', 'parent_id');
  }
}
