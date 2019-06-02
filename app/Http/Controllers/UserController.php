<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use ConfigPage;

use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index',['users' => User::paginate(ConfigPage::getValue('cantidad_por_pag'))]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate_u($request, false);

        if ($validator->fails()) {
            return redirect("users/create")
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->password = bcrypt($request->password);
        $user->activo = $request->activo ? 1 : 0;
        $user->save();

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.create', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = $this->validate_u($request, true);

        if ($validator->fails()) {
            return redirect("users/$user->id/edit")
                ->withErrors($validator)
                ->withInput();
        }

        $user->email = $request->email;
        $user->name = $request->name;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->activo = $request->activo ? 1 : 0;
        $user->save();

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->id == 1){
            return redirect('/users/1');
        } else {
            User::findOrFail($user->id)->delete();
            return redirect('/users');
        }
    }

    public function validate_u(Request $request, $edit)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email' . ($edit ? '' : '|unique:users'),
            'name' => 'required|string' . ($edit ? '' : '|unique:users'),
            'password' => $edit ? 'required' : '',]
        );

        return $validator;
    }
}
