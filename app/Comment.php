<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'post_id',
        'is_active',
        'author',
        'email',
        'photo',
        'body'
    ];

    public function replies(){

        return $this->hasMany('App\CommentReply');

    }

    public function post(){

        return $this->belongsTo('App\Post');

    }

    protected $photoFolder = '/UserImages/';

    public function getPhotoAttribute($photo){

        return $this-> photoFolder.$photo;

    }
}
