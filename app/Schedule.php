<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Schedule extends Model
{
    protected $fillable = [
        'user', 'trainer', 'day', 'time', 'text'
    ];

    //
    public static function user(?int $id)
    {
        return DB::table('schedules')->where('user', $id)->get();
    }
}
