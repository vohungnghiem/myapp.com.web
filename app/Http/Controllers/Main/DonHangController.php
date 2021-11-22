<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DonHangController extends Controller
{
    public function index() {
        $donhang = collect();
        return view('main.donhang',compact('donhang'));
    }
}
