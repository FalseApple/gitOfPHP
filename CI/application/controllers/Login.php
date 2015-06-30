<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Login extends CI_Controller {

	function __construct() {
		parent::__construct ();
	}	
	
	public function index() {
		
		// model 載入
		$this->load->model ( "Login_check", "Logc", True );
		
		// set
		$user = $_POST ['user'];
		$ps = $_POST ['pass'];
		$_Attach ["result"] = $S_result = $this->Logc->getLoginCheck ( $_POST ['user'] );
		
		if($user != null && $S_result ==  $ps && $S_result == true){
		
			// 設定session
			$sessiondata = array(
					'name'  => $this->Logc->getUserInfo ( $_POST ['user'] )->row()->name,
					'user' => $_POST ['user'] ,
					'competence' => $this->Logc->getUserInfo ( $_POST ['user'] )->row()->competence,
					'logged_in' => TRUE
			);
			// 存取session
			$this->session->set_userdata($sessiondata);
		}
		
		$_Attach["mode"] = 1;
		$this->load->view ( 'Sresult', $_Attach );
		
	}
	
}
