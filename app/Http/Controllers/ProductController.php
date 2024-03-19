<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function export()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }
}
