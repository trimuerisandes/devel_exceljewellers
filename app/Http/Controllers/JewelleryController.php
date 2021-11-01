<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class JewelleryController extends Controller
{
    public function engagement_ring(Request $request){

        $engagement = DB::table('engagement_rings');

        if ($request->category != null) {
            $request->category = str_replace(['+','%20'], ' ', $request->category);
            $engagement->where('style',$request->category);
        }

        if ($request->brand != null) {
            $engagement->where('brand','LIKE','%'.$request->brand.'%');
        }

        if ($request->color != null) {
            $engagement->where('color','LIKE','%'.$request->color.'%');
        }

        if ($request->metal != null) {
            $engagement->where('metal',$request->metal);
        }

        if ($request->shape != null) {
            $engagement->where('stoneshape','LIKE','%'.$request->shape.'%');
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
        
        if ($request->category) {
            
            switch (strtolower($request->category)) {
                case null:
                    return view('shop/engagement-ring-setting',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Three-stone":
                case "three-stone":
                    return view('shop/engagement/style/three-stone',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Halo":
                case "halo":
                    return view('shop/engagement/style/halo',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Straight":
                case "straight":
                    return view('shop/engagement/style/straight',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Split Shank":
                case "split shank":
                    return view('shop/engagement/style/splitshank',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Solitaire":
                case "solitaire":
                    return view('shop/engagement/style/solitaire',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Pave":
                case "pave":
                    return view('shop/engagement/style/pave',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Free Form":
                case "free form":
                    return view('shop/engagement/style/freeform',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Double Halo":
                case "double halo":
                    return view('shop/engagement/style/doublehalo',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Verragio":
                case "verragio":
                    return view('shop/engagement/brand/verragio',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Simong":
                case "simong":
                    return view('shop/engagement/brand/simong',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Valina":
                case "valina":
                    return view('shop/engagement/brand/valina',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Romance":
                case "romance":
                    return view('shop/engagement/brand/romance',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "GabrielCo":
                case "gabrielco":
                    return view('shop/engagement/brand/gabrielco',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                default:
                    return view('shop/engagement-ring-setting',['engagement_rings'=>$array,'count'=>$count]);
                    break;
            }

        }else if($request->shape){

            switch (strtolower($request->shape)) {
                case null:
                    return view('shop/engagement-ring-setting',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Round":
                case "round":
                    return view('shop/engagement/shape/round',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Pear":
                case "pear":
                    return view('shop/engagement/shape/pear',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Oval":
                case "oval":
                    return view('shop/engagement/shape/oval',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Marquise":
                case "marquise":
                    return view('shop/engagement/shape/marquise',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Cushion":
                case "cushion":
                    return view('shop/engagement/shape/cushion',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Princess":
                case "princess":
                    return view('shop/engagement/shape/princess',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "Emerald":
                case "emerald":
                    return view('shop/engagement/shape/emerald',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                case "asscher":
                case "Asscher":
                    return view('shop/engagement/shape/asscher',['engagement_rings'=>$array,'count'=>$count]);
                    break;
                default:
                    return view('shop/engagement-ring-setting',['engagement_rings'=>$array,'count'=>$count]);
                    break;
            }

        }else{
            return view('shop/engagement-ring-setting',['engagement_rings'=>$array,'count'=>$count]);
        }

            
    }

    public function wedding_band(Request $request){
        
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


        switch (strtolower($request->category)) {
            case null:
                return view('shop/wedding-band',['wedding_bands'=>$array,'count'=>$count]);
                break;
            case "Curved":
            case "curved":
                return view('shop/wedding-band/style/curved',['wedding_bands'=>$array,'count'=>$count]);
                break;
            case "Anniversary":
            case "anniversary":
                return view('shop/wedding-band/style/anniversary',['wedding_bands'=>$array,'count'=>$count]);
                break;
            case "Jacket":
            case "jacket":
                return view('shop/wedding-band/style/jacket',['wedding_bands'=>$array,'count'=>$count]);
                break;
            case "Eternity":
            case "eternity":
                return view('shop/wedding-band/style/eternity',['wedding_bands'=>$array,'count'=>$count]);
                break;
            case "Stackable":
            case "stackable":
                return view('shop/wedding-band/style/stackable',['wedding_bands'=>$array,'count'=>$count]);
                break;
            case "men classic":
            case "Men Classic":
                return view('shop/wedding-band/style/wedding',['wedding_bands'=>$array,'count'=>$count]);
                break;
            case "Alternative":
            case "alternative":
                return view('shop/wedding-band/style/alternative',['wedding_bands'=>$array,'count'=>$count]);
                break;
            case "Lux":
            case "lux":
                return view('shop/wedding-band/style/lux',['wedding_bands'=>$array,'count'=>$count]);
                break;
            case "Men Diamond":
            case "men diamond":
                return view('shop/wedding-band/style/diamond',['wedding_bands'=>$array,'count'=>$count]);
                break;
            case "Verragio":
            case "verragio":
                return view('shop/wedding-band/brand/verragio',['wedding_bands'=>$array,'count'=>$count]);
                break;
            case "Valina":
            case "valina":
                return view('shop/wedding-band/brand/valina',['wedding_bands'=>$array,'count'=>$count]);
                break;
            case "Romance":
            case "romance":
                return view('shop/wedding-band/brand/romance',['wedding_bands'=>$array,'count'=>$count]);
                break;
            case "GabrielCo":
            case "gabrielco":
                return view('shop/wedding-band/brand/gabrielco',['wedding_bands'=>$array,'count'=>$count]);
                break;
            case "SimonG":
            case "simong":
                return view('shop/wedding-band/brand/simong',['wedding_bands'=>$array,'count'=>$count]);
                break;
            case "Malo":
            case "malo":
                return view('shop/wedding-band/brand/malo',['wedding_bands'=>$array,'count'=>$count]);
                break;
            default:
                return view('shop/wedding-band',['wedding_bands'=>$array,'count'=>$count]);
                break;
        }

    }

    public function fine_jewellery(Request $request){

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

            $other_metal_color = DB::table('fine_jewelleries')->where('item_code',$value->item_code)->where('main_stone',$value->main_stone)->where('item_sku','!=',$value->item_sku)->where('color','!=',$value->color)->orderBy('color','DESC')->get(['color','image','item_sku','item_code','name','price','carat','currency'])->unique('color');

            $array[] = [
                "product"=>$value,
                "other_color"=>$other_metal_color
            ];

            if ($request->gem == null) {

                $similar_stone_product = DB::table('fine_jewelleries')->where('item_code',$value->item_code)->where('item_sku','!=',$value->item_sku)->where('main_stone','!=',$value->main_stone)->get()->unique('main_stone');

                foreach ($similar_stone_product as $key2 => $value2) {
                
                    $other_metal_color = DB::table('fine_jewelleries')->where('item_code',$value2->item_code)->where('item_sku','!=',$value2->item_sku)->where('color','!=',$value2->color)->where('main_stone','=',$value2->main_stone)->orderBy('price','ASC')->orderBy('color','DESC')->get(['color','image','item_sku','item_code','name','price','carat','currency'])->unique('color');

                    $array[] = [
                        "product"=>$value2,
                        "other_color"=>$other_metal_color
                    ];

                }

            }

        }


        if ($request->style) {
            switch (strtolower($request->style)) {
                case null:
                    return view('shop/fine-jewellery',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Tennis":
                case "tennis":
                    return view('shop/finejewellery/style/bracelets/tennis',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Chain":
                case "chain":
                    return view('shop/finejewellery/style/bracelets/chain',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Cuff":
                case "cuff":
                    return view('shop/finejewellery/style/bracelets/cuff',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Bangle":
                case "bangle":
                    return view('shop/finejewellery/style/bracelets/bangle',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Charm":
                case "charm":
                    return view('shop/finejewellery/style/bracelets/charm',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Heart":
                case "heart":
                    return view('shop/finejewellery/style/bracelets/heart',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Y Knots":
                case "y knots":
                    return view('shop/finejewellery/style/necklaces/y-knots',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Choker":
                case "choker":
                    return view('shop/finejewellery/style/necklaces/choker',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Fashion":
                case "fashion":
                    return view('shop/finejewellery/style/necklaces/fashion',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Locket":
                case "locket":
                    return view('shop/finejewellery/style/necklaces/locket',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Bar":
                case "bar":
                    return view('shop/finejewellery/style/necklaces/bar',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Heart":
                case "heart":
                    return view('shop/finejewellery/style/necklaces/heart',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Drop":
                case "drop":
                    return view('shop/finejewellery/style/earrings/drop',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Huggies":
                case "huggies":
                    return view('shop/finejewellery/style/earrings/huggies',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Hoops":
                case "hoops":
                    return view('shop/finejewellery/style/earrings/hoops',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Studs":
                case "studs":
                    return view('shop/finejewellery/style/earrings/studs',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Diamond":
                case "diamond":
                    return view('shop/finejewellery/style/rings/diamond-ring',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Gemstone":
                case "gemstone":
                    return view('shop/finejewellery/style/rings/gemstone-ring',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Pearl":
                case "pearl":
                    return view('shop/finejewellery/style/rings/pearl-ring',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                default:
                    return view('shop/fine-jewellery',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
            }
        }else if($request->category){
            switch (strtolower($request->category)) {
                case null:
                    return view('shop/fine-jewellery',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Bracelet":
                case "bracelet":
                    return view('shop/finejewellery/style/bracelet',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Earrings":
                case "earrings":
                    return view('shop/finejewellery/style/earring',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Necklaces":
                case "necklaces":
                    return view('shop/finejewellery/style/necklaces',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                case "Rings":
                case "rings":
                    return view('shop/finejewellery/style/ring',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
                default:
                    return view('shop/fine-jewellery',['fine_jewellery'=>$array,'count'=>$count]);
                    break;
            }
        }else{
            return view('shop/fine-jewellery',['fine_jewellery'=>$array,'count'=>$count]);
        }
        
    }

    public function search(Request $request){

        if (empty($request->search)) {
            $product = [];
            return view('ajax.search',['search'=>$product]);
        }else{
            $search =  str_replace('+',' ', $request->search);

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

            return view('shop/search',['search'=>collect($array)->forPage($request->page, 24),'count'=>$count,'keyword'=>$request->search]);
        }
    }

    public function moissanite(Request $req){
        // return $req;

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

        switch (strtolower($req->shape)) {
            case null:
                return view('shop/moissanite',['db'=>$db,'count'=>$count]);
                break;
            case "round":
            case "Round":
                return view('shop/moissanite/shape/round',['db'=>$db,'count'=>$count]);
                break;
            case "pear":
            case "Pear":
                return view('shop/moissanite/shape/pear',['db'=>$db,'count'=>$count]);
                break;
            case "oval":
            case "Oval":
                return view('shop/moissanite/shape/oval',['db'=>$db,'count'=>$count]);
                break;
            case "Marquise":
            case "marquise":
                return view('shop/moissanite/shape/marquise',['db'=>$db,'count'=>$count]);
                break;
            case "radiant":
            case "Radiant":
                return view('shop/moissanite/shape/radiant',['db'=>$db,'count'=>$count]);
                break;
            case "cushion":
            case "Cushion":
                return view('shop/moissanite/shape/cushion',['db'=>$db,'count'=>$count]);
                break;
            case "Trillion":
            case "trillion":
                return view('shop/moissanite/shape/trillion',['db'=>$db,'count'=>$count]);
                break;
            case "square":
            case "Square":
                return view('shop/moissanite/shape/square',['db'=>$db,'count'=>$count]);
                break;
            case "emerald":
            case "Emerald":
                return view('shop/moissanite/shape/emerald',['db'=>$db,'count'=>$count]);
                break;
            case "asscher":
            case "Asscher":
                return view('shop/moissanite/shape/asscher',['db'=>$db,'count'=>$count]);
                break;
            case "heart":
            case "Heart":
                return view('shop/moissanite/shape/heart',['db'=>$db,'count'=>$count]);
                break;
            case "Baguette":
            case "baguette":
                return view('shop/moissanite/shape/baguette',['db'=>$db,'count'=>$count]);
                break;
            case "Moon":
            case "moon":
                return view('shop/moissanite/shape/moon',['db'=>$db,'count'=>$count]);
                break;
            case "trapezoid":
            case "Trapezoid":
                return view('shop/moissanite/shape/trapezoid',['db'=>$db,'count'=>$count]);
                break;
            default:
                return view('shop/moissanite',['db'=>$db,'count'=>$count]);
                break;
        }

    }

    public function lab_grown(Request $req){
        // return $req;

        $lab = DB::table('lab_grown_diamonds');
        if ($req->shape) {
            $lab->where('shape','LIKE','%'.$req->shape.'%');
        }

        if ($req->cut) {
            $lab->where('cut','LIKE','%'.$req->cut.'%');
        }

        $high = $lab->max('price');

        $carat = $lab->max('carat');

        $count = $lab->get()->count();

        $db = $lab->paginate(24);

        switch (strtolower($req->shape)) {
            case null:
                return view('shop/lab-diamond',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "round":
            case "Round":
                return view('shop/lab-diamond/shape/round',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "pear":
            case "Pear":
                return view('shop/lab-diamond/shape/pear',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "oval":
            case "Oval":
                return view('shop/lab-diamond/shape/oval',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "Marquise":
            case "marquise":
                return view('shop/lab-diamond/shape/marquise',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "radiant":
            case "Radiant":
                return view('shop/lab-diamond/shape/radiant',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "cushion":
            case "Cushion":
                return view('shop/lab-diamond/shape/cushion',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "princess":
            case "Princess":
                return view('shop/lab-diamond/shape/princess',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "emerald":
            case "Emerald":
                return view('shop/lab-diamond/shape/emerald',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "asscher":
            case "Asscher":
                return view('shop/lab-diamond/shape/asscher',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "heart":
            case "Heart":
                return view('shop/lab-diamond/shape/heart',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            default:
                return view('shop/lab-diamond',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
        }

    }

    public function diamonds(Request $req){
        // return $req;

        $gem = DB::table('natural_diamonds');
        if ($req->shape) {
            $gem->where('shape','LIKE','%'.$req->shape.'%');
        }

        if ($req->cut) {
            $gem->where('cut','LIKE','%'.$req->cut.'%');
        }

        $high = $gem->max('price');

        $carat = $gem->max('carat');

        $count = $gem->get()->count();

        $db = $gem->paginate(24);

        switch (strtolower($req->shape)) {
            case null:
                return view('shop/diamonds',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "round":
            case "Round":
                return view('shop/diamonds/shape/round',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "pear":
            case "Pear":
                return view('shop/diamonds/shape/pear',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "oval":
            case "Oval":
                return view('shop/diamonds/shape/oval',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "Marquise":
            case "marquise":
                return view('shop/diamonds/shape/marquise',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "radiant":
            case "Radiant":
                return view('shop/diamonds/shape/radiant',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "cushion":
            case "Cushion":
                return view('shop/diamonds/shape/cushion',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "Trillion":
            case "trillion":
                return view('shop/diamonds/shape/trillion',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "Square":
            case "square":
                return view('shop/diamonds/shape/square',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "emerald":
            case "Emerald":
                return view('shop/diamonds/shape/emerald',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "asscher":
            case "Asscher":
                return view('shop/diamonds/shape/asscher',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            case "heart":
            case "Heart":
                return view('shop/diamonds/shape/heart',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
            default:
                return view('shop/diamonds',['db'=>$db,'count'=>$count,'high'=>$high,'carat'=>$carat]);
                break;
        }

    }

}
