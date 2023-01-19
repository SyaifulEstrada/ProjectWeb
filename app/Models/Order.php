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

}
