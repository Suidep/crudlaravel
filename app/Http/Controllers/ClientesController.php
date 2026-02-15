<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

/**
 * Controlador principal para la gestión de clientes.
 * * Se encarga de las operaciones CRUD, incluyendo la búsqueda filtrada
 * y la gestión de la subida y borrado de logotipos.
 */
class ClientesController extends Controller
{
    /**
     * Muestra la lista de clientes con opción de búsqueda.
     *
     * @param \Illuminate\Http\Request $request Objeto de la petición con el parámetro 'buscar'.
     * @return \Illuminate\View\View Vista del índice de clientes con datos paginados.
     */
    public function index(Request $request)
    {
        //
        $buscar = trim($request->get('buscar'));
        $clientes = DB::table('clientes')
                        ->select('*')
                        ->where('nombre', 'LIKE', '%' . $buscar . '%')
                        ->orWhere('email', 'LIKE', '%' . $buscar . '%')
                        ->orderBy('nombre', 'asc')
                        ->paginate(10);

        return view('clientes.index', compact('clientes', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Almacena un nuevo cliente en la base de datos.
     * * Valida los campos obligatorios y gestiona el almacenamiento del archivo de logo
     * en el disco público.
     *
     * @param \Illuminate\Http\Request $request Datos del formulario de creación.
     * @return \Illuminate\Http\RedirectResponse Redirección al listado tras el éxito.
     */
    public function store(Request $request)
    {
        //
        $campos = [
            'nombre' => 'required|string|max:64',
            'direccion' => 'required|string|max:64',
            'email' => 'required|email|max:100',
            'telefono' => 'required|max:11',
            'logo' => 'required|max:50000|mimes:jpg,jpeg,png'
        ];

        $mensajes = [
            'required' => 'El :attribute es requerido.',
            'direccion.required' => 'La :attribute es requerida.'
        ];

        $this->validate($request, $campos, $mensajes);

        $datos = $request->except('_token');

        if ($request->hasFile('logo')){
            $datos['logo'] = $request->file('logo')->store('uploads', 'public');
        }

        Clientes::insert($datos);

        return redirect('clientes');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $cliente = Clientes::findOrFail($id);
        $buscar = "";

        return view('clientes.index', compact('cliente', 'buscar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $cliente = Clientes::findOrFail($id);

        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'nombre' => 'required|string|max:64',
            'direccion' => 'required|string|max:64',
            'email' => 'required|email|max:100',
            'telefono' => 'required|max:11',
        ];

        $mensajes = [
            'required' => 'El :attribute es requerido.',
            'direccion.required' => 'La :attribute es requerida.',
        ];

        if ($request->hasFile('logo')){
            $campos['logo'] = 'required|max:50000|mimes:jpg,jpeg,png';
            $mensajes['logo.required'] = 'El logo es requerido.';
        }

        $this->validate($request, $campos, $mensajes);

        $datos = $request->except(['_token', '_method']);

        if ($request->hasFile('logo')){
            $cliente = Clientes::findOrFail($id);

            if (Storage::delete('public/' . $cliente->logo)){
                $datos['logo'] = $request->file('logo')->store('uploads', 'public');
            }
        }

        Clientes::where('id', '=', $id)->update($datos);

        return redirect('clientes')->with('mensaje', 'Cliente modificado.');
    }

    /**
     * Elimina permanentemente un cliente y su archivo de imagen asociado.
     *
     * @param int $id Identificador del cliente a borrar.
     * @return \Illuminate\Http\RedirectResponse Redirección con mensaje de borrado.
     */
    public function destroy($id)
    {
        //
        $datos = Clientes::findOrFail($id);
        
        if ($datos->logo != ''){
            Storage::delete('public/' . $datos->logo);
        }

        Clientes::destroy($id);

        return redirect('clientes')->with('mensaje', 'Cliente borrado.');
    }
}
