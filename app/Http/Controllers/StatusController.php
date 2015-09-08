<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Status;
class StatusController extends Controller
{
    /*
        show a list where will be the status problems 

    */
  /*  public function viewstatus(){
        $status=new Status;
        //$viewmodel=$status->get("solution_id").$status->get("problem_id").$status->get("user_id");
        return view('walcome',['solution'=>$status]);
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    
    public function index()
    {
      $status=Status::all();
     return view('status.index')->with('status',$status);
    }

    /**
     * Show the form for creating a new resource.ss
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
