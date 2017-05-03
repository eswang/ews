<?php
// Name: OrderController.php
// Description: The Laravel controller that will handle routes related to
// creating, reading, updating, and deleting orders.
//
// History:
// Edward Wang   4/18/2017  Created.

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use App\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get an array of all orders from the database.
        $orders = Order::all();
        
        // For each order, add a link to it.
        foreach ($orders as $order)
        {
            $order->view_order = [ 
                'href' => 'order/' . $order->id,
                'method' => 'GET',
            ];
        }
        
        // Response to client.
        $response = [
            'msg' => 'List of all orders',
            'orders' => $orders
        ];
        
        return response()->json($response, 200);
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
        $statusCode = 200;
        //
        // Extract the Recipient Name, Street Address, City, State, Zip Code,
        // Phone Number, Product ID, and Quantity submitted by the client.
        $recipient_name = $request->input('recipient_name');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');
        $zipcode = $request->input('zipcode');
        $phone = $request->input('phone');
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        
        // Verify that the product actually exists.
        if (!Product::find($product_id))
        {
            // Response to client if product does not exist.
            $response = [
                'msg' => 'Product does not exist'
            ];
            $statusCode = 500;
        }
        
        // If product exists, save the order.
        if ($statusCode == 200)
        {
            $order = new Order([
                'recipient_name' => $recipient_name,
                'address' => $address,
                'city' => $city,
                'state' => $state,
                'zipcode' => $zipcode,
                'phone' => $phone,
                'product_id' => $product_id,
                'quantity' => $quantity
            ]);
        
            // Save the order to the database.
            if ($order->save())
            {
                $order->view_order = [
                    'href' => '/order/1',
                    'method' => 'GET'
                ];
                $response = [
                    'msg' => 'Order created',
                    'order' => $order
                ];
                $statusCode = 201;
            }
            else
            {
                // Response to client if save was unsuccessful.
                $response = [
                    'msg' => 'Unable to create order'
                ];
                $statusCode = 500;
            }
        }
        return response()->json($response, $statusCode);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $order->view_order = [
            'href' => 'order',
            'method' => 'GET'
        ];
        
        $response = [
            'msg' => 'Order information',
            'order' => $order
        ];
        
        return response()->json($response, 200);
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
        $statusCode = 200; 
        
        // Extract the Recipient Name, Street Address, City, State, Zip Code,
        // Phone Number, Product ID, and Quantity submitted by the client.
        $recipient_name = $request->input('recipient_name');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');
        $zipcode = $request->input('zipcode');
        $phone = $request->input('phone');
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        
        // Get the order from the database.
        $order = Order::find($id);
        if (!$order)
        {
            // Response to client if order does not exist.
            $response = [
                'msg' => 'Order does not exist'
            ];
            $statusCode = 404;
        }
        
        // Verify that the product actually exists.
        if ($statusCode == 200 && !Product::find($product_id))
        {
            // Response to client if product does not exist.
            $response = [
                'msg' => 'Product does not exist'
            ];
            $statusCode = 500;
        }
        
        // If product exists, save the order.
        if ($statusCode == 200)
        {
            // Update the order based on the values from the client.
            $order->recipient_name = $recipient_name;
            $order->address = $address;
            $order->city = $city;
            $order->state = $state;
            $order->zipcode = $zipcode;
            $order->phone = $phone;
            $order->product_id = $product_id;
            $order->quantity = $quantity;
            
            // Save the updated order to the database.
            if ($order->update())
            {
                // Response to client if save was successful.
                $order->view_order = [
                    'href' => 'order/' . $order->id,
                    'method' => 'GET'
                ];
                $response = [
                    'msg' => 'Order updated',
                    'order' => $order
                ];
                $statusCode = 200;
            }
            else
            {
                // Response to client if save was unsuccessful.
                $response = ['msg' => 'Unable to update order'];
                $statusCode = 404;
            }
        }
        return response()->json($response, $statusCode);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statusCode = 200;
        
        // Get the order from the database.
        $order = Order::find($id);
        if (!$order)
        {
            // Response to client if order does not exist.
            $response = [
                'msg' => 'Order does not exist'
            ];
            $statusCode = 404;
        }
        
        // Delete order from the database.
        if ($statusCode == 200 )
        {
            if ($order->delete())
            {
                // Response to client if delete was successful.
                $response = [
                    'msg' => 'Order deleted',
                    'create' => [
                        'href' => 'order',
                        'method' => 'POST',
                        'params' => 'recipient_name, address, city, state, zipcode, phone, product_id, quantity'
                    ]
                ];
                $statusCode = 200;            
            }
            else
            {
                // Response to client if delete was unsuccessful.
                $response = [
                    'msg' => 'Unable to delete order'
                ];
                $statusCode = 404;
            }
        }
        return response()->json($response, $statusCode);
    }
}
