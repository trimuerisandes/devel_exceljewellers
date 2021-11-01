<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Customer_Order;
use App\Sold_Item;
use App\Address;
use App\wedding_band;
use App\fine_jewellery;
use App\engagement_ring;
use App\returns; 
use App\return_product;
use App\Favourite;

use Illuminate\Support\Facades\Mail;
use App\Mail\ReturnOrder;
use App\Mail\ReturnOrderCustomer;
class AccountController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function address(){
    	return view('account.address');
    }

    public function orders(){

        $orders = DB::table('customer__orders')->where('user_id',Auth::id())->orderBy('id','DESC')->get();

        $returns = DB::table('returns')->where('user_id',Auth::id())->get();

        $sold = DB::table('sold__items')->where('user_id',Auth::id())->get();

        $rf = DB::table('return_products')
        ->join('fine_jewelleries','fine_jewelleries.item_sku', '=', 'return_products.item_sku')
        ->where('user_id','=',Auth::id())->get();

        if (count($orders)>0) {
            foreach ($orders as $key => $order) {

                foreach ($sold as $keys => $sold_p) {
                    if ($order->order_num == $sold_p->order_num) {
                        $list[$key][] = [
                        "id"=>$sold_p->id,
                        "item_sku"=>$sold_p->item_sku,
                        "item_style"=>$sold_p->item_style,
                        "engraving"=>$sold_p->engraving,
                        "returns"=>$sold_p->returns,
                        "image"=>$sold_p->img,
                        "price"=>$sold_p->sold_price,
                        "size"=>$sold_p->size,
                        "diamond_id"=>$sold_p->diamond_id,
                        "diamond_name"=>$sold_p->diamond_name,
                        "diamond_shape"=>$sold_p->diamond_shape,
                        "diamond_price"=>$sold_p->diamond_price
                        ];
                    }
                }

               $order_l[] = [
                "order_num"=>$orders[$key]->order_num,
                "tracking_num"=>$orders[$key]->tracking_num,
                "status"=>$orders[$key]->status,
                "total_price"=>$orders[$key]->total_price,
                "shipping_cost"=>$orders[$key]->shipping_cost,
                "tax"=>$orders[$key]->tax,
                "created_at"=>$orders[$key]->created_at,
                "order_list"=>$list[$key]
               ];
            }
        }else{
            $order_l=[];
        }

        if (count($returns)>0) {
            foreach ($returns as $key => $return) {

                foreach ($rf as $keys => $return_p) {
                    if ($return->return_num == $return_p->return_num) {
                        $r_list[$key][] = [
                        "item_sku"=>$return_p->item_sku,
                        "item_style"=>$return_p->name,
                        "image"=>$return_p->image,
                        "price"=>$return_p->return_amount,
                        "tax"=>$return_p->return_tax,
                        "size"=>$return_p->size
                        ];
                    }
                }

                $return_l[] = [
                "order_num"=>$return->order_num,
                "total_price"=>$return->total_price,
                "restock_fee"=>$return->restock_fee,
                "tracking_num"=>$return->tracking_num,
                "status"=>$return->status,
                "created_at"=>$return->created_at,
                "order_list"=>$r_list[$key]
               ];

            }
        }else{
            $return_l=[];
        }

    	return view('account.orders',['orders'=>$order_l,'returns'=>$return_l]);
     
    }

    public function add_address(Request $request){
        if ($request) {
    	$address = new Address;
    	$address->user_id=Auth::id();
    	$address->contact_name=$request->contact_name;
    	$address->phone_number=$request->phone_number;
    	$address->address=$request->address;
    	$address->unit=$request->unit;
    	$address->country=$request->country;
    	$address->spr=$request->spr;
    	$address->city=$request->city;
    	$address->zipcode=$request->zipcode;
    	$address->save();
        }
    }

    public function delete_address(Request $request){

    	$address = Address::find($request->id);
    	$address->delete();

    }

    public function edit_address(Request $request){
    if ($request) {
    	DB::table('addresses')->where('user_id','=',Auth::id())->where('id','=',$request->id)
    	->update([
    		'contact_name'=>$request->contact_name,
    		'phone_number'=>$request->phone_number,
    		'address'=>$request->address,
    		'unit'=>$request->unit,
    		'country'=>$request->country,
    		'spr'=>$request->spr,
    		'city'=>$request->city,
    		'zipcode'=>$request->zipcode
    	]);
    }
    }

    public function returns(Request $request){
        $return = DB::table('return_products')->whereIn('item_sku',$request->SKU)->pluck('item_id');

        $products = DB::table('sold__items')->select('sold__items.*','fine_jewelleries.item_sku','fine_jewelleries.name','fine_jewelleries.image','fine_jewelleries.price')->join('fine_jewelleries','fine_jewelleries.item_sku','=','sold__items.item_sku')->whereIn('sold__items.item_sku',$request->SKU)->where('order_num',$request->order_num)->whereNotIn('sold__items.id',$return)->get();
        if (count($products)>0) {
            return view('account.returns',['return'=>$request,'products'=>$products]);
        }else{
            return back()->withError('No Items Were Found');
        }
    }

    public function initiate_returns(Request $request){

        // return $request;
        if ($request->return_goods) {

                $order = DB::table('customer__orders')->where('order_num',$request->order_num)->where('user_id',Auth::id())->get();

            if (count($order)>0) {
                
            
                $r_num = 'R' . str_random(4) . now()->timestamp . Auth::id();
                $price = 0;
                $tax = 0;
                foreach ($request->return_goods as $key => $value) {
                    $pieces = explode(":",$request->return_goods[$key]);

                    $item = DB::table('sold__items')->where('order_num',$request->order_num)->where('id',$pieces[1])->where('item_sku',$pieces[0])->where('user_id',Auth::id())->get();

                    if (count($item)>0) {
                        $return_p = new return_product;
                        $return_p->user_id = Auth::id();
                        $return_p->order_num = $item->first()->order_num;
                        $return_p->return_num = $r_num;
                        $return_p->item_id = $item->first()->id;
                        $return_p->item_sku = $item->first()->item_sku;
                        $return_p->return_amount = $item->first()->sold_price;
                        $return_p->return_tax = $item->first()->tax;
                        $return_p->save();
                        $price += $item->first()->sold_price;
                        $tax += $item->first()->tax;

                        $return_order[]=[
                            "item_id"=>$item->first()->id,
                            "item_sku"=>$item->first()->item_sku,
                            "return_amount"=>$item->first()->sold_price,
                            "return_tax"=>$item->first()->tax
                        ];
                    }else{
                        return redirect('error');
                    }

                }

                    $return = new returns;
                    $return->user_id = Auth::id();
                    $return->order_num = $request->order_num;
                    $return->total_price = ($price*.85)+$tax;
                    $return->restock_fee = $price*.15;
                    $return->return_num = $r_num;
                    $return->comment = $request->comment;
                    $return->save();

                    $data = [
                        "contact_name"=>Auth::user()->name,
                        "order_num"=>$request->order_num,
                        "return_num"=>$r_num,
                        "full_total"=>$price,
                        "return_total"=>($price*.85),
                        "return_tax"=>$tax,
                        "restock_fee"=>$price*.15,
                        "order"=>json_decode($order,true),
                        "return_order"=>$return_order
                    ];

                Mail::to('brandonsanghuynh123@gmail.com')->send(new ReturnOrderCustomer($data));
                Mail::to('info@exceljewellers.com')->send(new ReturnOrderCustomer($data));
                Mail::to(Auth::user()->email)->send(new ReturnOrder($data));
                return redirect('orders')->withSuccess('Return Started');
                
            }else{
                return redirect('error');
            }

        }else{
            return back();
        }

    }

    public function wishlist(){

        $fav = DB::table('favourites')->where('user_id',Auth::id())->get();

        if (count($fav)> 0) {

            $wedding = DB::table('favourites')
            ->join('wedding_bands','wedding_bands.item_sku', '=', 'favourites.item_sku')
            ->where('user_id','=',Auth::id())->get();

            $engagement = DB::table('favourites')
            ->join('engagement_rings','engagement_rings.item_sku', '=', 'favourites.item_sku')
            ->where('user_id','=',Auth::id())->get();

            $finejewellery = DB::table('favourites')
            ->join('fine_jewelleries','fine_jewelleries.item_sku', '=', 'favourites.item_sku')
            ->where('user_id','=',Auth::id())->get();

            $moissanite = DB::table('favourites')
            ->join('moissanite','moissanite.item_sku', '=', 'favourites.item_sku')
            ->where('user_id','=',Auth::id())->get();

            $lab = DB::table('favourites')
            ->join('valour_lab_dias','valour_lab_dias.item_sku', '=', 'favourites.item_sku')
            ->where('user_id','=',Auth::id())->get();

            $dia = DB::table('favourites')
            ->join('natural_diamonds','natural_diamonds.item_sku', '=', 'favourites.item_sku')
            ->where('user_id','=',Auth::id())->get();

            $item = ($wedding->merge($engagement)->merge($finejewellery)->merge($moissanite)->merge($lab)->merge($dia));

            return view('wishlist',['item'=>$item]);
        }else{
            return view('wishlist');
        }
    }
    
}
