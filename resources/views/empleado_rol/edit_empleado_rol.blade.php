@extends('layouts.admin')
@section('contenido')
    <br>
    {!! Form::open(['route' => ['empleado_rol.store','method' => 'post']]) !!}

    <div class="panel panel-primary">
        <div class="panel-heading">Editar Empleado-Rol</div>
        <div class="panel-body">
            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('nombre_empleado_ant','Nombre Empleado Anterior:') !!}
                    {!! Form::text('nombre_empleado_ant',$nomb_emp_ant,['class' => 'form-control','placeholder' => 'Nombre Empleado...','disabled' => 'disabled']) !!}
                    {!! Form::hidden('id_emp_ant', $id_emp_ant) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('nombre_rol_ant','Nombre rol Anterior:') !!}
                    {!! Form::text('nombre_rol_ant',$nomb_rol_ant,['class' => 'form-control','placeholder' => 'Apellido Paterno...','disabled' => 'disabled']) !!}
                    {!! Form::hidden('id_rol_ant', $id_rol_ant) !!}
                </div>
                <br>

                <div class="col-xs-5">
                    {!! Form::label('nombre_empleado','Nombre Empleado:') !!}
                    {!! Form::text('nombre_empleado',$nomb_emp_ant,['class' => 'form-control','placeholder' => 'Nombre Empleado...','disabled' => 'disabled']) !!}
                    {!! Form::hidden('id_empleado', $id_emp_ant) !!}
                </div>


                <div class="col-xs-5">

                    {!! Form::label('id_rol','Roles') !!}
                    <select class="form-control" name="id_rol">
                        @foreach($roles['rol'] as $element)
                            <option value="{{ $element['id_rol'] }}"> {{ $element['nombre_rol'] }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-5">
                    <br>
                    {{ Form::button('<i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                </div>
            </div>
        </div>
    </div>
    </div>
    {!! Form::close() !!}
@endsection
