<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('User.checkout');
    }
    public function pay(Request $request)
    {
        if (!session('cart')) {
            return back()->withErrors('The operation could not be performed.');
        }
        $bill = null;
        if ($request->has('defaultInfo')) {
            $bill = new Bills([
                'user_id' => Auth::user()->id,
                'address' => Auth::user()->address,
                'phone' => Auth::user()->phone,
                'shipping' => $request['shipping']
            ]);
        } else {
            echo $request['phone'];
            $request->validate([
                'phone' => 'required|numeric|min:10',
                'address' => 'required|string',
            ]);
            $bill = new Bills([
                'user_id' => Auth::user()->id,
                'address' =>  $request['address'],
                'phone' =>  $request['phone'],
                'shipping' => $request['shipping']
            ]);
        }
        if ($bill->save()) {
            foreach (session('cart') as $key => $value) {
                $oder = new Orders([
                    'bills_id' => $bill->id,
                    'product_id' => $key,
                    'quantity' => $value['quantity'],
                    'price' => $value['price'],
                ]);
                $oder->save();
            }
            $request->session()->forget('cart');
            return redirect()->route('dashboard')->withSuccess('Order Fulfillment Successful!');
        } else
            return back()->with('cantsave', 'The operation could not be performed.');
    }
}