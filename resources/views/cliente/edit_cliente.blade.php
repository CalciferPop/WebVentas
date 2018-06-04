@extends('layouts.admin')
@section('contenido')
    <br>
    {!! Form::open(['route' => ['clientes.update', $id_cliente],'method' => 'put']) !!}
    <div class="panel panel-primary">
        <div class="panel-heading">Editar Cliente</div>
        <div class="panel-body">
            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('nombre_cliente','Nombre Cliente:') !!}
                    {!! Form::text('nombre_cliente',$clientes['cliente']['nombre_cliente'],['class' => 'form-control','placeholder' => 'Nombre Cliente...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('apellido_paterno','Apellido Paterno:') !!}
                    {!! Form::text('apellido_paterno',$clientes['cliente']['apellido_paterno'],['class' => 'form-control','placeholder' => 'Apellido Paterno...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('apellido_materno','Apellido Materno') !!}
                    {!! Form::text('apellido_materno',$clientes['cliente']['apellido_materno'],['class' => 'form-control','placeholder' => 'Apellido Materno...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('fecha_nacimiento','Fecha de nacimiento') !!}
                    {!! Form::date('fecha_nacimiento',$clientes['cliente']['fecha_nacimiento'],['class' => 'form-control','placeholder' => 'Fecha de nacimiento...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('domicilio','Domicilio') !!}
                    {!! Form::text('domicilio',$clientes['cliente']['domicilio'],['class' => 'form-control','placeholder' => 'Domicilio...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('telefono','Telefono') !!}
                    {!! Form::text('telefono',$clientes['cliente']['telefono'],['class' => 'form-control','placeholder' => 'Telefono...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('email','Email') !!}
                    {!! Form::text('email',$clientes['cliente']['email'],['class' => 'form-control','placeholder' => 'Email...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('latitud','Latitud') !!}
                    {!! Form::text('latitud',$clientes['cliente']['latitud'],['class' => 'form-control','placeholder' => 'Latitud...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('longitud','Longitud') !!}
                    {!! Form::text('longitud',$clientes['cliente']['longitud'],['class' => 'form-control','placeholder' => 'Longitud...']) !!}
                    {!! Form::hidden('id_cliente',$id_cliente); !!}
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

