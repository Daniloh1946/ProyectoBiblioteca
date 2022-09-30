@extends('layouts.app')

@section('template_title')
    Sucursale
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Sucursale') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('sucursales.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Direccion</th>
										<th>Ciudad</th>
										<th>Telefono</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sucursales as $sucursale)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $sucursale->nombre }}</td>
											<td>{{ $sucursale->Direccion }}</td>
											<td>{{ $sucursale->ciudad }}</td>
											<td>{{ $sucursale->telefono }}</td>

                                            <td>
                                                <form action="{{ route('sucursales.destroy',$sucursale->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('sucursales.show',$sucursale->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('sucursales.edit',$sucursale->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $sucursales->links() !!}
            </div>
        </div>
    </div>
@endsection
