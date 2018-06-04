
@extends('layouts.vendedor')

@section('contenido')


    <h2>Clientes</h2>

    @if(isset($mensaje_eliminado))

        <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Cliente eliminado con exito
        </div>

    @endif

    @if(isset($creado))

        <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Cliente creado con exito.
        </div>

    @endif

    @if(isset($mensaje_no_eliminado))

        <div class="alert alert-danger alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Este cliente no puede ser eliminado ya que cuenta con pedidos pendientes.
        </div>

    @endif

    @foreach($clientes['cliente'] as $element)

    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-user-circle fa-fw"></i>  Cliente : {{$element['id_cliente'] }}</div>

        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="col-lg-4 col-md-6 col-sm-4">
                <img src="/images/cliente.png" class="img-thumbnail" alt="Cliente" width="190" height="130">
            </div>
            <div class="col-lg-8 col-md-6 col-sm-4">
                <p><strong>Nombre:</strong> {{$element['nombre_cliente'] }} {{$element['apellido_paterno'] }} {{$element['apellido_materno'] }}</p>
                <p><strong>Fecha Nacimiento:</strong> {{$element['fecha_nacimiento'] }}</p>
                <p><strong>Domicilio:</strong> {{$element['domicilio'] }}</p>
                <p><strong>Telefono: </strong>{{$element['telefono'] }}</p>
                <p><strong>Email: </strong> {{$element['email'] }}</p>
                <p><strong>Latitud: </strong>{{$element['latitud'] }}</p>
                <p><strong>Longitud: </strong>{{$element['longitud'] }}</p>

                <a href="{{route('clientes_v.edit',$element['id_cliente'])}}"  ><button type="button" class="btn btn-success"><i class='fa fa-edit fa-fw'></i>Editar</button></a>
                <a href="{{route('clientes_v.destroy',$element['id_cliente'])}}" ><button type="button" class="btn btn-danger"><i class='fa fa-eraser fa-fw'></i>Eliminar</button></a>
                <a href="{{route('clientes_pedidos_v.show',$element['id_cliente'])}}" ><button type="button" class="btn btn-primary"><i class='fa fa-shopping-cart fa-fw'></i>Pedidos Pendientes</button></a>
                <a href="{{route('clientes_pedidos_2_v.show',$element['id_cliente'])}}" ><button type="button" class="btn btn-success"><i class='fa fa-cart-arrow-down  fa-fw'></i>Pedidos Realizados</button></a>

            </div>

        </div>
    </div>
        <br>
    @endforeach
@endsection
