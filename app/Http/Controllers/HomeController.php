<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = User::find(auth::id());
        $addresses = DB::table('addresses')->where('user_id','=',auth::id())->get();
        return view('home',['user'=>$user,'addresses'=>$addresses]);
    }

}
