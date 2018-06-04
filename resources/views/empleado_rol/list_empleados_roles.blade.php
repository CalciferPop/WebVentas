
@extends('layouts.admin')

@section('contenido')


    <h2>Empleados - Roles</h2>

    @if(isset($mensaje_eliminado))

        <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Registro eliminado con exito
        </div>

    @endif

    @if(isset($creado))

        <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Registro creado con exito.
        </div>

    @endif



    @foreach($empleados_roles['empleado_rol'] as $element)

        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-user-circle fa-fw"></i>  Registro </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="col-lg-4 col-md-6 col-sm-4">
                    <img src="/images/cliente.png" class="img-thumbnail" alt="Cliente" width="190" height="130">
                </div>
                <div class="col-lg-8 col-md-6 col-sm-4">
                    <p><strong>Nombre empleado:</strong> {{$element['nombre_empleado'] }} {{$element['apellido_paterno'] }} {{$element['apellido_materno'] }}</p>
                    <p><strong>Nickname:</strong> {{$element['nickname'] }}</p>
                    <p><strong>Rol: </strong>{{$element['nombre_rol'] }}</p>

                    <a href="{{route('empleado_rol.edit',array("id" => $element['id_empleado'],"id2" => $element['id_rol'],"nomb_emp"=>$element['nombre_empleado'],"nomb_rol"=>$element['nombre_rol']))}}"  ><button type="button" class="btn btn-success"><i class='fa fa-edit fa-fw'></i>Editar</button></a>
                    <a href="{{route('empleado_rol.destroy',array("id" => $element['id_empleado'],"id2" => $element['id_rol']))}}" ><button type="button" class="btn btn-danger"><i class='fa fa-eraser fa-fw'></i>Eliminar</button></a>


                </div>

            </div>
        </div>
        <br>
    @endforeach
@endsection
