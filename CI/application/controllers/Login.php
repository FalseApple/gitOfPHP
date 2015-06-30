<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Login extends CI_Controller {
	function __construct() {
		parent::__construct ();
		// model 載入
		$this->load->model ( "Login_check", "Logc", True );
	}
	public function index() {
	}
	public function loginResponse() {
		$account = $_POST ['account'];
		$pass = $_POST ['pass'];
		
		$S_result = $this->Logc->getLoginCheck ( $account, $pass );
		
		switch ($S_result) {
			case 1 :
				echo json_encode ( "/UserUseing/user" );
				break;
			case 2 :
				echo json_encode ( "1" );
				break;
			case 3 :
			default :
				echo json_encode ( "2" );
				break;
		}
	}
}
