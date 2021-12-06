<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\AdminMail;
use App\Models\Announce;
use App\Models\Category;
use App\Mail\RevisorMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function index(){
        $categories3=Category::take(3)->get();
        $categories=Category::all();
        $announces= Announce::where('is_accepted', true)->orderBy('created_at','desc')->take(5)->get();
        return view('welcome', compact('announces','categories','categories3'));
    }

    public function revisorRequest(){

        Mail::to(Auth::user()->email)->send(new RevisorMail());
        
        return redirect(route('home'))->with('message','Riceverai a breve una nostra email, segui le istruzioni per lavorare con noi');

    }

    public function rps(){
        return view('rps');
    }

    public function project(){
        return view('project');
    }    

    public function locale($locale){
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function aboutus(){
        return view('about-us');
    }

}
