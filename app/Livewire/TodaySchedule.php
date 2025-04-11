<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Schedule as Sc;
use App\Models\TodaySchedule as Ts;
use Illuminate\Support\Facades\Auth;

class TodaySchedule extends Component
{
    public $todayschedule ,$firm,$firm_id,$scdata ;
    public function mount($firm=null)
     {
       $this->firm=$firm;

       $this->firm_id = $firm->id??null;
     }
    public function render()
    {
        $day = date('l');
// dd($day);
        $this->todayschedule=Sc::where('firm_id',$this->firm->id)->where('week',$day)->get();
        // dd($this->todayschedule);
        return view('livewire.today-schedule');
    }
     public function store($sid){

        //  dd($sid);
       $scdata=Sc::find($sid);
      $info=[

           'schedule_id'=>$sid,
           'firm_id'=>$this->firm->id,
           'user_id'=>Auth::user()->id,
           'week'=>$scdata->week,
          'shift'=>$scdata->shift,
          'todaydate'=>date('Y-m-d')
      ];
      // dd($info);
      Ts::create($info);
     }


     public function delete($sid){

      $deleted=Ts::find($sid)->delete();

     }
};

