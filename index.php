<?php
require_once './lib/Slim/Slim.php';
require_once 'funciones.php';
require_once 'Conexion.php';

// Autocarga de la librería
\Slim\Slim::registerAutoloader();

// Creando una instancia del Slim
$app = new \Slim\Slim();
$app->response->header('Content-Type', 'application/json');

//Login
$app->post('/login', function() use ($app){  
    $correo = $app->request()->post('correo');
    $clave = $app->request()->post('clave');
    $lista = login($correo,$clave);
    echo json_encode($lista);    
});

//Registrar cliente
$app->post('/cliente', function () use ($app) {    
   $cliente_nombre = $app->request()->post('cliente_nombre');
   $correo = $app->request()->post('correo');  
   $celular = $app->request()->post('celular');
   $clave = $app->request()->post('clave'); 
   registrarCliente($cliente_nombre, $correo, $celular, $clave);   
   echo json_encode(array('mensaje' => "Cliente registrado satisfactoriamente"));    
});

//Actualizar cliente
$app->put('/cliente/:id', function ($id) use ($app) {    
    $cliente_nombre = $app->request()->post('cliente_nombre'); 
    actualizarCliente($cliente_nombre, $id);
    echo json_encode(array('mensaje' => "Cliente actualizado satisfactoriamente"));    
 });

 //Resetear clave
$app->get('/reset/:correo', function($correo){  
    $lista = resetearClave($correo);
    echo json_encode($lista);    
});

 //obtener Menu
 $app->get('/menus', function(){  
    $lista = obtenerMenu();
    echo json_encode($lista);    
});

 //obtener Bebida
 $app->get('/bebida', function(){  
    $lista = obtenerBebida();
    echo json_encode($lista);    
});

 //obtener Entrada
 $app->get('/entrada', function(){  
    $lista = obtenerEntrada();
    echo json_encode($lista);    
});

 //obtener Carta
 $app->get('/carta', function(){  
    $lista = obtenerCarta();
    echo json_encode($lista);    
});

 //obtener Todo
 $app->get('/menus/todo', function(){  
    $lista = obtenerTodo();
    echo json_encode($lista);    
});

//Registrar cliente direccion
$app->post('/clientedireccion/:clienteid', function ($clienteid) use ($app) {
    $nombre_direccion = $app->request()->post('nombre_direccion');  
    $latitud = $app->request()->post('latitud');
    $longitud = $app->request()->post('longitud');
    registrarClientedireccion($nombre_direccion, $latitud, $longitud, $clienteid); 
    echo json_encode(array('mensaje' => "Direccion registrada satisfactoriamente"));    
 });

 //Eliminar cliente direccion
 $app->delete('/clientedireccion/:clienteid', function ($clienteid) use ($app) {
    $id = $app->request()->post('id');
    eliminarClientedireccion($id,$clienteid); 
    echo json_encode(array('mensaje' => "Direccion eliminada satisfactoriamente"));    
 });

 //Registrar pedido
$app->post('/pedido/:clienteid', function ($clienteid) use ($app) {
    $cliente_direccion_id = $app->request()->post('cliente_direccion_id');  
    $precio_total = $app->request()->post('precio_total');
    registrarPedido($clienteid, $cliente_direccion_id, $precio_total); 
    echo json_encode(array('mensaje' => "Pedido registrada satisfactoriamente"));    
 });
 
 //Registrar detalle
 $app->post('/detalle/:pedidoid', function ($pedidoid) use ($app) {
    $articulo_id = $app->request()->post('articulo_id');  
    $cantidad = $app->request()->post('cantidad');  
    $precio = $app->request()->post('precio');
    registrarDetalle($pedidoid, $articulo_id, $cantidad, $precio); 
    echo json_encode(array('mensaje' => "Detalle de pedido registrado satisfactoriamente"));    
 });

//Actualizar pedido entregado
$app->put('/pedido/entregado/:id', function ($id) { 
    actualizarPedidoentregado($id);
    echo json_encode(array('mensaje' => "Pedido actualizado satisfactoriamente"));    
 });

 //Actualizar pedido anulado
$app->put('/pedido/anulado/:id', function ($id) use ($app){ 
    $motivo = $app->request()->post('motivo');  
    $imagen_url = $app->request()->post('imagen_url');
    actualizarPedidoanulado($id, $motivo, $imagen_url);
    echo json_encode(array('mensaje' => "Pedido actualizado satisfactoriamente"));    
 });

 //obtener pedidos de clientes
 $app->get('/pedido/cliente/:id', function($id){  
    $lista = obtenerPedidoCliente($id);
    echo json_encode($lista);    
});

 //obtener pedidos pendientes
 $app->get('/pedido/pendiente', function(){  
    $lista = obtenerPedidopendiente();
    echo json_encode($lista);    
});

 //obtener pedidos por id
 $app->get('/pedido/:id', function($id){  
    $lista = obtenerPedidoid($id);
    echo json_encode($lista);    
});

 //obtener pedidos por correo e id
 $app->get('/pedido/correo/:id', function($id) use ($app){
    $correo = $app->request()->post('correo'); 
    $lista = obtenerPedidoidcorreo($id,$correo);
    echo json_encode($lista);    
});

$app->run();