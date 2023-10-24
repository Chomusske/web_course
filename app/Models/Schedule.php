<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function daily_schedule()
    {
        return $this->hasMany(Daily_Schedule::class);
    }



    protected $fillable = [
        'user_id',
        'group_id',
        'start_date',
        'end_date'
    ];
}
