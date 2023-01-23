<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['price'];

    protected $primaryKey = 'menu_id';

    public function resturant_staffs()
    {
      return $this->hasMany(RestaurantStaff::class, 'food_items', 'food_id');
    }

    public function food_items()
    {
      return $this->hasMany(FoodItem::class, 'food_id');
    }

}
