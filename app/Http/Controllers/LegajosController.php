<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LegajosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
   public function getBuscar(){
      return view('legajos.buscar');
   } 
   public function postBuscar(){
     
       return "joder";
    }
  
}
