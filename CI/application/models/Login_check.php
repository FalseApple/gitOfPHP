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
			return 1;  // 帳密正確輸出1
		} else {
			$this->db->from('emp');
			$this->db->where ( "user", $_account);
			$this->db->where('delete !=', 'Y');
			$query = $this->db->get ();
			if($query->num_rows() > 0 && $this->db->affected_rows() > 0)
				return 2;  // 密碼錯誤 輸出2
			else {
				return 3;  // 無此帳號 輸出3
			}
		}
	}

	public function getaAllUserInfo() {
		$this->db->select ( '*' );
		$this->db->where('delete ', 'N');
		$query = $this->db->get ( "emp" );
		return $query->Result();
	}
}	


