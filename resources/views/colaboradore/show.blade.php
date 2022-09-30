@extends('layouts.app')

@section('template_title')
    {{ $colaboradore->name ?? 'Show Colaboradore' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Colaboradore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('colaboradores.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $colaboradore->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $colaboradore->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $colaboradore->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $colaboradore->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Sucursal :</strong>
                            {{ $colaboradore->sucursal_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
