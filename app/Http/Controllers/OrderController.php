<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Good;
use App\Http\Requests;
use DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')->get();
        return view('orders', ['orders' => $orders]);
    }

    public function create()
    {
        $goods = Good::all();
        return view('welcome', ['goods' => $goods]);
    }

    public function store(Requests\StoreOrder $request)
    {
        $order = new Order;

        $order->username = $request->name;
        $order->address = $request->address;
        $order->phone = $request->phone;

        $order->save();

        $response = array(
            'status' => 'success',
            'msg' => 'Order created successfully',
        );
        return \Response::json($response);
    }
}
