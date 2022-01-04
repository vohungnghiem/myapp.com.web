<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MainController extends Controller
{
    public function home() {

        return view('main.home');
    }
    public function gioithieu() {
        return view('main.gioithieu');
    }
    public function giayphep() {
        return view('main.giayphep');
    }

}
