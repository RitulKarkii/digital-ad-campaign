<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;


class ItemController extends Controller
{
    public function index(Request $request){
        $perPage = $request->query('per_page',5);
        $items = Campaign::paginate($perPage);

        return response()->json($items);
    }
}
