<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    public function index($id)
    {
        $init = DB::select('select * from budget where budget_id = :id', ['id' => $id ]);
        if($init == null){
            DB::insert('insert into budget (amount, user_id, budget_id) values (?, ?, ?)', [0.00, Auth::id(), $id]);
        }

        $data = DB::table('depenses')
        ->where('user_id', 'like', Auth::id())
        ->where('budget_id', 'like', $id)
        ->get();

        $budget = DB::table('budget')
        ->where('user_id', 'like', Auth::id())
        ->where('budget_id', 'like', $id)
        ->get();

        $budgetTotal = DB::table('budget_total')
        ->where('user_id', 'like', Auth::id())
        ->where('id', 'like', $id)
        ->get();

        return view('budget', compact('data', 'budget', 'budgetTotal'));
    }

    public function store(Request $request, $id)
    {
        
        $title = $request->input('title');
        $amount_depense = $request->input('amount_depense');

        
        $data=array('title'=>$title,"amount_depense"=>$amount_depense,'user_id'=> Auth::id(),'budget_id'=>$id);
        DB::table('depenses')->insert($data);

        DB::update('update budget set amount = amount + ? where user_id = ? and budget_id = ?', [$amount_depense, Auth::id(), $id]);

        return redirect()->back();
    }
}
