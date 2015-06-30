<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Register_finish extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( "Register_model", "Regc", True );
	}
	public function index() {
	}
	public function regAccountCheck() {
		$regAccount = $_POST ['regAccount'];
		echo json_encode ( $this->Regc->getCheckOfRegAccount ( $regAccount ) );
	}
	
	public function RegisterAccount() {
		
		// 註冊時，要檢查哪些重複  前面輸入變數 後面輸出名稱
		$check = array (
				'user','帳號',
				'name','名稱'
		);
		
		// 接收變數
		$check_1 = array (
				"user" => $_POST ['regAccount'],
				"name" => $_POST ['regName'],
				"password" => $_POST ['regPass'],
				"password2" => $_POST ['regPass2'] 
		);
		for($a = 0; $a < count ( $check ); $a= $a + 2) {
			if ($this->Regc->getUserOfInfoCheck ( $check [$a], $check_1 [$check [$a]] )) {
				echo json_encode ( $check [$a+1] );
				return false;
			}
		}

		switch ($this->Regc->regAccount ( $check_1 )) {
			case 1 :
				echo json_encode ( "true" );
				break;
			case 2 :
				echo json_encode ( "false" );
				break;
		}
	}
}
