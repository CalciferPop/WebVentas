@extends('layouts.vendedor')

@section('contenido')

    <h2> Pedidos Realizados</h2>

    @if(isset($no_pedidos_rea))

        <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> No hay pedidos realizados.
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
                </div>

            </div>
        </div>
        <br>
    @endforeach
    @endif

@endsection