<?php

namespace Ventas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use GuzzleHttp\Client;

class EmpleadosRolesController extends Controller
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
            $client->request('GET', 'empleado_rol2/listempleadosRoles/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $empleados_roles = json_decode($data, true);
        if (empty($empleados_roles)){
            return view('layouts.login')->with('expiro','');
        }else {
            return view('empleado_rol.list_empleados_roles')->with('empleados_roles', $empleados_roles);
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
            $client->request('GET', 'empleado/listempleados/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $empleados = json_decode($data, true);
        if (empty($empleados)){
            return view('layouts.login')->with('expiro','');
        }



        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'rol/listroles/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $roles = json_decode($data, true);
        if (empty($roles)){
            return view('layouts.login')->with('expiro','');
        }else {
            return view("empleado_rol.add_empleado_rol")
                ->with('roles', $roles)
                ->with('empleados', $empleados);
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

        $id_empleado = $request->id_emp_ant;
        $id_empleadoN= $request->id_empleado;
        $id_rol = $request->id_rol_ant;
        $id_rolN = $request->id_rol;




        //REALIZAR EL UPDATE

        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('constants.IP')."/Ventas/api/empleado_rol/updateempleado_rol/".$_SESSION['token'];

        $myBody=
            [
                'id_empleado' => $id_empleado,
                'id_empleadoN' => $id_empleadoN,
                'id_rol' =>  $id_rol,
                'id_rolN' => $id_rolN


            ];
        $request = $client->put($url,['auth' => ['root', 'root'],
            'body'=>\GuzzleHttp\json_encode($myBody)]  );

        $response = $request;
        //Validar si era admin y fue cambiado a vendedor







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
    public function edit($id,$id2,$nomb_emp,$nomb_rol)
    {
         $id_empleado_antiguo =$id;
         $id_rol_antiguo =$id2;
         $nombre_empl_antiguo =$nomb_emp;
        $nombre_rol_ant =$nomb_rol;


        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'empleado/listempleados/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $empleados = json_decode($data, true);
        if (empty($empleados)){
            return view('layouts.login')->with('expiro','');
        }

        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'rol/listroles/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $roles = json_decode($data, true);
        if (empty($roles)){
            return view('layouts.login')->with('expiro','');
        }else {


            return view("empleado_rol.edit_empleado_rol")
                ->with('roles', $roles)
                ->with('empleados', $empleados)
                ->with('id_rol_ant', $id_rol_antiguo)
                ->with('id_emp_ant', $id_empleado_antiguo)
                ->with('nomb_emp_ant', $nombre_empl_antiguo)
                ->with('nomb_rol_ant', $nombre_rol_ant);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$id2)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$id2)
    {
        //
    }
}
