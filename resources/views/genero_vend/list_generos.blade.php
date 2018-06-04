@extends('layouts.vendedor')

@section('contenido')
    <h2>Generos</h2>


    @if(isset($msj))

        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Genero Editado con exito
        </div>

    @endif

    @if(isset($creado))

        <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Genero creado con exito.
        </div>

    @endif

    @if(isset($eliminado))

        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Genero Eliminado con exito.
        </div>

    @endif
    @if(isset($no_eliminado))

        <div class="alert alert-danger alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Genero NO eliminado.
        </div>

    @endif
    <div class="panel panel-default">
        <div class="panel-heading">Listado de generos</div>
        <div class="panel-body">

            <table class="table table-hover" id="datatable" style="width: 100%">
                <thead>
                <tr>
                    <th class="text-center">Nombre Genero</th>
                    <th class="text-center">Imagen</th>


                </tr>
                </thead>
                <tbody>
                @foreach($generos['genero'] as $element)
                    <tr>
                        <td class="text-center" >{{$element['descripcion'] }} </td>
                        <td class="text-center"><img src="{{asset("images/genero.jpg")}}" class="img-thumbnail" alt="Cliente" width="35" height="35">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer">

        </div>

    </div>
@endsection
