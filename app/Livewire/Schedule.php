<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Schedule as Sc;
use Illuminate\Support\Facades\Auth;

class Schedule extends Component{


     public $firm,$firm_id,$week=[],$user_id,$id,$max_appointment,$shift,$start_from,$end_from;
     public $allschedule;   
     public $isModalOpen=false;

     public function mount($firm=null)
     {
       $this->firm=$firm;
       $this->firm_id = $firm_id??null;
     }

    public function render()
    {
        $this->allschedule=Sc::where('firm_id',$this->firm->id)->get();
        return view('livewire.schedule');
    }
   
   public function store(){

    // dd("hello");
    foreach($this->week as $week){
        $info=[
         'user_id'=>Auth::user()->id,
         'firm_id'=>$this->firm_id,
         'week'=>$week,
         'shift'=>$this->shift,
         'start_from'=>$this->start_from,
         'end_from'=>$this->end_from,
         'max_booking'=>$this->max_appointment,
     ];
     
      // dd("hello"); 
     
     $findfirm=Sc::where('firm_id',$this->firm_id)->where('week',$week)->where('shift',$this->shift)->get();
     dd($findfirm);
     if(count($findfirm)>0){

         Sc::updateOrCreate(['firm_id'=>$findfirm[0]->firm_id],$info);

        }else{
     
          Sc::create($info);
            
           }
       }
    //    $this->resetfield();
   
       $this->closemodal();
   }

    public function create()
  {
    $allschedule=Sc::all();
    $this->OpenModal();

}
   public function delete($id){
    Sc::find($id)->delete();
    //  dd($id);
   }
   
public function openModal()
{
$this->isModalOpen = true;
}


   public function closeModal()
{
$this->isModalOpen = false;
}
    
// public function resetFields()
// {
//    $this->week=[];
//    $this->shift=null;
//    $this->start_from=null;
//    $this->end_from=null;
//    $this->max_appointment=null;

// }


}
