<?php

namespace App\Http\Controllers;

use App\User;
use Spatie\Permission\Models\Role;
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
    public function index(Request $request)
    {
        if($request->get('search')) {
            $users = User::activo(($request->get('active') == 'on') ? 1:0)
                ->username($request->get('username'))
                ->paginate(ConfigPage::getValue('cantidad_por_pag'));
        } else { $users = User::paginate(ConfigPage::getValue('cantidad_por_pag'));}

        return view('users.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', ['todosLosRoles' => Role::all(), 'roles' => []]);
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
        foreach($request->roles as $rol) {
            $user->assignRole($rol);
        }
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
        return view('users.show', ['user' => $user, 'roles' => $user->getRoleNames()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.create', ['user' => $user, 'todosLosRoles' => Role::all(), 'roles' => $user->getRoleNames()->toArray()]);
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
        foreach($user->getRoleNames() as $r) {
            $user->removeRole($r);
        }
        foreach($request->roles as $rol) {
            $user->assignRole($rol);
        }
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
            'password' => $edit ? '' : 'required',]
        );

        return $validator;
    }
}
