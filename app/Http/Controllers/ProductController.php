<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\fine_jewellery;
use Auth;
use File;
use App\Helper\AppHelper;
use Stripe;

class ProductController extends Controller
{
    public function engagement_ring($id){

        $product = DB::table('engagement_rings')->where('item_sku',$id)->get();
        // $product = DB::table('engagement_rings')->where('id',32076)->where('color','LIKE','%K%')->get();
        // // dd($product);
        // $replace = "White18K";
        // $color = "WhiteYellow";

        // foreach ($product as $key => $value) {
        //      DB::table('engagement_rings')->where('id',$value->id)->where('item_sku',$value->item_sku)->update([
        //         "color"=> str_replace($replace,$color, $value->color),
        //         "description"=>str_replace($replace,$color, $value->description),
        //         "name"=>str_replace($replace,$color, $value->name)
        //     ]);

        // }

        // dd($product);

        if (count($product)>0) {

            DB::table('engagement_rings')->where('item_sku',$id)->increment("count",1);

            $item_code = $product[0]->item_code;
            
            $metal = DB::table('engagement_rings')->where('item_sku','not like',$id)->where('item_code',$item_code)->orderBy('color','DESC')->get(['metal','color','item_sku','stoneshape']);

            $m10 = $metal->where('stoneshape',$product[0]->stoneshape)->where('metal','10K')->unique('color');

            $m14 = $metal->where('stoneshape',$product[0]->stoneshape)->where('metal','14K')->unique('color');

            $m18 = $metal->where('stoneshape',$product[0]->stoneshape)->where('metal','18K')->unique('color');

            $other = $metal->where('stoneshape',$product[0]->stoneshape)->whereNotIn('metal',['10K','14K','18K'])->unique('color');

            $metal_alternative = array_merge(
                $m10->toArray(),
                $m14->toArray(),
                $m18->toArray(),
                $other->toArray()
            );

            $oshape = $metal->where('stoneshape','!=',$product[0]->stoneshape)->unique('stoneshape');

            $ratings = DB::table('ratings')->where('item_sku','=',$id)->get('ratings');
            
            $reviews = DB::table('users')
            ->select('name','ratings','ratings.created_at','comment')
            ->join('ratings','ratings.user_id','=','users.id')
            ->where('item_sku','=',$id)->get();

            for ($i=1; $i < strlen($id)-4; $i++) { 
                $pair =  DB::table('wedding_bands')->where('item_sku','like','%'.substr($id,0,-$i).'%')->where('color',$product[0]->color)->inRandomOrder()->limit(1)->get()->unique('item_code');
                if (count($pair)>0) {
                    break;
                }
            }

            if ($product[0]->brand == "GabrielCo") {
                $pair =  DB::table('wedding_bands')->where('item_sku','like','%'.substr($id,2).'%')->where('color',$product[0]->color)->inRandomOrder()->limit(1)->get();
            }

            $similar = DB::table('engagement_rings')->where('style',$product[0]->style)->where('brand',$product[0]->brand)->inRandomOrder()->take(10)->get();

            $vid = DB::table('j_vids')->where('item_code','=',$item_code)->get();

            return view('product.engagement-ring',['pairs'=>$pair,'vid'=>$vid,'shape'=>$oshape,'metals'=>$metal_alternative,'settings' => $product,'similar'=>$similar,'reviews' => $reviews,'ratings'=>$ratings->average('ratings')]);
        }else{
            // error
            return redirect('/engagement-ring');
        }

    }

    public function wedding_band($id){

        $product = DB::table('wedding_bands')->where('item_sku',$id)->get();

        if (count($product)>0) {

            DB::table('wedding_bands')->where('item_sku',$id)->increment("count",1);

            $item_code = $product[0]->item_code;

            $metal = DB::table('wedding_bands')->where('item_sku','not like',$id)->where('item_code',$item_code)->orderBy('price','ASC')->get(['metal','color','item_sku','width','carat','size','thickness']);

            $m10 = $metal->where('metal','10K')->unique('color');

            $m14 = $metal->where('metal','14K')->unique('color');

            $m18 = $metal->where('metal','18K')->unique('color');

            $other = $metal->whereNotIn('metal',['10K','14K','18K'])->unique('color');

            $metal_alternative = array_merge(
                $m10->toArray(),
                $m14->toArray(),
                $m18->toArray(),
                $other->toArray()
            );

            $mm = $metal->where('size',$product[0]->size)->where('thickness',$product[0]->thickness)->where('metal',$product[0]->metal)->where('color',$product[0]->color)->where('width','!=',null)->unique('width');

            $thickness = $metal->where('width',$product[0]->width)->where('thickness','!=',$product[0]->thickness)->where('size',$product[0]->size)->where('metal',$product[0]->metal)->where('color',$product[0]->color)->unique('thickness');

            $carats = $metal->where('color',$product[0]->color)->where('carat','!=',null)->where('carat','!=',$product[0]->carat)->unique('carat');

            if ($product[0]->size) {
                $size = $metal->where('color',$product[0]->color)->where('width',$product[0]->width)->where('metal',$product[0]->metal)->unique('size');;
            }else{
                $size = null;
            }

            $pair = [];

            if ($product[0]->brand == "Verragio") {

                $r_code = substr(preg_replace('/[^0-9.]+/', '',$id),0,4);
                $pair =  DB::table('engagement_rings')->where('brand','Verragio')->where('item_sku','like','%'.$r_code.'%')->where('color',$product[0]->color)->inRandomOrder()->limit(3)->get()->unique('item_code');
   
            }elseif($product[0]->brand == "GabrielCo"){

                $r_code = substr(preg_replace('/[^0-9.]+/', '',$id),0,5);
                $pair =  DB::table('engagement_rings')->where('brand','GabrielCo')->where('item_sku','like','%'.$r_code.'%')->where('color',$product[0]->color)->inRandomOrder()->limit(3)->get()->unique('item_code');

            }

            $similar = DB::table('wedding_bands')->where('style',$product[0]->style)->where('brand',$product[0]->brand)->inRandomOrder()->take(10)->get();

            $ratings = DB::table('ratings')->where('item_sku','=',$id)->get('ratings');

            $reviews = DB::table('users')
            ->select('name','ratings','ratings.created_at','comment')
            ->join('ratings','ratings.user_id','=','users.id')
            ->where('item_sku','=',$id)->get();

            $vid = DB::table('j_vids')->where('item_code','=',$item_code)->get();

            return view('product.wedding-bands',['pairs'=>$pair,'vid'=>$vid,'carats'=>$carats,'metals'=>$metal_alternative,'bands' => $product,'mm'=>$mm,'thickness'=>$thickness,'similar'=>$similar,'size'=>$size,'reviews'=>$reviews,'ratings'=>$ratings->average('ratings')]);
        }else{
            // error
            return redirect('/wedding-band');
        }
    }



    public function fine_jewellery($id){

        $initials = [];

        $product = DB::table('fine_jewelleries')->where('item_sku',$id)->get();

        if (count($product)>0) {

            DB::table('fine_jewelleries')->where('item_sku',$id)->increment("count",1);

            $item_code = $product[0]->item_code;
            
            $metal = DB::table('fine_jewelleries')->where('item_sku','not like',$id)->where('item_code',$item_code)->orderBy('color','DESC')->get(['metal','color','item_sku','carat','stone_width','item_code','main_stone','diamond_clarity','diamond_color','size']);
            
            $m10 = $metal->where('main_stone', $product[0]->main_stone)->where('metal','10K')->unique('color');

            $m14 = $metal->where('main_stone', $product[0]->main_stone)->where('metal','14K')->unique('color');

            $m18 = $metal->where('main_stone', $product[0]->main_stone)->where('metal','18K')->unique('color');

            $other = $metal->where('main_stone', $product[0]->main_stone)->whereNotIn('metal',['10K','14K','18K'])->unique('color');

            $metal_alternative = array_merge(
                $m10->toArray(),
                $m14->toArray(),
                $m18->toArray(),
                $other->toArray()
            );

            $fine_size = $metal->where('size','!=',$product[0]->size)->where('main_stone',$product[0]->main_stone)->unique('size');

            $stone_carat = $metal->whereNotIn('carat',[null,$product[0]->carat])->where('main_stone', $product[0]->main_stone)->where('color', $product[0]->color)->where('metal', $product[0]->metal)->where('main_stone', $product[0]->main_stone)->where('diamond_clarity',$product[0]->diamond_clarity)->where('diamond_color',$product[0]->diamond_color)->unique('carat');

            $stone_mm = $metal->where('stone_width','!=',null)->where('main_stone', $product[0]->main_stone)->where('color', $product[0]->color)->where('metal', $product[0]->metal)->where('main_stone', $product[0]->main_stone)->where('diamond_clarity',$product[0]->diamond_clarity)->where('diamond_color',$product[0]->diamond_color)->unique('stone_width');

            $clarity = $metal->where('main_stone', $product[0]->main_stone)->where('color', $product[0]->color)->where('metal', $product[0]->metal)->where('main_stone', $product[0]->main_stone)->where('diamond_clarity','!=',$product[0]->diamond_clarity)->where('diamond_color',$product[0]->diamond_color)->unique('diamond_clarity');

            if (str_contains($product[0]->item_sku,"NK4522") == true OR str_contains($product[0]->item_sku,"NK2645") == true OR str_contains($product[0]->item_sku,"NK4577") == true OR str_contains($product[0]->item_sku,"NK6928") == true) {

                $stone_carat = [];
                $stone_mm = [];
                $initials =  $metal->where('main_stone', $product[0]->main_stone)->where('color', $product[0]->color)->where('metal', $product[0]->metal)->where('main_stone', $product[0]->main_stone)->sortBy('item_sku');

            }

            $other_stones = $metal->whereNotIn('main_stone',['',$product[0]->main_stone])->unique('main_stone');

            $similar = DB::table('fine_jewelleries')->where('style', $product[0]->style)->where('category', $product[0]->category)->inRandomOrder()->take(10)->get();

            $ratings = DB::table('ratings')->where('item_sku','=',$id)->get('ratings');

            $reviews = DB::table('users')
            ->select('name','ratings','ratings.created_at','comment')
            ->join('ratings','ratings.user_id','=','users.id')
            ->where('item_sku','=',$id)->get();

            $vid = DB::table('j_vids')->where('item_code','=',$item_code)->get();
            
            return view('product.fine-jewellery',['vid'=>$vid,'other_stones'=>$other_stones,'stone_carat'=> $stone_carat,'fine_size'=>$fine_size,'stone_mm'=> $stone_mm,'metals'=>$metal_alternative,'initials'=>$initials,'clarity'=>$clarity,'jewellerys' => $product,'similar'=>$similar,'reviews' => $reviews,'ratings'=>$ratings->average('ratings')]);
        }else{
            return redirect('/fine-jewellery');
        }
 
    }


    public function moissanite($id){

        $product = DB::table('moissanite')->where('id',$id)->get();

        if (count($product)>0) {

        $size = DB::table('moissanite')->where('type',$product[0]->type)->get();

        $reviews = DB::table('users')
            ->select('name','ratings','ratings.created_at','comment')
            ->join('ratings','ratings.user_id','=','users.id')
            ->where('item_sku','=',$product[0]->item_sku)->get();

        $imgc = count(File::allFiles('storage/image/moissanite/'.$product[0]->video_link.'/'));

        $similar = DB::table('moissanite')->where('shape',$product[0]->shape)->orWhere('shape','Round')->inRandomOrder()->take(10)->get();
        return view('product.moissanite',['gems'=>$product,'similar'=>$similar,'reviews'=>$reviews,'size'=>$size,'imgc'=>$imgc]);
    
        }else{
            return redirect('/moissanite');
        }

    }

    public function lab_grown($id){

        $db = DB::table('lab_grown_diamonds')->where('id',$id);

        if (count($db->get())>0) {

        $sku = $db->pluck('item_sku');

        $reviews = DB::table('users')
            ->select('name','ratings','ratings.created_at','comment')
            ->join('ratings','ratings.user_id','=','users.id')
            ->where('item_sku','=',$sku)->get();

        $gems = DB::table('lab_grown_diamonds')->where('id',$id)->get();
        $similar = DB::table('lab_grown_diamonds')->where('shape',$db->pluck('shape'))->where('color',$db->pluck('color'))->where('clarity',$db->pluck('clarity'))->orWhere('shape',$db->pluck('shape'))->inRandomOrder()->take(10)->get();
        return view('product.lab-diamond',['gems'=>$gems,'similar'=>$similar,'reviews'=>$reviews]);
 
        }else{
            return redirect('/lab-grown-diamond');
        }

    }

    public function diamonds($id){

        $db = DB::table('natural_diamonds')->where('id',$id);

        if (count($db->get())>0) {

        $sku = $db->pluck('item_sku');

        $reviews = DB::table('users')
            ->select('name','ratings','ratings.created_at','comment')
            ->join('ratings','ratings.user_id','=','users.id')
            ->where('item_sku','=',$sku)->get();

        $gems = DB::table('natural_diamonds')->where('id',$id)->get();
        $similar = DB::table('natural_diamonds')->where('shape',$db->pluck('shape'))->where('color',$db->pluck('color'))->where('clarity',$db->pluck('clarity'))->orWhere('shape',$db->pluck('shape'))->inRandomOrder()->take(10)->get();
        return view('product.diamonds',['gems'=>$gems,'similar'=>$similar,'reviews'=>$reviews]);
 
        }else{
            return redirect('/diamonds');
        }

    }

    public function complete_ring(){

        if (session('create_ring.engagement-ring') AND session('create_ring.stone')) {

                $product = DB::table('engagement_rings')->where('item_sku',session('create_ring.engagement-ring')["id"])->get();

                $similar = DB::table('engagement_rings')->inRandomOrder()->take(10)->get();

                if (session('create_ring.stone')['shape'] == "Square") {
                    $shapeimg = DB::table('engagement_rings')->where('item_code',$product[0]->item_code)->where('stoneshape',"Princess")->where('color',$product[0]->color)->value('image');
                }else{
                    $shapeimg = DB::table('engagement_rings')->where('item_code',$product[0]->item_code)->where('stoneshape',session('create_ring.stone')['shape'])->where('color',$product[0]->color)->value('image');
                }
            
                return view('product.complete-ring',['settings' => $product,'shapeimg'=>$shapeimg,'similar'=>$similar]);
            
        }else{
            return redirect('/engagement-ring');
        }

    
    }

    public function thankyou(Request $request){

        if(session('order_num')) {

                 $order = DB::table('customer__orders')->where('order_num',session('order_num'))->limit(1)->get();
                return view('thankyou')->with(['thankyou'=>"Thank You For Shopping With Us"]);

        }else{
            return redirect('/');
        }

    }

}
