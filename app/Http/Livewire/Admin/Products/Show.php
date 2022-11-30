<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;

use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.admin.products.show', compact('products'))->layout('layouts.admin');
    }

    public function updatingSearch() {
        $this->resetPage();
    }
}
