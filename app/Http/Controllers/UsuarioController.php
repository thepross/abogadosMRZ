<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Models\Contador;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;

class UsuarioController extends Controller
{
    public function __construct() {
        $this->middleware([AdminMiddleware::class])->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cont = Contador::find(1);
        $cont->cant++;
        $cont->save();
        $users = DB::table('users')->where('disabled', 0)->orderBy('id', 'asc')->get();
        return view('usuarios.index', compact('users', 'cont'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($user) {
            Session::put('success', 'Usuario agregado correctamente.');
        } else {
            Session::put('danger', 'Error al agregar un usuario.');
        }
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('usuarios.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::find($id);
        $user->rol = $request->rol;
        $user->timestamps = false;
        if ($user->save()) {
            Session::put('success', 'Usuario modificado correctamente.');
        } else {
            Session::put('danger', 'Error al modificar un usuario.');
        }
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->disabled = 1;
        if ($user->save()) {
            Session::put('success', 'Usuario eliminado correctamente.');
        } else {
            Session::put('danger', 'Error al eliminar el usuario.');
        }
        return redirect()->route('usuarios.index');
    }
}
