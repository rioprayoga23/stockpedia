<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $product = Product::with(['galleries', 'user'])->where('slug', $slug)->firstOrFail();

        return view('pages.detail', [
            'product' => $product
        ]);
    }

    public function add(Request $request, $id)
    {

        $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id,
        ];
        Cart::create($data);
        return redirect()->route('cart');
    }
}
