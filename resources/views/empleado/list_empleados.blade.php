@extends('layouts.admin')

@section('contenido')

    <h2>Empleados</h2>

    @if(isset($creado))

        <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Empleado creado con exito.
        </div>

    @endif
    @if(isset($eliminado))

        <div class="alert alert-danger alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Empleado eliminado con exito.
        </div>

    @endif
    @if(isset($msj))

        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Empleado Editado con exito
        </div>

    @endif


    @foreach($empleados['empleado'] as $element)

        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-user-circle fa-fw"></i>  Empleado : {{$element['id_empleado'] }}</div>

            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="col-lg-4 col-md-6 col-sm-4">
                    <img src="/images/empleado.png" class="img-thumbnail" alt="Empleado" width="190" height="130">
                </div>
                <div class="col-lg-8 col-md-6 col-sm-4">
                    <p><strong>Nombre:</strong> {{$element['nombre_empleado'] }} {{$element['apellido_paterno'] }} {{$element['apellido_materno'] }}</p>
                    <p><strong>Fecha Nacimiento:</strong> {{$element['fecha_nacimiento'] }}</p>
                    <p><strong>Telefono: </strong>{{$element['telefono'] }}</p>
                    <p><strong>RFC: </strong>{{$element['rfc'] }}</p>
                    <p><strong>Email: </strong> {{$element['email_empleado'] }}</p>
                    <a href="{{route('empleados.edit',$element['id_empleado'])}}"  ><button type="button" class="btn btn-success"><i class='fa fa-edit fa-fw'></i>Editar</button></a>
                    <a href="{{route('empleados.destroy',$element['id_empleado'])}}"  ><button type="button" class="btn btn-danger"><i class='fa fa-eraser fa-fw'></i>Eliminar</button></a>

                </div>

            </div>
        </div>
        <br>
    @endforeach

@endsection