<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compileinfo;
use App\Status;
use App\Run;
use App\Source_code;
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
    public function save(Request $request,$id){
        $status= new Status;
        $status->problem_id=$id;
        $status->user_id='aun no';
        $status->time='100';
        $status->memory='100';
        $leng=$request->input('leng');
        $status->language=$leng;
        //$status->source_code=
        $status->save();
        
        $status=Status::orderby('solution_id','desc')->first();
        $compile=new Compileinfo;
        $compile->solution_id=$status->solution_id;
        $compile->save();
        $code=new Source_code;
        $code->solution_id=$status->solution_id;
        $code->source=$request->input('editor');
        $code->save();

        $code=Source_code::orderby('sourcecode_id','desc')->first();

        $run=new Run;
        $run->solution_id=$status->solution_id;
        $run->problem_id=$id;
        $run->language=$leng;
        $run->sourcecode_id=$code->sourcecode_id;
        $run->save();
        return redirect('status/status');
    }

 
}
