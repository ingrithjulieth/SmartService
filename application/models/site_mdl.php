<?php 
	
	class Site_mdl extends CI_model{
	
		function __construct(){
	        parent::__construct();
	        date_default_timezone_set('America/Bogota');
	    }

	    function updatePassword($identificacion,$passNew){
	    	$q = $this->db->query("UPDATE usuario set pass_d_sistema = ".$passNew." where cedula = ".$identificacion);
	    }

	    function verificarOldPassword($identificacion){
	    	$q = $this->db->query("select * from usuario WHERE cedula = ".$identificacion);
	    	if($q->num_rows == "1"){
				return $q->result();
			}else{
				return false;
			}
	    }

	    function saveMessage($data){
			$phpdate =  date("Y-m-d H:i:s");
	    	$data['fecha_msj'] = $phpdate;
	    
			$this->db->insert('mensajes', $data);
	    }

	    function getGuest(){

	    	$q = $this->db->query("select * from getGuest");
	    	return $q->result();
	    }

	    function getListUsers(){
	    	$q = $this->db->query('Select * from getListUsers where activo = 1');
	    	return $q->result();
	    }

	    //Inactiva Elimina Users de la Tabla.
	    function eliminaUser($id){
	    	$data = array('activo' => 0);
	    	$this->db->where('id_user',$id)->update('usuario',$data);

	    }

	    //Inactiva Elimina items de la Tabla.
	    function eliminaItem($id){
	    	$data = array('active' => 0);
	    	$this->db->where('id_item',$id)->update('item',$data);

	    }

	    //Obtiene Usuarios autorizados para usar SmartService;
	    function getUserSS($documento){
	    	$q = $this->db->query("Select * from usuario_sguest, habitacion where no_documento = ".$documento." and fechaVencimiento >= now()
and fechaCreacion <= NOW() and  usuario_sguest.habitacion = habitacion.id order by fechaVencimiento DESC limit 1");

			if($q->num_rows > 0){
				return $q->result();
			}else{
				return false;
			}
	    }


	    //Guardar Item
	    function setItem($data){      
        	$this->db->insert('item', $data);
        }

	    //Crea nuevo usuario en la base de datos
	    function nuevoUsuario($data){
	    	$this->db->insert('usuario', $data);
	    }


	    function updateHotelData($data){
	    	//$dataHotel = $data;
	    	$this->db->update('hotel', $data);   
	    }

	    //Crea Servicio nuevo para ingresar al Sistema SmartService
	    function activaServicio($no_documento, $nombre, $fechaV, $habitacion, $usuarioqActiva, $email){

	    	$data = array (
		    	'no_documento' 			=> $no_documento,
		    	'nombre_huesped'		=> $nombre,
		    	'fechaVencimiento' 		=> $fechaV,
		    	'habitacion' 			=> $habitacion,
		    	'usuarioGenerador'		=> $usuarioqActiva,
		    	'email_huesped'			=> $email
		    );
		    
		    return $this->db->insert('usuario_sguest', $data);
	    }
	    	    
	    //Actuailza todas nuevos servicios como leidos.
	    function actualizaNotificaciones(){
		    $q = $this->db->query("UPDATE servicio SET leido='1' WHERE leido='0'");
		    return true;
	    }
	    
	    //Devuelve El numero de Servicios Sin leer;
	    function numeroServicios(){
		    $q = $this->db->query("Select * from servicio, habitacion where leido = 0 and id = id_habitacion");
		    if($q->num_rows >= 0){
					return $q->result();
				}else{
					echo false;
			}
	    }
	    
	    function getCategoryandItems(){
		    
		    $q = $this->db->query("SELECT * FROM servicio_detalle, item, tipo_servicios
		    			where servicio_detalle.id_item = item.id_item
		    			and  item.id_categoria = tipo_servicios.id_tipo");
        						       
				if($q->num_rows >= 0){
					return $q->result();
				}else{
					echo false;
			}
	    }
	    
	    function getServiceOnTime($id_categoria, $intervalo){
			$q = $this->db->query("select * from servicio_detalle_completo 
									WHERE id_categoria = ".$id_categoria."
									AND fechahora_inicio >= DATE_SUB(NOW(),INTERVAL '.$intervalo.' YEAR_MONTH)");
			return $q->result_array();

	    }
	    
	    function getServiceOnTimeItem($id_item, $intervalo){
			$q = $this->db->query("select * from servicio_detalle_completo 
									WHERE id_item = ".$id_item."
									AND fechahora_inicio >= DATE_SUB(NOW(),INTERVAL '.$intervalo.' YEAR_MONTH)");
			return $q->result_array();
	    }
	    
	     function getServiceOnTimeRoom($id_habitacion,  $intervalo){
			$q = $this->db->query("select * from  servicio
									where id_habitacion = ".$id_habitacion."
									AND fechahora_solicitud >= DATE_SUB(NOW(),INTERVAL '.$intervalo.' YEAR_MONTH)");
			return $q->result_array();
	    }
	    
	    function savePedido($hab){ 
		    $service = array(
		    	'id_habitacion' => 1,
		    );
		    $this->db->insert('servicio', $service);
		    return $this->db->insert_id();
	    }
	    
	    function saveDetail($id, $id_item, $obs, $cantidad){
			$service = array (
		    	'id_servicio' 			=> $id,
		    	'id_item' 				=> $id_item,
		    	'observaciones' 		=> $obs,
		    	'cantidad' 				=> $cantidad
		    );
		    
		    $this->db->insert('servicio_detalle', $service);
	    }
	    
	    function recibidoToProccess($id, $date){	
			
			$data = array(
				'estado_servicio' => 2,
				'fechahora_proceso' => $date
			);
			
			$this->db->where('id_detalle', $id);
			$this->db->update('servicio_detalle', $data);      
		}
		
		function processToFinish($id, $date){
			$data = array(
				'estado_servicio' => 3,
				'fechahora_final' => $date
			);
			
			$this->db->where('id_detalle', $id);
			$this->db->update('servicio_detalle', $data);      
		}


		function getItenandCategory(){

			$q = $this->db->query("SELECT * FROM item, tipo_servicios where id_categoria = id_tipo and active = 1");
    						       
			if($q->num_rows >= 0){
				return $q->result();
			}else{
				echo false;
			}
		}

		
		function getCategory(){
		
			$q = $this->db->query("SELECT * FROM tipo_servicios");
        						       
				if($q->num_rows >= 0){
					return $q->result();
				}else{
					echo false;
				}
		}
		
		function getItem(){
		
			$q = $this->db->query("SELECT * FROM item");
        						       
				if($q->num_rows >= 0){
					return $q->result();
				}else{
					echo false;
				}
		}
				
		//Obtiene toda la informaciom de los Servicios, con una fecha.
		function getService($id_service, $fecha){
        	
        	$q = $this->db->query("SELECT * FROM servicio_detalle, servicio, habitacion, item
        		WHERE  servicio_detalle.id_servicio = servicio.id_servicio 
        		AND id = id_habitacion
        		AND servicio_detalle.id_item = item.id_item
        		AND servicio_detalle.estado_servicio  = '$id_service'
        		AND servicio_detalle.fechahora_inicio LIKE '%$fecha%'");
        		        							     						       
			if($q->num_rows >= 0){
				return $q->result();
			}else{
				echo false;
			}
        }


    }
	
	
?>
