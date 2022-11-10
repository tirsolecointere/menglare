<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCartItemColor extends Component
{
    public $product, $colors;
    public $color_id = '';

    public $qty = 1;
    public $stock = '';

    public function mount() {
        $this->colors = $this->product->colors;
    }

    public function render()
    {
        return view('livewire.add-cart-item-color');
    }

    public function updatedColorId($value) {
        $this->stock = $this->product->colors->find($value)->pivot->quantity;
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
}
