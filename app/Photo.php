<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['path'];

    protected $photoFolder = '/UserImages/';

    public function getPathAttribute($photo){

        return url('/').$this-> photoFolder.$photo;

    }

}
