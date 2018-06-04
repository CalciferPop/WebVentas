@extends('layouts.admin')
@section('contenido')
    <br>
    {!! Form::open(['route' => 'generos.store','method' => 'POST','files' => true]) !!}

    <div class="panel panel-primary">
        <div class="panel-heading">Nuevo Genero</div>
        <div class="panel-body">
            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('descripcion','Nombre Genero:') !!}
                    {!! Form::text('descripcion',null,['class' => 'form-control','placeholder' => 'Nombre Genero...']) !!}
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
