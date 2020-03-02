<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $fillable = [
        'user', 'type', 'price', 'status', 'other_id'
    ];

    //
    public static function findByUser(?int $id)
    {
        return DB::table('orders')->where('user', $id)->get();
    }
}
