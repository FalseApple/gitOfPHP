<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Login_check extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	public function getLoginCheck($_account, $_pass) {

		// 搜尋資料庫資料
		$this->db->from('emp');
		$this->db->where ( "user", $_account);
		$this->db->where ( "password", $_pass);
		$this->db->where('delete !=', 'Y');
		$query = $this->db->get ();

		if($query->num_rows() > 0 && $this->db->affected_rows() > 0)
		{
			// 設定session
			$sessiondata = array(
					'name'  => $query->row() -> name,
					'user' => $query->row() -> user,
					'competence' =>$query->row() -> competence,
					'logged_in' => true
			);
			$this->session->set_userdata($sessiondata);
			return 1;
		} else {
			$this->db->from('emp');
			$this->db->where ( "user", $_account);
			$this->db->where('delete !=', 'Y');
			$query = $this->db->get ();
			if($query->num_rows() > 0 && $this->db->affected_rows() > 0)
				return 2;
			else {
				return 3;
			}
		}
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
}

