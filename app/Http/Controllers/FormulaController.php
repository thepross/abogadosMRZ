<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Models\Contador;
use App\Models\Formula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FormulaController extends Controller
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
        $formulas = DB::table('formulas')->where('disabled', 0)->orderBy('id', 'asc')->get();
        return view('formulas.index', compact('formulas', 'cont'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formulas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formula = new Formula($request->all());
        $formula->id_user = Auth::user()->id;
        if ($formula->save()) {
            Session::put('success', 'Formula registrada correctamente.');
        } else {
            Session::put('danger', 'Error al registrar la Formula.');
        }
        return redirect()->route('formulas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $formula = Formula::find($id);
        return view('formulas.show', compact('formula'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $formula = Formula::find($id);
        return view('formulas.edit', compact('formula'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $formula = Formula::find($id);
        $formula->nombre = $request->nombre;
        $formula->descripcion = $request->descripcion;
        $formula->fecha = $request->fecha;
        $formula->timestamps = false;
        if ($formula->save()) {
            Session::put('success', 'Formula modificada correctamente.');
        } else {
            Session::put('danger', 'Error al modificar la formula.');
        }
        return redirect()->route('formulas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $formula = Formula::findOrFail($id);
        $formula->disabled = 1;
        if ($formula->save()) {
            Session::put('success', 'Formula eliminada correctamente.');
        } else {
            Session::put('danger', 'Error al eliminar la formula.');
        }
        return redirect()->route('formulas.index');
    }
}
