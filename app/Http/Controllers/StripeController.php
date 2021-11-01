<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use App\Sold_Item;
use App\Customer_Order;
use Auth;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOrder;
use App\Mail\OrderConfirmation;

class StripeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */



    public function stripe_payment(Request $request){

    	set_time_limit(0);

		if (!session('cart') || count(session('cart.shopping_cart')) == 0 || empty(session('cart.shopping_cart')) || !$request->stripeToken) {
			return back()->withErrors(['error','Error Please Retry']);
		}

		require 'vendor/autoload.php';
			
		$description = "";

		$cart_t_price = 0;

		foreach (session('cart.shopping_cart') as $key => $item) {

			$cart_t_price += $item['cad_price'];

			$description .= $item['sku']." ".$item["name"]." (".$item['default_img'].")";
			if (isset($item['stone'])) {

				$description .= " with stone ".$item['stone']['stone_sku']." ".$item['stone']['name']." (".$item['stone']['default_img'].")";

				$cart_t_price += $item['stone']['cad_price'];

			}

		}

		$description .= "[subtotal=".session('cart.shopping_cart_detail.subtotal').", tax=".session('cart.shopping_cart_detail.estimate_total_tax').", shipping=".session('cart.shopping_cart_detail.shipping_amount').",discount=".session('cart.coupon_code_applied.discount').", total=".session('cart.shopping_cart_detail.total_cost')."]";

		$stripe = new \Stripe\StripeClient(
		  env('STRIPE_SK')
		);

		$token = $request->stripeToken;

		if (empty($request->billing_checkbox) && $request->billing_address_line_1 != null & $request->billing_postal_zipcode != null) {
	
			if (!empty($request->billing_city) && !empty($request->billing_country) && !empty($request->billing_address_line_1) && !empty($request->billing_postal_zipcode) && !empty($request->billing_s_p_r)) {
				
				$billing = [
					'city'=>$request->billing_city,
				 	'country'=>$request->billing_country,
				 	'line1'=>$request->billing_address_line_1,
				 	'line2'=>$request->billing_address_line_2,
				 	'postal_code'=>$request->billing_postal_zipcode,
				 	'state'=>$request->billing_s_p_r,
				];

			}else{
				return redirect()->to('/checkout')->withErrors(['error','Error With Billing Address. Please Retry']);
			}
			
		}elseif($request->billing_checkbox == "on"){

			$billing = [
				'city'=>session('cart.address.city'),
			 	'country'=>session('cart.address.country'),
			 	'line1'=>session('cart.address.address'),
			 	'line2'=>session('cart.address.line2'),
			 	'postal_code'=>session('cart.address.zipcode'),
			 	'state'=>session('cart.address.spr'),
			];

		}else{

			return redirect()->to('/checkout')->withErrors(['error','Error With Billing Option. Please Retry']);
		}

		if (session('cart.shopping_cart_detail.subtotal') == $cart_t_price && session('cart.shopping_cart_detail.estimate_total_tax') != null) {

			$customer = $stripe->customers->create([
				 'source' => $token,
				 "description" => "Jewellery Order",
				 'address'=>$billing,
				 "email" => session('cart.address.email_address'),
				 'name'=>session('cart.address.contact_name'),
				 'phone'=>session('cart.address.phone_number'),
				 'shipping'=>[

				 	'address'=>[
				 		'city'=>session('cart.address.city'),
				  		'country'=>'CA',
				  		'line1'=>session('cart.address.address'),
				  		'postal_code'=>session('cart.address.zipcode'),
				  		'state'=>session('cart.address.spr'),
				 	],
				 	'name'=>session('cart.address.contact_name'),

				 ],
			]);
			
		}else{
		
			return redirect()->to('/checkout')->withErrors(['error','Error Please Retry (Error 701)']);
		}

		$charge = $stripe->charges->create([
		  'amount' => intval(str_replace(['.', ','],'',number_format(session('cart.shopping_cart_detail.total_cost'), 2, '.', ''))),
		  'currency' => session('cart.shopping_cart_detail.currency'),
		  'description' => $description,
		  'customer' => $customer->id,
		  'shipping'=>[
		  	'address'=>[
		  		'city'=>session('cart.address.city'),
		  		'country'=>'CA',
		  		'line1'=>session('cart.address.address'),
		  		'postal_code'=>session('cart.address.zipcode'),
		  		'state'=>session('cart.address.spr'),
		  	],
		  	'name'=>session('cart.address.contact_name'),
		  ],
		]);


		$order_num = 'I' . str_random(4) . now()->timestamp . Auth::id();

		foreach(session('cart.shopping_cart') as $sku => $item){

			$sold = new Sold_Item;
			$sold->order_num = $order_num;
			$sold->user_id = (Auth::id() or 0);
			$sold->item_sku = $item['sku'];
			$sold->img = $item['default_img'];
			$sold->item_style = $item['name'];
			$sold->sold_price = $item['cad_price'];
			$sold->tax = $item['price']*session('cart.shopping_cart_detail.full_tax');
			$sold->size = $item['size'];
			$sold->engraving = $item['engraving'];
			$sold->returns = $item['return'];
			if (isset($item['stone'])) {
				$sold->diamond_id=$item['stone']['stone_sku'];
				$sold->diamond_name=$item['stone']['name'];
				$sold->diamond_shape=$item['stone']['shape'];
				$sold->diamond_price=$item['stone']['cad_price'];
			}
			$sold->save();

			if (isset($item['stone'])){

				$stone = [
					"diamond_id" =>$item['stone']['stone_id'],
					"diamond_sku" =>$item['stone']['stone_sku'],
                    "name"=>$item['stone']['name'],
                    "default_img"=>$item['stone']['default_img'],
                    "shape" =>$item['stone']['shape'],
                    "size" =>$item['stone']['size'],
                    "color" =>$item['stone']['color'],
                    "clarity" =>$item['stone']['clarity'],
                    "carat" =>$item['stone']['carat'],
                    "price" =>$item['stone']['cad_price'],
                    "cert_num"=>$item['stone']['cert_num'],
                    "url"=>$item['stone']['url']
				];

			}else{
				$stone = null;
			}

			$order[] = [
				'order_num'=>$order_num,
				'item_sku'=>$item['sku'],
				'item_name'=>$item['name'],
				'price'=>$item['cad_price'],
				'size'=>$item['size'],
				'brand'=>$item['brand'],
				'engraving'=>$item['engraving'],
				'link'=>$item['link'],
				'img'=>$item['default_img'],
				'stone'=>$stone
			];

		}

		$cus_ord = new Customer_Order;
		$cus_ord->user_id = (Auth::id() or 0);
		$cus_ord->order_num = $order_num;
		$cus_ord->total_price = session('cart.shopping_cart_detail.subtotal');
		$cus_ord->shipping_cost = session('cart.shopping_cart_detail.shipping_amount');
		$cus_ord->tax = session('cart.shopping_cart_detail.estimate_total_tax');
		$cus_ord->discount = session('cart.coupon_code_applied.discount');
		$cus_ord->payment_method = "Stripe";
		$cus_ord->contact_name = session('cart.address.contact_name');
		$cus_ord->phone_number = session('cart.address.phone_number');
		$cus_ord->email_address = session('cart.address.email_address');
		$cus_ord->address = session('cart.address.address');
		$cus_ord->unit = session('cart.address.unit');
		$cus_ord->country = session('cart.address.country');
		$cus_ord->spr = session('cart.address.spr');
		$cus_ord->city = session('cart.address.city');
		$cus_ord->zipcode = session('cart.address.zipcode');
		$cus_ord->save();

		$ip = file_get_contents("http://ipecho.net/plain");
		$url = 'http://ip-api.com/json/'.$ip;
		$tz = file_get_contents($url);
		$tz = json_decode($tz,true)['timezone'];

		$data = [
			'customer'=>[
				'user'=>Auth::id(),
				'contact_name'=>session('cart.address.contact_name'),
				'phone_number'=>session('cart.address.phone_number'),
				'email'=>session('cart.address.email_address'),
				'address'=>session('cart.address.address'),
				'country'=>session('cart.address.country'),
				'spr'=>session('cart.address.spr'),
				'city'=>session('cart.address.city'),
				'zipcode'=>session('cart.address.zipcode'),
				'subtotal'=>session('cart.shopping_cart_detail.subtotal'),
		        'shipping'=>session('cart.shopping_cart_detail.shipping_amount'),
		        'tax'=>session('cart.shopping_cart_detail.estimate_total_tax'),
		        'discount'=>session('cart.coupon_code_applied.discount'),
		        'total'=>session('cart.shopping_cart_detail.total_cost'),
		        'time'=>carbon::now($tz)->addDays(30)->format('Y/m/d')
			],
			'order'=>$order
			
		];

		Mail::to('brandonsanghuynh123@gmail.com')->send(new SendOrder($data));
		Mail::to('brandonsanghuynh123@gmail.com')->send(new OrderConfirmation($data));
		// Mail::to('sales@exceljewellers.com')->send(new SendOrder($data));
		// Mail::to('order@exceljewellers.com')->send(new SendOrder($data));
		Mail::to(session('cart.address.email_address'))->send(new OrderConfirmation($data));
		
		\App\Helper\AppHelper::redeem_promo(session('cart.coupon_code_applied.coupon_code'));
		// Session::forget('cart');
		session()->put('order_num',$order_num);
		return redirect('/thankyou')->with(['order_num',$order_num]);

    }



}
