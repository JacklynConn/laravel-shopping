<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminNewsController extends Controller
{

    // list 

    public function ListNews(){

        $listNews = DB::table('_news')
                    ->orderBy('id' , 'DESC')
                    ->get();
        return view('backend.list-news' , ['listNews'=>$listNews]);
    }

    // add
    public function AddNews(){
        return view('backend.add-news');
    }

    // add new 
    public function AddNewsSubmit(Request $request){
       $title          = $request->input('title');
       $description    = $request->input('description');
       $file           = $request->file('thumbnail');
       $thumbnail      = rand(1, 999).'-'.$file->getClientOriginalName();
       $path           = 'uploads';
       $file->move($path ,  $thumbnail);

       $ObjNews = DB::table('_news')->insert([
                'title'        => $title,
                'thumbnail'    => $thumbnail,
                'description'  => $description,
                'author'       => Auth::user()->id,
                'viewer'       => '0'
                // 'created_at'   => date('Y-m-d H:i:s'),
                // 'updated_at'   => date('Y-m-d H:i:s')
       ]);
       if($ObjNews){
        $PostType    = 'News';
        $productName =  $title;
        $status      = 'add';
        $this->logActivity($PostType , $productName , $status);
        return redirect('admin/add-news')->with('message', 'Add new success. please check View post');
       }
    }

    // remove News
    public function removeNews($id){
        $removeNews = DB::table('_news')
                    ->where('id' , $id)
                    ->get();
        return view('backend.remove-news' , ['removeNews'=>$removeNews]);

    }

    public function removeNewsSubmit(Request $request){

        $removeNews = DB::table('_news')
        ->where('id' , $request->id)
        ->delete();
     
        if($removeNews){
            $postType = 'News';
            $Title    = $request->input('title');
            $status   = 'remove';
            $this->logActivity($postType, $Title , $status);
            return redirect('/admin/list-news');
        }
    }

    // edit news

    public function editNews($id , Request $request){

       
        $editNews = DB::table('_news')
                    ->where('id' , $id)
                   
                    ->get();

        return view('backend.edit-news' , ['editNews'=>$editNews]);
    }

    public function editNewsSubmit(Request $request){
        $id          = $request->input('id') ;
        $title       = $request->input('title');
        $description = $request->input('description');


            $file           = $request->file('thumbnail');
            $thumbnail      = rand(1, 999).'-'.$file->getClientOriginalName();
            $path           = 'uploads';
            $file->move($path ,  $thumbnail); 
           
            $validityDate = date('d-m-Y H:i:s');
        $editNews = DB::table('_news')
       
                    ->where('id' , $id)
                    ->update([
                        'title'        => $title,
                        'thumbnail'    => $thumbnail,
                        'description'  => $description,
                        'author'       => Auth::user()->id,
                        'viewer'       => '0',
                        // 'created_at'   =>  $now->format('Y-m-d H:i:s') 
                        'created_at'   =>   date('Y-m-d H:m:s')
                        // 'updated_at'   => date('Y-m-d H:i:s')

                    ]);
                    if($editNews){
                        $PostType    = 'News';
                        $productName =  $title;
                        $status      = 'Edit';
                        $this->logActivity($PostType , $productName , $status);
                        return redirect('admin/list-news');
                       }
                    
    }
}
