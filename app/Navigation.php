<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Navigation extends Model
{
    //
    public function getChilds()
    {
        return DB::table('navigations')->where('parent', $this->id)->get();
    }
}
