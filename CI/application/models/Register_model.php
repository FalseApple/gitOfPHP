<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Register_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}

	public function getCheckOfRegAccount($account) {
		// 搜尋資料庫資料
		$this->db->from('emp');
		$this->db->where ( "user", $account);
		$this->db->where('delete !=', 'Y');
		$query = $this->db->get ();
		
		if($this->db->affected_rows() > 0 &&  $query->row()->user == $account)
		{
			return 1;
		} else {
			return 2;
		}
	}
	
	public function getUserOfInfoCheck($checkitem, $_var) {
		// 搜尋資料庫資料
		$this->db->select ($checkitem);
		$this->db->where ($checkitem, $_var);
		$query = $this->db->get ( "emp" );
	
		if($this->db->affected_rows() > 0 && $query->row()->$checkitem == $_var)
		{
			return true;
		} else {
			return false;
		}
	}
	
	public function regAccount($check_1) {
		// 新增資料進資料庫語法
		$data = array (
				'name' => $check_1['name'],
				'user' => $check_1['user'],
				'password' => $check_1['password'],
				'delete' => 'N',
				'competence' => 1 
		);
		
		// updata
		$this->db->insert ( 'emp', $data );
	
		if($this->db->affected_rows() > 0)
		{
			return 1;
		} else {
			return 2;
		}
	}
	
}

