<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Login_check extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	public function getLoginCheck($_User) {
		
		// 搜尋資料庫資料
		$this->db->select ( 'password' );
		$this->db->where ( 'user', $_User);
		$this->db->where('delete !=', 'Y');
		$query = $this->db->get ( "emp" );
		
		if($this->db->affected_rows() > 0 && $query->row()->password != null)
		{
			return true;
		} else {
			return false;
		}
		// $row = $query->row_array ();
	}
	
	public function getUserInfo($_User) {
		// 搜尋資料庫資料
		$this->db->select ( '*' );
		$this->db->where ( 'user', $_User );
		$query = $this->db->get ( "emp" );
		return $query;
		//return $this->db->get ( "emp" )->Result();
	}

	public function getUserOfInfoCheck($item, $_var) {
		// 搜尋資料庫資料
		$this->db->select ($item);
		$this->db->where ($item, $_var);
		$query = $this->db->get ( "emp" );

		if($this->db->affected_rows() > 0 && $query->row()->$item == $_var)
		{
			return true;
		} else {
			return false;
		}		
	}
	
	public function getaAllUserInfo() {
		$this->db->select ( '*' );
		$this->db->where('delete ', 'N');
		$query = $this->db->get ( "emp" );
		return $query->Result();
	}
}

