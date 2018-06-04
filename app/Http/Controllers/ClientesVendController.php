<?php

namespace Ventas\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Config;

class ClientesVendController extends Controller
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
        $token = $_SESSION['token'];

        $client = new Client([
            'base_uri' => Config::get('constants.IP') . '/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'cliente/listclientes/' . $token, ['auth' => ['root', 'root']]);

        $data = (string)$response->getBody();
        $clientes = json_decode($data, true);
        if (empty($clientes)){
            return view('layouts.login')->with('expiro','');

        }else{
            return view('cliente_vend.list_clientes', compact('clientes'));

        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cliente_vend.add_cliente");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nom_cliente = $request->nombre_cliente;
        $ape_paterno = $request->apellido_paterno;
        $ape_materno = $request->apellido_materno;
        $fecha_nacimiento = $request->fecha_nacimiento;
        $domicilio = $request->domicilio;
        $telefono = $request->telefono;
        $email = $request->email;
        $latitud = $request->latitud;
        $longitud = $request->longitud;

        $client = new \GuzzleHttp\Client(['headers' => ['Content-Type' => 'application/json']]);

        $url = Config::get('constants.IP') . "/Ventas/api/cliente/insertcliente/" . $_SESSION['token'];

        $myBody =
            [
                'nombre_cliente' => $nom_cliente,
                'apellido_paterno' => $ape_paterno,
                'apellido_materno' => $ape_materno,
                'fecha_nacimiento' => $fecha_nacimiento,
                'domicilio' => $domicilio,
                'telefono' => $telefono,
                'email' => $email,
                'latitud' => $latitud,
                'longitud' => $longitud
            ];
        $request = $client->post($url, ['auth' => ['root', 'root'],
            'body' => \GuzzleHttp\json_encode($myBody)]);

        $response = $request;


        $client = new Client([
            'base_uri' => Config::get('constants.IP') . '/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'cliente/listclientes/' . $_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string)$response->getBody();
        $clientes = json_decode($data, true);
        if (empty($clientes)){
            return view('layouts.login')->with('expiro','');
        }else {
            //return view('cliente.list_clientes',compact('clientes'));
            return view('cliente_vend.list_clientes')
                ->with('clientes', $clientes)
                ->with('creado', 'dsadas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $token = $_SESSION['token'];

        $client = new Client([
            'base_uri' => Config::get('constants.IP') . '/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'cliente/listclientes/' . $id . '/' . $token, ['auth' => ['root', 'root']]);

        $data = (string)$response->getBody();
        $clientes = json_decode($data, true);

        if (empty($clientes)){
            return view('layouts.login')->with('expiro','');
        }else {


            $id_cliente = $clientes['cliente']['id_cliente'];


            return view('cliente_vend.edit_cliente')
                ->with('clientes', $clientes)
                ->with('id_cliente', $id_cliente);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nom_cliente = $request->nombre_cliente;
        $ape_paterno = $request->apellido_paterno;
        $ape_materno = $request->apellido_materno;
        $fecha_nacimiento = $request->fecha_nacimiento;
        $domicilio = $request->domicilio;
        $telefono = $request->telefono;
        $email = $request->email;
        $latitud = $request->latitud;
        $longitud = $request->longitud;

        $client = new \GuzzleHttp\Client(['headers' => ['Content-Type' => 'application/json']]);

        $url = Config::get('constants.IP') . "/Ventas/api/cliente/updatecliente/" . $_SESSION['token'];

        $myBody =
            [
                'id_cliente' => $id,
                'nombre_cliente' => $nom_cliente,
                'apellido_paterno' => $ape_paterno,
                'apellido_materno' => $ape_materno,
                'fecha_nacimiento' => $fecha_nacimiento,
                'domicilio' => $domicilio,
                'telefono' => $telefono,
                'email' => $email,
                'latitud' => $latitud,
                'longitud' => $longitud
            ];
        $request = $client->put($url, ['auth' => ['root', 'root'],
            'body' => \GuzzleHttp\json_encode($myBody)]);

        $response = $request;

        $client = new Client([
            'base_uri' => Config::get('constants.IP') . '/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'cliente/listclientes/' . $_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string)$response->getBody();
        $clientes = json_decode($data, true);
        if (empty($clientes)){
            return view('layouts.login')->with('expiro','');
        }else{
        return view('cliente_vend.list_clientes', compact('clientes'));
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = new Client([
            'base_uri' => Config::get('constants.IP') . '/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'pedido2/listpedidos2/' . $id . '/' . $_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string)$response->getBody();
        $pedidos_clientes = json_decode($data, true);
        if (empty($pedidos_clientes)){
            return view('layouts.login')->with('expiro','');
        }

        if ($pedidos_clientes == null) {
            //echo "NO tiene pedidos pendientes, se puede eliminar";
            $client = new Client([
                'base_uri' => Config::get('constants.IP') . '/Ventas/api/'

            ]);
            $response =
                $client->request('DELETE', 'cliente/deletecliente/' . $id . '/' . $_SESSION['token'], ['auth' => ['root', 'root']]);

            $data = (string)$response->getBody();
            $ELIM = json_decode($data, true);
            $client = new Client([
                'base_uri' => Config::get('constants.IP') . '/Ventas/api/'

            ]);
            $response =
                $client->request('GET', 'cliente/listclientes/' . $_SESSION['token'], ['auth' => ['root', 'root']]);

            $data = (string)$response->getBody();
            $clientes = json_decode($data, true);
            if (empty($clientes)){
                return view('layouts.login')->with('expiro','');
            }else {


                //return view('cliente.list_clientes',compact('clientes')->with('mensaje_eliminado',""));
                return view('cliente_vend.list_clientes')
                    ->with('clientes', $clientes)
                    ->with('mensaje_eliminado', 'Cliente eliminado de forma exitosa.');
            }

        } else {
            $client = new Client([
                'base_uri' => Config::get('constants.IP') . '/Ventas/api/'

            ]);
            $response =
                $client->request('GET', 'cliente/listclientes/' . $_SESSION['token'], ['auth' => ['root', 'root']]);

            $data = (string)$response->getBody();
            $clientes = json_decode($data, true);
            if (empty($clientes)){
                return view('layouts.login')->with('expiro','');
            }else {


                //return view('cliente.list_clientes',compact('clientes')->with('mensaje_no_eliminado',"Cliente no puede ser eliminado, ya que aun tiene pedidos pendientes.."));
                return view('cliente_vend.list_clientes')
                    ->with('clientes', $clientes)
                    ->with('mensaje_no_eliminado', 'Cliente no puede ser eliminado, ya que aun tiene pedidos pendientes..');
            }
        }
    }


}
