

        <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ventas Admin</title>

    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/metisMenu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/sb-admin-2.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <style>
        hr {
            display: block;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            margin-left: auto;
            margin-right: auto;
            border-style: inset;
            border-width: 1px;
        }
    </style>

</head>

<body>

<div id="wrapper">


    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="index.html">Ventas Admin</a>
        </div>


        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown" >
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user" id="menuOpciones">
                    <li class="text-center">
                        <img src="{{asset("images/cliente.png")}}" alt="foto alumno" width="80">
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> {{$_SESSION['nickname']}}</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> {{$_SESSION['rol']}}</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{route('login.index')}}" class="showProcesar"><i class="fa fa-sign-out-alt  fa-fw"></i> Salir</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Clientes<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('clientes.create')}}"><i class='fa fa-user-plus  fa-fw'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="{{route('clientes.index')}}"><i class='fa fa-list-ol fa-fw'></i> ListaClientes</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Empleados<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('empleados.create')}}"><i class='fa fa-user-plus  fa-fw'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="{{route('empleados.index')}}"><i class='fa fa-list-ol fa-fw'></i> Lista Empleados</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-venus-mars   fa-fw"></i> Generos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('generos.index')}}"><i class='fa fa-list-ol fa-fw'></i> Lista Generos</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cart-plus  fa-fw"></i> Pedidos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('pedidos.create')}}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="{{route('pedidos.index')}}"><i class='fa fa-times  fa-fw'></i> Lista Pedidos Pendientes</a>
                            </li>
                            <li>
                                <a href="{{route('clientes_pedidos.index')}}"><i class='fa fa-check  fa-fw'></i> Lista Pedidos Realizados</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-store  fa-fw"></i> Productos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('productos.create')}}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="{{route('productos.index')}}"><i class='fa fa-list-ol fa-fw'></i> Lista Productos</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user-circle  fa-fw"></i> Roles<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{route('roles.index')}}"><i class='fa fa-list-ol fa-fw'></i> Lista Roles</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-map-marker-alt  fa-fw"></i> Rutas<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('rutas.create')}}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="{{route('rutas.index')}}"><i class='fa fa-list-ol fa-fw'></i> Lista Rutas</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

    </nav>




</div>

<div id="page-wrapper">
    <br>

    @if(isset($creadoped))

        <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> Pedido creado con exito.
        </div>

    @endif
    <div class="panel panel-success">
        <div class="panel-heading">
            <i class="fa fa-user-circle fa-fw"></i>  Detalle Empleado Logueado</div>

        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="col-lg-4 col-md-6 col-sm-4">
                <img src="{{asset("images/empleado.png")}}" class="img-thumbnail" alt="Empleado" width="190" height="130">
            </div>
            <div class="col-lg-8 col-md-6 col-sm-4">
                <p><strong>Nombre:</strong> {{$_SESSION['nombre_empleado']}} {{$_SESSION['apellido_paterno'] }} {{$_SESSION['apellido_materno'] }}</p>
                <p><strong>Rol:</strong> {{$_SESSION['rol'] }}</p>
                <p><strong>Fecha Nacimiento:</strong> {{$_SESSION['fecha_nacimiento'] }}</p>
                <p><strong>RFC: </strong>{{$_SESSION['rfc'] }}</p>
                <p><strong>Telefono: </strong> {{$_SESSION['telefono'] }}</p>
                <p><strong>Email: </strong>{{$_SESSION['email_empleado'] }}</p>
            </div>

        </div>
    </div>
    @yield('contenido')
</div>



<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/metisMenu.min.js')}}"></script>
<script src="{{asset('js/sb-admin-2.js')}}"></script>
</body>

</html>




