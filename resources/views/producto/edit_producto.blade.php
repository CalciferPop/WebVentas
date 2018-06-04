@extends('layouts.admin')
@section('contenido')
    <br>
    {!! Form::open(['route' => ['productos.update', $id_producto],'method' => 'put']) !!}
    <div class="panel panel-primary">
        <div class="panel-heading">Editar Producto</div>
        <div class="panel-body">
            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('nombre_producto','Nombre Producto:') !!}
                    {!! Form::text('nombre_producto',$productos['producto']['nombre_producto'],['class' => 'form-control','placeholder' => 'Nombre producto...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('descripcion','Descripcion:') !!}
                    {!! Form::text('descripcion',$productos['producto']['descripcion'],['class' => 'form-control','placeholder' => 'Descripcion...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('precio','Precio') !!}
                    {!! Form::number('precio',$productos['producto']['precio'],['class' => 'form-control','placeholder' => 'Precio...']) !!}
                </div>
                <div class="col-xs-5">
                    {!! Form::label('num_existencia','Existencia') !!}
                    {!! Form::number('num_existencia',$productos['producto']['num_existencia'],['class' => 'form-control','placeholder' => 'Fecha de nacimiento...']) !!}
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
