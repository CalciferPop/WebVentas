@extends('layouts.admin')
@section('contenido')
    <br>
    {!! Form::open(['route' => 'productos.store','method' => 'POST','files' => true]) !!}

    <div class="panel panel-primary">
        <div class="panel-heading">Nuevo Producto</div>
        <div class="panel-body">
            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('nombre_producto','Nombre Producto:') !!}
                    {!! Form::text('nombre_producto',null,['class' => 'form-control','placeholder' => 'Nombre...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('descripcion','Descripcion:') !!}
                    {!! Form::text('descripcion',null,['class' => 'form-control','placeholder' => 'Descripcion...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('precio','Precio') !!}
                    {!! Form::number('precio',null,['class' => 'form-control','placeholder' => 'Precio...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('num_existencia','Num Existencia') !!}
                    {!! Form::number('num_existencia',null,['class' => 'form-control','placeholder' => 'Num Existencia...']) !!}
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
