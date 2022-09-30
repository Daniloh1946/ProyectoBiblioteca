@extends('layouts.app')

@section('template_title')
    Colaboradore
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Colaboradore') }}
                            </span>

                             <div class="float-right">
                             <a href="{{ route('colaboradores.pdf') }}" class="btn btn-primary btn-sm"  data-placement="left">
                                  {{ __('PDF') }}
                                </a>   
                             <a href="{{ route('colaboradores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre</th>
										<th>Apellidos</th>
										<th>Cedula</th>
										<th>Telefono</th>
										<th>Sucursal Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($colaboradores as $colaboradore)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $colaboradore->nombre }}</td>
											<td>{{ $colaboradore->apellidos }}</td>
											<td>{{ $colaboradore->cedula }}</td>
											<td>{{ $colaboradore->telefono }}</td>
											<td>{{ $colaboradore->sucursal_id }}</td>

                                            <td>
                                                <form action="{{ route('colaboradores.destroy',$colaboradore->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('colaboradores.show',$colaboradore->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('colaboradores.edit',$colaboradore->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $colaboradores->links() !!}
            </div>
        </div>
    </div>
@endsection
