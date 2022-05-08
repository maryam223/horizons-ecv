<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\Auth;
use DB;

use App\Models\Document;

class DocumentController extends Controller
{
    public function uploadpage()
    {

        return view('document');
    }

    public function store(request $request)
    {
        $data=new document();

        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets', $filename);
        $data->file=$filename;

        $data->name=$request->name;
        $data->description=$request->description;
        $data->user_id = Auth::id();

        $data->save();

        return redirect()->back();

    }

    public function show()
    {

        $data = DB::table('documents')
                ->where('user_id', 'like', Auth::id())
                ->get();
        return view('showdocument', compact('data'));
    }

    public function download(Request $request,$file)
    {

        return response()->download(public_path('assets/'.$file));
    }

    public function view($id)
    {

        $data=Document::find($id);
        return view('viewdocument', compact('data'));
    }

    public function delete($id)
    {

        $data=Document::find($id);
        $data->delete();
        return redirect()->back();
    }
}
