<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
  
    protected $fillable =  ['order_id', 'food_id', 'quantity' , 'unit_price', 'ingredients_name', 'customer_name'];


    public function scopeFilter($query, array $filters)
    {
      $query->when( $filters['search'] ?? false, function ($query, $search) {
        return $query->where('order_id', 'like' , '%' .$search . '%')
        ->orWhere('food_id', 'like', '%' .$search . '%')
        ->orWhere('quantity', 'like', '%' .$search . '%')
        ->orWhere('unit_price', 'like', '%' .$search . '%')
        ->orWhere('customer_name', 'like', '%' .$search . '%')
        ->orWhere('ingredients_name', 'like', '%' .$search . '%');
      });

    }

    public function food_items()
    {
      return $this->hasMany(FoodItem::class, 'food_id');
    }

}
