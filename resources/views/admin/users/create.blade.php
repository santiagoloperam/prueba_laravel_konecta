@extends('adminlte::page')

@section('title', 'Crear Empresa')

@section('content_header')
    <h1>CREAR USUARIO</h1>
@stop

@section('content')
	<div class="card">
		
		@if(session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
        @endif

		<div class="card-body">
			{!! Form::open( ['route' => 'admin.users.store']) !!}

				<div class="form-group">
					{!! Form::label('name','Nombre') !!}
					{!! Form::text('name',null, ['class' => 'form-control','placeholder' => 'Ingrese el nombre del usuario']) !!}
					@error('name')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					{!! Form::label('email','Correo') !!}
					{!! Form::email('email',null, ['class' => 'form-control','placeholder' => 'Ingrese el correo del usuario']) !!}
					@error('email')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					{!! Form::label('password','Contraseña') !!}
					<br>
					{!! Form::password('password',null, ['class' => 'form-control','placeholder' => 'Ingrese una contraseña inicial']) !!}
					@error('password')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					{!! Form::password('confirm',null, ['class' => 'form-control','placeholder' => 'Confirme contraseña inicial']) !!}
					@error('confirm')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				
				{!! Form::submit('Agregar usuario', ['class' => 'btn btn-primary mt-2']) !!}
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
