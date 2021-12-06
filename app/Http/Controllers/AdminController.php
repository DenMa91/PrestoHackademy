<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function acceptRevisor($email){
        
        $user=User::find($email);
        $user->is_revisor = true;
        $user->save();
        
        // return redirect('localhost')->with('message',"l'utente $user->name è diventato revisore");
    }

    public function accept($email){
        $user= User::where('email', $email)->get();
        return view('admin.accept', compact('user'));
    }

}