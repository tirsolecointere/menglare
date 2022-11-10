<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
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
    public $options = [];

    public function mount() {
        $this->sizes = $this->product->sizes;
        $this->options['image'] = Storage::url($this->product->images->first()->url);
    }

    public function updatedSizeId($value) {
        if ($value) {
            $size = Size::find($value);
            $this->colors = $size->colors;
            $this->options['size'] = $size->name;
        } else {
            $this->reset(['colors', 'stock']);
        }
    }

    public function updatedColorId($value) {
        if ($this->size_id) {
            $size = Size::find($this->size_id);
            $color = $size->colors->find($value);

            $this->stock = $color->pivot->quantity;
            $this->options['color'] = $color->name;
        } else {
            $this->reset('stock');
        }
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

        $this->stock = qty_available($this->product->id, $this->color_id, $this->size_id);

        $this->reset('qty');

        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-item-size');
    }
}
