<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function engagement_ring(){
    	return view('category.engagement-ring');
    }

    public function diamond(){
    	return view('category.diamond');
    }

    public function fine_jewellery(){
    	return view('category.fine-jewellery');
    }

    public function wedding_band(){
    	return view('category.wedding-ring');
    }
}
