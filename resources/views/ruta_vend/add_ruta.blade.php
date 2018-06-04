@extends('layouts.vendedor')
@section('contenido')
    <br>
    {!! Form::open(['route' => 'rutas_v.store','method' => 'POST','files' => true]) !!}

    <div class="panel panel-primary">
        <div class="panel-heading">Nueva Ruta</div>
        <div class="panel-body">
            <div class="form-group row">

                <div class="col-xs-5">
                    {!! Form::label('descripcion','Nombre de la ruta:') !!}
                    {!! Form::text('descripcion',null,['class' => 'form-control','placeholder' => 'Descripcion...']) !!}
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
