<?php 
	
	class Api extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model('Site_mdl');
		}

		function loginUser(){

			$user = $this->input->get('user');
			$pass = $this->input->get('password');

			$this->load->model('login_mdl', "log");
			$query	=	$this->log->getUser($user, $pass);

			if(count($query) > 0){
				$json_result = json_encode(true);
			}else{
				$json_result = json_encode(false);
			}
			
			if($_GET['callback']) {
				 echo $_GET['callback']."(".$json_result.")"; 
			} else {
				 echo $json_result; 
			}
		}
		
		//Obtiene Usuarios Autorizados para utilizar el sistema.
		function getUserSS(){

			$documento = $this->input->get('documento');
			$response = $this->Site_mdl->getUserSS($documento);

			$json_result = json_encode($response);
			//$json_result = json_encode($documento);

			if($_GET['callback']) {
				 echo $_GET['callback']."(".$json_result.")"; 
			} else {
				 echo $json_result; 
			}
		}


		function savePedido(){
		
			//Guarda El pedido y devuelve el id ../models/site_mdl.phpguardado
			
			$id =  $this->Site_mdl->savePedido();			
			$json_result = json_encode($id);
			
			//Actualiza El pedido con los detalles enviados.
			$post = $this->input->get('pedido');
			$post = json_decode($post);	
		
			foreach ($post->item as $p) {
				$id_item 	= 		$p->id_item;
				$obs 		= 		$p->observaciones;
				$cantidad 	= 		$p->cantidad;
				$this->Site_mdl->saveDetail($id, $id_item, $obs, $cantidad);	
			}
			
			if($_GET['callback']) {
				 echo $_GET['callback']."(".$json_result.")"; 
			} else {
				 echo $json_result; 
			}
		}
		
		function getCategory(){
		
			//Obtiene todos las Categorias
		
			$result						= $this->Site_mdl->getCategory();		
			$json_result 				= json_encode($result);
			
			if($_GET['callback']) {
				 echo $_GET['callback']."(".$json_result.")"; 
			} else {
				 echo $json_result; 
			}
		}

		function saveTaxi(){

			$hab = $this->input->get('habitacion');
			$id =  $this->Site_mdl->savePedido($hab);			
			$json_result = json_encode($id);

			$this->Site_mdl->saveDetail($id, 1, '', 1);

			if($_GET['callback']) {
				 echo $_GET['callback']."(".$json_result.")"; 
			} else {
				 echo $json_result; 
			}


		}
		
		function getItem(){
			
			//Obtiene todos los items del Sistema
			
			$result						= $this->Site_mdl->getItem();		
			$json_result 				= json_encode($result);
			
			if($_GET['callback']) {
				 echo $_GET['callback']."(".$json_result.")"; 
			} else {
				 echo $json_result; 
			}
		}
	}
	
	
?>