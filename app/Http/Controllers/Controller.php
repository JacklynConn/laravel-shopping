<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    //  Log Acitivities
    public function logActivity($postType , $productName , $status){
        $now = new DateTime();
        $user = Auth::user()->name;
        DB::table('activity_log')->insert([
            'author'         => $user,
            'product_name'   => $productName,
            'status'         => $status,
            // 'created_at'     => date('Y-m-d H:m:s') ,
            // 'updated_at'     => date('Y-m-d H:m:s'),
            'postType'       => $postType
        ]);
    }
}

// // get the current time
// $current = Carbon::now();

// // add 30 days to the current time
// $trialExpires = $current->addDays(30);