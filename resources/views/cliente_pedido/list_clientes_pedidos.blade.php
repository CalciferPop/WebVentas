@extends('layouts.admin')

@section('contenido')


    @if(isset($realizado))

        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong>  El pedido se realizo con exito
        </div>
   @endif

    @if(isset($realizado))

        <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong>  Se envio una notificacion a la App ventas.
        </div>
    @endif




    @if(isset($sin_pedidos))

        <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Este cliente no cuenta con pedidos.
        </div>
        @else

        <h2>Pedidos pendientes del cliente : {{$clientes_pedidos['pedido2'][0]['nombre_cliente']}}</h2>
        <br>
        {!! Form::open(['route' => 'clientes_pedidos.store','method' => 'POST','files' => true]) !!}
            {{ Form::button('<i class="fa fa-cart-plus " aria-hidden="true"></i> Surtir Pedido', ['type' => 'submit', 'class' => 'btn btn-success btn-block'] )  }}
        {!! Form::hidden('id_cliente', $clientes_pedidos['pedido2'][0]['id_cliente'] ) !!}
        {!! Form::hidden('nombre_cliente', $clientes_pedidos['pedido2'][0]['nombre_cliente'] ) !!}
            <br>
        {!! Form::close() !!}
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-user-circle fa-fw"></i>  Cliente : {{$clientes_pedidos['pedido2'][0]['nombre_cliente']}}</div>
        @foreach($clientes_pedidos['pedido2'] as $element)
            <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="col-lg-4 col-md-6 col-sm-4">
                        <img src="{{asset("images/producto.png")}}" class="img-thumbnail" alt="Producto" width="190" height="130">
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-4">
                        <p><strong>Nombre Cliente: </strong> {{$element['nombre_cliente'] }} </p>
                        <p><strong>Domicilio: </strong> {{$element['domicilio'] }} </p>
                        <p><strong>Fecha Compra: </strong> {{$element['fecha_compra'] }} </p>
                        <p><strong>Nombre Producto: </strong> {{$element['nombre_producto'] }} </p>
                        <p><strong>Cantidad Comprada: </strong> {{$element['cantidad'] }} </p>
                        <p><strong>Precio Producto: </strong> ${{$element['precio'] }} </p>
                        <p><strong>Importe de la compra: </strong> ${{$element['importe'] }} </p>
                        <a href="{{route('clientes_pedidos.destroy',$element['id_pedido'])}}"  ><button type="button" class="btn btn-danger"><i class='fa fa-eraser fa-fw'></i>Eliminar</button></a>

                    </div>


                </div>
            <br>
                <hr>
                <br>
            @endforeach
        </div>
        {!! Form::open(['route' => 'clientes_pedidos.store','method' => 'POST','files' => true]) !!}
        {{ Form::button('<i class="fa fa-cart-plus " aria-hidden="true"></i> Surtir Pedido', ['type' => 'submit', 'class' => 'btn btn-success btn-block'] )  }}
        {!! Form::hidden('id_cliente', $clientes_pedidos['pedido2'][0]['id_cliente'] ) !!}
        {!! Form::hidden('nombre_cliente', $clientes_pedidos['pedido2'][0]['nombre_cliente'] ) !!}
        <br>
        {!! Form::close() !!}


    @endif





@endsection