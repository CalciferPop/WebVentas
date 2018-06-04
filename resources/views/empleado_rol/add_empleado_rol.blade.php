@extends('layouts.admin')
@section('contenido')
    <br>
    {!! Form::open(['route' => 'empleado_rol.store','method' => 'POST','files' => true]) !!}

    <div class="panel panel-primary">
        <div class="panel-heading">Nuevo Empleado - Rol</div>
        <div class="panel-body">
            <div class="form-group row">


                <div class="col-xs-5">

                    {!! Form::label('id_empleado','Empleado') !!}
                    <select class="form-control" name="id_genero">
                        @foreach($empleados['empleado'] as $element)
                            <option value="{{ $element['id_empleado'] }}"> {{ $element['nombre_empleado'] }} </option>
                        @endforeach
                    </select>
                    <input>
                </div>

                <div class="col-xs-5">

                    {!! Form::label('id_rol','Rol') !!}
                    <select class="form-control" name="id_genero">
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
