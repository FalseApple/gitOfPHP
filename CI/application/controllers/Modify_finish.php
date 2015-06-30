<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Modify_finish extends CI_Controller {
	
	function __construct() {
		parent::__construct ();
		$this->load->model ( "Login_check", "Logc", True );
		$this->load->model ( "Modify_model", "Modc", True );
	}

	public function modify($mode) {

		
		// 模式選擇
		$modify_a = false;
		switch ($mode) {
			
			// 修改資料(一般權限用)
			case 1 :
				$modifyItem = array (
						'name' => $_POST ['modifyName']
				);
				if ($this->Modc->modifyUserInfo ( $modifyItem )) {
					$this->session->set_userdata ( 'name', $modifyItem["name"] );
					$modify_a = true;
				}
				break;
			
			// 修改密碼
			case 2 :
				$modifyItem = array (
						'password' => $_POST ['modifyPass'] 
				);
				if ($this->Modc->modifyUserInfo ( $modifyItem )) {
					$modify_a = true;
				}
				break;
			
			// 修改資料(管理員權限用)
			case 3 :
				
				$modifyItem = array (
						'name' => $_POST ['MasterModifyName'],
						'user' => $_POST ['MasterModifyAccount'],
						'password' => $_POST ['MasterModifyPass'],
						'competence' => $_POST ['MasterModifyCompetence'] 
				);

				if ($this->Modc->modifyOtherUserInfo ( $modifyItem )) {
					$modify_a = true;
				}
				break;
		}
		
		// 確認是否有修改成功
		if ($modify_a) {
			echo json_encode ( "true" );
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
		switch ($this->db->affected_rows () >0){
			case 1:
				$deletesessiondata = array (
						'userOfmodify'
				);
				$this->session->unset_userdata ( $deletesessiondata );
				echo json_encode ( "true" );
				break;
			default:
				echo json_encode ( "false" );
				break;
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
		echo $this->db->affected_rows () >0? json_encode ( "true" ) : json_encode ( "false" );
	}
	
	public function UserModify() {
		$MasterModifyUser = $_POST ['MasterModifyUser'];
		// session 修改人資料
		$this->session->set_userdata ( 'userOfmodify', $this->Modc->getUserInfo ( $MasterModifyUser )->row () );
		// session修改前帳號
		$this->session->set_userdata ( 'session_Modifyuser', $this->Modc->getUserInfo ( $MasterModifyUser )->row ()->user );
		echo json_encode ( "true" );
	}
}
