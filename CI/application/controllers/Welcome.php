<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function register()
	{
		$this->load->view ( 'Register' );
	}

	public function Modify_Page($mode_q)
	{
		$this->session->set_userdata('mode_q', $mode_q);
		$this->load->view ( 'Modify_Page');
	}
	
	public function ReModify_Page()
	{
		$this->load->view ( 'Modify_Page');
	}		
	
	public function user()
	{
		$this->load->view ( 'User' );
	}
	
	public function ReDelete()
	{
		$this->load->view ( 'DeleteOrModify_Page' );
	}

}
