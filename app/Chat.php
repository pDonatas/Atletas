<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chat extends Model
{
    protected $fillable = [
        'chat_id', 'text', 'who'
    ];

    //
    public static function Client(?int $id)
    {
        return DB::table('chats')->where('whom', $id)->select('id', 'who')->distinct()->get();
    }

    public static function findAll($chat_Head)
    {
        return DB::table('chats')->where('chat_id', $chat_Head)->get();
    }
}
