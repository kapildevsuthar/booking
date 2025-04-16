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
            'category'=>$request->category,
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
             'about_us'=>$request->about_us,
            //  'profilepic'=>$request->profilepic
            ];
            Firm::create($info);
    }
    public function mapupdate(string $id){
        // dd($id);
        $frm=Firm::find($id);
        $frm->latitude=request('latitude');
        $frm->longitude=request('longitude');
        $frm->save();
         return redirect("/firm");
    }

    /**
     * Display the specified resource.
     */
    public function show(Firm $firm)
    {
        // return "this is view";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Firm $firm)
    {
        // echo "this is edit page";
        $firms = Firm::all(); 
        return view('firm.edit', compact('firm', 'firms'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Firm $firm)
    {
        
        $request->validate([
            'firm_name' => 'required|string|unique:firms,firm_name,' . $firm->id,
            'category' => 'required|string',
            'firm_mobile' => 'required|digits:10',
            'pincode' => 'required|digits:6',
            'since' => 'required|date',
            'street' => 'nullable|string',
            'landmark' => 'nullable|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'pan_no' => 'required|string',
            'register_no' => 'nullable|string',
            'gst_no' => 'nullable|string',
            'about_us' => 'required|string',
        ]);
    
        
        $firm->update([
            'firm_name' => $request->firm_name,
            'firm_mobile' => $request->firm_mobile,
            'category'=>$request->category,
            'pincode' => $request->pincode,
            'since' => $request->since,
            'street' => $request->street,
            'landmark' => $request->landmark,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'pan_no' => $request->pan_no,
            'register_no' => $request->register_no,
            'gst_no' => $request->gst_no,
            'about_us'=>$request->about_us,
        ]);
    
        return redirect("/firm")->with("data updated successfully");
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
