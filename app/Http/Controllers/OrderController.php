<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders');
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

        $order = new App\Order;

        $order->username = $request->name;
        $order->address = $request->address;
        $order->phone = $request->phone;

        $order->save();
    }
}
