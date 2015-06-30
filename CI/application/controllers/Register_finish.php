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
		
		switch ($this->Regc->getCheckOfRegAccount ( $regAccount )) {
			case 1 :
				echo json_encode ( "帳號已被註冊!!" );
				break;
			case 2 :
				echo json_encode ( "帳號可註冊!!" );
				break;
			default :
				echo json_encode ( "發生錯誤!" );
				break;
		}
	}
	
	public function RegisterAccount() {
		
		// 註冊時，要檢查哪些重複
		$check = array (
				'user'
		);
		
		// 對應上面檢查項目的中文名稱
		$checkname = array (
				'帳號'
		);
		
		// 接收變數
		$check_1 = array (
				"user" => $_POST ['regAccount'],
				"name" => $_POST ['regName'],
				"password" => $_POST ['regPass'],
				"password2" => $_POST ['regPass2'] 
		);
		
		for($a = 0; $a < count ( $check ); $a ++) {
			if ($this->Regc->getUserOfInfoCheck ( $check [$a], $check_1 [$check [$a]] )) {
				echo json_encode ( $checkname [$a] );
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
