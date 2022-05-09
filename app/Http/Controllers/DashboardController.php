<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data = DB::table('users')
        ->where('id', 'like', Auth::id())
        ->get();

        return view('dashboard', compact('data'));
    }
}
