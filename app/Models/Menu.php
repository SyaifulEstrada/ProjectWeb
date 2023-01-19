<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function resturant_staffs()
    {
      return $this->belongsTo(RestaurantStaff::class, 'menu_id');
    }

}
