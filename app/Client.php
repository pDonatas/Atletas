<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    //
    protected $fillable = [
        'client',
        'trainer',
        'client_submit',
        'trainer_submit',
        'created_at',
        'updated_at'
    ];

    public static function client($id)
    {
        return DB::table('clients')
            ->where('trainer', $id)
            ->where('trainer_submit', 1)
            ->where('client_submit', 1)
            ->get();
    }
}
