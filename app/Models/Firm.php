<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    protected $fillable=['user_id','firm_name','firm_mobile','pincode','since','street',
    'landmark','address','city','state','country','pan_no','map','register_no','gst_no','profilepic',
    'category', 'about_us'];

    
     public function todaySchedule(){
        return $this->hasMany(TodaySchedule::class);
     }
}
