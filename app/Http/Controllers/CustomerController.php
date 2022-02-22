<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Requests\StorePostRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customer = Customer::all();
        return view('customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customer/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //
        $valiated = $request->validated();
        $firstname=$request->input('first_name');
        $lastname=$request->input('last_name');
        $address=$request->input('address');

        $customer=new Customer();
        $customer->first_name=$firstname;
        $customer->last_name=$lastname;
        $customer->address=$address;
       
        $customer->save();
         return redirect('customers/create')->with('status','User Created!');
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
        $customer=Customer::find($id);
       return view('customer.show',compact('customer'));
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
        $customer=Customer::find($id);
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        //
        $valiated=$request->validated();
        $firstname=$request->input('first_name');
        $lastname=$request->input('last_name');
        $address=$request->input('address');

        $customer=Customer::find($id);
        $customer->first_name=$firstname;
        $customer->last_name=$lastname;
        $customer->address=$address;
        $customer->save();

        return redirect('customers/'.$id.'/edit')->with('status','User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $customer=Customer::find($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('message', 'Deleted Successfully');
    }
}
