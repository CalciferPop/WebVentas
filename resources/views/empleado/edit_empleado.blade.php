@extends('layouts.admin')
@section('contenido')
    <br>
    {!! Form::open(['route' => ['empleados.update', $id_empleado],'method' => 'put']) !!}

    <div class="panel panel-primary">
        <div class="panel-heading">Editar Empleado</div>
        <div class="panel-body">
            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('nombre_empleado','Nombre Empleado:') !!}
                    {!! Form::text('nombre_empleado',$empleados['empleado']['nombre_empleado'],['class' => 'form-control','placeholder' => 'Nombre Empleado...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('apellido_paterno','Apellido Paterno:') !!}
                    {!! Form::text('apellido_paterno',$empleados['empleado']['apellido_paterno'],['class' => 'form-control','placeholder' => 'Apellido Paterno...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('apellido_materno','Apellido Materno:') !!}
                    {!! Form::text('apellido_materno',$empleados['empleado']['apellido_materno'],['class' => 'form-control','placeholder' => 'Apellido Materno...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('fecha_nacimiento','Fecha de nacimiento') !!}
                    {!! Form::date('fecha_nacimiento',$empleados['empleado']['fecha_nacimiento'],['class' => 'form-control','placeholder' => 'Fecha de nacimiento...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('email_empleado','Email empleado') !!}
                    {!! Form::text('email_empleado',$empleados['empleado']['email_empleado'],['class' => 'form-control','placeholder' => 'Email empleado...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('telefono','Telefono') !!}
                    {!! Form::number('telefono',$empleados['empleado']['telefono'],['class' => 'form-control','placeholder' => 'Telefono...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('RFC','RFC') !!}
                    {!! Form::text('RFC',$empleados['empleado']['rfc'],['class' => 'form-control','placeholder' => 'RFC...']) !!}
                </div>

                <br>
                <div class="col-xs-5">

                    {!! Form::label('id_genero','Genero') !!}
                    <select class="form-control" name="id_genero">
                        @foreach($generos['genero'] as $element)
                            <option value="{{ $element['id_genero'] }}"> {{ $element['descripcion'] }} </option>
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
