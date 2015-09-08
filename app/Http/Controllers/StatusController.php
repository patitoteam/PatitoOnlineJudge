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
      $status=Status::all();
      return view('status.status')->with('status',$status);
    }
    public function postindex(Request $request)
    {
        //responder XF  
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
