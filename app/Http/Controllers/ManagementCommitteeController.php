<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_sport_org_management;
use Session;
use Auth;

class ManagementCommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $management=Tbl_sport_org_management::all();
        return view('management_committee.index',compact('management'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management_committee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request,[
        'mg_name'=> 'required',
        'mg_designation' => 'required',
        'mg_phone' => 'required',
        'mg_email' => 'required',
        'mg_mobile' => 'required',
        'mg_appointment' => 'required',
        ]);

        $management = new Tbl_sport_org_management;
        $management->sport_org_id=Session::get('key');
        $management->mg_member_name=$request->mg_name;
        $management->mg_member_designation=$request->mg_designation;
        $management->mg_member_phone=$request->mg_phone;
        $management->mg_member_email=$request->mg_email;
        $management->mg_member_mobile=$request->mg_mobile;
        $management->appointment_date=$request->mg_appointment;
        $management->created_by=Auth::user()->id;
        $management->save();
        Session::flash('success', 'Management committee for sport organization has been created successfully');
        return redirect()->route('management_committee.index');
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
            $info = Tbl_sport_org_management::find($id);
            return response()->json($info);
        }
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //      $management_info = Tbl_sport_org_management::findOrFail($id);
    //     // return to the edit views
    //     return view('management_committee.edit',compact('management_info'));
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
        $management_info = Tbl_sport_org_management::findOrFail($id);
        $management_info->mg_member_name=$request->mg_name;
        $management_info->mg_member_designation=$request->mg_designation;
        $management_info->mg_member_phone=$request->mg_phone;
        $management_info->mg_member_email=$request->mg_email;
        $management_info->mg_member_mobile=$request->mg_mobile;
        $management_info->appointment_date=$request->appointment;
        $management_info->save();
        //return redirect()->route('advisory_board_members.edit',Session::get('key1'))->with('alert-success','Data Has been Updated!');  
        return redirect()->route('management_committee.index')->with('alert-success','Data Has been Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $management = Tbl_sport_org_management::findOrFail($id);
        $management->status=1;
        $management->save();
        return redirect()->route('management_committee.index');
    }
}
