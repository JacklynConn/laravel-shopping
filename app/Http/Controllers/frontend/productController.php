<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function productDetail($id){
        ob_start();

        $productDetail =DB::table('product')
                        ->join('category' , 'product.category_id' , '=' , 'category.id')
                        ->select('product.*','sale-price AS sale_price')
                        ->where('product.id' ,$id)
                        ->get();

        $Relateproduct = DB::table('product')   
                    ->join('category' , 'product.category_id' , '=' , 'category.id')
                    ->select('product.*','sale-price AS sale_price')            
                    ->where('product.id' , '<>' , $id)
                    ->where('category_id' , $productDetail[0]->category_id)
                    ->orderBy('product.id' , 'DESC')
                    ->limit(4)
                    ->get();

        

        DB::table('product')
            ->where('id' , $id)
            ->update([
                'wiewer'=>$productDetail[0]->wiewer + 1
            ]);

        return view('frontend.product_detail' ,['productDetail'=>$productDetail , 'Relateproduct'=>$Relateproduct]);
    }
}
