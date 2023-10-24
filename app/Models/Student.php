<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function ancestor()
    {
        return $this->belongsTo(Ancestor::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($student) {
            if ($student->ancestor_id !== null) {
                // Если поле user_id не равно NULL, удаляем связанную запись из таблицы users
                $student->ancestor()->delete();
            }
        });
    }

    protected $fillable = [
        'FIO',
        'age',
        'phone',
        'amount',
        'ancestor_id',
        'group_id',
    ];
}
