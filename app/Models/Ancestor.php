<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ancestor extends Model
{
    use HasFactory;



    protected $fillable = [
        'FIO',
        'phone',
        'workplace',
    ];
}
