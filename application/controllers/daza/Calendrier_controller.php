<?php
 class Calendrier_controller extends CI_Controller
 {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Daza_model');
	}
 	
 	public function calendrier()
 	{
 		$this->load->view('daza/calendrier');
 	}
 } 
?>