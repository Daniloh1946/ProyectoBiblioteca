@extends('layouts.app')

@section('template_title')
    {{ $revista->name ?? 'Show Revista' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Revista</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('revistas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $revista->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Id:</strong>
                            {{ $revista->tipo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $revista->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Num Paginas:</strong>
                            {{ $revista->num_paginas }}
                        </div>
                        <div class="form-group">
                            <strong>Num Ejemplares:</strong>
                            {{ $revista->num_ejemplares }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
