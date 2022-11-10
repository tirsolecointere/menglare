<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCartItem extends Component
{
    public $product;
    public $qty = 1;
    public $stock = '';

    public function mount() {
        $this->stock = $this->product->quantity;
    }

    public function decrement() {
        if ($this->qty > $this->stock) {
            $this->qty = $this->stock;
        } else {
            $this->qty = $this->qty - 1;
        }
    }

    public function increment() {
        if ($this->qty < 0) {
            $this->qty = 1;
        } else {
            $this->qty = $this->qty + 1;
        }
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
