<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    //
    protected $fillable = [
        'text', 'image', 'slug', 'author', 'title', 'submited'
    ];

    public static function submited()
    {
        return DB::table('news')->where('submited', true)->get();
    }

    public static function waiting()
    {
        return DB::table('news')
            ->where('submited', 0)
            ->Orwhere('submited', 2)
            ->get();
    }
}
