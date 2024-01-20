<?php
class Allcompetition_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Daza_model');
	}
	public function allcompetition()
	{
		
		$data['vide']='';
		$annee=$this->input->post('annee');
		$data['academique']=$this->input->post('annee');
		$data['id']=$this->Daza_model->get_id_annee($annee);
		$data['annee']=$this->Daza_model->get_annee();
		$this->load->view('daza/Allcompetition',$data);
	}
	
}
?>
