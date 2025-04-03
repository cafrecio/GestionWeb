@extends('adminlte::page')

@section('title', 'Sistema de Gestión')

@section('content')
    {{ $slot }}
@stop

@section('css')
    @vite(['resources/css/app.css'])
@stop

@section('js')
    @vite(['resources/js/app.js'])
@stop

