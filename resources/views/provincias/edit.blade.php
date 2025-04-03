@extends('adminlte::page')

@section('title', 'Editar Provincia')

@section('content_header')
    <h1>Editar Provincia</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('provincias.update', $provincia) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre de la Provincia</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $provincia->nombre }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('provincias.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
