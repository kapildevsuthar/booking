<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodaySchedule extends Model
{
    protected $fillable=['shift','schedule_id','firm_id','user_id','todaydate','week'];   
}
