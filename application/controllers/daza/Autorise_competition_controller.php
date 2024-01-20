<?php
class Autorise_competition_controller extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Daza_model');
	}
	public function autorisation_competition()
	{
		$data['data']='';
		 $this->load->view('daza/autorisation_competition',$data);
	}
	public function autorisation()
	{
		$data['data']='';
		$id_competition=$this->input->post(htmlentities('id'));
		//AUTORISE UNE COMPETITION
		 $rep=$this->Daza_model->autorisation_competition_ok($id_competition);
		 if ($rep==true) 
		 {
		 	$data['data']='<label class="success">autorisation effectuée avec succes</label>';
		 }
		 $this->load->view('daza/autorisation_competition',$data);
	}
	public function decline_competition()
	{
		$data['data']='';
		$id_competition=$this->input->get(htmlentities('id'));
		if ($this->input->post('decliner')) 
		{
			$comment=$this->input->post('comment');
		 $req=$this->Daza_model->decliner_competition($id_competition,$comment);
		 if ($req==true) 
		 {
		 	$data['data']='<label class="success">opération effectuée avec succes</label>';
		 }
		}
		$this->load->view('daza/autorisation_competition',$data);
	}
}
?>