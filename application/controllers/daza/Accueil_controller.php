<?php
 class accueil_controller extends CI_Controller
 {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Daza_model');
	}
 	
 	public function accueil()
 	{
 		$this->load->view('daza/accueil');
 	}
 } 
?>