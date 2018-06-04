@extends('layouts.admin')
@section('contenido')
    <br>
    {!! Form::open(['route' => 'empleados.store','method' => 'POST','files' => true]) !!}

    <div class="panel panel-primary">
        <div class="panel-heading">Nuevo Empleado</div>
        <div class="panel-body">
            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('nombre_empleado','Nombre Empleado:') !!}
                    {!! Form::text('nombre_empleado',null,['class' => 'form-control','placeholder' => 'Nombre Empleado...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('apellido_paterno','Apellido Paterno:') !!}
                    {!! Form::text('apellido_paterno',null,['class' => 'form-control','placeholder' => 'Apellido Paterno...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('apellido_materno','Apellido Materno:') !!}
                    {!! Form::text('apellido_materno',null,['class' => 'form-control','placeholder' => 'Apellido Materno...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('fecha_nacimiento','Fecha de nacimiento') !!}
                    {!! Form::date('fecha_nacimiento',null,['class' => 'form-control','placeholder' => 'Fecha de nacimiento...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('email_empleado','Email empleado') !!}
                    {!! Form::text('email_empleado',null,['class' => 'form-control','placeholder' => 'Email empleado...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('telefono','Telefono') !!}
                    {!! Form::number('telefono',null,['class' => 'form-control','placeholder' => 'Telefono...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('RFC','RFC') !!}
                    {!! Form::text('RFC',null,['class' => 'form-control','placeholder' => 'RFC...']) !!}
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
                    <hr>
                    <hr>
                    {!! Form::label('nickname','Nickname') !!}
                    {!! Form::text('nickname',null,['class' => 'form-control','placeholder' => 'Nickname...']) !!}
                </div>

                <div class="col-xs-5">
                    <hr>
                    <hr>
                    {!! Form::label('contrasena','Password') !!}
                    <input type="password" class="form-control" name="contrasena" value="" required>

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
