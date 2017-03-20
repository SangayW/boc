<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_SKRA_activities;
use App\Tbl_SKRA;
use Session;
use Auth;

class SKRA_activities_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skra_activities=Tbl_SKRA_activities::all();
        return view('skra_activities.index',compact('skra_activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skra_activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validation
         $this->validate($request,[
        'type'=> 'required',
        'skra'=> 'required',
        'skra_activity_name' => 'required',
        ]);
        $skra_activity = new Tbl_SKRA_activities;
        $skra_activity->sport_org_id=$request->type;
        // $skras=Tbl_SKRA::all();
        // foreach($skras as $skra)
        // {
        //     if($skra->sport_org_id==$request->skra)
        //     {
        //          $skra_activity->skra_id=$skra->skra_id;
        //     } 
        // }
        $skra_activity->skra_id=$request->skra;
        $skra_activity->SKRA_activity=$request->skra_activity_name;
        $skra_activity->SKRA_description=$request->description;
        $skra_activity->created_by=Auth::user()->id;
        $skra_activity->save();
        Session::flash('success', 'SKRA has been created successfully');
        
        return redirect()->route('skra_activities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            //$info = Tbl_SKRA::find($id);
            return response()->json($id);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skras_edit=Tbl_SKRA_activities::findOrFail($id);
        return view('skra_activities.edit',compact('skras_edit'));
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
