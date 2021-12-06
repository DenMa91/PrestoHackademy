<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function category(Category $category){
        
        $announces=Announce::where([['category_id', $category->id],['is_accepted', true]])->orderBy('created_at','desc')->get();
        
        
        return view('filter.category', compact('category','announces'));
        
    }
}
          