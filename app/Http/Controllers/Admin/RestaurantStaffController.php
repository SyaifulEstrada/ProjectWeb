<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantStaffStoreRequest;
use App\Models\RestaurantStaff;
use Illuminate\Http\Request;

class RestaurantStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant_staff = RestaurantStaff::all();
        return view('admin.restaurantstaff.index', compact('restaurant_staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurantstaff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantStaffStoreRequest $request)
    {
        RestaurantStaff::create([
          'name' => $request->name,
          'gender' => $request->gender,
          'email' => $request->email,
          'password' => $request->password,
          'phone' => $request->phone,
          'address' => $request->address
        ]);

        return to_route('restaurantstaff.index')->with('success', 'Data has been addedd!');

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
    public function edit(RestaurantStaff $staffrestaurant)
    {
        return view('admin.restaurantstaff.edit', compact('staffrestaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantStaffStoreRequest $request, RestaurantStaff $staffrestaurant)
    {
      $staffrestaurant->update($request->validated());

      return to_route('restaurantstaff.index')->with('success', 'The data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestaurantStaff $staffrestaurant)
    {
        $staffrestaurant->delete();

        return to_route('restaurantstaff.index')->with('success', 'Data has been deleted!!');
    }
}
