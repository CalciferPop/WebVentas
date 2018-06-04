<?php

namespace Ventas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use GuzzleHttp\Client;

class ClientePedidoVendController extends Controller
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
            $client->request('GET', 'pedido2/listpedidosrea/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $pedidos = json_decode($data, true);

        if (empty($pedidos)){
            return view('layouts.login')->with('expiro','');

        }


        if($pedidos==null){
            return view('pedido_vend.list_pedidos2')
                ->with('no_pedidos_rea','dasdasd');


        }else{
            return view('pedido_vend.list_pedidos2')
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
        //
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

        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('constants.IP')."/Ventas/api/pedido/updatepedidocliente/".$id_cliente.'/'.$_SESSION['token'];

        $myBody=
            [
                'id_cliente' => $id_cliente

            ];
        $request = $client->put($url,['auth' => ['root', 'root'],
            'body'=>\GuzzleHttp\json_encode($myBody)]  );

        $response = $request;

        ///AQUI VA EL ENVIO DE NOTIFICACIONES

        function enviar($tokens,$mensaje)
        {
            $url='https://fcm.googleapis.com/fcm/send';
            $fields	=	array(
                'registration_ids'=>$tokens,
                'data'=>$mensaje
            );
            $headers=array(
                'Authorization:key	= AIzaSyDiPodAu_nGivbOtI5aM1_m0Me1jbJn-Dk',
                'Content-Type:	application/json'
            );
            $push=curl_init();
            curl_setopt($push,	CURLOPT_URL,	$url);
            curl_setopt($push,	CURLOPT_POST,	true);
            curl_setopt($push,	CURLOPT_HTTPHEADER,	$headers);
            curl_setopt($push,	CURLOPT_RETURNTRANSFER,	true);
            curl_setopt($push,	CURLOPT_SSL_VERIFYHOST,	0);
            curl_setopt($push,	CURLOPT_SSL_VERIFYPEER,	false);
            curl_setopt($push,	CURLOPT_POSTFIELDS,	json_encode($fields));
            $result	=	curl_exec($push);
            if(	$result	===	FALSE	)
            {
                die('El	envio	de	la	notifiacion	PUSH	fallo'.curl_error($push));
            }
            curl_close($push);
            return	$result;
        }

        $tokens	=	array();
        $con	=	mysqli_connect("localhost","root","hugopc","FCM");
        $qry	=	"select	token from fcm_register_app_ventas";
        $res	=	mysqli_query($con,$qry);
        if(	mysqli_num_rows($res)	>	0	){
            while($row	=	mysqli_fetch_assoc($res)){
                $tokens[]	=	$row['token'];
            }
        }
        mysqli_close($con);
        $mensajes=array("message"=>	"Su pedido fue procesado con exito..! "	);
        $estatus=enviar($tokens,$mensajes);




        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'pedido2/listpedidospendientes/'.$id_cliente.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $clientes_pedidos = json_decode($data, true);
        if (empty($clientes_pedidos)){
            return view('layouts.login')->with('expiro','');
        }


        if ($clientes_pedidos == null){
            return view('cliente_pedido_vend.list_clientes_pedidos')
                ->with('sin_pedidos','Este cliente no tiene ningun pedido pendiente')
                ->with('realizado','hfkjhsdjkhfkdshfk')
                ->with('noti','hfkjhsdjkhfkdshfk');

        }else{
            return view('cliente_pedido_vend.list_clientes_pedidos',compact('clientes_pedidos'));

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
        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'pedido2/listpedidospendientes/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $clientes_pedidos = json_decode($data, true);

        if ($clientes_pedidos == null){
            return view('cliente_pedido_vend.list_clientes_pedidos')->with('sin_pedidos','Este cliente no tiene ningun pedido pendiente');

        }else{
            return view('cliente_pedido_vend.list_clientes_pedidos',compact('clientes_pedidos'));

        }
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
            return view('pedido_vend.list_pedidos')
                ->with('pedidos', $pedidos)
                ->with('eliminado', 'dasdasd');
        }


}
