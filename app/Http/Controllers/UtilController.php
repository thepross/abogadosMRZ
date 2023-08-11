<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Categoria;
use App\Models\Contador;
use App\Models\Formula;
use App\Models\Inventario;
use App\Models\Seguimiento;
use App\Models\Tarea;
use App\Models\User;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UtilController extends Controller
{
    public function updateestilo(Request $request)
    {
        try {
            $estilo = $request->input('estilo');
            $id = Auth::user()->id;
            $courier = User::findOrFail($id);
            $courier->estilo = $estilo;

            $courier->save();
            $request->session()->put('sidebar', $estilo);
            $request->session()->put('background', $estilo);
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
        return response('ok estilo', 200);
    }

    public function updatemodo(Request $request)
    {
        try {
            $modo = $request->input('modo');
            $id = Auth::user()->id;
            $courier = User::findOrFail($id);
            $courier->modo = $modo;

            $courier->save();
            $request->session()->put('modo', $modo);
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
        return response('ok modo', 200);
    }

    public function updatefuente(Request $request)
    {
        try {
            $fuente = $request->input('fuente');
            $id = Auth::user()->id;
            $courier = User::findOrFail($id);
            $courier->fuente = $fuente;

            $courier->save();
            $request->session()->put('fuente', $fuente);
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
        return response('ok fuente', 200);
    }

    public function compareHora() {
        $tiempo = Carbon::now();
        echo $tiempo->toTimeString();
    }

    public function buscar(Request $request)
    {
        $buscar = strtolower($request->input('buscar'));
        $posts = Caso::query()
            ->where('involucrados', 'iLIKE', "%{$buscar}%")
            ->orWhere('autoridad', 'iLIKE', "%{$buscar}%")
            ->orWhere('detalle', 'iLIKE', "%{$buscar}%")
            ->get();
        $posts2 = Seguimiento::query()
            ->where('descripcion', 'iLIKE', "LOWER(%{$buscar}%")
            ->orWhere('responsable', 'iLIKE', "%{$buscar}%")
            ->get();

        return view('buscar.index', compact('posts', 'posts2', 'buscar'));
    }

    public function stats() {

    }
    
    public function unauthorized()
    {
        $mensaje = "Usuario no autorizado.";
        return view('buscar.unauthorized', compact('mensaje'));
    }

    public function reportes() {
        $contadores = DB::table('contadors')->orderBy('id')->get();
        return view('reportes.index', compact('contadores'));
    }

    public function report(Request $request)
    {
        $table = $request->input('table');

        if ($table == "users") {
            $datos = DB::table('users')->get();
            // share data to view
            view()->share('users', $datos);
            $modelo = new User();
            $atributos = $modelo->getFillable();
            $pdf = PDF::loadView('myPDF', compact('datos', 'atributos', 'table'));
            
            // download PDF file with download method
            return $pdf->stream('report_file_'. time() .'.pdf', array('Attachment' => 0));
        } else if ($table == "casos") {
            $datos = DB::table('casos')->get();
            // share data to view
            view()->share('casos', $datos);
            $modelo = new Caso();
            $atributos = $modelo->getFillable();
            $pdf = PDF::loadView('myPDF', compact('datos', 'atributos', 'table'));
            
            // download PDF file with download method
            return $pdf->stream('report_file_'. time() .'.pdf', array('Attachment' => 0));
        } else if ($table == "seguimientos") {
            $datos = DB::table('seguimientos')->get();
            // share data to view
            view()->share('seguimientos', $datos);
            $modelo = new Seguimiento();
            $atributos = $modelo->getFillable();
            $pdf = PDF::loadView('myPDF', compact('datos', 'atributos', 'table'));
            
            // download PDF file with download method
            return $pdf->stream('report_file_'. time() .'.pdf', array('Attachment' => 0));
        } else if ($table == "categorias") {
            $datos = DB::table('categorias')->get();
            // share data to view
            view()->share('categorias', $datos);
            $modelo = new Categoria();
            $atributos = $modelo->getFillable();
            $pdf = PDF::loadView('myPDF', compact('datos', 'atributos', 'table'));
            
            // download PDF file with download method
            return $pdf->stream('report_file_'. time() .'.pdf', array('Attachment' => 0));
        } else if ($table == "inventarios") {
            $datos = DB::table('inventarios')->get();
            // share data to view
            view()->share('inventarios', $datos);
            $modelo = new Inventario();
            $atributos = $modelo->getFillable();
            $pdf = PDF::loadView('myPDF', compact('datos', 'atributos', 'table'));
            
            // download PDF file with download method
            return $pdf->stream('report_file_'. time() .'.pdf', array('Attachment' => 0));
        } else if ($table == "tareas") {
            $datos = DB::table('tareas')->get();
            // share data to view
            view()->share('tareas', $datos);
            $modelo = new Tarea();
            $atributos = $modelo->getFillable();
            $pdf = PDF::loadView('myPDF', compact('datos', 'atributos', 'table'));
            
            // download PDF file with download method
            return $pdf->stream('report_file_'. time() .'.pdf', array('Attachment' => 0));
        } else if ($table == "formulas") {
            $datos = DB::table('formulas')->get();
            // share data to view
            view()->share('formulas', $datos);
            $modelo = new Formula();
            $atributos = $modelo->getFillable();
            $pdf = PDF::loadView('myPDF', compact('datos', 'atributos', 'table'));
            
            // download PDF file with download method
            return $pdf->stream('report_file_'. time() .'.pdf', array('Attachment' => 0));
        } else if ($table == "formulas") {
            $datos = DB::table('formulas')->get();
            // share data to view
            view()->share('formulas', $datos);
            $modelo = new Formula();
            $atributos = $modelo->getFillable();
            $pdf = PDF::loadView('myPDF', compact('datos', 'atributos', 'table'));
            
            // download PDF file with download method
            return $pdf->stream('report_file_'. time() .'.pdf', array('Attachment' => 0));
        }

        // if ($table == "ambientes") {
        //     $datos = DB::table('ambientes')->get();
        //     // share data to view
        //     view()->share('ambientes',$datos);
        //     $modelo = new Ambiente();
        //     $atributos = $modelo->getFillable();
        //     $pdf = PDF::loadView('buscar.plantilla', compact('datos', 'atributos', 'table'));

        //     // download PDF file with download method
        //     return $pdf->stream('report_file_'. time() .'.pdf', array('Attachment' => 0));

        // } else if ($table == "detalles") {

        //     $datos = DB::table('servicios')->get();
        //     // share data to view
        //     view()->share('servicios',$datos);
        //     $modelo = new Servicio();
        //     $atributos = $modelo->getFillable();
        //     $pdf = PDF::loadView('buscar.plantilla', compact('datos', 'atributos', 'table'));

        //     // download PDF file with download method
        //     return $pdf->stream('report_file_'. time() .'.pdf', array('Attachment'=>0));

        // } else if ($table == "inmuebles") {

        //     $datos = DB::table('inmuebles')->get();
        //     // share data to view
        //     view()->share('inmuebles',$datos);
        //     $modelo = new Inmueble();
        //     $atributos = $modelo->getFillable();
        //     $pdf = PDF::loadView('buscar.plantilla', compact('datos', 'atributos', 'table'));

        //     // download PDF file with download method
        //     return $pdf->stream('report_file_'. time() .'.pdf', array('Attachment'=>0));

        // } else if ($table == "mensajes") {

        //     $datos = DB::table('mensajes')->get();
        //     // share data to view
        //     view()->share('mensajes',$datos);
        //     $modelo = new Mensaje();
        //     $atributos = $modelo->getFillable();
        //     $pdf = PDF::loadView('buscar.plantilla', compact('datos', 'atributos', 'table'));

        //     // download PDF file with download method
        //     return $pdf->stream('report_file_'. time() .'.pdf', array('Attachment'=>0));

        // } else if ($table == "pagos") {

        //     $datos = DB::table('pagos')->get();
        //     // share data to view
        //     view()->share('pagos',$datos);
        //     $modelo = new Pago();
        //     $atributos = $modelo->getFillable();
        //     $pdf = PDF::loadView('buscar.plantilla', compact('datos', 'atributos', 'table'));

        //     // download PDF file with download method
        //     return $pdf->stream('report_file_'. time() .'.pdf', array('Attachment'=>0));

        // } else if ($table == "servicios") {

        //     $datos = DB::table('servicios')->get();
        //     // share data to view
        //     view()->share('servicios',$datos);
        //     $modelo = new Servicio();
        //     $atributos = $modelo->getFillable();
        //     $pdf = PDF::loadView('buscar.plantilla', compact('datos', 'atributos', 'table'));

        //     // download PDF file with download method
        //     return $pdf->stream('report_file_'. time() .'.pdf', array('Attachment'=>0));

        // } else {
        //     $datos = DB::table('users')->get();
        //     // share data to view
        //     view()->share('users',$datos);
        //     $modelo = new User();
        //     $atributos = $modelo->getFillable();
        //     $pdf = PDF::loadView('buscar.plantilla', compact('datos', 'atributos', 'table'));

        //     // download PDF file with download method
        //     return $pdf->stream('report_file_'. time() .'.pdf', array('Attachment'=>0));
        // }

    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $users = User::get();
  
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 
            
        $pdf = PDF::loadView('myPDF', $data);
     
        return $pdf->download('itsolutionstuff.pdf');
    }

}
