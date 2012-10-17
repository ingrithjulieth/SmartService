<?php 

class Login extends CI_Controller{

	function __construct(){
	
		parent::__construct();
		
	}

	function index(){

		$data['title'] = 'Login';
		$data['estilo'] = 'login';
		//$data['script'] = login_script;
		$this->load->view('login_vw', $data);
	}
	
	function logea(){

		$usuario = $this->input->post('user');
		$pass = $this->input->post('pass');	

		$this->load->model('login_mdl', "log");
		$query	 	=		$this->log->getUser($usuario, $pass);
		
		foreach ($query as $row){ $cedula = $row->cedula;}
	
		if($query){
			
			$data_ses = array(

				'id_user' => $cedula,
				'username' => $usuario,
				'is_logged_in' => true
			);

			$this->session->set_userdata($data_ses);
			header('Location: ../site/members');
		}else{header('Location: ../login');}
	}

}


?>