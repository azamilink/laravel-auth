<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct()
    {
        $products = [
            ['name' => "Phone"],
            ['name' => "Tablet"],
            ['name' => "Laptop"],
            ['name' => "Watch"],
            ['name' => "Television"],
            ['name' => "Freeze"],
        ];
        Product::insert($products);
        return "Product has been inserted successfully";
    }

    public function search()
    {
        return view('pages.search');
    }

    public function autoComplete(Request $req)
    {
        $datas = Product::select("name")
            ->where("name", "LIKE", "%{$req->terms}%")
            ->get();
        return response()->json($datas);
    }
}
