<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_SKRA;
use Session;
use Auth;

class SKRAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $skra=Tbl_SKRA::all();
       return view('skra.index',compact('skra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skra.create');
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
        'skra_name' => 'required',
        ]);
        $skra = new Tbl_SKRA;
        $skra->sport_org_id=$request->type;
        $skra->SKRA_name=$request->skra_name;
        $skra->SKRA_description=$request->skra_description;
        $skra->created_by=Auth::user()->id;
        $skra->save();
        Session::flash('success', 'SKRA has been created successfully');
        return redirect()->route('skra.index');
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
            $info = Tbl_SKRA::find($id);
            return response()->json($info);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $skra = Tbl_SKRA::findOrFail($id);
    //     return view('skra.edit',compact('skra'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request ->edit_id;
        $skra = Tbl_SKRA::findOrFail($id);
        $skra->sport_org_id=$request->get('type');
        $skra->SKRA_name=$request->skra_name;
        $skra->SKRA_description=$request->skra_description;
        $skra->save();
       
        return redirect()->route('skra.index')->with('alert-success','Data Has been Updated!');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $skra = Tbl_SKRA::findOrFail($id);
         $skra->status=1;
         $skra->save();
         //$skra->delete();
         return redirect()->route('skra.index')->with('success','Data Has been Udeleted');       
    }
}
