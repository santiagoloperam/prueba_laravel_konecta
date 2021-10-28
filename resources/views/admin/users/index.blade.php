@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>USUARIOS</h1>
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @livewireScripts
@stop
