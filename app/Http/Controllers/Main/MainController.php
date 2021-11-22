<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MainController extends Controller
{
    public function home() {
        $banner = DB::table('vhn_banners')->where('stt', '=', '1')->orderBy('id','asc')->get();
        $gioithieuhome = DB::table('vhn_gioithieuhome')->where([['stt', '=', '1'],['ten','!=','ACM']])->orderBy('id','asc')->get();
        $gioithieuhomefirst= DB::table('vhn_gioithieuhome')->where([['stt', '=', '1'],['ten','=','ACM']])->orderBy('id','asc')->get();
        $muctieu = DB::table('vhn_muctieuhome')->orderBy('id','desc')->get();
        $hosocanchuanbi = DB::table('vhn_hosocanchuanbi')->where('stt', '=', '1')->orderBy('id','asc')->get();
        $camnhanhocvien = DB::table('vhn_camnhanhocvien')->where('stt', '=', '1')->orderBy('id','asc')->get();
        $tintuc = DB::table('vhn_tintucs')->where([['stt', '=', '1'],['id_loaitintuc','=','1']])->take(6)->orderBy('id','desc')->get();
        $tintucorther = DB::table('vhn_tintucs')->where([['stt', '=', '1'],['id_loaitintuc','=','1']])->skip(6)->take(6)->orderBy('id','desc')->get();
        $truonghoc = DB::table('vhn_truonghoc')->where('stt', '=', '1')->orderBy('id','desc')->get();
        $hinhanh = DB::table('vhn_hinhanhs')->where('stt','=','1')->orderBy('id','desc')->get();
        return view('main.home',compact('banner','gioithieuhome','gioithieuhomefirst','muctieu','hosocanchuanbi','camnhanhocvien','tintuc','tintucorther','truonghoc','hinhanh'));
    }
    public function gioithieu() {
        return view('main.gioithieu');
    }
    public function giayphep() {
        return view('main.giayphep');
    }
    public function storeLienHe(Request $request){
        // $item = new Lienhe;
        // $item->hovaten=$request->hovaten;
        // $item->email=$request->email;
        // $item->tieude=$request->tieude;
        // $item->sodienthoai=$request->sodienthoai;
        // $item->noidung=$request->noidung;
        // $item->created_at=$request->created_at;
        // $item->tinhtrang=0;
        // $item->save();
        DB::table('vhn_lienhes')->insert(
            [
                'hovaten' => $request->hovaten,
                'email' => $request->email,
                'tieude' => $request->tieude,
                'sodienthoai' => $request->sodienthoai,
                'noidung' => $request->noidung,
                // 'created_at' => $request->created_at,
                'tinhtrang' => 0
            ]
        );
        return redirect('/')->with('alert','Gửi thành công!');
    }
}
