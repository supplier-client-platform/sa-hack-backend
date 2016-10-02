<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Exception;

use App\Http\Requests;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return [
                'products' => Product::all()
            ];
        }
        catch (Exception $e) {
            return response('Error retrieving products', 500);
        }
    }

    /**
     * Display a listing of the resource by id.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_id($id)
    {
        try {
            return [
                'product' => Product::findOrFail($id)
            ];
        }
        catch (Exception $e) {
            return response('Error retrieving product', 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            if (!$request->has('name')) {
                throw new Exception('Error: name not defined');
            }
            if (!$request->has('price')) {
                throw new Exception('Error: price not defined');
            }
            if (!$request->has('img_url')) {
                throw new Exception('Error: img_url not defined');
            }
        }
        catch (Exception $e) {
            return response('Incomplete data set', 400);
        }

        try {
            $new_product = Product::create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'img_url' => $request->input('img_url')
            ]);

            return [
                'product' => $new_product
            ];
        }
        catch(Exception $e) {
            return response('Error creating product', 500);
        }
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
    public function destroy($id)
    {
        //
    }
}
