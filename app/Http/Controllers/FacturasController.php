<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\facturas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * Show the form for creating a new resource.
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
