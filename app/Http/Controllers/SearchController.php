<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->q;

        if($request->filled('q')) {
            $products = Product::where('name', 'LIKE', '%' . $query . '%')
                                    ->where('status', 1)
                                    ->paginate(8)
                                    ->appends($request->query());
        } else {
            $products = [];
        }

        return view('search', compact('products'));
    }
}
