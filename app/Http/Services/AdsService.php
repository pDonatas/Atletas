<?php

namespace App\Http\Services;

use App\Ads;
use Illuminate\Support\Facades\DB;

class AdsService
{
    public function getAll()
    {
        $ads = DB::table('ads')->orderBy('id', 'DESC')->get();
        return $ads;
    }

    public function getRand()
    {
        $ads = Ads::payed();
        if (count($ads) > 0) {
            $ads = Ads::payed();
        }
        return $ads;
    }
}
