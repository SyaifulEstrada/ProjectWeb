<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
      $menu = FoodItem::all();
      return view('welcome', compact('menu'), [
        'title' => 'Home'
      ]);
    }
}
