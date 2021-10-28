@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>EDITAR USUARIO</h1>
@stop

@section('content')

	@if(session('info'))
		<div class="alert alert-success">
			<strong>{{ session('info') }}</strong>
		</div>
	@endif

	<div class="card">
		<div class="card-body">
			{!! Form::model($user, ['route' => ['admin.users.update',$user], 'method' => 'put']) !!}
				<div class="form-group">
					{!! Form::label('name','Nombre') !!}
					{!! Form::text('name',null, ['class' => 'form-control','placeholder' => 'Ingrese el nombre del Usuario']) !!}
					@error('name')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>

				<div class="form-group">
					{!! Form::label('email','Correo') !!}
					{!! Form::text('email',null, ['class' => 'form-control','placeholder' => 'Ingrese el correo del Usuario
					']) !!}
					@error('email')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>

				<label>Rol: </label>
				@foreach($roles as $role)
					<div>
						<label>	
							{!! Form::checkbox('roles[]',$role->id.'',null, ['class' => 'mr-1']) !!}
							{{ $role->name }}
						</label>
					</div>
				@endforeach

				{!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary mt-2']) !!}
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
