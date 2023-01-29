<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KitchenStaffStoreRequest;
use App\Models\KitchenStaff;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KitchenStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $kitchen_staff = KitchenStaff::latest();

        // $kitchen_staff = KitchenStaff::with('orders')->paginate(3);
        return view('admin.kitchenstaff.index', [
          'kitchen_staff' => KitchenStaff::latest()->filter(request(['search']))->paginate(3),
        ]);
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
        'customer_id' => $request->customer_id,
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

    public function pdf()
    {
      $kitchen_staffs = KitchenStaff::all();

      view()->share('kitchen_staffs', $kitchen_staffs);
      $pdf = PDF::loadview('admin.kitchenstaff.datakitchenstaff');
      return $pdf->download('datakitchenstaff.pdf');
    }

}
