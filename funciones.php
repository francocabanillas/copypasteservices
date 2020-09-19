<?php
    
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

function seleccionarCliente($id){	
	try { 	
		$db = Conexion::getConexion();
		$stmt = $db->prepare("select c.id, c.cliente_nombre,c.correo,c.celular from clientes as c where c.id= ? ");
		$stmt->bindValue(1, $id, PDO::PARAM_STR);

		$stmt->execute();
		$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		$arreglo = array();
		foreach($filas as $fila) {			
			$elemento = array();
			$elemento['id'] = $fila['id'];
			$elemento['cliente_nombre'] = $fila['cliente_nombre'];
			$elemento['correo'] = $fila['correo'];
			$elemento['celular'] = $fila['celular'];

			$stmt2 = $db->prepare("SELECT id, nombre_direccion, latitud, longitud, cliente_id FROM clientedirecciones WHERE cliente_id = ? LIMIT 1 ");
			$stmt2->bindValue(1, $fila['id'], PDO::PARAM_STR);
			$stmt2->execute();
			$filas2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);	
			foreach($filas2 as $fila2) {		
				$elemento['direccion_id'] = $fila2['id'];
				$elemento['nombre_direccion'] = $fila2['nombre_direccion'];
				$elemento['latitud'] = $fila2['latitud'];
				$elemento['longitud'] = $fila2['longitud'];
			}

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
		$stmt = $db->prepare("select a.id, a.articulo_nombre, a.categoria_nombre, a.precio from articulos a where a.clasificacion_id=2 limit 1");
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

function obtenerBebidas(){	
	try { 	
		$db = Conexion::getConexion();
		$stmt = $db->prepare("select a.id, a.articulo_nombre, a.categoria_nombre, a.precio, a.imagen_url from articulos a where a.clasificacion_id=2 ");
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
		$stmt = $db->prepare("select a.id, a.articulo_nombre, a.categoria_nombre, a.precio from articulos a where a.clasificacion_id=3 limit 1");
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
		$stmt = $db->prepare("delete from clientedirecciones where cliente_id=?");
		$datos = array($clienteid);
		$db->beginTransaction();			
		$stmt->execute($datos);			
		$db->commit();
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}	
}

function registrarPedido($cliente_id, $cliente_direccion_id, $precio_total){	
	try { 	
		$db = Conexion::getConexion();			
		$stmt = $db->prepare("INSERT INTO pedido (cliente_id, cliente_direccion_id, precio_total, fecha, estado) VALUES ( ?, ?, ?, current_date, 1)");
		$datos = array($cliente_id, $cliente_direccion_id, $precio_total);
		$db->beginTransaction();
		$stmt->execute($datos);
		$db->commit();

		$stmt2 = $db->prepare("select id from pedido where cliente_id = ? order by id desc limit 1 ");
		$stmt2->bindValue(1, $cliente_id, PDO::PARAM_STR);
		$stmt2->execute();
		$filas = $stmt2->fetchAll(PDO::FETCH_ASSOC);		
		$arreglo = array();
		foreach($filas as $fila) {			
			$elemento = array();
			$elemento['id'] = $fila['id'];
			$arreglo[] = $elemento;
		}
		return $arreglo;


	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function registrarDetalle($pedido_id, $articulo_id, $cantidad, $precio){	
	try { 	
		$db = Conexion::getConexion();			
		$stmt = $db->prepare("INSERT INTO pedido_detalles (pedido_id, articulo_id, cantidad, precio) VALUES ( ?, ?, ?, ?)");
		$datos = array($pedido_id, $articulo_id, $cantidad, $precio);
		$db->beginTransaction();
		$stmt->execute($datos);
		$db->commit();
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function actualizarPedidoentregado($id){	
	try { 	
		$db = Conexion::getConexion();			
		$stmt = $db->prepare("UPDATE pedido set estado=2 where id=?");
		$datos = array($id);
		$db->beginTransaction();
		$stmt->execute($datos);
		$db->commit();
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function actualizarPedidoanulado($id, $motivo, $imagen_url){	
	try { 	
		$db = Conexion::getConexion();			
		$stmt = $db->prepare("UPDATE pedido set estado=0 where id=?");
		$datos = array($id);
		$db->beginTransaction();
		$stmt->execute($datos);
		$db->commit();

		$stmt = $db->prepare("INSERT INTO pedido_cancelados (pedido_id, motivo, imagen_url) VALUES (?, ?, ?)");
		$datos = array($id, $motivo, $imagen_url);
		$db->beginTransaction();
		$stmt->execute($datos);
		$db->commit();

	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function obtenerPedidoCliente($idcliente){	
	try { 	
		$db = Conexion::getConexion();

		$stmt = $db->prepare("SELECT p.id, p.precio_total, p.fecha, c.cliente_nombre, c.celular, p.cliente_id, p.estado  FROM pedido p LEFT JOIN clientes c ON c.id=p.cliente_id WHERE p.cliente_id=?");
		$stmt->bindValue(1, $idcliente, PDO::PARAM_STR);
		$stmt->execute();
		$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		$arreglo = array();
		
		foreach($filas as $fila) {			
			$elemento = array();
			$elemento['id'] = $fila['id'];
			$elemento['precio_total'] = $fila['precio_total'];
			$elemento['fecha'] = $fila['fecha'];
			$elemento['cliente_nombre'] = $fila['cliente_nombre'];
			$elemento['celular'] = $fila['celular'];
			$elemento['cliente_id'] = $fila['cliente_id'];
			$elemento['estado'] = $fila['estado'];

			
			$stmt2 = $db->prepare("SELECT d.articulo_id, d.cantidad, d.precio, a.articulo_nombre FROM pedido_detalles d LEFT JOIN articulos a ON a.id=d.articulo_id WHERE d.pedido_id = ? ");
			$stmt2->bindValue(1, $fila['id'], PDO::PARAM_STR);
			$stmt2->execute();
			$filas2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);	
			$arreglo2 = array();
			
			foreach($filas2 as $fila2) {			
				$elemento2 = array();
				$elemento2['articulo_id'] = $fila2['articulo_id'];
				$elemento2['cantidad'] = $fila2['cantidad'];
				$elemento2['precio'] = $fila2['precio'];
				$elemento2['articulo_nombre'] = $fila2['articulo_nombre'];
				$arreglo2[] = $elemento2;
			}
			$elemento['detalle'] = $arreglo2;

			$arreglo[] = $elemento;
		}
		return $arreglo;
		
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function obtenerPedidopendiente(){	
	try { 	
		$db = Conexion::getConexion();

		$stmt = $db->prepare("SELECT p.id, p.precio_total, p.fecha, c.cliente_nombre, c.celular, p.cliente_id, p.estado  FROM pedido p LEFT JOIN clientes c ON c.id=p.cliente_id WHERE p.estado=1");
		$stmt->execute();
		$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		$arreglo = array();
		
		foreach($filas as $fila) {			
			$elemento = array();
			$elemento['id'] = $fila['id'];
			$elemento['precio_total'] = $fila['precio_total'];
			$elemento['fecha'] = $fila['fecha'];
			$elemento['cliente_nombre'] = $fila['cliente_nombre'];
			$elemento['celular'] = $fila['celular'];
			$elemento['cliente_id'] = $fila['cliente_id'];
			$elemento['estado'] = $fila['estado'];

			
			$stmt2 = $db->prepare("SELECT d.articulo_id, d.cantidad, d.precio, a.articulo_nombre FROM pedido_detalles d LEFT JOIN articulos a ON a.id=d.articulo_id WHERE d.pedido_id = ? ");
			$stmt2->bindValue(1, $fila['id'], PDO::PARAM_STR);
			$stmt2->execute();
			$filas2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);	
			$arreglo2 = array();
			
			foreach($filas2 as $fila2) {			
				$elemento2 = array();
				$elemento2['articulo_id'] = $fila2['articulo_id'];
				$elemento2['cantidad'] = $fila2['cantidad'];
				$elemento2['precio'] = $fila2['precio'];
				$elemento2['articulo_nombre'] = $fila2['articulo_nombre'];
				$arreglo2[] = $elemento2;
			}
			$elemento['detalle'] = $arreglo2;

			$arreglo[] = $elemento;
		}
		return $arreglo;
		
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function obtenerPedidoid($id){	
	try { 	
		$db = Conexion::getConexion();

		$stmt = $db->prepare("SELECT p.id, p.precio_total, p.fecha, c.cliente_nombre, c.celular, p.cliente_id, p.estado  FROM pedido p LEFT JOIN clientes c ON c.id=p.cliente_id WHERE p.id=?");
		$stmt->bindValue(1, $id, PDO::PARAM_STR);
		$stmt->execute();
		$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		$arreglo = array();
		
		foreach($filas as $fila) {			
			$elemento = array();
			$elemento['id'] = $fila['id'];
			$elemento['precio_total'] = $fila['precio_total'];
			$elemento['fecha'] = $fila['fecha'];
			$elemento['cliente_nombre'] = $fila['cliente_nombre'];
			$elemento['celular'] = $fila['celular'];
			$elemento['cliente_id'] = $fila['cliente_id'];
			$elemento['estado'] = $fila['estado'];

			
			$stmt2 = $db->prepare("SELECT d.articulo_id, d.cantidad, d.precio, a.articulo_nombre FROM pedido_detalles d LEFT JOIN articulos a ON a.id=d.articulo_id WHERE d.pedido_id = ? ");
			$stmt2->bindValue(1, $fila['id'], PDO::PARAM_STR);
			$stmt2->execute();
			$filas2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);	
			$arreglo2 = array();
			
			foreach($filas2 as $fila2) {			
				$elemento2 = array();
				$elemento2['articulo_id'] = $fila2['articulo_id'];
				$elemento2['cantidad'] = $fila2['cantidad'];
				$elemento2['precio'] = $fila2['precio'];
				$elemento2['articulo_nombre'] = $fila2['articulo_nombre'];
				$arreglo2[] = $elemento2;
			}
			$elemento['detalle'] = $arreglo2;

			$arreglo[] = $elemento;
		}
		return $arreglo;
		
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}

function obtenerPedidoidcorreo($id,$correo){	
	try { 	
		$db = Conexion::getConexion();

		$stmt = $db->prepare("SELECT p.id, p.precio_total, p.fecha, c.cliente_nombre, c.celular, p.cliente_id, p.estado  FROM pedido p LEFT JOIN clientes c ON c.id=p.cliente_id WHERE p.id=? AND c.correo=?");
		$stmt->bindValue(1, $id, PDO::PARAM_STR);
		$stmt->bindValue(2, $correo, PDO::PARAM_STR);
		$stmt->execute();
		$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		$arreglo = array();
		
		foreach($filas as $fila) {			
			$elemento = array();
			$elemento['id'] = $fila['id'];
			$elemento['precio_total'] = $fila['precio_total'];
			$elemento['fecha'] = $fila['fecha'];
			$elemento['cliente_nombre'] = $fila['cliente_nombre'];
			$elemento['celular'] = $fila['celular'];
			$elemento['cliente_id'] = $fila['cliente_id'];
			$elemento['estado'] = $fila['estado'];

			$stmt2 = $db->prepare("SELECT d.articulo_id, d.cantidad, d.precio, a.articulo_nombre FROM pedido_detalles d LEFT JOIN articulos a ON a.id=d.articulo_id WHERE d.pedido_id = ? ");
			$stmt2->bindValue(1, $fila['id'], PDO::PARAM_STR);
			$stmt2->execute();
			$filas2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);	
			$arreglo2 = array();
			
			foreach($filas2 as $fila2) {			
				$elemento2 = array();
				$elemento2['articulo_id'] = $fila2['articulo_id'];
				$elemento2['cantidad'] = $fila2['cantidad'];
				$elemento2['precio'] = $fila2['precio'];
				$elemento2['articulo_nombre'] = $fila2['articulo_nombre'];
				$arreglo2[] = $elemento2;
			}
			$elemento['detalle'] = $arreglo2;

			$stmt3 = $db->prepare("SELECT d.pedido_id, d.motivo, d.imagen_url FROM pedido_cancelados d WHERE d.pedido_id = ? ");
			$stmt3->bindValue(1, $fila['id'], PDO::PARAM_STR);
			$stmt3->execute();
			$filas3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);	
			$arreglo3 = array();
			
			foreach($filas3 as $fila3) {			
				$elemento3 = array();
				$elemento3['pedido_id'] = $fila3['pedido_id'];
				$elemento3['motivo'] = $fila3['motivo'];
				$elemento3['imagen_url'] = $fila3['imagen_url'];
				$arreglo3[] = $elemento3;
			}
			$elemento['cancelado'] = $arreglo3;

			$arreglo[] = $elemento;
		}
		return $arreglo;
		
	} catch (PDOException $e) {
		$db->rollback();
		$mensaje  = '<b>Consulta inválida:</b> ' . $e->getMessage() . "<br/>";
		die($mensaje);
	}		
}


?>