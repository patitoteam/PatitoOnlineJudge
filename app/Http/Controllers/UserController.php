<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
       // return "Bienbenido a nuestro primer controladator";   
/*        $nombre="Brayan Huber Gonzales Velasquez";
        return view('test.index')->with('nombre',$nombre);*/
        $users=User::all();
        return view('user.index')->with('users',$users);
    }
    public function getusuarios(){
       $users = User::all();
       $names = '';
       foreach($users as $item){
          $names .= "{$item->name} <br />";
       }
       return $names;
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
          $users = new User;
          return view('user.save')->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store()
    {
        //
        $user = new User();
        $user->real_name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->level = Input::get('level');
        $user->active = true;
        $user->save();
        return Redirect('user')->with('notice', 'El usuario ha sido creado correctamente.');
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
         $user = User::find($id);
         return view('user.save')->with('user', $user);
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
         $user = User::find($id);
         $user->real_name = Input::get('real_name');
         $user->email = Input::get('email');
         $user->level = Input::get('level');
         $user->save();
         return Redirect('user')->with('notice', 'El usuario ha sido modificado correctamente.');

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
