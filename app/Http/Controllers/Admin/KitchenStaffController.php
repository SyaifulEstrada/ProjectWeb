<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KitchenStaffStoreRequest;
use App\Models\KitchenStaff;
use Illuminate\Http\Request;

class KitchenStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kitchen_staff = KitchenStaff::all();
        return view('admin.kitchenstaff.index', compact('kitchen_staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.kitchenstaff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KitchenStaffStoreRequest $request)
    {
        KitchenStaff::create([
         'name' => $request->name,
         'gender' => $request->gender,
         'email' => $request->email,
         'password' => $request->password,
         'phone' => $request->phone,
         'address' => $request->address
        ]);

        return to_route('kitchenstaff.index')->with('success', 'Data has been addedd!');

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
    public function edit(KitchenStaff $kitchen_staffs)
    {
        return view('admin.kitchenstaff.edit', compact('kitchen_staffs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KitchenStaffStoreRequest $request, KitchenStaff $kitchen_staffs)
    {
        $kitchen_staffs->update($request->validated());

        return to_route('kitchenstaff.index')->with('success', 'The data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KitchenStaff $kitchen_staffs)
    {
        $kitchen_staffs->delete();

        return to_route('kitchenstaff.index')->with('success', 'Data has been deleted');
    }
}
