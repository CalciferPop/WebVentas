@extends('layouts.admin')

@section('contenido')

    <h2>Usuarios</h2>
    <div class="panel panel-default">
        <div class="panel-heading">Listado de usuarios</div>
        <div class="panel-body">

            <table class="table table-hover" id="datatable" style="width: 100%">
                <thead>
                <tr>
                    <th class="text-center">ID usuario</th>
                    <th class="text-center">Nickname</th>
                    <th class="text-center">Imagen</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Eliminar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($usuarios['usuario'] as $element)
                    <tr>
                        <td class="text-center" >{{$element['id_usuario'] }} </td>
                        <td class="text-center" >{{$element['nickname'] }} </td>
                        <td class="text-center"><img src="/images/genero.jpg" class="img-thumbnail" alt="Rol" width="35" height="35">
                        </td>
                        <td class="text-center"><button type="button" class="btn btn-success" ><i class='fa fa-edit fa-fw'></i>Editar</button></td>
                        <td class="text-center"><button type="button" class="btn btn-danger">Eliminar</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer">Panel Footer</div>
    </div>
@endsection