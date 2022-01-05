<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class MainController extends Controller
{
    public function home() {
        $posts = DB::table('vhn_posts')
            ->select(
                'vhn_posts.*',
                DB::raw("GROUP_CONCAT(DISTINCT vhn_posts.id_category,'__',vhn_posts.slug,'__',vhn_posts.name,'__',vhn_posts.caption,'__',vhn_posts.created_at SEPARATOR '||') as seppost"),
                // DB::raw("GROUP_CONCAT(DISTINCT vhn_posts.id,'__',vhn_posts.caption SEPARATOR '||') as sepcap"),
            )
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            ->get();
            // dd($posts);
        $categories = DB::table('vhn_categories')->get();
        return view('main.home',compact('posts','categories'));
    }
    public function category() {
        return view('main.category');
    }
    public function post() {
        return view('main.post');
    }

}
