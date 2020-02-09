<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
