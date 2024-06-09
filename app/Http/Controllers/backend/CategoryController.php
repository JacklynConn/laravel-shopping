<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{


    // list category
    public function ListCategory(){
        $ListCategory = DB::table('category')
                        -> orderBy('id' , 'DESC')
                        -> get();
                    
        $CountCategory= DB::table('category')
                        ->count();
                    
        return view('backend.list-category' , ['ListCategory' => $ListCategory , 'CountCategory' =>$CountCategory]);

    }
       // add category
    public function AddCategory(){
        return view('backend.add-category');
    }

 
    public function AddCategorySubmit(Request $request){
       
        $name = $request->input('name');

        $Category = DB::table('category')
                ->insert([
                     'name'      =>$name,
                     'created_at'=> date('Y-m-d H:i:s'),
                     'updated_at'=> date('Y-m-d H:i:s')
                ]);
                if($Category){
                    $postType     = 'category';
                    $productname  = $name;
                    $status        = 'Add';
                    $this->logActivity($postType , $productname , $status);
                    return redirect('admin/add-category')->with('message' , 'Add category success, Please views list');
                }
    }

    // edit
    public function EditCategory($id){
        $EditCategory = DB::table('category')
                    ->where('id' , $id)
                    ->get();
        return view('backend.edit-category' ,['EditCategory' => $EditCategory]);
    }
    
    public function EditCategorySubmit( Request $request){
       $id    = $request->input('id');
       $name  = $request->input('name');

       $EditCategory = DB::table('category')

                        ->where('id' , $id)
                        ->update([
                            'name'=>$name,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')

                        ]);
        if($EditCategory){
            $postType     = 'Category';
                            $productName  = $name;
                            $status       = 'update';
                            $this->logActivity($postType , $productName , $status);
            return redirect('admin/list-category');
        }
    }
    

    // remove category
    public function removeCategory($id){
        $RemoveCategory =DB::table('Category')
                        ->where('id',$id)
                        ->get();
            return view('backend.remove-category' , ['RemoveCategory'=>$RemoveCategory]);
    }

    public function removeCategorySubmit(Request $request){

        // $RemoveCategory = DB::table('Category')
        //                     ->where('id', $request->id)
        //                     ->delete();

      
        $name = $request->input('name');
        $RemoveCategory = DB::table('Category')
                        ->where('id' ,$request->id)
                        ->delete();
        if($RemoveCategory){
                $postType     = 'Category';
                $productName  = $name;
                $status       = 'remove';
                $this->logActivity($postType , $productName , $status);
            return redirect('admin/list-category');
        }else{
            echo'2';
        }


       
    }


}
