<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
  protected $fillable = [
    'user_id',
    'title',
    'url',
    'text_url',
    'position',
    'abstract',
    'headers'
  ];
  
  public function parent() {
      return $this->belongsTo('App\Folder', 'parent_id');
  }
}
