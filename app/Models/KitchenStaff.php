<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KitchenStaff extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'email', 'password', 'phone', 'address'];
    protected $primaryKey = 'user_id';
    public function orders()
    {
      return $this->hasMany(Order::class, 'user_id');
    }

}
