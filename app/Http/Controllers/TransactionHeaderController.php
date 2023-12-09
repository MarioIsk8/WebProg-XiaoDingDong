<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class TransactionHeaderController extends Controller
{
    public function create()
    {
        return view('checkout');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'full_name' => 'required|min:5',
            'phone_number' => 'required|numeric|digits:12',
            'address' => 'required|min:5',
            'city' => 'required|min:5',
            'cardholder_name' => 'required|min:3',
            'card_number' => 'required|numeric|digits:16',
            'country' => 'required',
            'zip_code' => 'required|numeric',
        ]);

        $checkout = new TransactionHeader();
        $checkout->full_name = $validateData['full_name'];
        $checkout->phone_number = $validateData['phone_number'];
        $checkout->country = $validateData['country'];
        $checkout->city = $validateData['city'];
        $checkout->cardholder_name = $validateData['cardholder_name'];
        $checkout->card_number = $validateData['card_number'];
        $checkout->address = $validateData['address'];
        $checkout->zip_code = $validateData['zip_code'];
        $checkout->save();

        $message = 'Checkout Successful';

        return redirect()->route('home')->with('success', $message);
    }
}
