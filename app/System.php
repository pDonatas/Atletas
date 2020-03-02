<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    //
    protected $table = 'System';
    protected $fillable = [
        'title', 'online', 'paysera_password', 'paysera_projectid', 'price_ads', 'price_subscription'
    ];
}
