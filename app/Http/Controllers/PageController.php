<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Inventory;

class PageController extends Controller
{
    public function product(){
    	$query  = DB::table('inventories')->get();

        return view('product',['inventory' => $query]);
    }

    public function show($category){
    	
    	$query  = DB::table('inventories')->where('category', $category)->get();

        return view('product',['inventory' => $query]);
    }

    public function error(){
        return view('error');
    }
}
