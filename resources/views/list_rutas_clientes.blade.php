@extends('layouts.admin')

@section('contenido')

    <h2>Clientes en cada ruta</h2>


    @foreach($rutas_clientes['rutas_clientes2'] as $element)

        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-user-circle fa-fw"></i>  Registro </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="col-lg-4 col-md-6 col-sm-4">
                    <img src="/images/ruta.png" class="img-thumbnail" alt="Empleado" width="190" height="130">
                </div>
                <div class="col-lg-8 col-md-6 col-sm-4">

                    <p><strong>Descripcion:</strong> {{$element['descripcion'] }}</p>
                    <p><strong>Nombre Cliente: </strong>{{$element['nombre_cliente'] }}</p>
                    <p><strong>Latitud : </strong> {{$element['latitud'] }}</p>
                    <p><strong>Longitud:</strong> {{$element['longitud'] }}</p>
                    <button type="button" class="btn btn-success" ><i class='fa fa-edit fa-fw'></i>Editar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>

                </div>

            </div>
        </div>
        <br>
    @endforeach

@endsection