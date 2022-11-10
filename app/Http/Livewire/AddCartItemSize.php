<?php

namespace App\Http\Livewire;

use App\Models\Size;
use Livewire\Component;

class AddCartItemSize extends Component
{

    public $product, $sizes;

    public $color_id = '';
    public $size_id = '';
    public $colors = [];

    public $qty = 1;
    public $stock = '';

    public function updatedSizeId($value) {
        if ($value) {
            $size = Size::find($value);
            $this->colors = $size->colors;
        } else {
            $this->reset(['colors', 'stock']);
        }
    }

    public function updatedColorId($value) {
        if ($this->size_id) {
            $size = Size::find($this->size_id);
            $this->stock = $size->colors->find($value)->pivot->quantity;
        } else {
            $this->reset('stock');
        }
    }

    public function mount() {
        $this->sizes = $this->product->sizes;
    }

    public function render()
    {
        return view('livewire.add-cart-item-size');
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
