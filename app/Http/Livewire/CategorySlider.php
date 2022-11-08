<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CategorySlider extends Component
{
    public $category;

    public $products = [];

    public function loadProducts() {
        $this->products = $this->category->products()->where('status', Product::PUBLISHED)->take(10)->get();

        $this->emit('initSwiper');
    }

    public function render()
    {
        return view('livewire.category-slider');
    }
}
