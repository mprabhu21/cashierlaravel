<?php

namespace App\Http\Controllers;
use App\Model\ProductsModel;
use Illuminate\Http\Request;
use App\Model\PurchaseModel;
use Illuminate\Support\Facades\Auth;
use App\User;

class purchaseController extends Controller
{
    public static function getAction(Request $request) {
        if (Auth::check()) {            
            return view('purchase.view', [
                'product' => ProductsModel::findOrFail($request->route('id'))
            ]);
        } else {
            return view('auth.login');
        }
    }

    public static function getProductDetail(Request $request) {        
        return view('products.detail', [
            'product' => ProductsModel::findOrFail($request->route('id'))
        ]);
    }

    public function orderPost(Request $request)
    {
            $user = User::find(auth()->user()->id);
            $input = $request->all();            
            $token = $input['stripeToken'];            
            try {
                $product = ProductsModel::findOrFail($request->product_id);
                $purchase = $user->charge($product->product_price * 100, [
                    'currency' => 'inr',
                    'source' => $token
                    ]
                );
                if($purchase->status == 'succeeded') {                    
                    PurchaseModel::insert([
                        'user_id' => auth()->user()->id,
                        'product_id' => $request->product_id,
                        'stripe_id' => $purchase->id,
                        'stripe_status' => $purchase->status,
                        'stripe_customer' => '',
                        'stripe_price' => $purchase->amount,
                        'stripe_transaction' => $purchase->balance_transaction,
                        'stripe_currency' => $purchase->currency,
                        'stripe_payment_method' => $purchase->payment_method,
                        'stripe_receipt_url' => $purchase->receipt_url,
                        'quantity' => 1
                    ]);
                    return back()->with('success','Subscription is completed.');
                } else {
                    return back()->with('error','Some error occured, Try again later.');
                }
            } catch (Exception $e) {
                return back()->with('success',$e->getMessage());
            }
            
    }
}
