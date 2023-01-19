<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantStaff extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'email', 'password', 'phone', 'address'];
    protected $primaryKey = 'user_id';

    public function menus() {
      return $this->hasMany(Menu::class, 'menu_id');
    }

}
