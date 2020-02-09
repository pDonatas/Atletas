<?php

namespace App\Http\Services;

use App\Ads;
use App\User;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function findAllTrainers()
    {
        return DB::table('users')->where('type', 1)->get();
    }

    public function findTrainers($city, $arguments)
    {
        if (!$city == '') {
            $query = "";
            $arg = explode(',', $arguments);
            foreach ($arg as $ar) {
                if ($query != "") $query .= " UNION ";
                $query .= "SELECT * FROM `users` WHERE type = '1' AND city = '$city' AND job_type LIKE '%$ar%'";
            }
            return DB::select(DB::raw($query));
        } else {
            $query = "";
            $arg = explode(',', $arguments);
            foreach ($arg as $ar) {
                if ($query != "") $query .= " UNION ";
                $query .= "SELECT * FROM `users` WHERE `type` = '1' AND `job_type` LIKE '%$ar%'";
            }
            return DB::select(DB::raw($query));
        }
    }

    public function findUsers($city, $arguments)
    {
        if (!$city == '') {
            $query = "";
            $arg = explode(',', $arguments);
            foreach ($arg as $ar) {
                if ($query != "") $query .= " UNION ";
                $query .= "SELECT * FROM `users` WHERE type = '0' AND city = '$city' AND job_type LIKE '%$ar%'";
            }
            return DB::select(DB::raw($query));
        } else {
            $query = "";
            $arg = explode(',', $arguments);
            foreach ($arg as $ar) {
                if ($query != "") $query .= " UNION ";
                $query .= "SELECT * FROM `users` WHERE `type` = '0' AND `job_type` LIKE '%$ar%'";
            }
            return DB::select(DB::raw($query));
        }
    }
}
