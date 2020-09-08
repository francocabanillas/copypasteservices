<?php
require_once './lib/Slim/Slim.php';
require_once 'funciones.php';
require_once 'Conexion.php';

// Autocarga de la librería
\Slim\Slim::registerAutoloader();

// Creando una instancia del Slim
$app = new \Slim\Slim();
$app->response->header('Content-Type', 'application/json');

// // Servicio 1
// $app->get('/productos', function(){  
//     $lista = listarProductos();    
//     echo json_encode($lista);    
// });

// // Servicio 2
// $app->get('/productos/:nombre', function($nombre){   
//     $lista = buscarProductosPorNombre($nombre);    
//     echo json_encode($lista);    
// });

// // Servicio 3
// $app->post('/productos', function () use ($app) {    
//    $nombre = $app->request()->post('nombre');
//    $precio = $app->request()->post('precio');   
//    insertarProducto($nombre, '', $precio, 0, 0, '', 1);   
//    echo json_encode(array('mensaje' => "Producto registrado satisfactoriamente"));    
// });


// // Servicio 4
// $app->get('/avisos', function(){  
//     $lista = listarAvisos();    
//     echo json_encode($lista);    
// });


// // Servicio 5
// $app->get('/avisos/:fecha', function($fecha){  
//     $lista = buscarAvisos($fecha);    
//     echo json_encode($lista);    
// });


// // Servicio 6
// $app->post('/avisos', function() use ($app){     
//    /*
//    $request = $app->request();
//    $body = $request->getBody();
//    $data = json_decode($body);       
//    insertarAviso($data->titulo, $data->fecha_inicio, $data->fecha_fin);
//    */
//    $titulo = $app->request()->post('titulo');
//    $fecha_inicio = $app->request()->post('fecha_inicio');
//    $fecha_fin = $app->request()->post('fecha_fin');
//    insertarAviso($titulo, $fecha_inicio, $fecha_fin);
//    echo json_encode(array('mensaje' => "Aviso registrado!"));    
// });

//Login
$app->get('/login', function() use ($app){  
    $correo = $app->request()->post('correo');
    $clave = $app->request()->post('clave');
    $lista = login($correo,$clave);
    echo json_encode($lista);    
});

//Registrar cliente
$app->post('/registrarcliente', function () use ($app) {    
   $cliente_nombre = $app->request()->post('cliente_nombre');
   $correo = $app->request()->post('correo');  
   $celular = $app->request()->post('celular');
   $clave = $app->request()->post('clave'); 
   registrarCliente($cliente_nombre, $correo, $celular, $clave);   
   echo json_encode(array('mensaje' => "Cliente registrado satisfactoriamente"));    
});

//Actualizar cliente
$app->put('/registrarcliente/:id', function ($id) use ($app) {    
    $cliente_nombre = $app->request()->post('cliente_nombre'); 
    actualizarCliente($cliente_nombre, $id);
    echo json_encode(array('mensaje' => "Cliente actualizado satisfactoriamente"));    
 });

 //Resetear clave
$app->get('/resetearclave/:correo', function($correo){  
    $lista = resetearClave($correo);
    echo json_encode($lista);    
});

 //obtener Menu
 $app->get('/obtenermenu', function(){  
    $lista = obtenerMenu();
    echo json_encode($lista);    
});

 //obtener Bebida
 $app->get('/obtenerbebida', function(){  
    $lista = obtenerBebida();
    echo json_encode($lista);    
});

 //obtener Entrada
 $app->get('/obtenerentrada', function(){  
    $lista = obtenerEntrada();
    echo json_encode($lista);    
});

 //obtener Carta
 $app->get('/obtenercarta', function(){  
    $lista = obtenerCarta();
    echo json_encode($lista);    
});

 //obtener Todo
 $app->get('/obtenertodo', function(){  
    $lista = obtenerTodo();
    echo json_encode($lista);    
});

//Registrar cliente direccion
$app->post('/registrarclientedireccion/:clienteid', function ($clienteid) use ($app) {
    $nombre_direccion = $app->request()->post('nombre_direccion');  
    $latitud = $app->request()->post('latitud');
    $longitud = $app->request()->post('longitud');
    registrarClientedireccion($nombre_direccion, $latitud, $longitud, $clienteid); 
    echo json_encode(array('mensaje' => "Direccion registrada satisfactoriamente"));    
 });

 //Eliminar cliente direccion
 $app->delete('/eliminarclientedireccion/:clienteid', function ($clienteid) use ($app) {
    $id = $app->request()->post('id');
    eliminarClientedireccion($id,$clienteid); 
    echo json_encode(array('mensaje' => "Direccion eliminada satisfactoriamente"));    
 });


 

$app->run();