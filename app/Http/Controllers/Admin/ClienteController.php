<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Cliente;


use Spatie\Permission\Models\Role;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('admin.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:clientes'
        ]);

        //$cliente = Cliente::create($request->all());
        $cliente = new Cliente;
        $cliente->name = $request->get('name');
        $cliente->email = $request->get('email');
        $cliente->phone = $request->get('phone');
        $cliente->address = $request->get('address');
        $cliente->user_id = auth()->user()->id;
        //dd($cliente);
        $cliente->save();

        return redirect()->route('admin.clientes.edit',$cliente)->with('info','Cliente Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)//Esta por el momento no la usamos
    {
        //$users = User::role('Admin')->orderBy('name')->pluck('name', 'id');
        return view('admin.clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Cliente $cliente)
    {
        //$users = User::role('Admin')->orderBy('name')->pluck('name', 'id'); 

        return view('admin.clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\m_responsekeys(conn, identifier)se
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        //$cliente->update($request->all());
        
        $cliente->name = $request->get('name');
        $cliente->email = $request->get('email');
        $cliente->phone = $request->get('phone');
        $cliente->address = $request->get('address');
        $cliente->user_id = auth()->user()->id;
        //dd($cliente);
        $cliente->save();

        return redirect()->route('admin.clientes.edit',$cliente)->with('info','Cliente Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('admin.clientes.index')->with('info','Cliente Eliminado');
    }
}
