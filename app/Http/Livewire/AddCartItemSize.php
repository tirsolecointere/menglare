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
    public $stock = 0;

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
        $this->qty = $this->qty - 1;
    }

    public function increment() {
        $this->qty = $this->qty + 1;
    }
}
