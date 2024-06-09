<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request){

        $SearchValue  =  $request->input('search');

        $search = $SearchValue;
        $total = 2;

        $Products     =  DB::table('product')
                        ->where('name' , 'LIKE' , '%'.$SearchValue.'%')
                        ->select('product.*','sale-price AS sale_price')
                        ->orderBy('id', 'DESC')
                        ->get();
        
        return view('frontend.search' , ['Products'=>$Products , 'total '=>$total ]);
    }
}
