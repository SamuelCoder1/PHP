<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = User::paginate(10);
            return view('users.index', compact('users'));
        } catch (\Exception $e) {
            // si ocurre un error, enviar mensaje a Discord o Slack
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = User::find($id);
            return view('users.show', compact('user'));
        } catch (\Exception $e) {
            // si ocurre un error, enviar mensaje a Discord o Slack
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $user = User::find($id);
            return view('users.edit', compact('user'));

        }catch(\Exception $e){
            // si ocurre un error, enviar mensaje a Discord o Slack
        }
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $user = User::find($id)->update($request->all());
            return redirect()->route('usuarios.index')->with('success', 'Se ha actualizado correctamente');
        } catch (\Exception $e) {
            // si ocurre un error, enviar mensaje a Discord o Slack
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::find($id)->delete();
            return back()->with('success','Se ha eliminado correctamente');

        } catch (\Exception $e) {
            // si ocurre un error, enviar mensaje a Discord o Slack
        }
    }

    public function showWithTrashed(string $id)
    {
        try {
            $user = User::withTrashed()->find($id); 

            return view('users.show', compact('user')); 

        } catch (\Exception $e) {

        }
    }
}
