<?php

namespace App\Http\Controllers;


use DB;
use File;
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
            'time_limit'=>'required',
            'memory_limit'=>'required',
            'name' => 'required',
            'description' => 'required',
            'input' => 'required',
            'output' => 'required',
            'sampleIn' => 'required',
            'sampleOut' => 'required',
            'tags'=>'required',
            'testIn'=>'required',
            'testOut'=>'required'
        ]);
        $problem=new Problem();
        $problem->name=$request->input('name');
        $problem->description=$request->input('description');
        $problem->input=$request->input('input');
        $problem->output=$request->input('output');
        $problem->sample_input=$request->input('sampleIn');
        $problem->sample_output=$request->input('sampleOut');
        $problem->time_limit=$request->input('time_limit');
        $problem->memory_limit=$request->input('memory_limit');
        $problem->save();
        $problemFolder=public_path().'/'.$problem->id;
        File::makeDirectory($problemFolder);
        File::put($problemFolder.'/sample.in',$problem->sample_input);
        File::put($problemFolder.'/sample.out',$problem->sample_output);

        $testIn=$request->file('testIn');
        $testIn->move($problemFolder,'test.in');
        $testOut=$request->file('testOut');
        $testOut->move($problemFolder,'test.out');

        /*
        $inputFiles = $problem->id;
        $inputFilesFolder = public_path() . '/' . $inputFiles;
        $outputFiles = $problem->id;
        $outputFilesFolder = public_path() . '/' . $outputFiles;

        $fileinput=$request->file('inputfile');
        $filenameInput='sample.in';
        $fileinput->move($inputFilesFolder, $filenameInput);
        File::put($inputFilesFolder.'/samplei.in','John DoeIN');
        $fileoutput=$request->file('outputfile');
        $filenameOut=time().'.'.$fileoutput->getClientOriginalExtension();
        $filenameOut='test.in';
        $fileoutput->move($outputFilesFolder, $filenameOut);
        File::put($outputFilesFolder.'/sampleo.out','John DoeOut');
        */

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
        $hasTags=problemhastag::all();

        return view('problems.edit')->withProblem(Problem::findOrFail($id))->withtags($tags)->withhastags($hasTags);
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

