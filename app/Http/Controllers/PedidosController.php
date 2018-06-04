<?php

namespace Ventas\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class PedidosController extends Controller
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
            $client->request('GET', 'pedido2/listpedidos2/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $pedidos = json_decode($data, true);
        if (empty($pedidos)){
            return view('layouts.login')->with('expiro','');

        }
        if($pedidos==null){
            return view('pedido.list_pedidos')
                ->with('no_pedidos_pend','dasdasd');


        }else{
            return view('pedido.list_pedidos')
                ->with('pedidos',$pedidos);
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
            $client->request('GET', 'producto/listproductos/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $productos = json_decode($data, true);

        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'cliente/listclientes/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $clientes = json_decode($data, true);
        if (empty($clientes)){
            return view('layouts.login')->with('expiro','');
        }else {


            //return view('list_productos',compact('productos'));
            return view('pedido.add_pedido')
                ->with('productos', $productos)
                ->with('clientes', $clientes);
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

        $id_cliente = $request->id_cliente;
        $cantidad = $request->canti;
        $id_producto = $request->id_producto;
        $precio = $request->precio;
        $num_existencia = $request->num_existencia;
        $importe = $precio * $cantidad;

            //INSERTAR EL PEDIDO
        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('constants.IP')."/Ventas/api/pedido/insertpedido/".$_SESSION['token'];

        $myBody=
            [
                'id_cliente' => $id_cliente,
                'cantidad' =>  $cantidad,
                'importe' => $importe,
                'id_producto' => $id_producto
            ];
        $request = $client->post($url,['auth' => ['root', 'root'],
            'body'=>\GuzzleHttp\json_encode($myBody)]  );

        $response = $request;

        //REsta la cantidad comprada a la existencia

        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('constants.IP')."/Ventas/api/producto/updateproductominus/".$cantidad.'/'.$_SESSION['token'];

        $myBody=
            [
                'id_producto' => $id_producto

            ];
        $request = $client->put($url,['auth' => ['root', 'root'],
            'body'=>\GuzzleHttp\json_encode($myBody)]  );

        $response = $request;


        return view('index')->with('creadoped','dasdsa');





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


        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'pedido/getcantidadpedido/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $cantidad = json_decode($data, true);
        if (empty($cantidad)){
            return view('layouts.login')->with('expiro','');
        }
        $cant =$cantidad['pedido']['cantidad'];
        $id_prod = $cantidad['pedido']['id_producto'];


        //Suma la cantida del pedido eliminado a la existencia;

        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('constants.IP')."/Ventas/api/producto/updateproductoplus/".$cant.'/'.$_SESSION['token'];

        $myBody=
            [
                'id_producto' => $id_prod

            ];
        $request = $client->put($url,['auth' => ['root', 'root'],
            'body'=>\GuzzleHttp\json_encode($myBody)]  );

        $response = $request;



        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('DELETE', 'pedido/deletepedido/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $ELIM = json_decode($data, true);



        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'pedido2/listpedidos2/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $pedidos = json_decode($data, true);
        if (empty($pedidos)){
            return view('layouts.login')->with('expiro','');
        }else {


            return view('pedido.list_pedidos')
                ->with('pedidos', $pedidos)
                ->with('eliminado', 'dasdasd');
        }


    }
}
