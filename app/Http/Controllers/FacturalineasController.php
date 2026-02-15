<?php

namespace App\Http\Controllers;

use App\Models\facturalineas;
use App\Models\facturas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturalineasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $buscar = trim($request->get('buscar'));
        $facturalineas = DB::table('facturalineas')
                            ->select('*')
                            ->where('id', 'LIKE', '%' . $buscar . '%')
                            ->orWhere('descripcion', 'LIKE', '%' . $buscar . '%')
                            ->orderBy('id', 'asc')
                            ->paginate(10);

        return view('facturalineas.index', compact('facturalineas', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $facturas = facturas::all();

        return view('facturalineas.create', compact('facturas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datos = $request->except('_token');

        facturalineas::insert($datos);

        return redirect('facturalineas')->with('mensaje', 'Línea de factura creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(facturalineas $facturalineas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $facturas = facturas::all();
        $facturalinea = facturalineas::findOrFail($id);

        return view('facturalineas.edit', compact('facturalinea', 'facturas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datos = $request->except(['_token', '_method']);
        
        facturalineas::where('id', '=', $id)->update($datos);
        
        return redirect('facturalineas')->with('mensaje', 'Línea de factura actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        facturalineas::destroy($id);

        return redirect('facturalineas')->with('mensaje', 'Línea de factura borrada exitosamente');
    }
}
