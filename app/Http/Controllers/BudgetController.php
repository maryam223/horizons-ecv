<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    public function index()
    {
        $init = DB::select('select * from budget where user_id = :id', ['id' => Auth::id()]);
        if($init == null){
            DB::insert('insert into budget (amount, user_id) values (?, ?)', [0.00, Auth::id()]);
        }

        $data = DB::table('depenses')
        ->where('user_id', 'like', Auth::id())
        ->get();

        $budget = DB::table('budget')
        ->where('user_id', 'like', Auth::id())
        ->get();

        return view('budget', compact('data'), compact('budget'));
    }

    public function store(Request $request)
    {
        
        $title = $request->input('title');
        $amount_depense = $request->input('amount_depense');
        
        $data=array('title'=>$title,"amount_depense"=>$amount_depense,'user_id'=> Auth::id());
        DB::table('depenses')->insert($data);

        DB::update('update budget set amount = amount + ? where user_id = ?', [$amount_depense, Auth::id()]);

        return redirect()->back();
    }
}
