@extends('layouts.admin')
@section('contenido')
    <br>
    {!! Form::open(['route' => 'clientes.store','method' => 'POST','files' => true]) !!}

    <div class="panel panel-primary">
        <div class="panel-heading">Nuevo Cliente</div>
        <div class="panel-body">
            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('nombre_cliente','Nombre Cliente:') !!}
                    {!! Form::text('nombre_cliente',null,['class' => 'form-control','placeholder' => 'Nombre Cliente...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('apellido_paterno','Apellido Paterno:') !!}
                    {!! Form::text('apellido_paterno',null,['class' => 'form-control','placeholder' => 'Apellido Paterno...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('apellido_materno','Apellido Materno') !!}
                    {!! Form::text('apellido_materno',null,['class' => 'form-control','placeholder' => 'Apellido Materno...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('fecha_nacimiento','Fecha de nacimiento') !!}
                    {!! Form::date('fecha_nacimiento',null,['class' => 'form-control','placeholder' => 'Fecha de nacimiento...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('domicilio','Domicilio') !!}
                    {!! Form::text('domicilio',null,['class' => 'form-control','placeholder' => 'Domicilio...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('telefono','Telefono') !!}
                    {!! Form::text('telefono',null,['class' => 'form-control','placeholder' => 'Telefono...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('email','Email') !!}
                    {!! Form::text('email',null,['class' => 'form-control','placeholder' => 'Email...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('latitud','Latitud') !!}
                    {!! Form::text('latitud',null,['class' => 'form-control','placeholder' => 'Latitud...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('longitud','Longitud') !!}
                    {!! Form::text('longitud',null,['class' => 'form-control','placeholder' => 'Longitud...']) !!}
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
