<?php 
class Calendar_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Daza_model');
	}
	public function calendar_competition()
	{
		$data['name_etab']=$this->Daza_model->get_name_etablissement();
		$this->load->view('daza/calendar_competition',$data);
	}
	public function reporte_rencontre()
	{
		$id_equipe_rencontre=$this->input->post(htmlentities('id'));
		$comment="periode occupée en toute urgence veillez inserer une nouvelle periode ";
		//AUTORISER UNE RENCONTRE
			$rep=$this->Daza_model->reporter_rencontre($id_equipe_rencontre,$comment);
			 if ($rep==true) 
			 {
			 	$data['data']='<label class="success">autorisation effectuée avec succes</label>';
			 }
		$data['name_etab']=$this->Daza_model->get_name_etablissement();
		$this->load->view('daza/calendar_competition',$data);
	}
}
?>