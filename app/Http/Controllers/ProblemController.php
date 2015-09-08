<?php

namespace App\Http\Controllers;


use DB;
use App\problem;
use App\problemhastag;
use App\tag;
use Illuminate\Http\Request;
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
        $hasTags=problemhastag::all();
        $tag=tag::all();

        return view('problems.index', ['problems' => $problems,'hastags'=>$hasTags, 'tag'=>$tag]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create()
    {
        $tag=tag::all();
        return view('problems/create')->withtags($tag);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

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
        foreach(explode(',', $request->input('tags2')) as $tag_id){
            DB::table('problemhastags')->insert(
                ['problem_id' => $problem->id, 'tag_id' => $tag_id]
            );
        }
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
        $tags=tag::all();
        return view('problems.edit')->withProblem(Problem::findOrFail($id))->withtags($tags);
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
        $problem = Problem::findOrFail($id);
        $problem->name=$request->name;
        $problem->save();
        foreach(explode(',', $request->input('tags2')) as $tag_id){
            DB::table('problemhastags')->insert(
                ['problem_id' => $problem->id, 'tag_id' => $tag_id]
            );
        }
        return view('problems.show',['problem' => Problem::findOrFail($id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $problem= Problem::findOrFail($id);
        $problem->delete();
        return redirect()->route('problems.index');
    }
}

