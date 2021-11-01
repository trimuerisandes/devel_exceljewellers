<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomDesignController extends Controller
{
    public function index(){
    	return view('custom_design.custom_design');
    }

    public function rings(){
    	return view('custom_design.custom_ring');
    }

    public function wedding_band(){
    	return view('custom_design.custom_wedding-band');
    }

    public function pendant(){
    	return view('custom_design.custom_pendant');
    }

    public function earring(){
    	return view('custom_design.custom_earring');
    }

    public function bracelet_chain(){
    	return view('custom_design.custom_bracelet-chain');
    }
}
