<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Rooms;
use App\Models\Slider;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $rooms=Rooms::all();
        $galleries=Gallery::all();
        $sliders=Slider::all();
        return view ('welcome',compact('rooms','galleries','sliders'));
    }
    public function about(){
        return view('about');
    }
    public function room(){
        $rooms=Rooms::all();
        return view('room', compact('rooms'));
    }
    public function gallerys(){
        $galleries=Gallery::all();
        return view('gallerys',compact('galleries'));
    }
    public function header(){
        return view('header');
    }
    public function footer(){
        return view('footer');
    }
    public function rums(){
        return view('rums');
    }
}
