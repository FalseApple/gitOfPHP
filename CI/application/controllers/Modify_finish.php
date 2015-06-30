<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Modify_finish extends CI_Controller {
	public function modify($mode) {
		
		$session_user = $this->session->userdata ( 'user' );
		$le2 = 0;
		
		// 模式選擇
		switch ($mode) {
			
			// 修改資料(一般權限用)
			case 1 :
				$name = $_POST ['name'];
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
				$pw = $_POST ['pass'];
				$pw2 = $_POST ['pass2'];
				if ($pw != null && $pw == $pw2 ) {
					$data = array (
							'password' => $pw 
					);
					$this->db->where ( 'user', $session_user );
					$this->db->update ( 'emp', $data );
				}
				break;
			
			// 修改資料(管理員權限用)
			case 3 :
				$user = $_POST ['user'];
				$name = $_POST ['name'];
				$pw = $_POST ['pass'];
				$pw2 = $_POST ['pass2'];
				$competence = $_POST ['competence'];
				if ($user != null && $name != null && $pw != null && $pw == $pw2 && $competence != null) {
					$data = array (
							'user' => $user,
							'name' => $name,
							'password' => $pw,
							'competence' => $competence 
					);
					$this->db->where ( 'user', $user );
					$this->db->update ( 'emp', $data );
				}
				$le2 = 1;
				break;
		}
		
		// 確認是否有修改成功
		if ($this->db->affected_rows () > 0) {
			$_Attach ["mode"] = 5;
			$this->load->view ( 'Sresult', $_Attach );
		} else {
			$_Attach ["mode"] = 6;
			if ($le2 == 1)
				$_Attach ["mode"] = 10;
			$this->load->view ( 'Sresult', $_Attach );
		}
	}
	
	// 刪除資料(將資料庫delete )
	public function DeleteInfo($user) {
		
		// 設為 'Y' 方便歷史查詢
		$data = array (
				'delete' => 'Y' 
		);
		$this->db->where ( 'user', $user );
		$this->db->update ( 'emp', $data );
		
		/*
		  // 完整刪除
		  $this->db->where('user', $user);
		  $this->db->delete('emp');
		 */
		
		// 確認是否有刪除成功
		if ($this->db->affected_rows () > 0) {
			$_Attach ["mode"] = 8;
			$this->load->view ( 'Sresult', $_Attach );
		} else {
			$_Attach ["mode"] = 9;
			$this->load->view ( 'Sresult', $_Attach );
		}
	}
}
