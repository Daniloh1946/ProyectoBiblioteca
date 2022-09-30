
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Mi reporte 
    <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Numero de registro</th>                                        
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
                                            
                                            <td>{{ $colaboradore->id }}</td>
											<td>{{ $colaboradore->nombre }}</td>
											<td>{{ $colaboradore->apellidos }}</td>
											<td>{{ $colaboradore->cedula }}</td>
											<td>{{ $colaboradore->telefono }}</td>
											<td>{{ $colaboradore->sucursal_id }}</td>

                                            <td>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
    
</body>
</html>