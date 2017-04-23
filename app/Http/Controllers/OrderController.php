<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "It works!";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "It works!";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Recipient Name, Street Address, City, State, Zip Code, Phone Number, Product, Quantity
        $name = $request->input('name');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');
        $zipcode = $request->input('zipcode');
        $phone = $request->input('phone');
        $quantity = $request->input('quantity');
        
        $order = [
            'name' => $name,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'zipcode' => $zipcode,
            'phone' => $phone,
            'quantity' => $quantity,
            'view_order' => [
                'href' => '/order/1',
                'method' => 'GET'
            ]
        ];
        
        $response = [
            'msg' => 'Order created',
            'product' => $order
        ];
        
        return response()->json($order, 201);
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
        return "It works!";
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
        return "It works!";
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
        // Recipient Name, Street Address, City, State, Zip Code, Phone Number, Product, Quantity
        $name = $request->input('name');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');
        $zipcode = $request->input('zipcode');
        $phone = $request->input('phone');
        $quantity = $request->input('quantity');
        
        $order = [
            'name' => $name,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'zipcode' => $zipcode,
            'phone' => $phone,
            'quantity' => $quantity,
            'view_order' => [
                'href' => '/order/1',
                'method' => 'GET'
            ]
        ];
        
        $response = [
            'msg' => 'Order created',
            'product' => $order
        ];
        
        return response()->json($order, 201);
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
        return "It works!";
    }
}
