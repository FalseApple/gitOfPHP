<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Logout extends CI_Controller {
	
	function __construct() {
		parent::__construct ();
	}
	
	public function index() {
		// 將session清空
			$deletesessiondata = array(
					'name',
					'user', 
					'userOfmodify'
			);
		$this->session->unset_userdata($deletesessiondata);
		$_Attach["mode"] = 7;
		$this->load->view ( 'Sresult', $_Attach );		
	}
	
}
?>