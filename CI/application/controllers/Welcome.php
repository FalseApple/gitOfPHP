<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Welcome extends CI_Controller {
	
	function __construct() {
		parent::__construct ();
	}
	public function index() {
		$_Attach["css"] = array("jquery-ui.min.css");
		$_Attach["js"] = array("jquery-1.11.3.min.js", "jquery-ui.min.js", "Login.js");
		$this->load->view ( 'welcome_message', $_Attach );
	}
	public function register() {
		$_Attach["css"] = array("jquery-ui.min.css");
		$_Attach["js"] = array("jquery-1.11.3.min.js", "jquery-ui.min.js", "Register.js");
		$this->load->view ( 'Register', $_Attach );
	}
}
