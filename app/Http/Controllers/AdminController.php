<?php

namespace Ventas\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //var $token="a071eca8fecbf0f084f43aa2850bb601";
    //var $ip ="http://192.168.43.201:8080";

    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        return view('layouts.admin');
    }

    public function send_mail($request){

        /*$data = array(
            'name' => "APP Ventas Informes"
        );
        $to=$request->email;

        Mail::send('emails.welcome',$data,function ($message){

            $message->from('josehugometal@gmail.com','APP Ventas');

            $message->to($this->$to->email)->subject();

        });
        */



}


}
