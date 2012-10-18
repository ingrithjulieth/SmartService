<?php 

class Site extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('Site_mdl');
		$this->load->model('Api');
		$this->load->helper('date');
	}

	function members(){
		$this->load->view('includes/template');		
		date_default_timezone_set('America/Bogota');
	}

	//Carga las solicitudes recibidas.
	function loadSolicitudesRecibidas(){
		$fecha 		= $this->input->post('fecha');
		$data		= $this->Site_mdl->getService('1', $fecha);
		echo json_encode($data);
	}

	//Carga las solicitudes recibidas.
	function loadSolicitudesDesarrollo(){
		$fecha 		= $this->input->post('fecha');
		$data		= $this->Site_mdl->getService('2', $fecha);
		echo json_encode($data);
		
	}
	
	//Carga las solicitudes recibidas.
	function loadSolicitudesFinalizadas(){
		$fecha 		= $this->input->post('fecha');
		$data		= $this->Site_mdl->getService('3', $fecha);
		echo json_encode($data);
	}
		
	function loadPage(){
		
		$data['data_sol_proceso'] 		= $this->Site_mdl->getService('2', $fecha);
		$data['data_sol_finalizadas']	= $this->Site_mdl->getService('3', $fecha);
		echo json_encode($data);
	
	}
	
	function config(){
		
		$data['estilo'] 	 			= 'site';
		$data['main_content']		 	= 'config_vw';
		$data['script'] 				= 'config';
		$data['title'] 					= 'Configuraciones';
		$this->load->view('includes/template', $data);
	}
	
	function nuevosServiciosPolling(){
		$data['n_notificaciones'] 		= count($this->Site_mdl->numeroServicios());
		$data['id'] 					= $this->Site_mdl->numeroServicios();
		
		echo json_encode($data);
	}
	
	function recibidoToProcess(){
		$id =  $this->input->post('id_servicio');
		date_default_timezone_set('America/Bogota');
		$phpdate =  date("Y-m-d H:i:s");
		$this->Site_mdl->recibidoToProccess($id, $phpdate);
		echo json_encode($phpdate);
	}
	
	function processToFinish(){
		$id =  $this->input->post('id_servicio');
		date_default_timezone_set('America/Bogota');
		$phpdate =  date("Y-m-d H:i:s");
		$this->Site_mdl->processToFinish($id, $phpdate);
		echo json_encode($phpdate);
	}
	
	function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in !== true){
			redirect ('login');		
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect ('login');
	}
	
	function loadStadistics(){
		$categorias						= $this->Api->get('tipo_servicios');
		$intervalo 						= $this->input->post('rangoTiempo');
		foreach($categorias as &$categoria){
			//$servicios 				= $this->Api->get_where('servicio_detalle_completo', array('id_categoria' => $categoria['id_tipo']));
			$servicios					= $this->Site_mdl->getServiceOnTime($categoria['id_tipo'], $intervalo);
			$acumulador 				= 0;
			
			foreach($servicios as $servicio){
				$cantidad 				= $servicio['cantidad'];
				$acumulador 			= $acumulador + $cantidad;
			}
			
			$categoria['total'] 		= $acumulador;	 
		}
		
		echo  json_encode($categorias);
	}
	
	function loadStadisticsItem(){
		$items							= $this->Api->get('items_completo');
		$intervalo 						= $this->input->post('rangoTiempo');
		foreach($items as &$item){
			$servicios					= $this->Site_mdl->getServiceOnTimeItem($item['id_item'], $intervalo);
			$acumulador 				= 0;
			
			foreach($servicios as $servicio){
				$cantidad 				= $servicio['cantidad'];
				$acumulador 			= $acumulador + $cantidad;
			}		
			$item['total'] 		= $acumulador;	 
		}
		
		/////////////////******ORDENAR ARRAY POR EL TOTAL *******\\\\\\\\\\\\\\\
		foreach ($items as $key => $row) {
			$aux[$key] = $row['total'];	
    	}		
    	
    	array_multisort($aux, SORT_DESC, $items);
		echo  json_encode($items);
	}
	
	function loadStadisticsRoom(){
		$habitacion						= $this->Api->get('habitacion');
		$intervalo 						= $this->input->post('rangoTiempo');
		foreach($habitacion as &$hab){
			$servicios					= $this->Site_mdl->getServiceOnTimeRoom($hab['id'], $intervalo);
			$hab['total']  				= count($servicios);
		}
		
		//Falta organizar por el top // OJO
		echo  json_encode($habitacion);
	}
	
	//Actualia cada vez que hay una peticion por Sockets.
	function actualizaNotificaciones(){
		$data['servicio_notificacion'] 	= $this->Site_mdl->numeroServicios();
		$this->Site_mdl->actualizaNotificaciones();
		echo  json_encode($data);
	}

	//Activa servicio para poder ingresar al sistema en la TV
	function activaServicio(){

		$no_documento = $this->input->post('no_doc');
		$nombre = $this->input->post('n_huesped');
	    $fechaV = $this->input->post('fechaCheckout');
		$habitacion = $this->input->post('habitacion');
		$usuarioqActiva = $this->session->userdata('id_user');
		$email = $this->input->post('e_mail');

		$algo = explode('/', $fechaV);
		$date = new DateTime($algo[2].'-'.$algo[1].'-'.$algo[0]);
		$fechaV_formateada = $date->format('Y-m-d H:i:s');
		$this->Site_mdl->activaServicio($no_documento, $nombre, $fechaV_formateada, $habitacion, $usuarioqActiva, $email);

		$source = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$rstr = "";
			$source = str_split($source,1);
			for($i=1; $i<=5; $i++){
				mt_srand((double)microtime() * 1000000);
				$num = mt_rand(1,count($source));
				$rstr .= $source[$num-1];
			}
		
		$codigo = $rstr;
		echo json_encode($codigo);


		$this->load->library('email');

		$this->email->from('juan.paternina@gmail.com', 'Juan Paternina');
		$this->email->to($email); 

		$this->email->subject('Activación Asiste Concerje');
		$this->email->message('Esto es una prueba de activación de Asiste Concerje su codigo es el XXXX para ingresar al sistema de 
			leer y aceptar las politicas de uso, del sistema.');	

		$this->email->send();

		//echo json_encode($this->email->print_debugger());

	}


	
	function getHotelData(){
		$data = $this->Api->get('hotel');
		echo json_encode($data);
	}

	//Actualiza los datos del hotel.
	function updateHotelData(){

		$this->Site_mdl->updateHotelData($this->input->post());
		return true;
	}

	//Ingresa nuevo usuario a la BD
	function nuevoUsuario(){
		$this->Site_mdl->nuevoUsuario($this->input->post());
	}

	//Obtiene Categorias
	function getCategory(){
	
		$result						= $this->Site_mdl->getCategory();		
		$json_result 				= json_encode($result);
		
		echo $json_result; 
		
	}

	//Guardar Items
	function setItem(){
		$this->Site_mdl->setItem($this->input->post());
	}

	function getRooms(){
		$data = $this->Api->get('habitacion');
		echo json_encode($data);
	}

	function getItenandCategory(){
		$data = $this->Site_mdl->getItenandCategory();
		echo json_encode($data);
	}

	function eliminaUser(){
		$id = $this->input->post('id_user');
		$this->Site_mdl->eliminaUser($id);
	}


	function eliminaItem(){
		$id = $this->input->post('id_item');
		$this->Site_mdl->eliminaItem($id);
	}

	function getListUsers(){
		$data 		=		$this->Site_mdl->getListUsers();
		echo json_encode($data);
	}

	function getGuest(){

		$data 		= 		$this->Site_mdl->getGuest();
		echo json_encode($data);
	}

	function saveMessage(){
		$data 		= 		$this->Site_mdl->saveMessage($this->input->post());
		
	}

	function updatePassword(){
		$passOld = $this->input->post('passOld'); 
		$passNew = $this->input->post('passNew');
		$identificacion = $this->session->userdata('id_user'); 

		$ver = $this->Site_mdl->verificarOldPassword($identificacion);
		foreach ($ver as $v) {
			if ($passOld == $v->pass_d_sistema) {
				$this->Site_mdl->updatePassword($identificacion,$passNew);
				echo json_encode('La contraseña ha sido actuaizada correctamente');
			}
			else{
			echo json_encode('La contraseña actual no coincide');
			}
		}
		
	}

	function updateItemServicios(){
		$id_item = $this->input->post('id_item');
		$this->Site_mdl->updateItemServicios($id_item,$this->input->post());
	}


	function guardaFotoItem(){

		$config['upload_path'] = 'img/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['remove_spaces'] = true;
		$config['overwrite'] = false;
		$config['max_size']	= '4000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['file_name'] = 'uploadImg';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			echo json_encode($data);
			
		}

	}
		
}

?>