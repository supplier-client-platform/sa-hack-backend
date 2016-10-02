<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Order;
use App\Order_item;
use DB;
use Exception;

class OrderController extends Controller
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
                'orders' => Order::all()
            ];
        }
        catch (Exception $e) {
            return response('Error retrieving orders', 500);
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
                'order' => Order::findOrFail($id)
            ];
        }
        catch (Exception $e) {
            return response('Error retrieving order', 404);
        }
    }

    /**
     * Display a listing of the resource by id.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_item($id)
    {
        try {
            return [
                'order' =>
                DB::select(DB::raw("SELECT a.*,(select p.name from product p where p.id = a.product_id) as pname  FROM `order_item` a WHERE a.order_id =".$id." "))
                //DB::table('order_item')->where('order_id', $id)->get()
            ];
        }
        catch (Exception $e) {
            return response('Error retrieving items', 404);
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
            if (!$request->has('customer_id')) {
                throw new Exception('Error: customerId not defined');
            }
            if (!$request->has('total_price')) {
                throw new Exception('Error: total_price not defined');
            }
            if (!$request->has('status')) {
                throw new Exception('Error: status not defined');
            }
            if (!$request->has('items')) {
                throw new Exception('Error: items not defined');
            }
        }
        catch (Exception $e) {
            return response('Incomplete data set', 400);
        }

        try {
            $new_order = Order::create([
                'customer_id' => $request->input('customer_id'),
                'total_price' => $request->input('total_price'),
                'status' => $request->input('status')
            ]);


            $items = json_decode($request->input('items'),true);

            foreach ($items as $item) {
                $order_item = Order_item::create([
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'order_id' => $new_order->id
                ]);
            }

            return [
                'order' => $new_order
            ];
        }
        catch(Exception $e) {
            return response('Error creating product'.$e, 500);
        }
    }

    public function update(Request $request, $id) {

        try {
            $order = Order::findOrFail($id);
            $order->status = ($request->has('status') ? $request->input('status') : 'pending');
            $order->save();

            return [
                'updated_order' => $order
            ];
        }
        catch (Exception $e) {
            return response('Error updating order status', 400);
        }
    }
}
