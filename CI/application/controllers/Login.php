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
		echo json_encode ( $S_result );
	}
}
