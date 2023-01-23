<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'quantity', 'price'];

    protected $primaryKey = 'food_id';

    public function menus()
    {
      return $this->belongsTo(Menu::class, 'menu_id', 'food_id');
    }

}
