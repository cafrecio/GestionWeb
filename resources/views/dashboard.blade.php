@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">

        {{-- Provincias --}}
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4>Provincias</h4>
                    <p>Configuración General</p>
                </div>
                <div class="icon">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <a href="{{ route('configuracion.provincias.index') }}" class="small-box-footer">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Zonas --}}
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h4>Zonas</h4>
                    <p>Configuración General</p>
                </div>
                <div class="icon">
                    <i class="fas fa-map"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Localidades --}}
        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h4>Localidades</h4>
                    <p>Configuración General</p>
                </div>
                <div class="icon">
                    <i class="fas fa-city"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>
</div>
@endsection

