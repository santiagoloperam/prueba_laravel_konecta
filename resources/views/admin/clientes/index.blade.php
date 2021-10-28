@extends('adminlte::page')

@section('title', 'clientes')

@section('content_header')
    <h1>LISTA DE CLIENTES</h1>
@stop

@section('content')
    <div class="card">
        @if(session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
        <div class="card-header">
            <a class="btn btn-secondary" href="{{ route('admin.clientes.create') }}">
                Agregar Cliente
            </a>
        </div>
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<th>ID</th>
                    <th>NOMBRE</th>
                    <th>CORREO</th>
                    <th>TELEFONO</th>
                    <th>DIRECCIÓN</th>
    				<th>VENDEDOR ACTUAL</th>
    				<th colspan="2"></th>
    			</thead>
    			<tbody>
    				@foreach($clientes as $cliente)
    					<tr>
    						<td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->name }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->phone }}</td>
                            <td>{{ $cliente->address }}</td>
    						<td>{{ $cliente->user->name }}</td>
    						<td width="10px">
    							<a href="{{ route('admin.clientes.edit',$cliente) }}" class="btn btn-sm btn-primary">
    								Editar
    							</a>
    						</td>
    						<td width="10px">
    							<form action="{{ route('admin.clientes.destroy',$cliente) }}" method="POST">
                                    @csrf
                                    @method('delete')
    								<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Está seguro de eliminar el registro?')">	Eliminar
    								</button>
    							</form>
    						</td>
    					</tr>
    				@endforeach
    			</tbody>
    		</table>
    	</div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @livewireScripts
@stop
