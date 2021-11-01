<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PaymentController extends Controller
{

    public function checkout(Request $request){
    	return view('payment.checkout');
    }


    public function shipping(Request $request){
    	return view('payment.shipping');
    }

}
