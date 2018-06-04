<?php

namespace Ventas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use GuzzleHttp\Client;

class EmpleadosController extends Controller
{

    public function __construct()
    {
        session_start();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'empleado/listempleados/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $empleados = json_decode($data, true);
        if (empty($empleados)){
            return view('layouts.login')->with('expiro','');

        }else{
            return view('empleado.list_empleados')->with('empleados',$empleados);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'genero/listgeneros/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $generos = json_decode($data, true);
        if (empty($generos)){
            return view('layouts.login')->with('expiro','');
        }else{
        return view("empleado.add_empleado")->with('generos',$generos);
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre_empleado = $request->nombre_empleado;
        $apellido_paterno = $request->apellido_paterno;
        $apellido_materno = $request->apellido_materno;
        $fecha_nacimiento = $request->fecha_nacimiento;
        $email_empleado = $request->email_empleado;
        $telefono = $request->telefono;
        $RFC = $request->RFC;
        $id_genero = $request->id_genero;

        $nickname = $request->nickname;
        $contrasena = md5($request->contrasena);




        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('constants.IP')."/Ventas/api/usuario/insertusuario/".$_SESSION['token'];

        $myBody=
            [
                'nickname' => $nickname,
                'contrasena' =>  $contrasena
            ];
        $request = $client->post($url,['auth' => ['root', 'root'],
            'body'=>\GuzzleHttp\json_encode($myBody)]  );

        $response = $request;



        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'
        ]);
        $response =
            $client->request('GET', 'usuario/getidusuario/'.$nickname.'/'.$contrasena, ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $id_usua = json_decode($data, true);
        if (empty($data)){
            return view('layouts.login')->with('expiro','');
        }

        $id_usuario = $id_usua['usuario']['id_usuario'];


        $client2 = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url2 = Config::get('constants.IP')."/Ventas/api/empleado/insertempleadoweb/".$_SESSION['token'];

        $myBody2=
            [
                'nombre_empleado' => $nombre_empleado,
                'apellido_paterno' =>  $apellido_paterno,
                'apellido_materno' => $apellido_materno,
                'fecha_nacimiento' => $fecha_nacimiento,
                'email_empleado' => $email_empleado,
                'telefono' => $telefono,
                'rfc' => $RFC,
                'id_genero' => $id_genero,
                'id_usuario'=> $id_usuario
            ];

        $request = $client2->post($url2,['auth' => ['root', 'root'],
            'body'=>\GuzzleHttp\json_encode($myBody2)]  );

        $response = $request;


        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'
        ]);

        $response =
            $client->request('GET', 'empleado/getidempleado/'.$id_usuario, ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $id_emp = json_decode($data, true);

        $id_empleado = $id_emp['empleado']['id_empleado'];


        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('constants.IP')."/Ventas/api/empleado_rol/insertempleado_rol/".$_SESSION['token'];

        $myBody3=
            [
                'id_empleado' => $id_empleado,
                'id_rol' =>  2
            ];

        $request = $client->post($url,['auth' => ['root', 'root'],
            'body'=>\GuzzleHttp\json_encode($myBody3)]  );

        $response = $request;

        //Obtener los datos del empleado asosiacio a el usuario que se logueo.




        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'empleado/listempleados/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $empleados = json_decode($data, true);
        if (empty($empleados)){
            return view('layouts.login')->with('expiro','');
        }else {
            return view('empleado.list_empleados')
                ->with('empleados', $empleados)
                ->with('creado', 'dsadas');
        }
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

        $token = $_SESSION['token'];
        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'genero/listgeneros/'.$token, ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $generos = json_decode($data, true);
        if (empty($generos)){
            return view('layouts.login')->with('expiro','');
        }





        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'empleado/listempleados/'.$id.'/'.$token, ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $empleados = json_decode($data, true);
        if (empty($empleados)){
            return view('layouts.login')->with('expiro','');
        }else {


            $id_empleado = $empleados['empleado']['id_empleado'];


            return view('empleado.edit_empleado')
                ->with('empleados', $empleados)
                ->with('id_empleado', $id_empleado)
                ->with('generos', $generos);
        }
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

        $nombre_empleado = $request->nombre_empleado;
        $apellido_paterno = $request->apellido_paterno;
        $apellido_materno = $request->apellido_materno;
        $fecha_nacimiento = $request->fecha_nacimiento;
        $email_empleado = $request->email_empleado;
        $telefono = $request->telefono;
        $RFC = $request->RFC;
        $id_genero = $request->id_genero;


        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('constants.IP')."/Ventas/api/empleado/updateempleado/".$_SESSION['token'];

        $myBody=
            [
                'id_empleado' => $id,
                'nombre_empleado' => $nombre_empleado,
                'apellido_paterno' =>  $apellido_paterno,
                'apellido_materno' => $apellido_materno,
                'fecha_nacimiento' => $fecha_nacimiento,
                'email_empleado' => $email_empleado,
                'telefono' => $telefono,
                'rfc' => $RFC,
                'id_genero' => $id_genero,


            ];
        $request = $client->put($url,['auth' => ['root', 'root'],
            'body'=>\GuzzleHttp\json_encode($myBody)]  );

        $response = $request;

        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'empleado/listempleados/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $empleados = json_decode($data, true);
        if (empty($empleados)){
            return view('layouts.login')->with('expiro','');
        }else {
            return view('empleado.list_empleados')
                ->with('empleados', $empleados)
                ->with('msj', 'dasdas');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('DELETE', 'empleado/deleteempleado/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $ELIM = json_decode($data, true);


        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'empleado/listempleados/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $empleados = json_decode($data, true);
        if (empty($empleados)){
            return view('layouts.login')->with('expiro','');
        }else {


            return view('empleado.list_empleados')
                ->with('empleados', $empleados)
                ->with('eliminado', 'dsadas');
        }
    }
}
