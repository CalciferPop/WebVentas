<?php

namespace Ventas\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class RutasController extends Controller
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
            $client->request('GET', 'ruta/listrutas/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $rutas = json_decode($data, true);
        if (empty($rutas)){
            return view('layouts.login')->with('expiro','');

        }else {
            //return view('list_productos',compact('productos'));
            return view('ruta.list_rutas', compact('rutas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ruta.add_ruta");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $descripcion= $request->descripcion;

        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('constants.IP')."/Ventas/api/ruta/insertruta/".$_SESSION['token'];

        $myBody=
            [
                'descripcion' =>  $descripcion
            ];
        $request = $client->post($url,['auth' => ['root', 'root'],
            'body'=>\GuzzleHttp\json_encode($myBody)]  );

        $response = $request;

        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'ruta/listrutas/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $rutas = json_decode($data, true);
        if (empty($rutas)){
            return view('layouts.login')->with('expiro','');
        }else {


            return view('ruta.list_rutas')
                ->with('rutas', $rutas)
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
            $client->request('GET', 'ruta/listrutas/'.$id.'/'.$token, ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $rutas = json_decode($data, true);
        if (empty($rutas)){
            return view('layouts.login')->with('expiro','');
        }else {


            $id_ruta = $rutas['ruta']['id_ruta'];

            return view('ruta.edit_ruta')
                ->with('rutas', $rutas)
                ->with('id_ruta', $id_ruta);
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

        $descripcion = $request->descripcion;



        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('constants.IP')."/Ventas/api/ruta/updateruta/".$_SESSION['token'];

        $myBody=
            [
                'id_ruta' => $id,
                'descripcion' =>  $descripcion
            ];
        $request = $client->put($url,['auth' => ['root', 'root'],
            'body'=>\GuzzleHttp\json_encode($myBody)]  );

        $response = $request;

        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'ruta/listrutas/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $rutas = json_decode($data, true);
        if (empty($rutas)){
            return view('layouts.login')->with('expiro','');
        }else {


            return view('ruta.list_rutas')
                ->with('rutas', $rutas)
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
        //Validar que la ruta no tenga clientes asignados

        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'ruta/buscaidenrutasclientes/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $encontrados = json_decode($data, true);

        if (empty($encontrados)){
            return view('layouts.login')->with('expiro','');
        }


        if ($encontrados == null) {
            //no existe en la tabla rutas_clientes, se puede eliminar
            $client = new Client([
                'base_uri' => Config::get('constants.IP').'/Ventas/api/'

            ]);
            $response =
                $client->request('DELETE', 'ruta/deleteruta/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

            $data = (string) $response->getBody();
            $ELIM = json_decode($data, true);

            //Regresa a la vista con el nuevo listado

            $client = new Client([
                'base_uri' => Config::get('constants.IP').'/Ventas/api/'

            ]);
            $response =
                $client->request('GET', 'ruta/listrutas/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

            $data = (string) $response->getBody();
            $rutas = json_decode($data, true);

            return view('ruta.list_rutas')
                ->with('rutas',$rutas)
                ->with('eliminado','asjdhsajhd');


        }else{

            $client = new Client([
                'base_uri' => Config::get('constants.IP').'/Ventas/api/'

            ]);
            $response =
                $client->request('GET', 'ruta/listrutas/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

            $data = (string) $response->getBody();
            $rutas = json_decode($data, true);
            if (empty($rutas)){
                return view('layouts.login')->with('expiro','');
            }else {


                return view('ruta.list_rutas')
                    ->with('rutas', $rutas)
                    ->with('no_eliminado', 'asjdhsajhd');
            }



        }


    }
}
