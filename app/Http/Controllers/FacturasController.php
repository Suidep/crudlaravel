<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\facturas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Gestiona la facturación del sistema.
 */
class FacturasController extends Controller
{
    /**
     * Lista las facturas ordenadas por importe de forma ascendente.
     *
     * @param \Illuminate\Http\Request $request Datos para el filtro de búsqueda por ID.
     * @return \Illuminate\View\View Vista con la colección de facturas.
     */
    public function index(Request $request)
    {
        //
        $buscar = trim($request->get('buscar'));
        $facturas = DB::table('facturas')
                        ->select('*')
                        ->where('id', 'LIKE', '%' . $buscar . '%')
                        ->orderBy('importe', 'asc')
                        ->paginate(10);

        return view('facturas.index', compact('facturas', 'buscar'));
    }

    /**
     * Prepara el formulario de creación obteniendo todos los clientes disponibles.
     *
     * @return \Illuminate\View\View Formulario de creación con datos de clientes.
     */
    public function create()
    {
        //
        $clientes = Clientes::all();

        return view('facturas.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datos = $request->except('_token');

        facturas::insert($datos);

        return redirect('facturas')->with('mensaje', 'Factura insertada');
    }

    /**
     * Display the specified resource.
     */
    public function show(facturas $facturas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $factura = facturas::findOrFail($id);
        $clientes = Clientes::all();

        return view('facturas.edit', compact('factura', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, facturas $facturas)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(facturas $facturas)
    {
        //
    }
}
