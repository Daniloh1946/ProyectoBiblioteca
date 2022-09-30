@extends('layouts.app')

@section('template_title')
    Revista
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Revista') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('revistas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Titulo</th>
										<th>Tipo De Revistas</th>
										<th>Fecha</th>
										<th>Num Paginas</th>
										<th>Num Ejemplares</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($revistas as $revista)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $revista->titulo }}</td>
											<td>{{ $revista->tipo }}</td>
											<td>{{ $revista->fecha }}</td>
											<td>{{ $revista->num_paginas }}</td>
											<td>{{ $revista->num_ejemplares }}</td>

                                            <td>
                                                <form action="{{ route('revistas.destroy',$revista->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('revistas.show',$revista->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('revistas.edit',$revista->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $revistas->links() !!}
            </div>
        </div>
    </div>
@endsection
