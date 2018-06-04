<?php

namespace Ventas\Http\Controllers;


use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class ProductosController extends Controller
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
            $client->request('GET', 'producto/listproductos/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $productos = json_decode($data, true);
        if (empty($productos)){
            return view('layouts.login')->with('expiro','');

        }else {
            //return view('list_productos',compact('productos'));
            return view('producto.list_productos', compact('productos'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        return view("producto.add_producto");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre_producto = $request->nombre_producto;
        $descripcion = $request->descripcion;
        $precio = $request->precio;
        $num_existencia = $request->num_existencia;


        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('constants.IP')."/Ventas/api/producto/insertproducto/".$_SESSION['token'];

        $myBody=
            [
                'nombre_producto' => $nombre_producto,
                'descripcion' =>  $descripcion,
                'precio' => $precio,
                'num_existencia' => $num_existencia
            ];
        $request = $client->post($url,['auth' => ['root', 'root'],
            'body'=>\GuzzleHttp\json_encode($myBody)]  );

        $response = $request;




        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'producto/listproductos/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $productos = json_decode($data, true);
        if (empty($productos)){
            return view('layouts.login')->with('expiro','');
        }else {
            //return view('cliente.list_clientes',compact('clientes'));
            return view('producto.list_productos')
                ->with('productos', $productos)
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
        //CONSUMIR WS DE LISTAR POR ID y mandarlo a la vista

        $token = $_SESSION['token'];

        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'producto/listproductos/'.$id.'/'.$token, ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $productos = json_decode($data, true);
        if (empty($productos)){
            return view('layouts.login')->with('expiro','');
        }else {


            $id_producto = $productos['producto']['id_producto'];

            return view('producto.edit_producto')
                ->with('productos', $productos)
                ->with('id_producto', $id_producto);
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

        $nombre_producto = $request->nombre_producto;
        $descripcion = $request->descripcion;
        $precio = $request->precio;
        $num_existencia = $request->num_existencia;


        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('constants.IP')."/Ventas/api/producto/updateproducto/".$_SESSION['token'];

        $myBody=
            [
                'id_producto' => $id,
                'nombre_producto' => $nombre_producto,
                'descripcion' =>  $descripcion,
                'precio' => $precio,
                'num_existencia' => $num_existencia
            ];
        $request = $client->put($url,['auth' => ['root', 'root'],
            'body'=>\GuzzleHttp\json_encode($myBody)]  );

        $response = $request;

        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'producto/listproductos/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $productos = json_decode($data, true);
        if (empty($productos)){
            return view('layouts.login')->with('expiro','');
        }else {


            //return view('producto.list_productos',compact('productos'));
            return view('producto.list_productos')
                ->with('productos', $productos)
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
        // Validar que el ID del producto no se encuentre asociado a algun pedido
        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'producto/buscaidenpedidos/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $encontrados = json_decode($data, true);

        if ($encontrados == null){
            //no esta asociado a algun pedido, se puede eliminar
            $client = new Client([
                'base_uri' => Config::get('constants.IP').'/Ventas/api/'

            ]);
            $response =
                $client->request('DELETE', 'producto/deleteproducto/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

            $data = (string) $response->getBody();
            $ELIM = json_decode($data, true);

            $client = new Client([
                'base_uri' => Config::get('constants.IP').'/Ventas/api/'

            ]);
            $response =
                $client->request('GET', 'producto/listproductos/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

            $data = (string) $response->getBody();
            $productos = json_decode($data, true);
            if (empty($productos)){
                return view('layouts.login')->with('expiro','');
            }else {


                return view('producto.list_productos')
                    ->with('productos', $productos)
                    ->with('eliminado', 'asjdhsajhd');
            }

        }else{
            //si esta asociado a algun pedido, no se puede eliminar
            $client = new Client([
                'base_uri' => Config::get('constants.IP').'/Ventas/api/'

            ]);
            $response =
                $client->request('GET', 'producto/listproductos/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

            $data = (string) $response->getBody();
            $productos = json_decode($data, true);
            if (empty($productos)){
                return view('layouts.login')->with('expiro','');
            }else {


                return view('producto.list_productos')
                    ->with('productos', $productos)
                    ->with('no_eliminado', 'daasdas');
            }
        }

    }
}
