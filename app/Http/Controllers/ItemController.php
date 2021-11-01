<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Inventory;
use App\Favourite;
use Auth;
use App\Ratings;
use App\Address;
use App\engagement_ring;
use App\wedding_band;

class ItemController extends Controller
{
    public function show($id){
        if (empty($id)) {
            return redirect('/');
        }else{

        	$query  = DB::table('inventories')->where('id', $id)->get();

        	$other_img = DB::table('other_images')->where('item_id', $id)->get();

        	$style_img = DB::table('style_images')->where('item_id', $id)->get();

        	$fav = DB::table('favourites')->where('item_id', $id)->get();

        	$ratings = DB::table('ratings')->where('item_id','=',$id)->get();

        	$reviews = Ratings::join('users','users.id','=','user_id')->where('item_id',$id)->get();

            return view('item',['item' => $query,'other_img'=>$other_img,'style_img'=>$style_img,'favourites'=>$fav,'reviews' => $reviews,'ratings'=>$ratings->average('ratings')]);

        }
    }

    public function cart(){
    	return view('cart');
    }

    public function addsetting(Request $request){

    	if ($request->ajax()) {

            if ($request->type == "setting") {
            
                $product = DB::table('engagement_rings')->where('item_sku','=',$request->sku);
                $shape = DB::table('engagement_rings')->where('item_code','=',$product->value('item_code'));

                if (!$product) {
                    abort(404);
                }

                $allshape = $shape->get('stoneshape')->unique('stoneshape')->pluck('stoneshape')->toArray();

                if (in_array("Square",$allshape)) {
                    array_push($allshape,"Princess");
                }else if (in_array("Princess",$allshape)) {
                    array_push($allshape,"Square");
                }


                $cart = session()->get('create_ring.engagement-ring');

                // if cart is empty then this the first product

                    if ($product->value('sale_price') != null) {
                        $price = $product->value('sale_price');
                    }else{
                        $price = $product->value('price');
                    }
         
                    $cart = [
                        "id" => $product->value('item_sku'),
                        "size"=>$request->size,
                        "img"=>$request->img,
                        "currency"=>$product->value('currency'),
                        "price"=>$price,
                        "shape"=>$allshape,
                        "engraving"=>$request->engraving,
                        "url"=>$request->url
                    ];
         
                    session()->put('create_ring.engagement-ring', $cart);

                    if (session('create_ring.stone')) {
                        return "complete-ring";
                    }else{
                        return "diamond";
                    }
                               
            }

            else if ($request->type == "stone") {

                $cart = session()->get('create_ring.stone');

                if ($request->stone == "moissanite") {
                    
                    $product = DB::table('moissanite')->where('item_sku','=',$request->sku);
                
                    $cart = [
                        "stone_id" =>$product->value('id'),
                        "stone" =>$request->stone,
                        "stone_sku"=>$product->value('item_sku'),
                        "shape"=>$product->value('shape'),
                        "size"=>$product->value('MM'),
                        "color"=>"E-D-F",
                        "clarity"=>null,
                        "carat"=>$product->value('carat'),
                        "currency"=>$product->value('currency'),
                        "retail"=>$product->value('price'),
                        "cert_num"=>$product->value('item_sku'),
                        "shape"=>$product->value('shape'),
                        "img"=>$request->img,
                        "video"=>$product->value('video_link'),
                        "url"=>$request->url                            
                    ];
         
                    session()->put('create_ring.stone', $cart);

                }
                else if($request->stone == "lab-diamond"){

                    $product = DB::table('lab_grown_diamonds')->where('item_sku','=',$request->sku);

                    if (!empty(session('cart.shopping_cart'))) {
                        foreach (session('cart.shopping_cart') as $key) {
                          if(in_array($request->sku,$key)){
                            return "exist";
                          }
                          if (isset($key['stone'])) {
                            if(in_array($request->sku,$key['stone'])) {
                                return "exist";
                              }
                          }
                        }
                    }
                
                    $cart = [
                        "stone_id" =>$product->value('id'),
                        "stone" =>$request->stone,
                        "stone_sku"=>$product->value('item_sku'),
                        "shape" =>$product->value('shape'),
                        "size" =>$product->value('width')." By ".$product->value('length'),
                        "color" =>$product->value('color'),
                        "clarity" =>$product->value('clarity'),
                        "carat" =>$product->value('carat'),
                        "currency"=>$product->value('currency'),
                        "retail" =>$product->value('price'),
                        "cert_num"=>$product->value('item_sku'),
                        "img"=>$request->img,
                        // "img"=>$request->root()."/storage/image/moissanite/gem-shape/".strtolower($product->value('shape')).".jpg",
                        "video"=>$product->value('video_link'),
                        "url"=>$request->url                            
                    ];

                    session()->put('create_ring.stone', $cart);

                }else if($request->stone == "diamond"){

                    $product = DB::table('natural_diamonds')->where('item_sku','=',$request->sku);

                    if (!empty(session('cart.shopping_cart'))) {
                        foreach (session('cart.shopping_cart') as $key) {
                          if(in_array($request->sku,$key)){
                            return "exist";
                          }
                          if (isset($key['stone'])) {
                            if(in_array($request->sku,$key['stone'])) {
                                return "exist";
                              }
                          }
                        }
                    }
                
                    $cart = [
                        "stone_id" =>$product->value('id'),
                        "stone" =>$request->stone,
                        "stone_sku"=>$product->value('item_sku'),
                        "shape" =>$product->value('shape'),
                        "size" =>$product->value('width')." By ".$product->value('length'),
                        "color" =>$product->value('color'),
                        "clarity" =>$product->value('clarity'),
                        "carat" =>$product->value('carat'),
                        "currency"=>$product->value('currency'),
                        "retail" =>$product->value('price'),
                        "cert_num"=>$product->value('certificate'),
                        "img"=>$request->img,
                        // "img"=>$request->root()."/storage/image/moissanite/gem-shape/".strtolower($product->value('shape')).".jpg",
                        "video"=>$product->value('video_link'),
                        "url"=>$request->url
                    ];

                    session()->put('create_ring.stone', $cart);

                }else{
                    abort(404);
                }

                if (session('create_ring.engagement-ring')) {
                    return "complete-ring";
                }else{
                    return "engagement-ring";
                }

            }else{
                abort(404);
            }

    	}else{
            abort(404);
        }
    }

    public function addcart(Request $request){

        if ($request->ajax()) {
    
            if ($request->type == "engagement") {
                $product = DB::table('engagement_rings')->where('item_sku','=',$request->sku);
                $returns = "No";
            }else if ($request->type == "wedding-band") {
                $product = DB::table('wedding_bands')->where('item_sku','=',$request->sku);
                $returns = "No";
            }else if ($request->type == "fine-jewellery") {
                $product = DB::table('fine_jewelleries')->where('item_sku','=',$request->sku);
                $returns = "Yes";
            }else if ($request->type == "stone") {
  
                $product = DB::table('moissanite')->where('item_sku','=',$request->sku);
                $returns = "No";
            }else if ($request->type == "lab-stone") {
                $product = DB::table('lab_grown_diamonds')->where('item_sku','=',$request->sku);
                $returns = "No";
            }else if($request->type == "diamond"){
                $product = DB::table('natural_diamonds')->where('item_sku','=',$request->sku);
                $returns = "No";
            }else if($request->type == "complete-ring"){
                $product = DB::table('engagement_rings')->where('item_sku','=',session('create_ring.engagement-ring')['id']);
                $returns = "No";
            }

            if (!$product) {
                return redirect('/error');
            }

            $cart = session()->get('cart.shopping_cart');

            // if cart is empty then this the first product
     
      
                if ($request->type == "complete-ring") {
                    
                        if ($product->value('sale_price') != null) {
                            $price = $product->value('sale_price');
                        }else{
                            $price = $product->value('price');
                        }

                        $cart[] = [
                                    "type"=>$product->value('file_type'),
                                    "style"=>$product->value('style'),
                                    "category"=>"ring",
                                    "sku"=>session('create_ring.engagement-ring')['id'],
                                    "id" => $product->value('id'),
                                    "default_img"=>session('create_ring.engagement-ring')['img'],
                                    "name"=>$product->value('name')." With Stone",
                                    "currency"=>$product->value('currency'),
                                    // "full_price"=>$price+$stone['price'],
                                    "price"=>$price,
                                    "cad_price"=>number_format(\App\Helper\AppHelper::conversion($product->value('currency'), $price,'CAD'),2, '.', ''),
                                    "size" => $request->size,
                                    "engraving"=>$request->engraving,
                                    "return"=>$returns,
                                    "url"=>session('create_ring.engagement-ring')['url'],
                                    "brand"=>$product->value('brand'),
                                    "link"=>$product->value('item_link'),
                                    "stone" =>[
                                        "stone_id" =>session('create_ring.stone')['stone_id'],
                                        "stone_sku"=>session('create_ring.stone')['stone_sku'],
                                        "name"=>session('create_ring.stone')["shape"]." ".session('create_ring.stone')["stone"]." ".session('create_ring.stone')["color"],
                                        "default_img"=>session('create_ring.stone')["img"],
                                        "shape" =>session('create_ring.stone')['shape'],
                                        "size" =>null,
                                        "engraving"=>null,
                                        "color" =>session('create_ring.stone')['color'],
                                        "clarity" =>session('create_ring.stone')['clarity'],
                                        "carat" =>session('create_ring.stone')['size'],
                                        "currency"=>session('create_ring.stone')['currency'],
                                        "cad_price"=>number_format(\App\Helper\AppHelper::conversion(session('create_ring.stone')['currency'],session('create_ring.stone')['retail'],'CAD'),2, '.', ''),
                                        "price" =>session('create_ring.stone')['retail'],
                                        "cert_num"=>session('create_ring.stone')['cert_num'],
                                        "url"=>session('create_ring.stone')['url']
                                    ]
                        ];

                
                    
                    session()->forget(['create_ring']);
                    session()->put('cart.shopping_cart', $cart);

                }else{

                    if ($request->type == "stone") {

                        $cart[] = [
                            "type"=>"stone",
                            "category"=>$product->value('file_type'),
                            "sku"=>$request->sku,
                            "id" => $product->value('id'),
                            "default_img"=>$request->img,
                            "name"=>$product->value('type'),
                            "currency"=>$product->value('currency'),
                            "cad_price"=>number_format(\App\Helper\AppHelper::conversion($product->value('currency'),$product->value('price'),'CAD'),2, '.', ''),
                            "price"=>$product->value('price'),
                            "size" => $product->value('MM'),
                            "engraving" =>null,
                            "return"=>$returns,
                            "url"=>$request->url,
                            "brand"=>"Excel Jewellers",
                            "link"=>$request->url
                                
                        ];

                    }else if($request->type == "lab-stone"){

                        if (!empty(session('cart.shopping_cart'))) {
                            foreach (session('cart.shopping_cart') as $key) {
                                if($request->sku == $key['sku']){
                                    return "exist";
                                  }
                                if (isset($key['stone'])) {
                                    if($request->sku == $key['stone']['stone_sku']) {
                                        return "exist";
                                    }
                                }
                            }
                        }

                        $cart[] = [
                            "type"=>"stone",
                            "category"=>$product->value('file_type'),
                            "sku"=>$request->sku,
                            "id" => $product->value('id'),
                            "default_img"=>$request->img,
                            "name"=>"Lab-Grown-Diamond",
                            "currency"=>$product->value('currency'),
                            "cad_price"=>number_format(\App\Helper\AppHelper::conversion($product->value('currency'),$product->value('price'),'CAD'),2, '.', ''),
                            "price"=>$product->value('price'),
                            "size" =>$product->value('width')." By ".$product->value('length'),
                            "engraving" =>null,
                            "return"=>$returns,
                            "url"=>$request->url,
                            "brand"=>"Excel Jewellers",
                            "link"=>$request->url    
                        ];

                        if (session('create_ring.stone') !== null) {
                            if ($request->sku == session('create_ring.stone')['stone_sku']) {
                                session()->forget(['create_ring.stone']);
                                session()->put('cart.shopping_cart', $cart);
                                return "stone_remove_from_bar";
                            }
                        }


                    }else if($request->type == "diamond"){

                        if (!empty(session('cart.shopping_cart'))) {
                            foreach (session('cart.shopping_cart') as $key) {
                                if($request->sku == $key['sku']){
                                    return "exist";
                                  }
                                if (isset($key['stone'])) {
                                    if($request->sku == $key['stone']['stone_sku']) {
                                        return "exist";
                                    }
                                }
                            }
                        }

                        $cart[] = [
                            "type"=>"stone",
                            "category"=>$product->value('file_type'),
                            "sku"=>$request->sku,
                            "id" => $product->value('id'),
                            "default_img"=>$product->value('img_link'),
                            "name"=>"Diamond",
                            "currency"=>$product->value('currency'),
                            "cad_price"=>number_format(\App\Helper\AppHelper::conversion($product->value('currency'),$product->value('price'),'CAD'),2, '.', ''),
                            "price"=>$product->value('price'),
                            "size" =>$product->value('width')." By ".$product->value('length'),
                            "engraving" =>null,
                            "return"=>$returns,
                            "url"=>$request->url,
                            "brand"=>"Excel Jewellers",
                            "link"=>$request->url   
                        ];

                        if (session('create_ring.stone') !== null) {
                            if ($request->sku == session('create_ring.stone')['stone_sku']) {
                                session()->forget(['create_ring.stone']);
                                session()->put('cart.shopping_cart', $cart);
                                return "stone_remove_from_bar";
                            }
                        }

                    }else{



                        if ($product->value('sale_price') != null) {
                            $price = $product->value('sale_price');
                        }else{
                            $price = $product->value('price');
                        }

                        $cart[] = [
                                    "type"=>$product->value('file_type'),
                                    "style"=>$product->value('style'),
                                    "sku"=>$request->sku,
                                    "id" => $product->value('id'),
                                    "default_img"=>$request->img,
                                    "name"=>$product->value('name'),
                                    "currency"=>$product->value('currency'),
                                    "price"=>$price,
                                    "cad_price"=>number_format(\App\Helper\AppHelper::conversion($product->value('currency'), $price,'CAD'),2, '.', ''),
                                    "size" => $request->size,
                                    "engraving"=>$request->engraving,
                                    "return"=>$returns,
                                    "url"=>$request->url,
                                    "brand"=>$product->value('brand'),
                                    "link"=>$product->value('item_link')
                                
                        ];
                    }

                    session()->put('cart.shopping_cart', $cart);

                }

            return $cart;

        }else{
            return redirect('/error');
        }
    }

    public function removeitem(Request $request){
    	if($request && $request->ajax()) {
 
            $cart = session()->get('cart.shopping_cart');
            
            if(isset($cart[$request->id])) {

            	if (count($cart[$request->id]) > 0) {

            		unset($cart[$request->id]);
                	session()->put('cart.shopping_cart', $cart);

            	}else if (count($cart[$request->id]) == 0) {
                    if (count($cart[$request->id]) == 0) {

                        unset($cart[$request->id]);
                        session()->put('cart.shopping_cart', $cart);

                    }else{

                        unset($cart[$request->id]);
                        session()->put('cart.shopping_cart', $cart);

                    }
            	}
            }
        }else{
            return redirect('/error');
        }
    }

    public function cartrefresh(Request $request){

        if (session('cart.coupon_code_applied')) {   

            \App\Helper\AppHelper::apply_promo(session('cart.coupon_code_applied.coupon_code'));

        }

    	return view('include.cart');
    }

    public function updateitem(Request $request){
    	

    	if ($request->ajax()) {

	    	$product = Inventory::find($request->id);

	    	if (!$product) {
	    		abort(404);
	    	}

	    	$cart = session()->get('cart.shopping_cart');
	 
	        if($cart) {

		        // // if cart not empty then check if this product exist
		        if(isset($cart[$request->id][$request->style][$request->size])) {
		        	
					$cart[$request->id][$request->style][$request->size]['quantity'] = $request->quantity;
	 
	            session()->put('cart.shopping_cart', $cart);
			        	
		        }
	        }   
    	}else{
            return redirect('/error');
        }
    }

    public function guest_login(Request $request){
        return 123;
    }

    public function favourite(Request $request){
    	if ($request->ajax()) {

    		$product = DB::table('favourites')
    		->where('user_id',Auth::id())
    		->where('item_sku',$request->sku)
    		->get(); 
    		if (count($product)===0) {
	    		$fav = new Favourite;
	    		$fav->user_id = Auth::id();
                $fav->img = $request->img;
	    		$fav->item_sku = $request->sku;
                $fav->link = $request->link;
	    		$fav->save();
    		}
    	}else{
            abort(404);
        }
    }

    public function getreviews(StoreSlider $request){
    	$reviews = DB::table('ratings')->where('item_id',$request->id)->get();
    	return view('include.reviewlist',['reviews' => $reviews]);
    }

    public function postreview(Request $request){
        if ($request->ajax() && Auth::user()) {
            $ratings = DB::table('ratings')
            ->where('order_num','=',$request->order_num)
            ->where('item_sku','=',$request->sku)
            ->where('item_id','=',$request->id)
            ->where('user_id',Auth::id())
            ->get();
            if (count($ratings) < 1) {
                $review = new Ratings;
                $review->user_id = Auth::id();
                $review->order_num = $request->order_num;
                $review->item_sku = $request->sku;
                $review->item_id = $request->id;
                $review->ratings = $request->ratings;
                $review->comment = $request->comment;
                // $review->img_name = $request->image;
                $review->save();
                // $uploadFile = $request->file('image');
                // $uploadFile->storeAs('../../public/', 'wtf.jpg');
            }else{
                DB::table('ratings')
                ->where('order_num','=',$request->order_num)
                ->where('item_sku','=',$request->sku)
                ->where('item_id','=',$request->id)
                ->where('user_id',Auth::id())
                ->update(['comment'=>$request->comment,'ratings'=>$request->ratings]);
            }
        }else{
            abort(404);
        }
    }

    public function removefav(Request $request){
        if ($request->ajax() && Auth::user()) {
    	DB::table('favourites')->where('item_sku','=',$request->sku)->where('user_id','=',Auth::id())->delete();
        }
    }

    public function shipping_rate(Request $request){
        return view('include.payment')->with('amounts',$amount);
    }

    public function checkout(Request $request){

        if(session('cart.shopping_cart') && !empty(session('cart.shopping_cart'))){

            $subtotal = 0;

            foreach (session('cart.shopping_cart') as $sku => $details) {

                $subtotal += $details['cad_price'];

                if (isset($details['stone']['price'])) {
                    $subtotal += $details['stone']['cad_price'];
                }

            }

            $addresses = DB::table('addresses')->where('user_id','=',Auth::id())->get();
            return view('payment.shipping',['addresses'=>$addresses,'current_cart_price'=>$subtotal]);

        }else{
            return redirect('shopcart');
        }
    }

    public function payment_type(Request $request){

        // return $request;
        if(session('cart.shopping_cart') && count(session('cart.shopping_cart')) > 0 && !empty(session('cart.shopping_cart'))){

        $total = 0;

        foreach(session('cart.shopping_cart') as $sku => $details){

            $total += $details['cad_price'];

            if (isset($details['stone']['cad_price'])) {
                $total += $details['stone']['cad_price'];
            }
        }

        if ($request->pickup && $request->choice_select == "store_pickup" && $request->choice_select != "customer_address") {

            if (!empty($request->shipping_name) && !empty($request->shipping_email_address) && !empty($request->shipping_phone)) {

                if ($request->pickup[0] == "Surrey/Guildford") {
                    $tax = 12;
                    $shipping_amount = 0;
                    $shipping_location = "Excel Jewellers Guildford Mall";
                    $request = [
                        "contact_name"=>$request->shipping_name,
                        "email_address"=>$request->shipping_email_address,
                        "phone_number"=>$request->shipping_phone,
                        "address"=>"Upper Level, 10355 152 St",
                        "line2"=>"#2203",
                        "unit"=>"#2203",
                        "country"=>"Canada",
                        "country_code"=>"CA",
                        "spr"=>"British Columbia",
                        "city"=>"Surrey",
                        "zipcode"=>"V3R7C1"
                    ];

                }else if($request->pickup[0] == "Langley"){
                    $tax = 12;
                    $shipping_amount = 0;
                    $shipping_location = "Excel Jewellers Langley SmartCentre";
                    $request = [
                        "contact_name"=>$request->shipping_name,
                        "email_address"=>$request->shipping_email_address,
                        "phone_number"=>$request->shipping_phone,
                        "address"=>"20202 66 Ave",
                        "line2"=>"#370",
                        "unit"=>"#370",
                        "country"=>"Canada",
                        "country_code"=>"CA",
                        "spr"=>"British Columbia",
                        "city"=>"Langley City",
                        "zipcode"=>"V2Y1P3",
                    ];

                }

            }else{
                return redirect()->back()->with('error', ['You are missing a field.']);
            }
    
        }else if($request->choice_select && $request->choice_select == "customer_address" && $request->choice_select != "store_pickup" && $request->pickup == null){

            if (!empty($request->shipping_name) && !empty($request->shipping_email_address) && !empty($request->shipping_phone) && !empty($request->shipping_address_line_1) && !empty($request->shipping_country) && !empty($request->shipping_s_p_r) && !empty($request->shipping_city) && !empty($request->shipping_postal_zipcode)) {

                $country = explode('|', $request->shipping_country);

                if ($country[0] == "Canada" || $country[0] == "United States") {

                }else{
                    return redirect()->back()->with('error', ['There was an error.']);
                }

                switch($country[0]){
                    case"Canada":
                        if ($total > env('FREE_SHIPPING_AMOUNT')) {
                             $shipping_amount = 0;
                        }else{
                             $shipping_amount = 19.99;
                        }
                        break;
                    case"United States":
                        if ($total > env('FREE_SHIPPING_AMOUNT')) {
                             $shipping_amount = 0;
                        }else{
                             $shipping_amount = 24.99;
                        }
                        break;
                    default:
                         $shipping_amount = 19.99;
                }

                $tax = DB::table('tax_code_rates')->where('country','=',$country[0])->where('state_province','=',$request->shipping_s_p_r)->value('tax_rate');

                if ($tax == null) {
                    return redirect()->back()->with('error', ['There was an error.']);
                }

                $shipping_location = "Ship To Customer Shipping Address";
                $request = [
                    "contact_name"=>$request->shipping_name,
                    "email_address"=>$request->shipping_email_address,
                    "phone_number"=>$request->shipping_phone,
                    "address"=>$request->shipping_address_line_1,
                    "line2"=>$request->shipping_address_line_2,
                    "unit"=>$request->shipping_address_line_2,
                    "country"=>$country[0],
                    "country_code"=>$country[1],
                    "spr"=>$request->shipping_s_p_r,
                    "city"=>$request->shipping_city,
                    "zipcode"=>$request->shipping_postal_zipcode,
                ];

            }else{
                return redirect()->back()->with('error', ['You are missing a field.']);
            }

        }else{
            return redirect()->back()->with('error', ['You are missing a field.']);;
        }

        $discount = 0;

        if (session('cart.coupon_code_applied.discount')) {
            $discount = session('cart.coupon_code_applied.discount');
        }

        $shipping_cost_details=[
            "currency"=>"CAD",
            "subtotal"=>$total,
            "tax_rate"=>$tax,
            "full_tax"=>$tax/100,
            "estimate_total_tax"=>round(($total-$discount+$shipping_amount)*($tax/100),2),
            "shipping_amount"=>$shipping_amount,
            "total_cost"=>round($total-$discount+$shipping_amount+(($total-$discount+$shipping_amount)*($tax/100)),2),
        ];

        session()->put('cart.shipping_location',$shipping_location);
        session()->put('cart.address',$request);
        session()->put('cart.shopping_cart_detail',$shipping_cost_details);

        if ($total == session('cart.shopping_cart_detail')['subtotal'] && $tax != null && $total != 0) {

           return view('payment.billing');

        }else{

            return redirect()->back()->with('error', ['There was an error. Error Code(A12)']);

        }

        }else{

            return redirect()->back()->with('error', ['There was an error. Error Code(A17)']);

        }
    
        
    }

}