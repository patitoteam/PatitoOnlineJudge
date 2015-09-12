<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\tag;
use App\problemhastag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tag=Tag::all();

        return view('tags.index')->withTag($tag);
    }

    /**
     * Show the form for creating a new resource.
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
        $problems=DB::table('problemhastags')
            ->join('tags','tags.id','=','problemhastags.tag_id')
            ->join('problems','problems.id','=','problemhastags.problem_id')
            ->where('tags.name','=',$id)
            ->select('problems.name as name','problems.id as id', 'tags.name as tag')
            ->paginate(3);
        $hastags=problemhastag::all();
        $tag =tag::all();
        //return view('tags.show')->withProblems($problems)->withTag($id);
        return view('problems.index')->withProblems($problems)->withtaganame($id)->withhastags($hastags)->withtag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

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
