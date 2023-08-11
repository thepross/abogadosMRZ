<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CasocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $casos = DB::table('casos')->where('id_cliente', Auth::user()->id)->where('disabled', 0)->orderBy('id', 'asc')->get();
        return view('casos.indexc', compact('casos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $caso = Caso::find($id);
        $categorias = DB::table('categorias')->where('disabled', 0)->get();
        $clientes = DB::table('users')->where('disabled', 0)->where('rol', 'Cliente')->get();
        return view('casos.editc', compact('caso', 'categorias', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $caso = Caso::find($id);

        if ($request->file('documento') == null) {
            $caso->documento = null;
        } else {
            $time = \Carbon\Carbon::now()->format('His');
            $documento = $request->file('documento');
            $caso->documento = $time . "-" . $documento->getClientOriginalName();
            $destinationPath = 'documentos';
            $documento->move($destinationPath, $caso->documento);
        }

        if ($caso->save()) {
            Session::put('success', 'Caso modificado correctamente.');
        } else {
            Session::put('danger', 'Error al modificar el caso.');
        }
        return redirect()->route('casosc.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
