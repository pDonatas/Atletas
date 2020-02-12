<?php

namespace App;

use App\Http\Services\NewsService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Helpers
{
    public static function getClients($id)
    {
        $clients = Client::client($id);
        $users = [];
        foreach ($clients as $client) {
            array_push($users, User::findOrFail($client->client));
        }
        return $users;
    }

    public static function day($day)
    {
        switch ($day) {
            case '1':
                return 'Pirmadienis';
            case '2':
                return 'Antradienis';
            case '3':
                return 'Trečiadienis';
            case '4':
                return 'Ketvirtadienis';
            case '5':
                return 'Penktadienis';
            case '6':
                return 'Šeštadienis';
            case '7':
                return 'Sekmadienis';
            default:
                return 'Įvyko klaida bandant gauti dieną';
        }
    }

    public static function cat($category)
    {
        $ns = new NewsService();
        return $ns->category($category)[0]->category;
    }

    public static function user($user)
    {
        return DB::table('users')->find($user);
    }

    public static function getAllTrainers()
    {
        return DB::table('users')->where('type', 1)->get();
    }

    public static function getType($type)
    {
        switch ($type) {
            case '0':
                return trans('user.user');
            case '1':
                return trans('user.trainer');
            default:
                return trans('user.unknown');
        }
    }

    public static function getNavbar()
    {
        return Navigation::all();
    }

    public static function getNavChilds($id)
    {
        return Navigation::findOrFail($id)->getChilds();
    }

    public static function getCategories()
    {
        return Categories::all();
    }

    public static function feature()
    {
        $ns = new NewsService();
        return $ns->feature();
    }

    public static function isClient($user)
    {
        if (Count(DB::table('clients')->where('trainer', $user)->where('client', Auth::id())->get()) > 0)
            return true;
        return false;
    }
}
