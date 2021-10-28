@extends('adminlte::page')

@section('title', 'Editar cliente')

@section('content_header')
    <h1>EDITAR CLIENTE</h1>
@stop

@section('content')
	@if(session('info'))
		<div class="alert alert-success">
			<strong>{{ session('info') }}</strong>
		</div>
	@endif
    <div class="card">
		<div class="card-body">
			{!! Form::model($cliente, ['route' => ['admin.clientes.update',$cliente], 'method' => 'put']) !!}

				<div class="form-group">
					{!! Form::label('name','Nombre') !!}
					{!! Form::text('name',null, ['class' => 'form-control','placeholder' => 'Ingrese el nombre del cliente']) !!}
					@error('name')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					{!! Form::label('email','Correo') !!}
					{!! Form::text('email',null, ['class' => 'form-control','placeholder' => 'Ingrese el email del cliente']) !!}
					@error('email')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					{!! Form::label('phone','Teléfono') !!}
					{!! Form::text('phone',null, ['class' => 'form-control','placeholder' => 'Ingrese el Teléfono']) !!}
					@error('phone')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					{!! Form::label('address','Dirección') !!}
					{!! Form::text('address',null, ['class' => 'form-control','placeholder' => 'Ingrese la Dirección']) !!}
					@error('address')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				
				{!! Form::submit('Editar cliente', ['class' => 'btn btn-primary mt-2']) !!}
			{!! Form::close() !!}
		</div>
	</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @livewireScripts
@stop
