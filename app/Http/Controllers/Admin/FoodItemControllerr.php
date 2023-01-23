<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodItemStoreRequest;
use App\Http\Requests\MenuStoreRequest;
use App\Models\FoodItem;
use App\Models\Menu;
use Illuminate\Http\Request;

class FoodItemControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = FoodItem::with('menus')->paginate(3);
        return view('admin.menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Menu $menuu)
    {
        return view('admin.menu.create', compact('menuu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodItemStoreRequest $request)
    {
        FoodItem::create([
          'name' => $request->name,
          'quantity' => $request->quantity,
          'price' => $request->price
        ]);

        return to_route('menu.index')->with('success', 'Data hasbeen Added');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodItem $menu)
    {
        
      $menu->delete();

      return to_route('menu.index')->with('success', 'Data has been deleted!!');

    }
}
