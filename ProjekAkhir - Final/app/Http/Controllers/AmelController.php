<?php

namespace App\Http\Controllers;

use App\Models\Products;

class AmelController extends Controller {
    public function homepage(){
        return view('modules.home');
    }

    function about() {
        return view('modules.about');
    }
    
    function contact(){
        return view('modules.contact');
    }
    
    function menust(){
        return view('modules.menust');
    }

    function index() {
        return view('modules.Auth.login');
    }
    
    function menutdk(){
        $products = Products::all();
        return view('modules.menutdk')->with('products',$products);
    }
}
