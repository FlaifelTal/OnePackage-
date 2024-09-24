<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Product;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(){
        
        $products = Product::limit(6)->get();
        // $products = Product::limit(6)->get();
        return view('main', [
            'products'=>$products
        ]);

    }
}
