<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chat_Head extends Model
{
    protected $table = 'chat_heads';

    //
    public static function user(?int $id)
    {
        $who = DB::table('chat_heads')->where('whom', $id);
        return DB::table('chat_heads')->where('who', $id)->union($who)->get();
    }
}
