<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::query()->where('user_id', auth()->id());

        if (request('status')) {
            $orders->where('status', request('status'));
        }

        $orders = $orders->get();

        $pending = Order::where('status', 1)->where('user_id', auth()->id())->count();
        $received = Order::where('status', 2)->where('user_id', auth()->id())->count();
        $shipped = Order::where('status', 3)->where('user_id', auth()->id())->count();
        $delivered = Order::where('status', 4)->where('user_id', auth()->id())->count();
        $canceled = Order::where('status', 5)->where('user_id', auth()->id())->count();

        return view('orders.index', compact('orders', 'pending', 'received', 'shipped', 'delivered', 'canceled'));
    }

    public function show(Order $order) {
        $this->authorize('author', $order);

        $items = json_decode($order->content);

        return view('orders.show', compact('order', 'items'));
    }
}
