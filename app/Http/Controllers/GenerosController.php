<?php

namespace Ventas\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class GenerosController extends Controller
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
            $client->request('GET', 'genero/listgeneros/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $generos = json_decode($data, true);
        if (empty($generos)){
            return view('layouts.login')->with('expiro','');
        }else {
            return view('genero.list_generos', compact('generos'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("genero.add_genero");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $descripcion = $request->descripcion;



        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('constants.IP')."/Ventas/api/genero/insertgenero/".$_SESSION['token'];

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
            $client->request('GET', 'genero/listgeneros/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $generos = json_decode($data, true);
        if (empty($generos)){
            return view('layouts.login')->with('expiro','');
        }else {
            //return view('cliente.list_clientes',compact('clientes'));
            return view('genero.list_generos')
                ->with('generos', $generos)
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
            $client->request('GET', 'genero/listgeneros/'.$id.'/'.$token, ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $generos = json_decode($data, true);
        if (empty($generos)){
            return view('layouts.login')->with('expiro','');
        }else {


            $id_genero = $generos['genero']['id_genero'];

            return view('genero.edit_genero')
                ->with('generos', $generos)
                ->with('id_genero', $id_genero);
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

        $url = Config::get('constants.IP')."/Ventas/api/genero/updategenero/".$_SESSION['token'];

        $myBody=
            [
                'id_genero' => $id,
                'descripcion' =>  $descripcion

            ];
        $request = $client->put($url,['auth' => ['root', 'root'],
            'body'=>\GuzzleHttp\json_encode($myBody)]  );

        $response = $request;

        $client = new Client([
            'base_uri' => Config::get('constants.IP').'/Ventas/api/'

        ]);
        $response =
            $client->request('GET', 'genero/listgeneros/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $generos = json_decode($data, true);
        if (empty($generos)){
            return view('layouts.login')->with('expiro','');
        }else {


            //return view('list_productos',compact('productos'));
            return view('genero.list_generos')
                ->with('generos', $generos)
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
        //
    }
}
