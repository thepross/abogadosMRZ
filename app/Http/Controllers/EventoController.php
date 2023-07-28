<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Models\Contador;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EventoController extends Controller
{
    public function __construct() {
        $this->middleware([AdminMiddleware::class])->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cont = Contador::find(11);
        $cont->cant++;
        $cont->save();
        $eventos = DB::table('eventos')->where('disabled', 0)->orderBy('id', 'asc')->get();
        return view('eventos.index', compact('eventos', 'cont'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $eventos = DB::table('eventos')->where('disabled', 0)->get();
        $seguimientos = DB::table('seguimientos')->where('disabled', 0)->get();
        return view('eventos.create', compact('eventos', 'seguimientos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_seguimiento' => 'required',
        ],[
            'id_seguimiento.required' => 'El seguimiento es requerido.'
        ]);
        $evento = new Evento($request->all());
        $evento->id_user = Auth::user()->id;
        if ($evento->save()) {
            Session::put('success', 'Evento registrado correctamente.');
        } else {
            Session::put('danger', 'Error al registrar el Evento.');
        }
        return redirect()->route('eventos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evento = Evento::find($id);
        return view('eventos.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evento = Evento::find($id);
        $seguimientos = DB::table('seguimientos')->where('disabled', 0)->get();
        return view('eventos.edit', compact('evento', 'seguimientos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $evento = Evento::find($id);
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->responsable = $request->responsable;
        $evento->fecha = $request->fecha;
        $evento->hora = $request->hora;
        $evento->id_seguimiento = $request->id_seguimiento;
        $evento->timestamps = false;
        if ($evento->save()) {
            Session::put('success', 'Evento modificado correctamente.');
        } else {
            Session::put('danger', 'Error al modificar el Evento.');
        }
        return redirect()->route('eventos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evento = Evento::findOrFail($id);
        $evento->disabled = 1;
        if ($evento->save()) {
            Session::put('success', 'Evento eliminado correctamente.');
        } else {
            Session::put('danger', 'Error al eliminar el Evento.');
        }
        return redirect()->route('eventos.index');
    }
}
