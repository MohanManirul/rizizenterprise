<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $fillable = [
    	'favicon',
    	'logo',
    	'bgPicture',
    	'title',
    	'subtitle'
    ];
}
