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
            ->leftJoin('vhn_categories','vhn_categories.id','=','vhn_posts.id_category')
            ->select(
                'vhn_posts.created_at',
                DB::raw("GROUP_CONCAT(DISTINCT vhn_categories.name,'__',vhn_categories.slug,'__',vhn_posts.slug,'__',vhn_posts.name,'__',vhn_posts.caption,'__',DATE_FORMAT(vhn_posts.created_at, '%h:%i %d-%m-%Y') SEPARATOR '||') as seppost"),
            )
            ->groupBy(DB::raw("DATE_FORMAT(vhn_posts.created_at, '%Y-%m-%d')"))
            ->orderBy('vhn_posts.created_at','desc')
            ->skip(0)->take(1)->get();
        $categories = DB::table('vhn_categories')->get();
        return view('main.home',compact('posts','categories'));
    }
    public function getLoadmore()
    {
        $posts = DB::table('vhn_posts')
        ->leftJoin('vhn_categories','vhn_categories.id','=','vhn_posts.id_category')
        ->select(
            DB::raw('DATE_FORMAT(vhn_posts.created_at, "%d-%m-%Y") as created_at'),
            DB::raw("GROUP_CONCAT(DISTINCT vhn_categories.name,'__',vhn_categories.slug,'__',vhn_posts.slug,'__',vhn_posts.name,'__',vhn_posts.caption,'__',DATE_FORMAT(vhn_posts.created_at, '%h:%i %d-%m-%Y') SEPARATOR '||') as seppost"),
        )
        ->groupBy(DB::raw("DATE_FORMAT(vhn_posts.created_at, '%Y-%m-%d')"))
        ->orderBy('vhn_posts.created_at','desc')
        ->paginate(1);
        return json_encode($posts);
    }
    public function muc($slug) {
        return 'muc';
    }
    public function expend($slug) {
        // return $slug;
        $cat = DB::table('vhn_categories')->where('slug',$slug)->first();
        return $cat->id_parent;
    }
    public function category() {
        return view('main.category');
    }
    public function post() {
        return view('main.post');
    }
}
