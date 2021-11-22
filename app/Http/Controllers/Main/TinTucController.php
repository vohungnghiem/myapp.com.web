<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TinTucController extends Controller
{
    public function dieuduong()
    {
        $tintuc = DB::table('vhn_tintucs')->where([['stt', '=', '1'],['id_loaitintuc','=','2']])->take(6)->orderBy('id','desc')->get();
        $tintucorther = DB::table('vhn_tintucs')->where([['stt', '=', '1'],['id_loaitintuc','=','2']])->skip(6)->take(6)->orderBy('id','desc')->get();
        $tinlienquan = DB::table('vhn_tintucs')->where([['stt', '=', '1'],['id_loaitintuc','=','2']])->orderBy('id','desc')->get();
        return view('main.dieuduong',compact('tintuc','tintucorther','tinlienquan'));
    }
    public function tintuc()
    {
        $tintuc = DB::table('vhn_tintucs')->where([['stt', '=', '1'],['id_loaitintuc','=','1']])->take(6)->orderBy('id','desc')->get();
        $tintucorther = DB::table('vhn_tintucs')->where([['stt', '=', '1'],['id_loaitintuc','=','1']])->skip(6)->take(6)->orderBy('id','desc')->get();
        $tinlienquan = DB::table('vhn_tintucs')->where([['stt', '=', '1'],['id_loaitintuc','=','1']])->orderBy('id','desc')->get();
        return view('main.tintuc',compact('tintuc','tintucorther','tinlienquan'));
    }
    public function detail($slug){
        $detail = DB::table('vhn_tintucs')->where('slug', '=', $slug)->first();
        $donhang = collect();
        return view('main.detail',compact('detail','donhang'));
    }
}
