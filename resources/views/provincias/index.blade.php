@extends('adminlte::page')

@section('title', 'Provincias')

@section('content_header')
    <h1>Provincias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('provincias.create') }}" class="btn btn-primary">Agregar Provincia</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($provincias as $provincia)
                        <tr>
                            <td>{{ $provincia->id }}</td>
                            <td>{{ $provincia->nombre }}</td>
                            <td>
                                <a href="{{ route('provincias.edit', $provincia) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('provincias.destroy', $provincia) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
