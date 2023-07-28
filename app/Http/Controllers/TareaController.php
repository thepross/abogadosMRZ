<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Models\Contador;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TareaController extends Controller
{
    public function __construct() {
        $this->middleware([AdminMiddleware::class])->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cont = Contador::find(5);
        $cont->cant++;
        $cont->save();
        $tareas = DB::table('tareas')->where('disabled', 0)->orderBy('id', 'asc')->get();
        return view('tareas.index', compact('tareas', 'cont'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tarea = new Tarea($request->all());
        $tarea->id_user = Auth::user()->id;
        if ($tarea->save()) {
            Session::put('success', 'Tarea creada correctamente.');
        } else {
            Session::put('danger', 'Error al registrar una tarea.');
        }
        return redirect()->route('tareas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tarea = Tarea::find($id);
        return view('tareas.show', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tarea = Tarea::find($id);
        return view('tareas.edit', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tarea = Tarea::find($id);
        $tarea->descripcion = $request->descripcion;
        $tarea->fecha_inicio = $request->fecha_inicio;
        $tarea->fecha_fin = $request->fecha_fin;
        $tarea->prioridad = $request->prioridad;
        $tarea->estado = $request->estado;
        $tarea->responsable = $request->responsable;
        $tarea->timestamps = false;
        if ($tarea->save()) {
            Session::put('success', 'Tarea modificada correctamente.');
        } else {
            Session::put('danger', 'Error al modificar la tarea.');
        }
        return redirect()->route('tareas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->disabled = 1;
        if ($tarea->save()) {
            Session::put('success', 'Tarea eliminada correctamente.');
        } else {
            Session::put('danger', 'Error al eliminar una tarea.');
        }
        return redirect()->route('tareas.index');
    }
}
