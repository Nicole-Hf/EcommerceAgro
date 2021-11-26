<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$users = User::where('name', 'LIKE', '%'. $this->search . '%')
            ->orWhere('email', 'LIKE', '%'. $this->search . '%')->paginate(10);*/
        $users = User::all();
        return view('Users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('Users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::findOrFail($id);
        $datos = $request->only('name', 'email');
        if (trim($request->password) == '') {
            $datos = $request->except('password');
        } else {
            $datos = $request->all();
            $datos['password'] = bcrypt($request->password);
        }
        $user->update($datos);

        return view('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
