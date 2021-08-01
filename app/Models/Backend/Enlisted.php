<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Enlisted extends Model
{
    protected $fillable = [
        'name', 'status', 'slug','rank'
    ];
  
}
