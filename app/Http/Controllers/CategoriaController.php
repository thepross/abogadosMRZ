<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Models\Categoria;
use App\Models\Contador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoriaController extends Controller
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
        $categorias = DB::table('categorias')->where('disabled', 0)->orderBy('id', 'asc')->get();
        return view('categorias.index', compact('categorias', 'cont'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inventarios = DB::table('inventarios')->where('disabled', 0)->get();
        return view('categorias.create', compact('inventarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_inventario' => 'required',
        ],[
            'id_inventario.required' => 'El inventario es requerido.'
        ]);
        $categoria = new Categoria($request->all());
        if ($categoria->save()) {
            Session::put('success', 'Categoria registrada correctamente.');
        } else {
            Session::put('danger', 'Error al registrar la categoria.');
        }
        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categoria::find($id);
        $inventarios = DB::table('inventarios')->where('disabled', 0)->get();
        return view('categorias.edit', compact('categoria', 'inventarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->id_inventario = $request->id_inventario;
        $categoria->timestamps = false;
        if ($categoria->save()) {
            Session::put('success', 'Categoria modificado correctamente.');
        } else {
            Session::put('danger', 'Error al modificar la categoria.');
        }
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->disabled = 1;
        if ($categoria->save()) {
            Session::put('success', 'Categoria eliminada correctamente.');
        } else {
            Session::put('danger', 'Error al eliminar una Categoria.');
        }
        return redirect()->route('categorias.index');
    }
}
