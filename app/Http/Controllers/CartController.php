<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add($id)
    {
        if(Auth::check() && auth()->user()->role == 'user'){
            $user_id = auth()->user()->id;
            $food_id = $id;

            $cart = Cart::where('user_id',$user_id)->where('food_id', $food_id)->first();

            if ($cart) {

                $newQty = $cart->qty+1;

                Cart::updateOrInsert(
                    ['user_id' => $user_id, 'food_id' => $food_id],
                    ['qty' => $newQty] // replace 10 with the updated quantity
                );
                $message = 'Quantity increased successfully.';
            } else {
                $cartData = [
                    'user_id' => auth()->user()->id,
                    'food_id' => $id,
                    'qty' => 1,
                ];
                Cart::create($cartData);
                $message = 'Item added to the cart successfully.';
            }

            return redirect()->route('food.detail', ['id' => $id])->with('success', $message);
        }
        else{
            return redirect()->route('home');
        }
    }

    public function show()
    {
        if(Auth::check() && auth()->user()->role == 'user'){

            $user_id = auth()->user()->id;

            $carts = Cart::with('food')->where('user_id',$user_id)->get();

            $count = 0;
            if ($carts) {
                $count=$carts->count();
            }

            // dump($carts);
            return view('cart')->with('carts', $carts)->with('count',$count);
        }
        else{
            return redirect()->route('home');
        }
    }
}
