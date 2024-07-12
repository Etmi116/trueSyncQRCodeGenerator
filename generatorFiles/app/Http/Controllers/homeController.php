<?php

namespace App\Http\Controllers;

use App\Models\QRCode;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function home(){
        return view('home');
    }

    public function menu(){
        return view('menu');
    }
}
