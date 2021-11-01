<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class AjaxController extends Controller
{
    public function engagement_setting(Request $request){
        if ($request->ajax()) {
                
    	$engagement = DB::table('engagement_rings');

        if ($request->category != null) {
            $request->category = str_replace(['+','%20'], ' ', $request->category);
            $engagement->where('style',$request->category);
        }

        if ($request->brand != null) {
            $engagement->where('brand','LIKE','%'.$request->brand.'%');
        }

        if ($request->shape != null) {
            $engagement->where('stoneshape','LIKE','%'.$request->shape.'%');
        }

        if ($request->color != null) {
            $engagement->where('color','LIKE','%'.$request->color.'%');
        }

        if ($request->metal != null) {
            $engagement->where('metal',$request->metal);
        }

        if ($request->video == "image_360") {
            $engagement->where('image_360','!=',null);
        }

        $unique = $engagement->get()->unique('item_code')->pluck('item_sku');

        $count = $unique->count();

        $engagement = DB::table('engagement_rings')->whereIn('item_sku',$unique)->orderBy('image_360','DESC')->paginate(24);


        if ($request->sort != null) {
            if($request->sort == "high"){
                $engagement = DB::table('engagement_rings')->whereIn('item_sku',$unique)->orderBy('price','DESC')->paginate(24);
            }else if($request->sort == "low"){
                $engagement = DB::table('engagement_rings')->whereIn('item_sku',$unique)->orderBy('price','ASC')->paginate(24);
            }else{
                $engagement = DB::table('engagement_rings')->whereIn('item_sku',$unique)->orderBy('id','ASC')->paginate(24);
            }
        }

        $array=[];

        foreach ($engagement as $key => $value) {

            $other_metal_color = DB::table('engagement_rings')->where('item_code',$value->item_code)->where('item_sku','!=',$value->item_sku)->where('color','!=',$value->color)->where('stoneshape',$value->stoneshape)->orderBy('price','ASC')->orderBy('color','DESC')->get(['color','image','item_sku','item_code','name','price','carat','currency'])->unique('color');

            $array[] = [
                "product"=>$value,
                "other_color"=>$other_metal_color
            ];

        }


    	return view('ajax.engagement-setting',['engagement_rings'=>$array,'count'=>$count]);
    }

    }

    public function wedding_bands(Request $request){

        if ($request->ajax()) {
                
            $wedding_bands = DB::table('wedding_bands');

            if ($request->category != null) {
            $request->category = str_replace(['+','%20'], ' ', $request->category);
            $wedding_bands->where('style',$request->category);
            }

            if ($request->brand != null) {
                $wedding_bands->where('brand','LIKE','%'.$request->brand.'%');
            }

            if ($request->color != null) {
                $wedding_bands->where('color','LIKE','%'.$request->color.'%');
            }

            if ($request->metal != null) {
                $wedding_bands->where('metal',$request->metal);
            }

            if ($request->video == "image_360") {
                $wedding_bands->where('image_360','!=',null);
            }

            
            $unique = $wedding_bands->get()->unique('item_code')->pluck('item_sku');

            $count = $unique->count();

            $wedding_bands = DB::table('wedding_bands')->whereIn('item_sku',$unique)->orderBy('image_360','DESC')->paginate(24);

            if ($request->sort != null) {
                if($request->sort == "high"){
                    $wedding_bands = DB::table('wedding_bands')->whereIn('item_sku',$unique)->orderBy('price','DESC')->paginate(24);
                }else if($request->sort == "low"){
                    $wedding_bands = DB::table('wedding_bands')->whereIn('item_sku',$unique)->orderBy('price','ASC')->paginate(24);
                }else{
                    $wedding_bands = DB::table('wedding_bands')->whereIn('item_sku',$unique)->orderBy('id','ASC')->paginate(24);
                }
            }

            $array=[];

            foreach ($wedding_bands as $key => $value) {

                $other_metal_color = DB::table('wedding_bands')->where('item_code',$value->item_code)->where('item_sku','!=',$value->item_sku)->where('color','!=',$value->color)->orderBy('price','ASC')->orderBy('color','DESC')->get(['color','image','item_sku','item_code','name','price','carat','currency'])->unique('color');

                $array[] = [
                    "product"=>$value,
                    "other_color"=>$other_metal_color
                ];

            }

            return view('ajax.wedding-bands',['wedding_bands'=>$array,'count'=>$count]);
        }

    }

    public function fine_jewellerys(Request $request){

        if ($request->ajax()) {
            
        $fine_jewellery = DB::table('fine_jewelleries');

        if ($request->category != null) {
            $fine_jewellery->where('category','LIKE',$request->category);
        }

        if ($request->style != null) {
            if (!empty($request->style)) {
                $fine_jewellery->where('style',str_replace('+', ' ', $request->style));
            }
        }

        if ($request->color != null) {
            $fine_jewellery->where('color','LIKE','%'.$request->color.'%');
        }

        if ($request->metal != null) {
            $fine_jewellery->where('metal',$request->metal);
        }

        if ($request->video == "image_360") {
            $fine_jewellery->where('image_360','!=',null);
        }

        if ($request->gem != null && $request->gem != 'gemstone') {
            $fine_jewellery->where('main_stone','!=',null)->where('main_stone','!=',"")->where('main_stone',$request->gem);
        }elseif($request->gem != null && $request->gem == "gemstone"){
            $fine_jewellery->where('main_stone','!=',null)->where('main_stone','!=',"")->where('main_stone','!=','diamond');
        }

        $unique = $fine_jewellery->get()->unique('item_code')->pluck('item_sku');

        $count = $unique->count();

        $fine_jewellery = DB::table('fine_jewelleries')->whereIn('item_sku',$unique)->orderBy('image_360','DESC')->paginate(24);

        if ($request->sort != null) {
            if($request->sort == "high"){
                $fine_jewellery = DB::table('fine_jewelleries')->whereIn('item_sku',$unique)->orderBy('price','DESC')->paginate(24);
            }else if($request->sort == "low"){
                $fine_jewellery = DB::table('fine_jewelleries')->whereIn('item_sku',$unique)->orderBy('price','ASC')->paginate(24);
            }else{
                $fine_jewellery = DB::table('fine_jewelleries')->whereIn('item_sku',$unique)->orderBy('id','ASC')->paginate(24);
            }
        }


        $array=[];

        foreach ($fine_jewellery as $key => $value) {

            $other_metal_color = DB::table('fine_jewelleries')->where('item_code',$value->item_code)->where('main_stone','=',$value->main_stone)->where('item_sku','!=',$value->item_sku)->where('color','!=',$value->color)->where('main_stone','=',$value->main_stone)->orderBy('price','ASC')->orderBy('color','DESC')->get(['color','image','item_sku','item_code','name','price','carat','currency'])->unique('color');

            $array[] = [
                "product"=>$value,
                "other_color"=>$other_metal_color
            ];

            

            if ($request->gem == null) {

                $similar_stone_product = DB::table('fine_jewelleries')->where('item_code',$value->item_code)->where('item_sku','!=',$value->item_sku)->where('main_stone','!=',$value->main_stone)->get()->unique('main_stone');

                foreach ($similar_stone_product as $key2 => $value2) {
                
                    $other_metal_color = DB::table('fine_jewelleries')->where('item_code',$value2->item_code)->where('item_sku','!=',$value2->item_sku)->where('color','!=',$value2->color)->where('main_stone','=',$value2->main_stone)->orderBy('color','DESC')->get(['color','image','item_sku','item_code','name','price','carat','currency'])->unique('color');

                    $array[] = [
                        "product"=>$value2,
                        "other_color"=>$other_metal_color
                    ];

                }

            }

        }

        return view('ajax.fine-jewellery',['fine_jewellery'=>$array,'count'=>$count]);
    }

    }

    public function cart_num(){
        return view('include.cart-number');
    }

    public function currency(Request $request){
 
        session()->put('currency',$request->currency);
 
    }

    public function search(Request $request){
        if ($request->ajax()) {
            
            if (empty($request->search)) {
                $product = [];
                return view('ajax.search',['search'=>$product]);
            }else{
                $search =  str_replace('+', ' ', $request->search);

                $eng = DB::table('engagement_rings')
                ->where('color','LIKE',"%$search%")
                ->orWhere('style','LIKE',"%$search%")
                ->orWhere('item_sku','LIKE',"%$search%")
                ->orWhere('metal','LIKE',"%$search%")
                ->orWhere('brand','LIKE',"%$search%")
                ->orWhere('collection','LIKE',"%$search%")
                ->orWhere('name','LIKE',"%$search%")->get();

                $wed = DB::table('wedding_bands')
                ->where('color','LIKE',"%$search%")
                ->orWhere('style','LIKE',"%$search%")
                ->orWhere('item_sku','LIKE',"%$search%")
                ->orWhere('metal','LIKE',"%$search%")
                ->orWhere('brand','LIKE',"%$search%")
                ->orWhere('collection','LIKE',"%$search%")
                ->orWhere('name','LIKE',"%$search%")->get();

                $fine = DB::table('fine_jewelleries')
                ->where('color','LIKE',"%$search%")
                ->orWhere('style','LIKE',"%$search%")
                ->orWhere('item_sku','LIKE',"%$search%")
                ->orWhere('metal','LIKE',"%$search%")
                ->orWhere('brand','LIKE',"%$search%")
                ->orWhere('collection','LIKE',"%$search%")
                ->orWhere('name','LIKE',"%$search%")->get();

                $nat_dia = DB::table('natural_diamonds')
                ->where('company','LIKE',"%$search%")
                ->orWhere('item_sku','LIKE',"%$search%")
                ->orWhere('shape','LIKE',"%$search%")
                ->orWhere('polish','LIKE',"%$search%")
                ->orWhere('name','LIKE',"%$search%")
                ->orWhere('description','LIKE',"%$search%")
                ->orWhere('clarity','LIKE',"%$search%")
                ->orWhere('width','LIKE',"%$search%")
                ->orWhere('file_type','LIKE',"%$search%")
                ->orWhere('length','LIKE',"%$search%")->get();

                $lab_dia = DB::table('lab_grown_diamonds')
                ->where('company','LIKE',"%$search%")
                ->orWhere('item_sku','LIKE',"%$search%")
                ->orWhere('shape','LIKE',"%$search%")
                ->orWhere('polish','LIKE',"%$search%")
                ->orWhere('name','LIKE',"%$search%")
                ->orWhere('description','LIKE',"%$search%")
                ->orWhere('clarity','LIKE',"%$search%")
                ->orWhere('width','LIKE',"%$search%")
                ->orWhere('file_type','LIKE',"%$search%")
                ->orWhere('length','LIKE',"%$search%")->get(); 

                $moissanite = DB::table('moissanite')
                ->orWhere('item_sku','LIKE',"%$search%")
                ->orWhere('shape','LIKE',"%$search%")
                ->orWhere('type','LIKE',"%$search%")
                ->orWhere('weight','LIKE',"%$search%")
                ->orWhere('carat','LIKE',"%$search%")
                ->orWhere('file_type','LIKE',"%$search%")
                ->orWhere('img_link','LIKE',"%$search%")->get();


                $product = ($eng->merge($wed)->merge($fine)->merge($nat_dia)->merge($lab_dia)->merge($moissanite));

                $array=[];

                foreach ($product as $key => $value) {

                    if ($value->file_type == "lab-grown-diamond" OR $value->file_type == "natural-diamond" OR $value->file_type == "moissanite") {
                        $array[] = [
                            'file_type'=>$value->file_type,
                            'link_sku'=>$value->id,
                            'name'=>$value->name,
                            'image'=>$value->img_link,
                            'image_360'=>$value->video_link,
                            'currency'=>$value->currency,
                            'price'=>$value->price,
                            'sale_price'=>null,
                            'metal'=>null,
                            'color'=>null,
                            'style'=>$value->shape,
                            'brand'=>$value->company
                        ];
                    }

                    if ($value->file_type == "engagement-ring" OR $value->file_type == "fine-jewellery" OR $value->file_type == "wedding-band") {
                        $array[] = [
                            'file_type'=>$value->file_type,
                            'link_sku'=>$value->item_sku,
                            'name'=>$value->name,
                            'image'=>asset('storage/image/'.$value->file_type.'-list/'.$value->image.'-1.jpg'),
                            'image_360'=>$value->image_360,
                            'currency'=>$value->currency,
                            'price'=>$value->price,
                            'sale_price'=>$value->sale_price,
                            'metal'=>$value->metal,
                            'color'=>$value->color,
                            'style'=>$value->style,
                            'brand'=>$value->brand
                        ];
                    }

                }

                $count = $product->count();

                return view('ajax.search',['search'=>collect($array)->forPage($request->page, 24),'count'=>$count]);
            }
        }

    }


    public function getmoissanite(Request $req){
        // return $req;
        if ($req->ajax()) {
            $moi = DB::table('moissanite');
            if ($req->shape) {
                $moi->where('shape',$req->shape);
            }

            if ($req->width) {
                if (strpos($req->width, '.') !== false) {
                    $moi->where('MM','LIKE','%'.preg_replace("/[^0-9.]/", "", $req->width).'%');
                }else{
                    $moi->where('MM','LIKE','%'.preg_replace("/[^0-9.]/", "", $req->width).'%')->where('MM','NOT LIKE','%.%');
                }
            }

            if ($req->carat) {
                $c = explode("-", $req->carat);
                $moi->whereBetween('carat', [$c[0],$c[1]]);
            }

            $count = $moi->get()->count();
            $db = $moi->paginate(24);
            return view('ajax.moissanite',['db'=>$db,'count'=>$count]);
        }
    }

    public function getlab_grown(Request $req){
        if ($req->ajax()) {
            $colors = ["N","M","L","K","J","I","H","G","F","E","D"];

            for($i=$req->colorfrom; $i<=$req->colorto; $i++) {
                $color[]=$colors[$i];
            }

            $claritys = ["I3","I2","I1","SI3","SI2","SI1","VS2","VS1","VVS2","VVS1","IF","FL"];

            for($i=$req->clarityfrom; $i<=$req->clarityto; $i++) {
                $clarity[]=$claritys[$i];
            }

            $lab = DB::table('lab_grown_diamonds');
            if ($req->shape) {
                $lab->where('shape','LIKE','%'.$req->shape.'%');
            }

            if ($req->cut) {
                if ($req->cut != "All Cuts") {
                    $lab->where('cut','LIKE','%'.$req->cut.'%');
                }
            }

            if ($req->caratto) {
                $lab->whereBetween('carat', [$req->caratfrom,$req->caratto]);
            }

            if ($req->priceto) {
                $lab->whereBetween('price', [$req->pricefrom,$req->priceto]);
            }

            if ($req->clarityto) {
                $lab->whereIn('clarity',$clarity);
            }

            if ($req->colorto) {
                $lab->whereIn('color',$color);
            }

            $count = $lab->get()->count();
            $db = $lab->paginate(24);
            return view('ajax.lab-diamond',['db'=>$db,'count'=>$count]);
        }
    }



    public function getdiamonds(Request $req){
        if ($req->ajax()) {
            $colors = ["N","M","L","K","J","I","H","G","F","E","D"];

            for($i=$req->colorfrom; $i<=$req->colorto; $i++) {
                $color[]=$colors[$i];
            }

            $claritys = ["I3","I2","I1","SI3","SI2","SI1","VS2","VS1","VVS2","VVS1","IF"];

            for($i=$req->clarityfrom; $i<=$req->clarityto; $i++) {
                $clarity[]=$claritys[$i];
            }

            $lab = DB::table('natural_diamonds');
            if ($req->shape) {
                $lab->where('shape','LIKE','%'.$req->shape.'%');
            }

            if ($req->cut) {
                $lab->where('cut','LIKE','%'.$req->cut.'%');
            }

            if ($req->caratto) {
                $lab->whereBetween('carat', [$req->caratfrom,$req->caratto]);
            }

            if ($req->priceto) {
                $lab->whereBetween('price', [$req->pricefrom,$req->priceto]);
            }

            if ($req->clarityto) {
                $lab->whereIn('clarity',$clarity);
            }

            if ($req->colorto) {
                $lab->whereIn('color',$color);
            }

            $count = $lab->get()->count();
            $db = $lab->paginate(24);
            return view('ajax.diamonds',['db'=>$db,'count'=>$count]);
        }
    }



}
