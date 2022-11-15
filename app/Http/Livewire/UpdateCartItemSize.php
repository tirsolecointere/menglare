<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class UpdateCartItemSize extends Component
{
    public $rowId, $qty, $stock;

    public function mount() {
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;

        $color = Color::where('name', $item->options->color)->first();
        $size = Size::where('name', $item->options->size)->first();

        $this->stock = qty_available($item->id, $color->id, $size->id);
    }

    public function decrement() {
        if ($this->qty > $this->stock) {
            $this->qty = $this->stock;
        } else {
            $this->qty = $this->qty - 1;
        }

        Cart::update($this->rowId, $this->qty);

        $this->emit('render');
    }

    public function increment() {
        if ($this->qty < 0) {
            $this->qty = 1;
        } else {
            $this->qty = $this->qty + 1;
        }

        Cart::update($this->rowId, $this->qty);

        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.update-cart-item-size');
    }
}
