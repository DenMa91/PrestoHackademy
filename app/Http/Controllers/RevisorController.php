<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.revisor');
    }

    public function index(){
       
        $announce=Announce::where('is_accepted', null)
        ->orderBy('created_at', 'desc')
        ->first();
        return view('revisor.index', compact('announce'));
    }

    public function accepted(){
       
        $announces=Announce::where('is_accepted', true)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('revisor.accepted', compact('announces'));
    }

    public function rejected(){
       
        $announces=Announce::where('is_accepted', false)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('revisor.rejected', compact('announces'));
    }

    private function setAccepted($announce_id, $value){

    $announce=Announce::find($announce_id);
    $announce->is_accepted = $value;
    $announce->save();

    return redirect(route('revisor.index'));
}

    public function accept($announce_id){

        return $this->setAccepted($announce_id, true);
    }

    public function reject($announce_id){

        return $this->setAccepted($announce_id, false);
    }

    public function undoRevision($announce_id){
        
        return $this->setAccepted($announce_id, null);
    }
}
