@extends('layouts.admin')
@section('contenido')
    <br>
    {!! Form::open(['route' => ['generos.update', $id_genero],'method' => 'put']) !!}
    <div class="panel panel-primary">
        <div class="panel-heading">Editar Genero</div>
        <div class="panel-body">
            <div class="form-group row">
                <div class="col-xs-5">
                    {!! Form::label('nombre_genero','Nombre Genero:') !!}
                    {!! Form::text('descripcion',$generos['genero']['descripcion'],['class' => 'form-control','placeholder' => 'Nombre genero...']) !!}
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
