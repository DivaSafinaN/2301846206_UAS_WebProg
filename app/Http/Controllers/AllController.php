<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;

class AllController extends Controller

{
    public function before(){
        return view('before.index',[
            "title" => "Welcome" 
        ]);
    }

    public function home(){
        return view('home',[
            "title" => "Home" ,
            "books" => Ebook::all()
        ]);
    }
    
    public function index(Ebook $ebook){
        return view('details',[
            "title" => $ebook->title ,
            "book" => $ebook
        ]);
    }

    public function success(){
        return view('layout.success',[
            "title" => "Success!" ,
        ]);
    }

    public function saved(){
        return view('layout.saved',[
            "title" => "Saved!" ,
        ]);
    }
}
