<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = ['order_id','payment_date', 'payment_amount'];

    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
      $query->when( $filters['search'] ?? false, function ($query, $search) {
        return $query->where('order_id', 'like' , '%' .$search . '%')
        ->orWhere('payment_date', 'like', '%' .$search . '%')
        ->orWhere('payment_amount', 'like', '%' .$search . '%');
      });

    }

    public function orders()
    {
      return $this->hasMany(Order::class, 'order_id');
    }
}


