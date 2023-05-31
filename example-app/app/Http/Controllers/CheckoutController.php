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
            return back()->with('warning', "Don't have product in cart!");
        }
        $bill = null;
        if ($request->has('defaultInfo')) {
            $bill = new Bills([
                'user_id' => Auth::user()->id,
                'address' => Auth::user()->address,
                'phone' => Auth::user()->phone,
                'shipping' => $request['shipping'],
                'total' => $request['total'],
            ]);
        } else {
            echo $request['phone'];
            $request->validate([
                'phone' => 'required|numeric|min:10|max:255',
                'address' => 'required|string|max:255',
            ]);
            $bill = new Bills([
                'user_id' => Auth::user()->id,
                'address' =>  $request['address'],
                'phone' =>  $request['phone'],
                'shipping' => $request['shipping'],
                'total' => $request['total'],
            ]);
        }
        foreach (session('cart') as $key => $value) {
            if (!$product = Products::find($key)) {
                $request->session()->forget('cart');
                return back()->with('warning', "Lỗi giỏ hàng!");
            }
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
            return back()->with('warning', 'The operation could not be performed.');
    }
}