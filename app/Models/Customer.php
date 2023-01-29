<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name','table_id'];
    protected $primarykey = 'customer_id';
    
    public function scopeFilter($query, array $filters)
    {
      $query->when( $filters['search'] ?? false, function ($query, $search) {
        return $query->where('customer_id', 'like' , '%' .$search . '%')
        ->orWhere('customer_name', 'like', '%' .$search . '%')
        ->orWhere('table_id', 'like', '%' .$search . '%');
      });

    }

  


}
