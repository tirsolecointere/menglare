<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart as ShoppingCart;
use Livewire\Component;

class Cart extends Component
{
    protected $listeners = ['render'];

    public function destroy() {
        ShoppingCart::destroy();

        $this->emitTo('dropdown-cart', 'render');
    }

    public function delete($rowId) {
        ShoppingCart::remove($rowId);

        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
