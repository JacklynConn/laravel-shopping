<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function shop( Request $request){
    //  return    date('Y-m-d');

        $CountProducts = DB::table('product')->count();
        $LimitPerPage  = 6;
        $currentPage = $request->page;
        $TotalPage     = ceil($CountProducts / $LimitPerPage);
        $offset        = ( $currentPage - 1) * $LimitPerPage;


            // @Get List Latest Products
        $QueryProducts = DB::table('product');

        if($request->cate){

            $Category =DB::table('category')
                ->where('name' , $request->cate)
                
            // ->orderBy('id' , 'DESC')
            ->get();
              $cateID = $Category[0]->id;
            $TotalPage=0;
            // return $cateID;
            $QueryProducts->where('category_id', $cateID);
         
        }
          // Check if fitter by price
        elseif($request->price){
            if($request->price== 'High'){
                $QueryProducts->orderBy('sale-price' , 'DESC');
            }
            else{
                $QueryProducts->orderBy('sale-price' , 'ASC');
            }
            $TotalPage=0;
            // $LimitPerPage=$CountProducts;
            $QueryProducts
            ->orderBy('sale-price' , 'DESC');
          
        }

         // Check if fitter only product discount
         elseif($request->promotion){
            $TotalPage=0;
            // $LimitPerPage=$CountProducts;
            $QueryProducts
            ->where('sale-price' , '<>' , 0)
            ->orderBy('sale-price' , 'DESC');
         }else{
            $QueryProducts
                ->offset($offset)
                ->limit($LimitPerPage)
                ->orderBy('id', 'DESC');
         }


       

           // @Get List products
        $listProducts =  $QueryProducts
                        // ->join('category' , 'product.category_id' , '=' , 'category.id')
                        ->select('product.*','sale-price AS sale_price' )
                        // ->orderBy('product.id' , 'DESC')
                    //   ->offset($offset)
                    //  ->limit($LimitPerPage)
                        ->get();

           // @Get List Categories
        $ListCategory =DB::table('category')
                
                        ->orderBy('id' , 'DESC')
                        ->get();

        return view('frontend.shop' , ['listProducts'=>$listProducts , 'TotalPage'=>$TotalPage , 'currentPage'=>$currentPage , 'ListCategory'=>$ListCategory]);
    }
}
