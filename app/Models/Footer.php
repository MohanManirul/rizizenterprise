<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    public function images()
  {
    return $this->hasMany(CountryImage::class);
  }
}
