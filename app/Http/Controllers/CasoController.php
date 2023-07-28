<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Models\Caso;
use App\Models\Contador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CasoController extends Controller
{

    public function __construct() {
        $this->middleware([AdminMiddleware::class])->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cont = Contador::find(9);
        $cont->cant++;
        $cont->save();

        $casos = DB::table('casos')->where('disabled', 0)->orderBy('id', 'asc')->get();
        return view('casos.index', compact('casos', 'cont'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $casos = DB::table('casos')->where('disabled', 0)->get();
        $categorias = DB::table('categorias')->where('disabled', 0)->get();
        return view('casos.create', compact('casos', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_categoria' => 'required',
        ],[
            'id_categoria.required' => 'La categoria es requerida.'
        ]);
        $caso = new Caso($request->all());
        $caso->id_user = Auth::user()->id;
        if ($caso->save()) {
            Session::put('success', 'Caso registrada correctamente.');
        } else {
            Session::put('danger', 'Error al registrar el caso.');
        }
        return redirect()->route('casos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $caso = Caso::find($id);
        return view('casos.show', compact('caso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $caso = Caso::find($id);
        $categorias = DB::table('categorias')->where('disabled', 0)->get();
        return view('casos.edit', compact('caso', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $caso = Caso::find($id);
        $caso->detalle = $request->detalle;
        $caso->fecha = $request->fecha;
        $caso->autoridad = $request->autoridad;
        $caso->involucrados = $request->involucrados;
        $caso->observaciones = $request->observaciones;
        $caso->id_categoria = $request->id_categoria;
        $caso->timestamps = false;
        if ($caso->save()) {
            Session::put('success', 'Caso modificado correctamente.');
        } else {
            Session::put('danger', 'Error al modificar el caso.');
        }
        return redirect()->route('casos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $caso = Caso::findOrFail($id);
        $caso->disabled = 1;
        if ($caso->save()) {
            Session::put('success', 'Caso eliminada correctamente.');
        } else {
            Session::put('danger', 'Error al eliminar el caso.');
        }
        return redirect()->route('casos.index');
    }
}
