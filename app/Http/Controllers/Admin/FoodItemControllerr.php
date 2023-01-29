<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodItemStoreRequest;
use App\Http\Requests\MenuStoreRequest;
use App\Models\FoodItem;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class FoodItemControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $menu = FoodItem::with('menus')->paginate(3);
        return view('admin.menu.index', [
          'menu' => FoodItem::latest()->filter(request(['search']))->paginate(3)
        ]);
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

        $image = $request->file('image')->store('public/menus');

         FoodItem::create([
          'name' => $request->name,
          'image' => $image,
          'ingredients_name' => $request->ingredients_name,
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
    public function edit(FoodItem $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodItem $menu)
    {
        $request->validate([
          'name' => 'required',
          'quantity' => 'required',
          'price' => 'required'
        ]);
        

        $image = $menu->image;
        if($request->hasFile('image')) {
          Storage::delete($menu->image);
          $image = $request->file('image')->store('public/menus');
        }

        $menu->update([
          'name' => $request->name,
          'image' => $image,
          'quantity' => $request->quantity,
          'price' => $request->price,
        ]);

        return to_route('menu.index')->with('success', 'Menu has been updated');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodItem $menu)
    {
      
      Storage::delete($menu->image);
      $menu->delete();

      return to_route('menu.index')->with('success', 'Data has been deleted!!');

    }

    public function pdf()
    {
      $menu = FoodItem::all();

      view()->share('menu', $menu);
      $pdf = PDF::loadview('admin.menu.datamenu');
      return $pdf->download('datamenu.pdf');
      
    }

}
