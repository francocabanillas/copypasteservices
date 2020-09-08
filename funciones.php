<?php
    
// function listarProductos(){	
// 	try { 	
// 		$db = Conexion::getConexion();
// 		$stmt = $db->prepare("select * from producto");
// 		$stmt->execute();
// 		$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);			
// 		$arreglo = array();
// 		foreach($filas as $fila) {			
// 		    $elemento = array();
// 			$elemento['idProducto'] = $fila['id_producto'];
// 			$elemento['nombre'] = $fila['nombre'];
// 			$elemento['descripcion'] = $fila['descripcion'];
// 			$elemento['precio'] = $fila['precio'];
// 			$elemento['stock'] = $fila['stock'];
// 			$elemento['importancia'] = $fila['importancia'];
// 			$elemento['imagen'] = $fila['imagen'];
// 			$elemento['id_categoria'] = $fila['id_categoria'];
// 			$arreglo[] = $elemento;
// 		}
// 		return $arreglo;
		
// 	} catch (PDOException $e) {
// 		$db->rollback();
// 		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
// 		die($mensaje);
// 	}		
// }

// function buscarProductosPorNombre($nombre){	
// 	try { 	
// 		$db = Conexion::getConexion();
// 		$stmt = $db->prepare("select * from producto where nombre like ?");
// 		$stmt->bindValue(1, "%$nombre%", PDO::PARAM_STR);

// 		$stmt->execute();
// 		$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);		
// 		$arreglo = array();
// 		foreach($filas as $fila) {			
// 			$elemento = array();
// 			$elemento['idProducto'] = $fila['id_producto'];
// 			$elemento['nombre'] = $fila['nombre'];
// 			$elemento['descripcion'] = $fila['descripcion'];
// 			$elemento['precio'] = $fila['precio'];
// 			$elemento['stock'] = $fila['stock'];
// 			$elemento['importancia'] = $fila['importancia'];
// 			$elemento['imagen'] = $fila['imagen'];
// 			$elemento['id_categoria'] = $fila['id_categoria'];
// 			$arreglo[] = $elemento;
// 		}
// 		return $arreglo;
		
// 	} catch (PDOException $e) {
// 		$db->rollback();
// 		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
// 		die($mensaje);
// 	}		
// }

// function insertarProducto($nombre, $descripcion, $precio, $stock, $importancia, $imagen, $idCategoria){
// 	try { 
// 		$db = Conexion::getConexion();			
// 		$stmt = $db->prepare("insert into producto (nombre, descripcion, precio, stock, importancia, imagen, id_categoria) values (?,?,?,?,?,?,?)");
// 		$datos = array($nombre, $descripcion, $precio,
// 					   $stock, $importancia, $imagen,
// 					   $idCategoria);
// 		$db->beginTransaction();
// 		$stmt->execute($datos);
// 		$db->commit();
// 	} catch (PDOException $e) {
// 		$db->rollback();
// 		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
// 		die($mensaje);
// 	}		
// }

// INSERT INTO `3504024_copypaste`.`clientes` (`id`, `cliente_nombre`, `correo`, `celular`, `fecha_creacion`, `id_tipousuario`) VALUES ('1', 'delivery', 'delivery@copypaste.pe', '999888777', '2020-09-08', NULL);



// function actualizarProducto($nombre, $descripcion, $precio, $stock, $importancia, $imagen, $idCategoria, $idProducto){
// 	try { 
// 		$db = Conexion::getConexion();		
// 		$stmt = $db->prepare("update producto set nombre=?, descripcion=?, precio=?, stock=?, importancia=?, imagen=?, id_categoria=? where id_producto=?");
// 		$datos = array($nombre, $descripcion, $precio, $stock, $importancia, $imagen, $idCategoria, $idProducto);
// 		$db->beginTransaction();						
// 		$stmt->execute($datos);			
// 		$db->commit();
// 	} catch (PDOException $e) {
// 		$db->rollback();
// 		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
// 		die($mensaje);
// 	}	
// }

// function eliminarProducto($id){
// 	try { 
// 		$db = Conexion::getConexion();  
// 		$stmt = $db->prepare("delete from producto where id_producto=?");
// 		$datos = array($id);
// 		$db->beginTransaction();			
// 		$stmt->execute($datos);			
// 		$db->commit();
// 	} catch (PDOException $e) {
// 		$db->rollback();
// 		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
// 		die($mensaje);
// 	}	
// }


// function listarAvisos(){	
// 	try { 	
// 		$db = Conexion::getConexion();
// 		$stmt = $db->prepare("select * from aviso");
// 		$stmt->execute();
// 		$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);			
// 		$arreglo = array();
// 		foreach($filas as $fila) {			
// 		    $elemento = array();
// 			$elemento['id_aviso'] = $fila['id_aviso'];
// 			$elemento['titulo'] = $fila['titulo'];
// 			$elemento['fecha_inicio'] = $fila['fecha_inicio'];
// 			$elemento['fecha_fin'] = $fila['fecha_fin'];
// 			$elemento['estado'] = $fila['estado'];
// 			$elemento['id_usuario'] = $fila['id_usuario'];
			
// 			$arreglo[] = $elemento;
// 		}
// 		return $arreglo;
		
// 	} catch (PDOException $e) {
// 		$db->rollback();
// 		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
// 		die($mensaje);
// 	}		
// }

// function buscarAvisos($fecha){	
// 	try { 	
// 		$db = Conexion::getConexion();
// 		$stmt = $db->prepare("select * from aviso where ? between fecha_inicio and fecha_fin");
// 		$stmt->bindValue(1, $fecha, PDO::PARAM_STR);

// 		$stmt->execute();
// 		$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);		
// 		$arreglo = array();
// 		foreach($filas as $fila) {			
// 			$elemento = array();
// 			$elemento['titulo'] = $fila['titulo'];
// 			$elemento['fecha_inicio'] = $fila['fecha_inicio'];
// 			$elemento['fecha_fin'] = $fila['fecha_fin'];
// 			$elemento['estado'] = $fila['estado'];
//                         $arreglo[] = $elemento;
// 		}
// 		return $arreglo;
		
// 	} catch (PDOException $e) {
// 		$db->rollback();
// 		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
// 		die($mensaje);
// 	}		
// }


// function insertarAviso($titulo, $fecha_inicio, $fecha_fin){
// 	try { 
// 		$db = Conexion::getConexion();			
// 		$stmt = $db->prepare("insert into aviso (titulo,fecha_inicio,fecha_fin,estado) values (?,?,?,'1')");
// 		$datos = array($titulo, $fecha_inicio, $fecha_fin);
// 		$db->beginTransaction();
// 		$stmt->execute($datos);
// 		$db->commit();
// 	} catch (PDOException $e) {
// 		$db->rollback();
// 		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
// 		die($mensaje);
// 	}		
// }

function login($correo,$clave){	
	try { 	
		$db = Conexion::getConexion();
		$stmt = $db->prepare("select c.id, c.cliente_nombre,c.correo,c.celular from clientes as c where c.correo= ? and c.clave= ? ");
		$stmt->bindValue(1, $correo, PDO::PARAM_STR);
		$stmt->bindValue(2, $clave, PDO::PARAM_STR);

		$stmt->execute();
		$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		$arreglo = array();
		foreach($filas as $fila) {			
			$elemento = array();
			$elemento['id'] = $fila['id'];
			$elemento['cliente_nombre'] = $fila['cliente_nombre'];
			$elemento['correo'] = $fila['correo'];
			$elemento['celular'] = $fila['celular'];
			$arreglo[] = $elemento;
		}
		return $arreglo;
		
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function registrarCliente($cliente_nombre, $correo, $celular, $clave){	
	try { 	
		$db = Conexion::getConexion();			
		$stmt = $db->prepare("INSERT INTO clientes (cliente_nombre, correo, celular, fecha_creacion, id_tipousuario, clave) VALUES ( ?, ?, ?, current_date, 1, ?)");
		$datos = array($cliente_nombre, $correo, $celular, $clave);
		$db->beginTransaction();
		$stmt->execute($datos);
		$db->commit();
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function actualizarCliente($cliente_nombre, $id){	
	try { 	
		$db = Conexion::getConexion();			
		$stmt = $db->prepare("UPDATE clientes SET cliente_nombre=? WHERE id=?");
		$datos = array($cliente_nombre, $id);
		$db->beginTransaction();
		$stmt->execute($datos);
		$db->commit();
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function resetearClave($correo){	
	try { 	
		$db = Conexion::getConexion();
		$stmt = $db->prepare("select c.id,c.cliente_nombre,c.correo,c.clave from clientes as c where c.correo=? limit 1");
		$stmt->bindValue(1, $correo, PDO::PARAM_STR);

		$stmt->execute();
		$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		$arreglo = array();
		foreach($filas as $fila) {			
			$elemento = array();
			$elemento['id'] = $fila['id'];
			$elemento['cliente_nombre'] = $fila['cliente_nombre'];
			$elemento['correo'] = $fila['correo'];
			$elemento['clave'] = $fila['clave'];
			$arreglo[] = $elemento;
		}
		return $arreglo;
		
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function obtenerMenu(){	
	try { 	
		$db = Conexion::getConexion();
		$stmt = $db->prepare("select a.id, a.articulo_nombre, a.categoria_nombre, a.precio, a.imagen_url from articulos a where a.clasificacion_id=1");
		$stmt->execute();
		$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		$arreglo = array();
		foreach($filas as $fila) {			
			$elemento = array();
			$elemento['id'] = $fila['id'];
			$elemento['articulo_nombre'] = $fila['articulo_nombre'];
			$elemento['categoria_nombre'] = $fila['categoria_nombre'];
			$elemento['precio'] = $fila['precio'];
			$elemento['imagen_url'] = $fila['imagen_url'];
			$arreglo[] = $elemento;
		}
		return $arreglo;
		
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function obtenerBebida(){	
	try { 	
		$db = Conexion::getConexion();
		$stmt = $db->prepare("select a.id, a.articulo_nombre, a.categoria_nombre, a.precio, a.imagen_url from articulos a where a.clasificacion_id=2 limit 1");
		$stmt->execute();
		$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		$arreglo = array();
		foreach($filas as $fila) {			
			$elemento = array();
			$elemento['id'] = $fila['id'];
			$elemento['articulo_nombre'] = $fila['articulo_nombre'];
			$elemento['categoria_nombre'] = $fila['categoria_nombre'];
			$elemento['precio'] = $fila['precio'];
			$elemento['imagen_url'] = $fila['imagen_url'];
			$arreglo[] = $elemento;
		}
		return $arreglo;
		
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function obtenerEntrada(){	
	try { 	
		$db = Conexion::getConexion();
		$stmt = $db->prepare("select a.id, a.articulo_nombre, a.categoria_nombre, a.precio, a.imagen_url from articulos a where a.clasificacion_id=3 limit 1");
		$stmt->execute();
		$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		$arreglo = array();
		foreach($filas as $fila) {			
			$elemento = array();
			$elemento['id'] = $fila['id'];
			$elemento['articulo_nombre'] = $fila['articulo_nombre'];
			$elemento['categoria_nombre'] = $fila['categoria_nombre'];
			$elemento['precio'] = $fila['precio'];
			$elemento['imagen_url'] = $fila['imagen_url'];
			$arreglo[] = $elemento;
		}
		return $arreglo;
		
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function obtenerCarta(){	
	try { 	
		$db = Conexion::getConexion();
		$stmt = $db->prepare("select a.id, a.articulo_nombre, a.categoria_nombre, a.precio, a.imagen_url from articulos a where a.clasificacion_id=4");
		$stmt->execute();
		$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		$arreglo = array();
		foreach($filas as $fila) {			
			$elemento = array();
			$elemento['id'] = $fila['id'];
			$elemento['articulo_nombre'] = $fila['articulo_nombre'];
			$elemento['categoria_nombre'] = $fila['categoria_nombre'];
			$elemento['precio'] = $fila['precio'];
			$elemento['imagen_url'] = $fila['imagen_url'];
			$arreglo[] = $elemento;
		}
		return $arreglo;
		
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function obtenerTodo(){	
	try { 	
		$db = Conexion::getConexion();
		$stmt = $db->prepare("select a.id, a.articulo_nombre, a.categoria_nombre, a.precio, a.imagen_url from articulos a ");
		$stmt->execute();
		$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		$arreglo = array();
		foreach($filas as $fila) {			
			$elemento = array();
			$elemento['id'] = $fila['id'];
			$elemento['articulo_nombre'] = $fila['articulo_nombre'];
			$elemento['categoria_nombre'] = $fila['categoria_nombre'];
			$elemento['precio'] = $fila['precio'];
			$elemento['imagen_url'] = $fila['imagen_url'];
			$arreglo[] = $elemento;
		}
		return $arreglo;
		
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function registrarClientedireccion($nombre_direccion, $latitud, $longitud, $clienteid){	
	try { 	
		$db = Conexion::getConexion();			
		$stmt = $db->prepare("INSERT INTO clientedirecciones (nombre_direccion, latitud, longitud, cliente_id) VALUES (?, ?, ?, ?) ");
		$datos = array($nombre_direccion, $latitud, $longitud, $clienteid);
		$db->beginTransaction();
		$stmt->execute($datos);
		$db->commit();
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function eliminarClientedireccion($id,$clienteid){
	try { 
		$db = Conexion::getConexion();  
		$stmt = $db->prepare("delete from clientedirecciones where id=? and cliente_id=?");
		$datos = array($id,$clienteid);
		$db->beginTransaction();			
		$stmt->execute($datos);			
		$db->commit();
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}	
}




?>