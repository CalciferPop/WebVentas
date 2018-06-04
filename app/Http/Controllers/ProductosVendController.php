<?php

namespace Ventas\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductosVendController extends Controller
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
            return view('producto_vend.list_productos', compact('productos'));
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
        //
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
