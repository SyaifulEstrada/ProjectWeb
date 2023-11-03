<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = ['order_id','payment_date', 'payment_amount', 'customer_name', 'food_id'];

    protected $primaryKey = 'id_invoice';

    protected $guarded = 'id_invoice';

    protected $dates = [
      'created_at',
      'updated_at',
  ];

    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
      $query->when( $filters['search'] ?? false, function ($query, $search) {
        return $query->where('order_id', 'like' , '%' .$search . '%')
        ->orWhere('payment_date', 'like', '%' .$search . '%')
        ->orWhere('payment_amount', 'like', '%' .$search . '%')
        ->orWhere('customer_name', 'like', '%' .$search . '%')
        ->orWhere('food_id', 'like', '%' .$search . '%');
      });

    }

    public function orders()
    {
      return $this->hasMany(Order::class, 'order_id' , 'customer_id');
    }

    public function food_items()
    {
      return $this->hasMany(FoodItem::class);
    }

}


