<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\problem;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $problems = DB::table('problems')->paginate(9);

        return view('problems.problems', ['problems' => $problems]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('problems/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $inputFiles = 'inputFiles/';
        $inputFilesFolder = public_path() . '/' . $inputFiles;
        $outputFiles = 'outputFiles/';
        $outputFilesFolder = public_path() . '/' . $outputFiles;
        $problem=new Problem();
        $fileinput=$request->file('inputfile');
        $filenameInput=time().'.'.$fileinput->getClientOriginalExtension();
        $fileinput->move($inputFilesFolder, $filenameInput);

        $fileoutput=$request->file('outputfile');
        $filenameOut=time().'.'.$fileoutput->getClientOriginalExtension();
        $fileoutput->move($outputFilesFolder, $filenameOut);

        $problem->name=$request->input('title');
        $problem->description=$request->input('description');
        $problem->input=$request->input('input');
        $problem->output=$request->input('output');
        $problem->sample_input=$request->input('inputsample');
        $problem->sample_output=$request->input('outputsample');
        $problem->save();

        return redirect()->action('ProblemController@index');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('problems.show', ['problem' => Problem::findOrFail($id)]);
        //$problem = $this->problem->whereId($id)->first();
        //   return View::make('problems.show', ['problem' => $problem]);
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
