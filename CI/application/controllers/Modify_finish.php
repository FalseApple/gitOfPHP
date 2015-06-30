<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Modify_finish extends CI_Controller {
	
	function __construct() {
		parent::__construct ();
			$this->load->model ( "Login_check", "Logc", True );
	}
	
	public function modify($mode) {
		$session_user = $this->session->userdata ( 'user' );
		
		// 模式選擇
		switch ($mode) {
			
			// 修改資料(一般權限用)
			case 1 :
				$name = $_POST ['modifyName'];
				if ($name != null) {
					$data = array (
							'name' => $name 
					);
					$this->db->where ( 'user', $session_user );
					$this->db->update ( 'emp', $data );
					$this->session->set_userdata ( 'name', $name );
				}
				break;
			
			// 修改密碼
			case 2 :
				$pw = $_POST ['modifyPass'];
				$pw2 = $_POST ['modifyPass2'];
				if ($pw != null && $pw == $pw2) {
					$data = array (
							'password' => $pw 
					);
					$this->db->where ( 'user', $session_user );
					$this->db->update ( 'emp', $data );
				}
				break;
			
			// 修改資料(管理員權限用)
			case 3 :
				$session_Modifyuser = $this->session->userdata ( 'userOfmodify' )->user;
				$account = $_POST ['MasterModifyAccount'];
				$name = $_POST ['MasterModifyName'];
				$pw = $_POST ['MasterModifyPass'];
				$pw2 = $_POST ['MasterModifyPass2'];
				$competence = $_POST ['MasterModifyCompetence'];
				if ($account != null && $name != null && $pw != null && $pw == $pw2 && $competence != null) {
					$data = array (
							'user' => $account,
							'name' => $name,
							'password' => $pw,
							'competence' => $competence 
					);
					$this->db->where ( 'user', $session_Modifyuser );
					$this->db->update ( 'emp', $data );
				}
				break;
		}
		
		// 確認是否有修改成功
		if ($this->db->affected_rows () > 0) {
			echo json_encode ( "/UserUseing/user" );
		} else {
			echo json_encode ( "false" );
		}
	}
	
	// 刪除資料(將資料庫delete )
	public function DeleteInfo() {
		$session_Modifyuser = $this->session->userdata ( 'userOfmodify' )->user;
		
		// 設為 'Y' 方便歷史查詢
		$data = array (
				'delete' => 'Y' 
		);
		$this->db->where ( 'user', $session_Modifyuser );
		$this->db->update ( 'emp', $data );
		
		// 確認是否有刪除成功
		if ($this->db->affected_rows () > 0) {
			$deletesessiondata = array (
					'userOfmodify' 
			);
			$this->session->unset_userdata ( $deletesessiondata );
			echo json_encode ( "/UserUseing/Allmodify" );
		} else {
			echo json_encode ( "false" );
		}
	}
	
	// 刪除資料(將資料庫delete )
	public function UserDeleteInfo() {
		$MasterModifyUser = $_POST ['MasterModifyUser'];
		
		$data = array (
				'delete' => 'Y' 
		);
		$this->db->where ( 'user', $MasterModifyUser );
		$this->db->update ( 'emp', $data );
		
		// 確認是否有刪除成功
		if ($this->db->affected_rows () > 0) {
			echo json_encode ( "/UserUseing/Allmodify" );
		} else {
			echo json_encode ( "false" );
		}
	}
	public function UserModify() {
		$MasterModifyUser = $_POST ['MasterModifyUser'];
		$this->session->set_userdata ( 'userOfmodify', $this->Logc->getUserInfo ( $MasterModifyUser )->row () );
		$this->session->set_userdata ( 'session_Modifyuser', $this->Logc->getUserInfo ( $MasterModifyUser )->row ()->user );
		echo json_encode ( "/UserUseing/Personalmodify" );

	}
}
