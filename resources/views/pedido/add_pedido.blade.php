@extends('layouts.admin')

@section('contenido')
    <h2>Nuevo Pedido</h2>



    {!! Form::open(['route' => 'pedidos.store','method' => 'POST','files' => true]) !!}
    <div class="panel panel-default">
        <div class="panel-heading">Listado de productos disponibles</div>
        <div class="panel-body">

            <table class="table table-hover" id="datatable" style="width: 100%">
                <thead>
                <tr>
                    <th class="text-center">Nombre Producto</th>
                    <th class="text-center">Descripcion</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Existencia</th>
                    <th class="text-center">Imagen</th>
                    <th class="text-center">Cantidad a comprar</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Agregar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productos['producto'] as $element)
                    <tr>
                        {!! Form::open(['route' => 'pedidos.store','method' => 'POST','files' => true]) !!}


                        <td class="text-center">{{$element['nombre_producto'] }} </td>
                        {!! Form::hidden('id_producto', $element['id_producto']) !!}
                        <td class="text-center">{{$element['descripcion'] }} </td>
                        {!! Form::hidden('descripcion', $element['descripcion']) !!}
                        <td class="text-center">$ {{$element['precio'] }} </td>
                        {!! Form::hidden('precio', $element['precio']) !!}
                        <td class="text-center">{{$element['num_existencia'] }} </td>
                        {!! Form::hidden('num_existencia', $element['num_existencia']) !!}
                        <td class="text-center"><img src="{{asset("images/producto.png")}}" class="img-thumbnail" alt="Cliente" width="35" height="35">
                        </td>
                        @if(isset($creado))
                            <td>
                                {!! Form::number('canti',null,['class' => 'form-control','placeholder' => 'Cantidad...','min' =>'1','max'=>$element['num_existencia'],'required' => 'required']) !!}
                            </td>
                            @else
                            <td>
                                {!! Form::number('canti',null,['class' => 'form-control','placeholder' => 'Cantidad...','min' =>'1','max'=>$element['num_existencia'],'required' => 'required']) !!}
                            </td>

                        @endif
                        <td>
                            <select   class="form-control" name="id_cliente">
                                @foreach($clientes['cliente'] as $el)
                                    <option value="{{ $el['id_cliente'] }}"> {{ $el['nombre_cliente'] }} </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            {{ Form::button('<i class="fa fa-shopping-cart" aria-hidden="true"></i> Agregar', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                        </td>

                    </tr>
                    {!! Form::close() !!}


                @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <a href=""  ><button type="button" class="btn btn-primary btn-block"><i class='fa fa-send fa-fw'></i>Nuevo</button></a>

        </div>

    </div>




@endsection
