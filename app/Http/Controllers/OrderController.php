<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Good;
use App\OrderedGood;
use App\Http\Requests;
use DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderedGood')->get();
        return view('orders', ['orders' => $orders]);
    }

    public function create()
    {
        $goods = Good::all();
        return view('welcome', ['goods' => $goods]);
    }

    public function store(Requests\StoreOrder $request)
    {
        $goods = explode(", ", $request->goods);

        $order = new Order;

        $order->username = $request->name;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->save();

        foreach ($goods as $key => $value) {
            $items = explode(": ", $value);
            // dd("id - $items[0]", "count - $items[1]");
            $orderedGood = new OrderedGood;
            $orderedGood->good_id = $items[0];
            $orderedGood->count = $items[1];
            // dd($order);
            $order->orderedGood()->save($orderedGood);
        }

        $response = array(
            'status' => 'success',
            'msg' => 'Order created successfully',
        );
        return \Response::json($response);
    }
}
