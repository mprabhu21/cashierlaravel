<?php

namespace App\Http\Controllers;
use App\Model\PurchaseModel;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    public static function getAction() {        
        return view('orders.view', [
            'orders' => PurchaseModel::where('user_id', auth()->user()->id)->paginate(20)
        ]);
    }

}
