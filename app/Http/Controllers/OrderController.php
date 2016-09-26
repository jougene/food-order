<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
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
        return view('welcome');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'address' => 'required|max:255'
        ]);

        $order = new Order;

        $order->username = $request->name;
        $order->address = $request->address;
        $order->phone = $request->phone;

        $order->save();
    }
}
