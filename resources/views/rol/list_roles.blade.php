@extends('layouts.admin')

@section('contenido')

    <h2>Roles</h2>
    <div class="panel panel-default">
        <div class="panel-heading">Listado de roles</div>
        <div class="panel-body">

            <table class="table table-hover" id="datatable" style="width: 100%">
                <thead>
                <tr>
                    <th class="text-center">Nombre Rol</th>
                    <th class="text-center">Imagen</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles['rol'] as $element)
                    <tr>
                        <td class="text-center" >{{$element['nombre_rol'] }} </td>

                        <td class="text-center"><img src="/images/genero.jpg" class="img-thumbnail" alt="Rol" width="35" height="35">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer">Panel Footer</div>
    </div>
@endsection