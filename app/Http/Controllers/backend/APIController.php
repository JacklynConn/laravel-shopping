<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    // API

    // @@ login
    public function userLogin(Request $request) {
        $result = [];

        if (Auth::attempt([
            'email' => $request->input('email'), 
            'password' =>$request->input('password')])) {
            
            $user   = Auth::user();
            $token  = $user->createToken('MyApp')->plainTextToken;
            $result = array(
                'code'  => 200,
                'token' => $token
            );
        }else{
            return 'error';
        }
        return $result;

        
    }


    // @@ list product
    public function listProduct(){
        $product = DB::table('product')
                    ->orderBy('id'  , 'DESC')
                    ->get();
                    if($product){
                        $result = array(
                            'code' =>200,
                            'data' =>$product
                        );

                    }
                    return $result;

    }

    // @@ product detail
    public function ProductDetail($id){

        $ProductDetail = DB::table('product')
                        ->where('id' , $id)
                        ->get();

            if($ProductDetail){
                $result = array(
                    'code' => 200,
                    'data' => $ProductDetail
                );
            }
        return $result;
    }

    // @@ CreateProduct
    public function CreateProduct(Request $request){

        $file        = $request->file('thumbnail');
        $thumbnail   = rand(1,999).'-'.$file->getClientOriginalName();
        $path        = 'Uploads';
        $file->move($path , $thumbnail);

        $product = DB::table('product')->insert([
            "name"          => $request->name,
            "qty"           => $request->qty,
            "regular_price" => $request->regular_price,
            "sale-price"    => $request->sale_price,
            "color"         => $request->color,
            "size"          => $request->size,
            "author"        => $request->author,
            "wiewer"        => $request->viewer,
            "category_id"      => $request->category,
            "description"   => $request->description,
            "created_at"    => $request->created_at,
            "updated_at"    => $request->updated_at,
            "thumbnail"     => $thumbnail
        ]);

        if($product){
            return array(
                'code'  => 200,
                'status'=> 'Product create success'
            );
        }
    }

    // @ update
    public function UpdateProduct(Request $request){
        $file        = $request->file('thumbnail');
        $thumbnail   = rand(1,999).'-'.$file->getClientOriginalName();
        $path        = 'Uploads';
        $file->move($path , $thumbnail);

        $product = DB::table('product')
        ->where(['id'=>$request->id])
        ->update([
            "name"          => $request->name,
            "qty"           => $request->qty,
            "regular_price" => $request->regular_price,
            "sale-price"    => $request->sale_price,
            "color"         => $request->color,
            "size"          => $request->size,
            "author"        => $request->author,
            "wiewer"        => $request->viewer,
            "category_id"      => $request->category,
            "description"   => $request->description,
            "created_at"    => $request->created_at,
            "updated_at"    => $request->updated_at,
            "thumbnail"     => $thumbnail
        ]);

        if($product){
            return array(
                'code'  => 200,
                'status'=> 'Product update success'
            );
        }
    }
}
