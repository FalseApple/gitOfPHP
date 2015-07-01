<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Api extends CI_Controller {
	function __construct() {
		parent::__construct ();
		
		$this->load->model ( "User", "user", TRUE );
	}
	function index() {
		$S_result = $this->user->getHomework ();
		//print_r($S_result);, JSON_FORCE_OBJECT
		$jsonData = new stdClass();
		$jsonData->Data =$S_result;
		echo json_encode  ($jsonData) ;
		// echo json_decode ( $S_result ) ;
		/*$aryJson = json_decode ( $this->input->raw_input_stream );
		echo json_encode ( $this->user->setReceiver ( $aryJson ) );*/
	}
	function StreamSave(){
		$aryJson = json_decode ( $this->input->raw_input_stream );
	}
	function sender() {
		echo json_encode ( $this->user->getSender () );
	}
	function receiver() {

	}
}