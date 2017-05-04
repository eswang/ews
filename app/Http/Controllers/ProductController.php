<?php
// Name: ProductController.php
// Description: The Laravel controller that will handle routes related to
// creating, reading, updating, and deleting products.
//
// History:
// Edward Wang   4/18/2017  Created.

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class ProductController extends Controller
{
    /**
     * Return a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get an array of all products from the database.
        $products = Product::all();
        
        // For each product, add a link to it.
        foreach ($products as $product)
        {
            $product->view_product = [
                'href' => 'product/' . $product->id,
                'method' => 'GET',
            ];
        }
        
        // Response to client.
        $response = [
            'msg' => 'List of all products.',
            'products' => $products
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
        $statusCode = 500;
        
        // Extract the Name, Description, Width, Length, Height, Weight, and
        // Value submitted by the client.
        $name = $request->input('name');
        $description = $request->input('description');
        $width = $request->input('width');
        $length = $request->input('length');
        $height = $request->input('height');
        $weight = $request->input('weight');
        $value = $request->input('value');
        
        
        $product = new Product([
          'name' => $name,
          'description' => $description,
          'width' => $width,
          'length' => $length,
          'height' => $height,
          'weight' => $weight,
          'value' => $value,
          ]);

        // Save the product to the database.
        if ($product->save())
        {
            // Response to client if save was successful.
            $product->view_product = [
                'href' => 'product/' . $product->id,
                'method' => 'GET'
            ];
                
            $response = [
                'msg' => 'Product created.',
                'product' => $product
            ];
            $statusCode = 201;
        }
        else
        {
            // Response to client if save was unsuccessful. 
            $response = [
                'msg' => 'Unable to create product.'
            ];
            $statusCode = 500;
        }
        
        return response()->json($response, $statusCode);
    }

    /**
     * Return the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statusCode = 200;
        
        $product = Product::find($id);
        if (!$product)
        {
            // Response to client if product does not exist.
            $response = [
                'msg' => 'Product does not exist.'
            ];
            $statusCode = 404;
        }
        
        if ($statusCode == 200)
        {
            $product->view_product = [
                'href' => 'product',
                'method' => 'GET'
            ];
            
            $response = [
                'msg' => 'Product information.',
                'product' => $product
            ];
        }
        return response()->json($response, $statusCode);
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
        
        // Extract the Name, Description, Width, Length, Height, Weight, and
        // Value submitted by the client.
        $name = $request->input('name');
        $description = $request->input('description');
        $width = $request->input('width');
        $length = $request->input('length');
        $height = $request->input('height');
        $weight = $request->input('weight');
        $value = $request->input('value');
        
        // Get the product from the database.
        $product = Product::find($id);
        if (!$product)
        {
            // Response to client if product does not exist.
            $response = [
                'msg' => 'Product does not exist.'
            ];
            $statusCode = 404;
        }
        
        // If product exists, save it.
        if ($statusCode == 200)
        {
            // Update the product based on the values from the client.
            $product->name = $name;
            $product->description = $description;
            $product->width = $width;
            $product->length = $length;
            $product->height = $height;
            $product->weight = $weight;
            $product->value = $value;
            
            // Save the updated product to the database.
            if ($product->update())
            {
                // Response to client if save was successful.
                $product->view_product = [
                    'href' => 'product/' . $product->id,
                    'method' => 'GET'
                ];
                $response = [
                    'msg' => 'Product updated.',
                    'product' => $product
                ];
                $statusCode = 200;
            }
            else
            {
                // Response to client if save was unsuccessful.
                $response = ['msg' => 'Unable to update product.'];
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
        
        // Get the product from the database.
        $product = Product::find($id);
        if (!$product)
        {
            // Response to client if product does not exist.
            $response = [
                'msg' => 'Product does not exist.'
            ];
            $statusCode = 404;
        }
        
        // Delete product from the database.
        if ($statusCode == 200 )
        {
            if ($product->delete())
            {
                // Response to client if delete was successful.
                $response = [
                    'msg' => 'Product deleted.',
                    'create' => [
                        'href' => 'product',
                        'method' => 'POST',
                        'params' => 'name, description, width, length, height, weight, value'
                    ]
                ];
                $statusCode = 200;            
            }
            else
            {
                // Response to client if delete was unsuccessful.
                $response = [
                    'msg' => 'Unable to delete product.'
                ];
                $statusCode = 404;
            }
        }
        return response()->json($response, $statusCode);
    }
}
