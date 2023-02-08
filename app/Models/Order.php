<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function kitchen_staff()
    {
      return $this->belongsTo(KitchenStaff::class, 'user_id');
    }
    
    public function customers()
    {
      return $this->hasMany(Customer::class, 'customer_id');
    }

    public function payments()
    {
      return $this->belongsTo(Payment::class, 'id_invoice', 'order_id');
    }

}
