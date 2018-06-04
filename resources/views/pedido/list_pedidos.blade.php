@extends('layouts.admin')

@section('contenido')

    <h2>Pedidos Pendientes</h2>


    @if(isset($eliminado))

        <div class="alert alert-danger alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Pedido eliminado con exito.
        </div>

    @endif

    @if(isset($no_pedidos_pend))

        <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> No hay pedidos pendientes.
        </div>
    @else


    @foreach($pedidos['pedido2'] as $element)

        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-user-circle fa-fw"></i>  Pedido : {{$element['id_pedido'] }}</div>

            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="col-lg-4 col-md-6 col-sm-4">
                    <img src="{{asset("images/pedido.png")}}" class="img-thumbnail" alt="Empleado" width="190" height="130">
                </div>
                <div class="col-lg-8 col-md-6 col-sm-4">
                    <p><strong>Nombre Cliente:</strong> {{$element['nombre_cliente'] }}</p>
                    <p><strong>Domicilio:</strong> {{$element['domicilio'] }}</p>
                    <p><strong>Fecha Compra:</strong> {{$element['fecha_compra'] }}</p>
                    <p><strong>Nombre Producto: </strong>{{$element['nombre_producto'] }}</p>
                    <p><strong>Precio : $</strong> {{$element['precio'] }}</p>
                    <p><strong>Cantidad:</strong> {{$element['cantidad'] }}</p>
                    <p><strong>Importe: $</strong> {{$element['importe'] }}</p>


                    <a href="{{route('pedidos.destroy',$element['id_pedido'])}}"  ><button type="button" class="btn btn-danger"><i class='fa fa-eraser fa-fw'></i>Eliminar</button></a>


                </div>

            </div>
        </div>
        <br>
    @endforeach
    @endif

@endsection