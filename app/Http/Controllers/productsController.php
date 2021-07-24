<?php

namespace App\Http\Controllers;
use App\Model\ProductsModel;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public static function getAction() {        
        return view('products.view', [
            'products' => ProductsModel::paginate(2)
        ]);
    }

    public static function getProductDetail(Request $request) {        
        return view('products.detail', [
            'product' => ProductsModel::findOrFail($request->route('id'))
        ]);
    }
}
