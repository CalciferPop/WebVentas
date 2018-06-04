@extends('layouts.admin')

@section('contenido')
            <h2>Productos</h2>


                @if(isset($msj))

                    <div class="alert alert-success alert-dismissible fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Info!</strong> Producto Editado con exito
                    </div>

            @endif

            @if(isset($creado))

                <div class="alert alert-info alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info!</strong> Producto creado con exito.
                </div>

            @endif

            @if(isset($eliminado))

                <div class="alert alert-success alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info!</strong> Producto Eliminado con exito.
                </div>

            @endif
            @if(isset($no_eliminado))

                <div class="alert alert-danger alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info!</strong> Producto NO eliminado , forma parte de algun pedido.
                </div>

            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Listado de productos</div>
                <div class="panel-body">

                    <table class="table table-hover" id="datatable" style="width: 100%">
                        <thead>
                        <tr>
                            <th class="text-center">Nombre Producto</th>
                            <th class="text-center">Descripcion</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Existencia</th>
                            <th class="text-center">Imagen</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productos['producto'] as $element)
                            <tr>
                                <td class="text-center" >{{$element['nombre_producto'] }} </td>
                                <td class="text-center">{{$element['descripcion'] }} </td>
                                <td class="text-center">$ {{$element['precio'] }} </td>
                                <td class="text-center">{{$element['num_existencia'] }} </td>
                                <td class="text-center"><img src="/images/producto.png" class="img-thumbnail" alt="Cliente" width="35" height="35">
                                </td>
                                <td class="text-center"><a href="{{route('productos.edit',$element['id_producto'])}}"  ><button type="button" class="btn btn-success"><i class='fa fa-edit fa-fw'></i>Editar</button></a>
                                </td>
                                <td class="text-center"><a href="{{route('productos.destroy',$element['id_producto'])}}"  ><button type="button" class="btn btn-danger"><i class='fa fa-eraser fa-fw'></i>Eliminar</button></a>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <a href="{{route('productos.create')}}"  ><button type="button" class="btn btn-primary btn-block"><i class='fa fa-send fa-fw'></i>Nuevo</button></a>

                </div>

            </div>
@endsection
