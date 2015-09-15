<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Status;

class StatusController extends Controller
{
    public function index()
    {
      $status=Status::orderBy('solution_id','desc')->first();
      return view('status.status')->with('item',$status);
    }
    public function postindex(Request $request)
    {
        //responder XF
        $id_sol=$request->input('id_sol');

        $status=Status::where('solution_id',$id_sol)->first();
        $resp=$status->result;
        if ($resp) {
            return response()->json(array('msg' =>$resp));
        }
        
        

    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
