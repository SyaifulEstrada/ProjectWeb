<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationPayment extends Model
{
    use HasFactory;

    protected $fillable = ['id_invoice','payment_date', 'payment_amount', 'customer_id', 'no_of_guest'];

    protected $primaryKey = 'id_invoice';

    protected $guarded = 'id_invoice';

    protected $dates = [
      'created_at',
      'updated_at',
  ];

  public function scopeFilter($query, array $filters)
  {
    $query->when( $filters['search'] ?? false, function ($query, $search) {
      return $query->where('payment_date', 'like' , '%' .$search . '%')
      ->orWhere('payment_amount', 'like', '%' .$search . '%')
      ->orWhere('customer_id', 'like', '%' .$search . '%')
      ->orWhere('no_of_guest', 'like', '%' .$search . '%');
    });

  }

}
