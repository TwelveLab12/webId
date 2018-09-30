<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishfile extends Model
{
    //
    protected $fillable = [
        'pathname','name','type','extension',
    ];
}
