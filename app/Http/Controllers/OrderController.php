<?php

namespace App\Http\Controllers;

use App\Models\Check;
use Illuminate\Http\Request;
use App\Models\Gift;

class OrderController extends Controller
{
    public function checkout(Request $request, Gift $gift)
    {

        $check = new Check;
        $check->user_id = $request->user()->id;
        $check->gift_id = $gift->id;
        $check->quantity = $request->quantity;
        $check->date_of_order = $request->date_of_order;
        $check->address = $request->address;
        $check->payment = $request->payment;

        $check->save();

        return redirect()->route('index')->with('success', 'Заказ оформлен');
    }

}
