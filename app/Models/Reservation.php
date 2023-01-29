<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'date', 'time', 'no_of_guest'];
    protected $primarykey = 'reservation_id';

    public function scopeFilter($query, array $filters)
    {
      $query->when( $filters['search'] ?? false, function ($query, $search) {
        return $query->where('customer_id', 'like' , '%' .$search . '%')
        ->orWhere('date', 'like', '%' .$search . '%')
        ->orWhere('time', 'like', '%' .$search . '%')
        ->orWhere('no_of_guest', 'like', '%' .$search . '%');
      });

    }

    public function customers()
    {
      return $this->belongsTo(Customer::class, 'customer_id');
    }

}
