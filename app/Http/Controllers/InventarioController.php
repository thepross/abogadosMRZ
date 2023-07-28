<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Models\Contador;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class InventarioController extends Controller
{
    public function __construct() {
        $this->middleware([AdminMiddleware::class])->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cont = Contador::find(3);
        $cont->cant++;
        $cont->save();
        $inventarios = DB::table('inventarios')->where('disabled', 0)->orderBy('id', 'asc')->get();
        return view('inventarios.index', compact('inventarios', 'cont'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inventario = new Inventario($request->all());
        if ($inventario->save()) {
            Session::put('success', 'Inventario registrado correctamente.');
        } else {
            Session::put('danger', 'Error al registrar el inventario.');
        }
        return redirect()->route('inventarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inventario = Inventario::find($id);
        return view('inventarios.show', compact('inventario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inventario = Inventario::find($id);
        return view('inventarios.edit', compact('inventario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inventario = Inventario::find($id);
        $inventario->nombre = $request->nombre;
        $inventario->ubicacion = $request->ubicacion;
        $inventario->capacidad = $request->capacidad;
        $inventario->timestamps = false;
        if ($inventario->save()) {
            Session::put('success', 'Inventario modificado correctamente.');
        } else {
            Session::put('danger', 'Error al modificar el inventario.');
        }
        return redirect()->route('inventarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventario = Inventario::findOrFail($id);
        $inventario->disabled = 1;
        if ($inventario->save()) {
            Session::put('success', 'Inventario eliminada correctamente.');
        } else {
            Session::put('danger', 'Error al eliminar un inventario.');
        }
        return redirect()->route('inventarios.index');
    }
}
