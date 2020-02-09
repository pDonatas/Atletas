<?php

namespace App\Http\Services;

use App\news;
use Illuminate\Support\Facades\DB;

class NewsService
{
    public function feature()
    {
        $news = DB::table('news')->where('submited', true)->orderBy('id', 'DESC')->limit(6)->get();
        return $news;
    }

    public function category($cat)
    {
        $category = DB::table('categories')->where('id', $cat)->get();
        return $category;
    }

    public function all()
    {
        return News::submited();
    }
}
