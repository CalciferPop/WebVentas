@extends('layouts.admin')
@section('contenido')
    <br>
    {!! Form::open(['route' => ['rutas.update', $id_ruta],'method' => 'put']) !!}
    <div class="panel panel-primary">
        <div class="panel-heading">Editar Ruta</div>
        <div class="panel-body">
            <div class="form-group row">

                <div class="col-xs-5">
                    {!! Form::label('descripcion','Nombre ruta:') !!}
                    {!! Form::text('descripcion',$rutas['ruta']['descripcion'],['class' => 'form-control','placeholder' => 'Nombre ruta...']) !!}
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
