<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	
	class Api extends CI_Model{
		
		//-------------------------------------------------------------------------------------------
		//	DATABASE DOCUMENTATION
		//
		//-------------------------------------------------------------------------------------------

		public function __construct(){
	        parent::__construct();
	    }


	    /*
		* get 				: Returns an array of records
		* @table[string] 	: Name of the table/object you want to fetch.
		* @order[array] 	: Ordering field. First element is the column, asc or desc second.
	    */
	    public function get($table){
	    	$q = $this->db->get($table);
	    	return $q->result_array();
	    }


	    /*
		* get_where 		: returns an array of records
		* @table[string] 	: Name of the table/object you want to fetch.
		* @condition[array]	: Parameters to filter with.
		* @order[array] 	: Ordering field. First element is the column, asc or desc second.
	    */
	    public function get_where($table, $condition = array()){
	    	$q = $this->db->get_where($table,$condition);
	    	return $q->result_array();
	    }

	    /*
		* get_distinct_where: returns an array of records-
		* @table[string] 	: Name of the table/object you want to fetch.
		* @fields[string] 	: Name of the fields to the distinct sql sentence, comma separated if more than one
		* @condition[array]	: Parameters to filter with.
		* @order[array] 	: Ordering field. First element is the column, asc or desc second.
	    */
	    public function get_distinct_where($table, $fields, $condition = array(), $order = array('id','asc')){
	    	$this->db->distinct();
	    	$this->db->select($fields);
	    	$this->db->where($condition);
	    	$this->db->order_by($order[0],$order[1]);
	    	$q = $this->db->get($table);
	    	return $q->result_array();	
	    }

	    /*
		* create 			: returns the inserted id
		* @table[string] 	: Name of the table/object you want to fetch.
		* @data[array]		: Associative array containing the data to insert.
	    */
	    public function create($table,$data){
	    	$q = $this->db->insert($table,$data);
	    	return $this->db->insert_id();
	    }

	    /*
		* update 			: returns void
		* @table[string] 	: Name of the table/object you want to fetch.
		* @data[array]		: Associative array containing the data to insert.
		* @id[int] 			: id of the object to update 
	    */
	    public function update($table,$data,$id){
	    	$this->db->where('id',$id)->update($table,$data);
	    }

	    /*
		* delete 			: returns void
		* @table[string] 	: Name of the table/object you want to fetch.
		* @id[int] 			: id of the object to deactive 
	    */
	    public function delete($table,$id){
	    	$data = array('active' => 0);
	    	$this->db->where('id',$id)->update($table,$data);
	    }

	}

?>