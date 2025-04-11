<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserInterface extends Controller
{
    public function show(){
         $ary=[];
         $keyword=request('keyword');


        //  dd("$keyword");
         $data= Firm::when($keyword, function ($query, $keyword){
            $query->where(function ($q) use ($keyword){
                $q->where('firm_name','like', "%$keyword%")
                  ->orWhere('firm_mobile','like', "%$keyword%")
                  ->orWhere('pincode','like', "%$keyword%")
                  ->orWhere('address','like', "%$keyword%");
         });
        })->get();
        // dd($keyword);
        // print_r($data);

        
        return view("userinterface.show",compact("data"));
    }
}
