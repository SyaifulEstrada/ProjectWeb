<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KitchenStaff extends Model
{
  use HasFactory;
  
  protected $fillable = ['name', 'gender', 'email', 'password', 'phone', 'address'];
  protected $primaryKey = 'user_id';

    public function scopeFilter($query, array $filters)
    {
      $query->when( $filters['search'] ?? false, function ($query, $search) {
        return $query->where('name', 'like' , '%' .$search . '%')
        ->orWhere('gender', 'like', '%' .$search . '%')
        ->orWhere('email', 'like', '%' .$search . '%')
        ->orWhere('phone', 'like', '%' .$search . '%')
        ->orWhere('address', 'like', '%' .$search . '%');
      });

    }
    public function orders()
    {
      return $this->hasMany(Order::class, 'user_id');
    }

    public function customers()
    {
      return $this->hasMany(Customer::class, 'customer_id');
    }


}
