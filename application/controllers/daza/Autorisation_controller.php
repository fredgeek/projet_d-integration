<?php 
class Autorisation_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Daza_model');
		$this -> load -> library ( 'form_validation' );
	}
	public function autorise_rencontre()
	{
		$data['data']='';
		$this->load->view('daza/autorisation_rencontre',$data);
	}
	public function autorise()
	{
		$data['data']='';
		$id_equipe_rencontre=$this->input->post(htmlentities('id'));
		//AUTORISER UNE RENCONTRE
			$rep=$this->Daza_model->autorisation_rencontre_ok($id_equipe_rencontre);
			 if ($rep==true) 
			 {
			 	$data['data']='<label class="success">autorisation effectuée avec succes</label>';
			 }
			$this->load->view('daza/autorisation_rencontre',$data);
	}
	public function delete_rencontre()
	{
		$data['data']='';
		$id_equipe_rencontre=$this->input->get(htmlentities('id'));
		//DECLINER UNE RENCONTRE
		if ($this->input->post('decliner')) 
		{
			$comment=$this->input->post('comment');
			$req=$this->Daza_model->decline_rencontre($id_equipe_rencontre,$comment);
			 if ($req==true) 
			 {
			 	$data['data']='<label class="success">operation effectuée avec succes</label>';
			 }
		}
		$this->load->view('daza/autorisation_rencontre',$data);
	}
}
?>