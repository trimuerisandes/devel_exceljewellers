<?php

namespace App\Helper;

use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppHelper{

	public static function Conversion($base_currency,$base_number,$foreign_currency){

		if (Session('currency')) {
			$rates = DB::table('currency_rates')->where('base_currency',$base_currency)->where('foreign_currency',$foreign_currency)->value('rate');
			return $base_number*$rates;
		}else{
			$rates = DB::table('currency_rates')->where('base_currency',$base_currency)->where('foreign_currency','CAD')->value('rate');
			return $base_number*$rates;
		}

	}

	public static function apply_promo($code){


			$redeem = DB::table('coupon_promos')->where('coupon_code',$code)->get();

			$subtotal = 0;
			$discount = 0;

			if ($redeem[0]->coupon_to_user) {
				if ($redeem[0]->coupon_to_user != Auth::id()) {
					$discount = 0;
					return $discount;
				}
			}

			if ($redeem[0]->redeemed_by) {
				if(Carbon::createFromFormat('Y-m-d H:i:s',$redeem[0]->redeemed_by)->isPast()){
					$discount = 0;
					return $discount;
				}
			}

			foreach (session('cart.shopping_cart') as $key => $value) {
			
				$subtotal += $value["cad_price"];

	            if (isset($value['stone']['cad_price'])) {
	                $subtotal += $value['stone']['cad_price'];
	            }
			
			}

			if ($redeem[0]->coupon_type === "percent_off") {

            	$percentage = $redeem[0]->percent_off/100;

            	$discount = $subtotal*$percentage;

            }elseif($redeem[0]->coupon_type === "amount_off"){

            	 $discount = $redeem[0]->amount_off;

            }else{
            	$discount=0;
            }	

			if ($redeem[0]->price_minimum) {

				if ($subtotal < $redeem[0]->price_minimum) {
					$discount = 0;
	            	return $discount;
	        	}

			}


			$coupon_code = [
				'coupon_code'=>$redeem[0]->coupon_code,
    			'coupon_type'=>$redeem[0]->coupon_type,
    			'amount_off'=>$redeem[0]->amount_off,
    			'percent_off'=>$redeem[0]->percent_off,
    			'shipping_off'=>$redeem[0]->shipping_off,
    			'discount'=>$discount,
			];

			session()->put('cart.coupon_code_applied',$coupon_code);

			return $discount;

	}

	public static function redeem_promo($code){

		$redeem = DB::table('coupon_promos')->where('coupon_code',$code)->value('max_redemptions');

		switch($redeem){

			case "once":
				DB::table('coupon_promos')->where('coupon_code',$code)->delete();
				return "coupon_deleted";
				break;
			default:
				return "coupon_not_deleted";
				break;

		}

	}


}
