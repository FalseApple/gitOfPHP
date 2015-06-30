<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class UserUseing extends CI_Controller {
	
	/*public $queryArray = array (
			"css" => array (
					"jquery-ui.min.css" 
			),
			"js" => array (
					"jquery-1.11.3.min.js",
					"jquery-ui.min.js",
					"login.js",
					"user.js" 
			) 
			$this->queryArray
	);*/
	
	function __construct() {
		parent::__construct ();
		if($this->session->userdata ( 'name' ) == ""){
			$_Attach ["mode"] = 1;
			$this->load->view ( 'Sresult', $_Attach);
		} else {
			// model 載入
			$this->load->model ( "Login_check", "Logc", True );
		}
	}
	
	public function Modify_Page($mode_q) {
		if($this->session->userdata ( 'logged_in' )){
			$_Attach["css"] = array("jquery-ui.min.css");
			$_Attach["js"] = array("jquery-1.11.3.min.js", "jquery-ui.min.js", "Modify.js");
			$this->session->set_userdata ( 'mode_q', $mode_q );
			$this->load->view ( 'Modify_Page' ,  $_Attach);
		}
	}
	public function ReModify_Page() {
		if($this->session->userdata ( 'logged_in' )){
			$_Attach["css"] = array("jquery-ui.min.css");
			$_Attach["js"] = array("jquery-1.11.3.min.js", "jquery-ui.min.js", "Modify.js");
			$this->load->view ( 'Modify_Page' , $_Attach);
		}
	}
	public function user() {
		if($this->session->userdata ( 'logged_in' )){
			$this->load->view ( 'User');
		}
	}
	public function ReDelete() {
		if($this->session->userdata ( 'logged_in' )){
			$this->load->view ( 'DeleteOrModify_Page' );
		}
	}
	
	public function Allmodify() {
		if($this->session->userdata ( 'logged_in' )){
			// model 載入
			$_Attach["css"] = array("jquery-ui.min.css");
			$_Attach["js"] = array("jquery-1.11.3.min.js", "jquery-ui.min.js", "DeleteModify.js");
			$_Attach ["allquery"] = $this->Logc->getaAllUserInfo();
			$this->load->view ( 'Allresult', $_Attach);
		}
	}
	
	// 指定人資料載入
	public function Personalmodify() {
		if($this->session->userdata ( 'logged_in' )){
			// model 載入
			$_Attach["css"] = array("jquery-ui.min.css");
			$_Attach["js"] = array("jquery-1.11.3.min.js", "jquery-ui.min.js", "Modify.js");
			$this->load->view ( 'DeleteOrModify_Page' , $_Attach);
		}
	}
}
