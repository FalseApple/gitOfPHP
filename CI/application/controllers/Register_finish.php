<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Register_finish extends CI_Controller {
	
	public function index() {
		
		// 定義全域變數
		global $check, $checkname, $check_1;
		
		// 註冊時，要檢查哪些重複 
		$check = array (
				'user',
				'name' 
		);
		
		// 對應上面檢查項目的中文名稱
		$checkname = array (
				'帳號',
				'名稱' 
		);
		
		// 接收變數
		$check_1 = array (
				"user" => $user = $_POST ['user'],				
				"name" =>$name = $_POST ['name'],
				"password" =>$pw = $_POST ['pass'],		
		);
		
		$pw2 = $_POST ['pass2'];
		$_Attach ["mode"] = 4;
		
		// 判斷帳號密碼是否為空值
		// 確認密碼輸入的正確性
		if ($name != null && $user != null && $pw != null && $pw == $pw2) {
			$this->load->model ( "Login_check", "Logc", True );
			
			// 判斷申請項目是否重複
			$checkItem = Register_finish::infoCheck ();
			switch ($checkItem) {
				
				case 1 :
					// 新增資料進資料庫語法
					$data = array (
							'name' => $name,
							'user' => $user,
							'password' => $pw,
							'delete' => 'N',
							'competence' => 1 
					);
					
					// updata
					$this->db->insert ( 'emp', $data );
					
					// 判斷是否新增成功
					switch ($this->db->affected_rows ()) {
						case 0 :
							$_Attach ["mode"] = 3;
							break;
						default :
							$_Attach ["mode"] = 2;
							break;
					}
					break;
				default :
					$_Attach ["mode"] = 11;
					$_Attach ["errormsg"] = $checkItem;
					break;
			}
		}
		$this->load->view ( 'Sresult', $_Attach );
	}
	
	public function infoCheck() {
		$this->load->model ( "Login_check", "Logc", True );
		
		global $check, $checkname, $check_1;
		
		for($a = 0; $a < count ( $check ); $a++) {
			if ($this->Logc->getUserOfInfoCheck ( $check [$a], $check_1 [$check [$a]] )) {
				return $checkname [$a];
			}
		}
		return true;
	}
}
