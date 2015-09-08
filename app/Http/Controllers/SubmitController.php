<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compileinfo;
use App\Status;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function show($id)
    {
        return view('submit.submit')->with('id',$id);
    }
    public function create()
    {
        return view('status.status');

    }
    public function store(Request $request)
    {
        $status= new Status;
        $status->problem_id=$request->input('problem');
        $status->user_id='aun no';
        $status->time='100';
        $status->memory='100';
        $status->language=$request->input('len');
        $status->source_code=$request->input('editor');
        $status->save();
        $status1=Status::orderBy('solution_id','desc')->first();
        $compile=new Compileinfo;
        $compile->solution_id=$status1->solution_id;
        $compile->save();
        return redirect('status/status');
    }

 
}
