<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Modify_model extends CI_Model {
	function __construct() {
		parent::__construct ();
		$this->load->model ( "Register_model", "Modc", True );
	}
	public function modifyUserInfo($modifyItem) {
		$this->db->where ( 'user', $this->session->userdata ( 'user' ) );
		$this->db->update ( 'emp', $modifyItem );
		if ($this->db->affected_rows () > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	public function modifyOtherUserInfo($modifyItem) {
		$this->db->where ( 'user', $this->session->userdata ( 'userOfmodify' )->user );
		$this->db->update ( 'emp', $modifyItem );
		if ($this->db->affected_rows () > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getUserInfo($_User) {
		// 搜尋資料庫資料
		$this->db->select ( '*' );
		$this->db->where ( 'user', $_User );
		$query = $this->db->get ( "emp" );
		return $query;
	}
}	


