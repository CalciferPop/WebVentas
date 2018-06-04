<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/','AdminController@index');

//Productos

Route::get('productos','AdminController@m_listaProductos');
Route::get('add_producto','AdminController@m_addProducto');
Route::get('agregaProducto','AdminController@m_agregaProducto');

//Clientes

Route::get('clientes','AdminController@m_listaClientes');
Route::get('add_cliente','AdminController@m_addCliente');
Route::get('agregaCliente','AdminController@m_agregaCliente');
Route::get('editCliente','AdminController@m_editCliente');
Route::get('editaCliente','AdminController@m_editaCliente');

//Empleados

Route::get('empleados','AdminController@m_listaEmpleados');
Route::get('add_empleado','AdminController@m_addEmpleado');
//Route::get('agregaEmpleado','AdminController@m_agregaEmpleado');

//Generos

Route::get('generos','AdminController@m_listaGeneros');
Route::get('add_genero','AdminController@m_addGenero');
Route::get('agregaGenero','AdminController@m_altaGenero');

//Roles
Route::get('roles','AdminController@m_listaRoles');
Route::get('add_rol','AdminController@m_addRol');
Route::get('agregaRol','AdminController@m_agregaRol');

//Rutas
Route::get('rutas','AdminController@m_listaRutas');
Route::get('add_ruta','AdminController@m_addRuta');
Route::get('agregaRuta','AdminController@m_agregaRuta');
Route::get('pedidos','AdminController@m_listaPedidos');
//Route::get('/pedidos_cliente','AdminController@m_listaPedidos');


Route::get('rutas_clientes','AdminController@m_listaRutasClientes');
Route::get('usuarios','AdminController@m_listaUsuarios');

Route::get('add_pedido','AdminController@m_addPedido');
Route::get('add_usuario','AdminController@m_addUsuario');
Route::get('rutas_clientes','AdminController@m_listaRutasClientes');
Route::get('verify','AdminController@m_altaCliente');

Route::get('agregaUsuario','AdminController@m_altaUsuario');


*/

Route::get('/','LoginController@index');

Route::resource('login','LoginController');

Route::get('admin','AdminController@index');
Route::get('sendmail','AdminController@send_mail');

Route::group(['prefix'=>'admin'],function (){

    Route::resource('productos','ProductosController');
    Route::resource('clientes','ClientesController');
    Route::resource('clientes_pedidos','ClientePedidoController');
    Route::resource('clientes_pedidos_2','ClientePedido2Controller');
    Route::resource('empleados','EmpleadosController');
    Route::resource('generos','GenerosController');
    Route::resource('pedidos','PedidosController');
    Route::resource('roles','RolesController');
    Route::resource('rutas','RutasController');
    Route::resource('empleado_rol','EmpleadosRolesController');
    Route::resource('rutas_clientes','RutasClientesController');


    Route::get('clientes/{id}/destroy',
        ['uses' => "ClientesController@destroy",
            'as' => 'clientes.destroy']);

    Route::get('clientes_pedidos/{id}/destroy',
        ['uses' => "ClientePedidoController@destroy",
            'as' => 'clientes_pedidos.destroy']);

    Route::get('productos/{id}/destroy',
        ['uses' => "ProductosController@destroy",
            'as' => 'productos.destroy']);

    Route::get('empleados/{id}/destroy',
        ['uses' => "EmpleadosController@destroy",
            'as' => 'empleados.destroy']);

    Route::get('generos/{id}/destroy',
        ['uses' => "GenerosController@destroy",
            'as' => 'generos.destroy']);

    Route::get('pedidos/{id}/destroy',
        ['uses' => "PedidosController@destroy",
            'as' => 'pedidos.destroy']);

    Route::get('rutas/{id}/destroy',
        ['uses' => "RutasController@destroy",
            'as' => 'rutas.destroy']);

    Route::get('rutas_clientes/{id}/destroy',
        ['uses' => "RutasClientesController@destroy",
            'as' => 'rutas_clientes.destroy']);

    Route::get('empleado_rol/{id}/{id2}/destroy',
        ['uses' => "EmpleadosRolesController@destroy",
            'as' => 'empleado_rol.destroy']);

    Route::get('empleado_rol/{id}/{id2}/{nomb_emp}/{nomb_rol}/edit',
        ['uses' => "EmpleadosRolesController@edit",
            'as' => 'empleado_rol.edit']);

    Route::get('empleado_rol/update/{id}/{id2}',
        ['uses' => "EmpleadosRolesController@update",
            'as' => 'empleado_rol.update']);

});

Route::group(['prefix'=>'vendedor'],function (){

    Route::resource('productos_v','ProductosVendController');
    Route::resource('clientes_v','ClientesVendController');
    Route::resource('clientes_pedidos_v','ClientePedidoVendController');
    Route::resource('clientes_pedidos_2_v','ClientePedido2VendController');
    Route::resource('pedidos_v','PedidosVendController');
    Route::resource('empleados_v','EmpleadosVendController');
    Route::resource('generos_v','GenerosVendController');
    Route::resource('roles_v','RolesVendController');
    Route::resource('rutas_v','RutasVendController');

    Route::get('clientes_v/{id}/destroy',
        ['uses' => "ClientesVendController@destroy",
            'as' => 'clientes_v
            .destroy']);

    Route::get('pedidos_v/{id}/destroy',
        ['uses' => "PedidosVendController@destroy",
            'as' => 'pedidos_v.destroy']);


    Route::get('clientes_pedidos_v/{id}/destroy',
        ['uses' => "ClientePedidoVendController@destroy",
            'as' => 'clientes_pedidos_v.destroy']);

    /*Route::resource('clientes','ClientesController');
    Route::resource('clientes_pedidos','ClientePedidoController');
    Route::resource('clientes_pedidos_2','ClientePedido2Controller');
    Route::resource('empleados','EmpleadosController');
    Route::resource('generos','GenerosController');
    Route::resource('pedidos','PedidosController');
    Route::resource('roles','RolesController');
    Route::resource('rutas','RutasController');
    Route::resource('empleado_rol','EmpleadosRolesController');
    Route::resource('rutas_clientes','RutasClientesController');


    Route::get('clientes/{id}/destroy',
        ['uses' => "ClientesController@destroy",
            'as' => 'clientes.destroy']);

    Route::get('clientes_pedidos/{id}/destroy',
        ['uses' => "ClientePedidoController@destroy",
            'as' => 'clientes_pedidos.destroy']);

    Route::get('productos/{id}/destroy',
        ['uses' => "ProductosController@destroy",
            'as' => 'productos.destroy']);

    Route::get('empleados/{id}/destroy',
        ['uses' => "EmpleadosController@destroy",
            'as' => 'empleados.destroy']);

    Route::get('generos/{id}/destroy',
        ['uses' => "GenerosController@destroy",
            'as' => 'generos.destroy']);

    Route::get('pedidos/{id}/destroy',
        ['uses' => "PedidosController@destroy",
            'as' => 'pedidos.destroy']);

    Route::get('rutas/{id}/destroy',
        ['uses' => "RutasController@destroy",
            'as' => 'rutas.destroy']);

    Route::get('rutas_clientes/{id}/destroy',
        ['uses' => "RutasClientesController@destroy",
            'as' => 'rutas_clientes.destroy']);

    Route::get('empleado_rol/{id}/{id2}/destroy',
        ['uses' => "EmpleadosRolesController@destroy",
            'as' => 'empleado_rol.destroy']);

    Route::get('empleado_rol/{id}/{id2}/{nomb_emp}/{nomb_rol}/edit',
        ['uses' => "EmpleadosRolesController@edit",
            'as' => 'empleado_rol.edit']);

    Route::get('empleado_rol/update/{id}/{id2}',
        ['uses' => "EmpleadosRolesController@update",
            'as' => 'empleado_rol.update']);
    */

});

















