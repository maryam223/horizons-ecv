<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Alert;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::Latest()->get();
        return response()->json($event);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
          
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'allDay' => 'required',
            'color' => 'required',
            'textColor' => 'required',
        ]);

        if($validator->failed()){
            Alert::error("Erreur", "Un ou plusieurs champs ont été mal remplis.");
            return redirect()->back();
        }else{
            if(empty($request->event_id)){  
            $title = $request->input('title');
        $start = $request->input('start');
        $end = $request->input('end');
        $allDay = $request->input('allDay');
        $color = $request->input('color');
        $textColor = $request->input('textColor');
        
        $data=array('title'=>$title,"start"=>$start,"end"=>$end,"allDay"=>$allDay,"color"=>$color,"textColor"=>$textColor, 'user_id'=> Auth::id());
        DB::table('events')->insert($data);

        return redirect()->back();
            }else{
                Event::where('id', $request->event_id)->update([
                    'title'=>$request->title,
                    'start'=>$request->start,
                    'end'=>$request->end,
                    'allDay'=>$request->allDay,
                    'color'=>$request->color,
                    'textColor'=>$request->textColor
                ]);
                Alert::success('Mise à jour', 'Votre évenement a bien été mis à jour');
                return redirect()->back();
            }
        }
        }catch(\Exception $e){
            Alert::error("Erreur", $e->getMessage());
            return redirect()->back();
        }
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
