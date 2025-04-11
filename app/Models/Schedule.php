<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //

    protected $fillable=['user_id','week','firm_id','max_booking','end_from','start_from','shift'];

    public function is_today_schedule(){
        $data=$this->hasMany(TodaySchedule::class);
        return $data;

    }
}
