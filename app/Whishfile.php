<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Whishfile extends Model
{
    //
    protected $fillable = [
        'pathname','name','type','extension',
    ];
}
