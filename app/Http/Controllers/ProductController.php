<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rate;
use App\Models\Catalog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('/client/index');
    }

    public function productList()
    {
        $catalogs = Catalog::all();
        $products = Product::all();

        return view('/client/products', compact('products', 'catalogs'));
    }

    public function show($id)
    {
        //chi tiet san pham

        
        $products = Product::findOrFail($id);

        $ratings = Rate::where('product_ID', $products->id)->get();
        $rating_sum = Rate::where('product_ID', $products->id)->get()->sum('star');
        if ($ratings->count() > 0) {
            $rating_value = $rating_sum / $ratings->count();
        } else {
            $rating_value = 0;
        }
        $related_products = Product::where('catalog_ID', $products->catalog_ID)->limit(3)->get();
        return view('/client/product_detail', compact('products', 'related_products', 'ratings', 'rating_value'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $catalogs = Catalog::all();
        $products = Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('price', 'LIKE', "%{$search}%")
            ->get();
        return view('/client/products', compact('products', 'search', 'catalogs'));
    }

    public function locsanpham(Request $request)
    {
        $search = $request->search;

        $catalogs = Catalog::all();
        $products = Product::query();
        $products = $products->where('name', 'LIKE', "%{$search}%");
        for ($i = 0; $i < count($catalogs) - 1; $i++) {
            if ($i == 0)
                $products = $products->where('catalog_ID', '=', $request->factory);
            else
                $products = $products->orWhere('catalog_ID', '=', $request->factory);
        }
        $products = $products->where('price', '>', $request->min);
        $products = $products->where('price', '<', $request->max);
        $products = $products->get();
        return view('/client/products', compact('products', 'catalogs'));
    }
}
