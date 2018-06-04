@extends('layouts.admin')

@section('contenido')

    <h2>Rutas</h2>

    @if(isset($msj))

        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Ruta Editada con exito
        </div>

    @endif
    @if(isset($creado))

        <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Ruta creada con exito.
        </div>

    @endif
    @if(isset($eliminado))

        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Ruta Eliminada con exito.
        </div>

    @endif
    @if(isset($no_eliminado))

        <div class="alert alert-danger alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong>Ruta NO eliminada , hay clientes registrado en ella.
        </div>

    @endif
    <div class="panel panel-default">
        <div class="panel-heading">Listado de rutas</div>
        <div class="panel-body">

            <table class="table table-hover" id="datatable" style="width: 100%">
                <thead>
                <tr>
                    <th class="text-center">Descripcion</th>
                    <th class="text-center">Imagen</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Eliminar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rutas['ruta'] as $element)
                    <tr>
                        <td class="text-center" >{{$element['descripcion'] }} </td>

                        <td class="text-center"><img src="{{asset("images/ruta.png")}}" class="img-thumbnail" alt="Rol" width="35" height="35">
                        </td>

                        <td class="text-center"><a href="{{route('rutas.edit',$element['id_ruta'])}}"  ><button type="button" class="btn btn-success"><i class='fa fa-edit fa-fw'></i>Editar</button></a>
                        </td>
                        <td class="text-center"><a href="{{route('rutas.destroy',$element['id_ruta'])}}"  ><button type="button" class="btn btn-danger"><i class='fa fa-eraser fa-fw'></i>Eliminar</button></a>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer">Panel Footer</div>
    </div>
@endsection