<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Logout extends CI_Controller {
	
	function __construct() {
		parent::__construct ();
		$this->session->sess_destroy();
		header("Location: ".site_url());
	}
	
	public function index() {
	}
	
}
?>