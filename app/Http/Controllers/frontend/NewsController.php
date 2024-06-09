<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function news(){
        ob_start();
        
        $ListNews  = 
        DB::table('_news')
        ->orderBy('viewer'  ,'DESC' , '>' , 20)
            ->orderBy('id'  , 'DESC')
         
            ->get();
        
        return view('frontend.news' , ['ListNews'=>$ListNews]);
    }





    public function NewsDetail($id){
        ob_start();

        $newsDetail = DB::table('_news')
                    ->where('id' , $id)
                    ->get();

        DB::table('_news')
        ->where('id' , $id)
        ->update(['viewer' => $newsDetail[0]->viewer +1]);

        $PopularNews = DB::table('_news')
        ->where('id' , '<>' , $id)
        ->orderBy('viewer' , 'DESC')
        ->limit(4)
        ->get();
        return view('frontend.News-detail' , ['newsDetail'=>$newsDetail , 'PopularNews'=>$PopularNews]);
    }
}

