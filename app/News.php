<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    //
    protected $fillable = [
        'text', 'image', 'slug', 'author', 'title'
    ];

    public static function submited()
    {
        return DB::table('news')->where('submited', true)->get();
    }
}
