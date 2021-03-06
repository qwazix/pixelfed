<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $fillable = ['name','slug'];

    public function posts()
    {
      return $this->hasManyThrough(
        Status::class,
        StatusHashtag::class,
        'hashtag_id',
        'id',
        'id',
        'status_id'
      );
    }

    public function url()
    {
      return config('routes.hashtag.base') . $this->slug;
    }
 
}
