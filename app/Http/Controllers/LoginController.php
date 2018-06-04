<?php

namespace Ventas\Http\Controllers;


use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;


class LoginController extends Controller
{
    public function __construct()
    {
        session_start();
        session_destroy();
        session_start();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $nick = $request->nickname;
        $pass= $request->contrasena;
        $contrasena = md5($pass);
        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'
        ]);
        $response =
            $client->request('GET', 'usuario/validar/'.$nick.'/'.$contrasena, ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $datos = json_decode($data, true);
        $token = $datos['token'];



        if(($datos['token']) == "Acceso Denegado"){
            return view('layouts.login')->with('mensaje','dsdasdasdasdasd');
        }else{
            $client = new Client([
                'base_uri' => Config::get('constants.IP').'/Ventas/api/'
            ]);
            $response =
                $client->request('GET', 'usuario/obtenrol/'.$nick.'/'.$contrasena, ['auth' => ['root', 'root']]);

            $data = (string) $response->getBody();
            $rol = json_decode($data, true);
            $role=$rol['rol']['nombre_rol'];
            if ($rol['rol']['nombre_rol']=="Vendedor"){
                //echo "INGRESO UN VENDEDOR, OBTENER SU INFO Y PASAR A LA PLANTILLA PARA VENDEDOR";
                //Obtener el id del usuario que acabo de loguearse
                $client = new Client([
                    'base_uri' => Config::get('constants.IP').'/Ventas/api/'
                ]);
                $response =
                    $client->request('GET', 'usuario/getidusuario/'.$nick.'/'.$contrasena, ['auth' => ['root', 'root']]);

                $data = (string) $response->getBody();
                $id_usua = json_decode($data, true);
                $id_usuario = $id_usua['usuario']['id_usuario'];
                $nickname =$id_usua['usuario']['nickname'];
                //Obtener el ID del empleado asociado a ese Usuario
                $client = new Client([
                    'base_uri' => Config::get('constants.IP').'/Ventas/api/'
                ]);
                $response =
                    $client->request('GET', 'empleado/getidempleado/'.$id_usuario, ['auth' => ['root', 'root']]);

                $data = (string) $response->getBody();
                $id_emp = json_decode($data, true);
                $id_empleado = $id_emp['empleado']['id_empleado'];

                //Obtener los datos del empleado asosiacio a el usuario que se logueo.
                $client = new Client([
                    'base_uri' => Config::get('constants.IP').'/Ventas/api/'
                ]);
                $response =
                    $client->request('GET', 'empleado/listempleados/'.$id_empleado.'/'.$token, ['auth' => ['root', 'root']]);

                $data = (string) $response->getBody();
                $emp = json_decode($data, true);

                //return view('layouts.vendedor')->with('rol',$role)->with('nickname',$nickname)->with('empleado',$emp);
                $_SESSION['nickname']  = $nickname;
                $_SESSION['contrasena']  = $contrasena;
                $_SESSION['rol']  = $role;
                $_SESSION['token']  = $token;
                $_SESSION['auth'] = "permit";

                $nombre_empleado = $emp['empleado']['nombre_empleado'];
                $apellido_paterno =$emp['empleado']['apellido_paterno'];
                $apellido_materno = $emp['empleado']['apellido_materno'];
                $fecha_nacimiento = $emp['empleado']['fecha_nacimiento'];
                $id_empleado_log = $emp['empleado']['id_empleado'];
                $rfc = $emp['empleado']['rfc'];
                $telefono = $emp['empleado']['telefono'];
                $email_empl = $emp['empleado']['email_empleado'];

                $_SESSION['id_empleado_log']= $id_empleado_log;
                $_SESSION['nombre_empleado']= $nombre_empleado;
                $_SESSION['apellido_paterno'] = $apellido_paterno;
                $_SESSION['apellido_materno'] = $apellido_materno;
                $_SESSION['fecha_nacimiento'] = $fecha_nacimiento;
                $_SESSION['rfc'] = $rfc;
                $_SESSION['telefono'] = $telefono;
                $_SESSION['email_empleado'] = $email_empl;

                return view('layouts.vendedor');

            }else if ($rol['rol']['nombre_rol']=="Administrador"){
                //echo "INGRESO UN ADMIN, OBTENER SU INFO Y PASAR A LA PLANTILLA PARA VENDEDOR";
                //Obtener el id del usuario que acabo de loguearse
                $client = new Client([
                    'base_uri' => Config::get('constants.IP').'/Ventas/api/'
                ]);
                $response =
                    $client->request('GET', 'usuario/getidusuario/'.$nick.'/'.$contrasena, ['auth' => ['root', 'root']]);

                $data = (string) $response->getBody();
                $id_usua = json_decode($data, true);
                $id_usuario = $id_usua['usuario']['id_usuario'];
                $nickname =$id_usua['usuario']['nickname'];
                //Obtener el ID  del empleado asociado a ese Usuario
                $client = new Client([
                    'base_uri' => Config::get('constants.IP').'/Ventas/api/'
                ]);
                $response =
                    $client->request('GET', 'empleado/getidempleado/'.$id_usuario, ['auth' => ['root', 'root']]);

                $data = (string) $response->getBody();
                $id_emp = json_decode($data, true);
                $id_empleado = $id_emp['empleado']['id_empleado'];

                //Obtener los datos del empleado asosiacio a el usuario que se logueo.
                $client2 = new Client([
                    'base_uri' => Config::get('constants.IP').'/Ventas/api/'
                ]);
                $response =
                    $client2->request('GET', 'empleado/listempleados/'.$id_empleado.'/'.$token, ['auth' => ['root', 'root']]);

                $data = (string) $response->getBody();
                $emp = json_decode($data, true);

                $_SESSION['nickname']  = $nickname;
                $_SESSION['rol']  = $role;
                $_SESSION['token']  = $token;
                $_SESSION['auth'] = "permit";

                $nombre_empleado = $emp['empleado']['nombre_empleado'];
                $apellido_paterno =$emp['empleado']['apellido_paterno'];
                $apellido_materno = $emp['empleado']['apellido_materno'];
                $fecha_nacimiento = $emp['empleado']['fecha_nacimiento'];
                $rfc = $emp['empleado']['rfc'];
                $telefono = $emp['empleado']['telefono'];
                $email_empl = $emp['empleado']['email_empleado'];


                $_SESSION['nombre_empleado']= $nombre_empleado;
                $_SESSION['apellido_paterno'] = $apellido_paterno;
                $_SESSION['apellido_materno'] = $apellido_materno;
                $_SESSION['fecha_nacimiento'] = $fecha_nacimiento;
                $_SESSION['rfc'] = $rfc;
                $_SESSION['telefono'] = $telefono;
                $_SESSION['email_empleado'] = $email_empl;




                return view('layouts.admin');

                //return view('layouts.admin');

            }else{
                echo "EL USUARIO AUN NO TIENE UN ROL ASIGNADO";
            }

        }

        //echo Config::get('constants.IP').'/Ventas/api/usuario/validar/'.$nick.'/'.$contrasena;






    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
