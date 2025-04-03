@extends('adminlte::page')

@section('title', 'Nueva Provincia')

@section('content_header')
    <h1>Crear Nueva Provincia</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('provincias.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre de la Provincia</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('provincias.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
