<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily_Schedule extends Model
{
    use HasFactory;

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    protected $fillable = [
        'day',
        'schedule_id',
        'start_date',
        'end_date',
    ];


    protected $table = 'daily_schedules';
}
