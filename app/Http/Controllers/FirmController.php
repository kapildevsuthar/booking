<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FirmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $firms=Auth::user()->firm;
        // dd($firms);

      return view("firm.index",compact('firms'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("firm.create");
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $info=[
            'user_id'=>Auth::user()->id,
            'firm_name'=>$request->firm_name,
            'firm_mobile'=>$request->firm_mobile,
            'pincode'=>$request->pincode,
            'since'=>$request->since,
            'street'=>$request->street,
            'landmark'=>$request->landmark,
             'address'=>$request->address,
             'city'=>$request->city,
             'state'=>$request->state,
             'country'=>$request->country,
             'pan_no'=>$request->pan_no,
            //  'map'=>$request->map,
             'register_no'=>$request->register_no,
             'gst_no'=>$request->gst_no,
            //  'profilepic'=>$request->profilepic
            ];
            Firm::create($info);
    }

    /**
     * Display the specified resource.
     */
    public function show(Firm $firm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Firm $firm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Firm $firm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Firm $firm)
    {
        //
    }
    public function updateprofilepic(){
      $firmid=request('id');
      $fo=request('profilepic');
      $filename=time()."_".$fo->getClientOriginalName();
      $fo->move("./images",$filename);
      $firm=Firm::find($firmid);
      if($firm->profilepic){
        unlink('./images/'.$firm->profilepic);
      }
      $firm->profilepic=$filename;
      $firm->save();

      return redirect("/firm");
    }
}
