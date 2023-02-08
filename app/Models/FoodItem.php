<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'ingredients_name', 'quantity', 'price'];

    protected $primaryKey = 'food_id';

    public function scopeFilter($query, array $filters)
    {
      $query->when( $filters['search'] ?? false, function ($query, $search) {
        return $query->where('name', 'like' , '%' .$search . '%')
        ->orWhere('ingredients_name', 'like', '%' .$search . '%')
        ->orWhere('quantity', 'like', '%' .$search . '%')
        ->orWhere('price', 'like', '%' .$search . '%');
      });

    }

    public function menus()
    {
      return $this->belongsTo(Menu::class, 'menu_id', 'food_id');
    }

    public function payments()
    {
      return $this->belon(Payment::class);
    }

  
}
