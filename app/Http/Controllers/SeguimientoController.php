<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Models\Contador;
use App\Models\Seguimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SeguimientoController extends Controller
{
    public function __construct() {
        $this->middleware([AdminMiddleware::class])->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cont = Contador::find(7);
        $cont->cant++;
        $cont->save();
        $seguimientos = DB::table('seguimientos')->where('disabled', 0)->orderBy('id', 'asc')->get();
        return view('seguimientos.index', compact('seguimientos', 'cont'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $seguimientos = DB::table('seguimientos')->where('disabled', 0)->get();
        $casos = DB::table('casos')->where('disabled', 0)->get();
        return view('seguimientos.create', compact('seguimientos', 'casos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_caso' => 'required',
        ],[
            'id_caso.required' => 'El caso es requerido.'
        ]);
        $seguimiento = new Seguimiento($request->all());
        $seguimiento->id_user = Auth::user()->id;
        if ($seguimiento->save()) {
            Session::put('success', 'Seguimiento registrada correctamente.');
        } else {
            Session::put('danger', 'Error al registrar el Seguimiento.');
        }
        return redirect()->route('seguimientos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $seguimiento = Seguimiento::find($id);
        return view('seguimientos.show', compact('seguimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $seguimiento = Seguimiento::find($id);
        $casos = DB::table('casos')->where('disabled', 0)->get();
        return view('seguimientos.edit', compact('seguimiento', 'casos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $seguimiento = Seguimiento::find($id);
        $seguimiento->descripcion = $request->descripcion;
        $seguimiento->fecha = $request->fecha;
        $seguimiento->responsable = $request->responsable;
        $seguimiento->estado = $request->estado;
        $seguimiento->observaciones = $request->observaciones;
        $seguimiento->acciones = $request->acciones;
        $seguimiento->id_caso = $request->id_caso;
        $seguimiento->timestamps = false;
        if ($seguimiento->save()) {
            Session::put('success', 'Seguimiento modificado correctamente.');
        } else {
            Session::put('danger', 'Error al modificar el seguimiento.');
        }
        return redirect()->route('seguimientos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $seguimiento = Seguimiento::findOrFail($id);
        $seguimiento->disabled = 1;
        if ($seguimiento->save()) {
            Session::put('success', 'Seguimiento eliminado correctamente.');
        } else {
            Session::put('danger', 'Error al eliminar el seguimiento.');
        }
        return redirect()->route('seguimientos.index');
    }
}
