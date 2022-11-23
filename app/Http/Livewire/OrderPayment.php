<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderPayment extends Component
{
    public $order;

    protected $listeners = ['payOrder'];

    public function mount(Order $order) {
        $this->order = $order;
    }

    public function payOrder() {
        $this->order->status = 2;
        $this->order->save();

        return redirect()->route('orders.show', $this->order);
    }

    public function render()
    {
        $items = json_decode($this->order->content);

        return view('livewire.order-payment', compact('items'));
    }
}
