@extends('layouts.vendedor')

@section('contenido')

    @if(isset($sin_pedidos))

        <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Este cliente no cuenta con pedidos realizados.
        </div>
        @else
            <h2>Pedidos realizados del cliente : {{$clientes_pedidos['pedido2'][0]['nombre_cliente']}}</h2>

            <div class="panel panel-primary">

                <div class="panel-heading">
                    <i class="fa fa-user-circle fa-fw"></i>  Cliente : {{$clientes_pedidos['pedido2'][0]['nombre_cliente']}}
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                    {{ Form::button('<i class="fa fa-file-pdf  " aria-hidden="true"></i> Generar PDF (Tal vez)', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}



                </div>
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

                        </div>


                    </div>
                <br>
                    <hr>
                    <br>
                @endforeach
            </div>


    @endif





@endsection