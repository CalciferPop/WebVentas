@extends('layouts.admin')

@section('contenido')

    <h2>Nuevo Usuario</h2>


    <form border='1' method="GET" action="agregaUsuario" >
        <div class="panel panel-info">

            <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-user-plus fa-lg"></i>  Nuevo Usuario</h4></div>
            <br>
            <div class="panel-body">
                <div class="form-group row">
                    <label class="col-sm-2 control-label">&nbsp&nbsp &nbsp&nbspNickname: </label>
                    <div class="col-xs-5">
                        <input id="exampleInputEmail3" type="text" class="form-control" name="nickname"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label">&nbsp&nbsp &nbsp&nbspPassword: </label>
                    <div class="col-xs-5">
                        <input id="exampleInputEmail3" type="password" class="form-control" name="contrasena"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-xs-5">
                        &nbsp&nbsp &nbsp&nbsp
                        <button type="submit" name ="enviar" class="btn btn-success"><i class="fa fa-send fa-lg"></i> Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection