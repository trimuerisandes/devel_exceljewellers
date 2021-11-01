<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function apply_coupon(Request $req){

    	$coupon = DB::table('coupon_promos')->where('coupon_code',$req->coupon_code);

    	if (count($coupon->get()) > 0) {

            if ($coupon->value('coupon_to_user')) {
                if ($coupon->value('coupon_to_user') != Auth::id()) {
                    $response = [
                        'response'=>'invalid user',
                    ];
                    return $response;
                }
            }

            if ($coupon->value('redeemed_by')) {
                if(Carbon::createFromFormat('Y-m-d H:i:s',$coupon->value('redeemed_by'))->isPast()){
                    $response = [
                        'response'=>'expired',
                    ];
                    return $response;
                }
            }

    		$response = [
    			'response'=>'valid',
    		];

            \App\Helper\AppHelper::apply_promo($coupon->value('coupon_code'));

    		return $response;

    	}else{
    		return $response = [
    			'response'=>'invalid'
    		];
    	}
    }

    public function remove_promo(Request $req){
    	session()->forget('cart.coupon_code_applied');
		return redirect()->back()->with('success', ['Promo was removed.']);
    }
}