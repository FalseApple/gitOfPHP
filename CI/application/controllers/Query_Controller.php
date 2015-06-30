<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Query_Controller extends CI_Controller {
	
	public function index() {

	}
	
	// 所有人資料載入
	public function Allmodify() {
		// model 載入
		$this->load->model ( "Login_check", "Logc", True );
		$_Attach ["allquery"] = $this->Logc->getaAllUserInfo();
		$this->load->view ( 'Allresult', $_Attach);
	}
	
	// 指定人資料載入
	public function Personalmodify($user) {
		// model 載入
		$this->load->model ( "Login_check", "Logc", True );
		$this->session->set_userdata('userOfmodify',  $this->Logc->getUserInfo ( $user)->row());
		$this->load->view ( 'DeleteOrModify_Page' );
	}
	
}
