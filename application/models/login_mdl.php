<?php 

class Login_mdl extends CI_Model{

	function __construct(){
        parent::__construct();
    }

	public function getUser($usuario, $pass){

		$this->db->where('usuario_d_sistema', $usuario);
		$this->db->where('pass_d_sistema', $pass);
		$this->db->where('activo', '1');
		$q = $this->db->get('usuario');

		if($q->num_rows == 1){
			return $q->result();
		}
	}

}

?>