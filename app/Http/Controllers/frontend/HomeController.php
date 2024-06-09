<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        ob_start();

        $NewProducts= DB::table('product')
                    ->join('category' , 'product.category_id' , '=' , 'category.id')
                    ->select('product.*' , 'category.name AS cate_name' ,'sale-price AS sale_price')
                    ->orderBy('product.id' , 'DESC')
                    ->limit(4)
                    ->get();

        $PromotionProduct = DB::table('product')
        ->where('sale-price', '<>' , '0')
        ->join('category' , 'product.category_id' , '=' , 'category.id')
        ->select('product.*'  ,'sale-price AS sale_price')
        ->orderBy('product.id' , 'DESC')
        ->limit(4)
        ->get();

        $PopularProduct = DB::table('product')
                        ->join('category' , 'product.category_id' , '=' , 'category.id')
                        ->select('product.*' , 'sale-price AS sale_price')
                        ->orderBy('wiewer' , 'DESC')
                        ->limit(4)
                        ->get();

        return view('frontend.home' , ['NewProducts'=>$NewProducts , 'PromotionProduct'=>$PromotionProduct , 'PopularProduct'=>$PopularProduct] );
    }

    // shop

    // public function productDetail($id){
    //     return $id;
    // }
}
