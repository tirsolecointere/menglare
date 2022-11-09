<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends Component

{
    use WithPagination;

    public $category, $subcategoryFilter, $brandFilter;

    public $view = 'grid';

    public function render()
    {
        // $products = $this->category->products()->where('status', 1)->paginate(12);
        $productsQuery = Product::query()->whereHas('subcategory.category', function(Builder $query) {
            $query->where('id', $this->category->id);
        });

        if($this->subcategoryFilter) {
            $products = $productsQuery->whereHas('subcategory', function(Builder $query) {
                $query->where('name', $this->subcategoryFilter);
            });
        }

        if($this->brandFilter) {
            $products = $productsQuery->whereHas('brand', function(Builder $query) {
                $query->where('name', $this->brandFilter);
            });
        }

        $products = $productsQuery->paginate(12);


        return view('livewire.category-filter', compact('products'));
    }

    public function cleanFilters() {
        $this->reset(['subcategoryFilter', 'brandFilter']);
    }
}
