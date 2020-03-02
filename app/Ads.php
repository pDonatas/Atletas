<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ads extends Model
{
    protected $fillable = [
        'url', 'image', 'title', 'payed', 'payed_until'
    ];

    //
    public static function payed()
    {
        return DB::table('ads')->whereRaw('payed=1 AND payed_until >= ?', [time()])->get();
    }
}
