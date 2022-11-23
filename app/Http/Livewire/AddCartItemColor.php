<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AddCartItemColor extends Component
{
    public $product, $colors;
    public $color_id = '';

    public $qty = 1;
    public $stock = '';

    public $options = [
        'size_id' => null,
    ];

    public function mount() {
        $this->colors = $this->product->colors;
        $this->options['image'] = Storage::url($this->product->images->first()->url);
    }

    public function updatedColorId($value) {
        $color = $this->product->colors->find($value);
        $this->stock = $color->pivot->quantity;
        $this->options['color'] = $color->name;
        $this->options['color_id'] = $color->id;
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

    public function addItem() {
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'weight' => 0,
            'options' => $this->options,
        ]);

        $this->stock = qty_available($this->product->id, $this->color_id);

        $this->reset('qty');

        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-item-color');
    }
}
