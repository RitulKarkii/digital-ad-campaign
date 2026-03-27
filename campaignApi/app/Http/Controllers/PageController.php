<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\page;

class PageController extends Controller
{
     public function page(Request $request){
        $request->validate([
            'name'=>'required'
        ]);

        $page = page::create([
            'name' => $request->name
        ]);
        return response()->json([
            'message'=> 'Pages Created',
            'page'=>$page
        ]);
    }

    public function GetPageData(){
        $page = page::all();
        return response()->json([
            'data'=> $page
        ]);
    }
}
