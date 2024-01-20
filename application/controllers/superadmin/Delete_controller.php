<?php
class Delete_controller extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
		$this->load->model('Superadmin_model');
		$this -> load -> library ( 'form_validation' );
	}

	//SUPPRESSION D'UN PARCOURS
	public function delete_parcours()
	{
			$id=$this->input->get('id');
			$etat['etat_parcours']="1";
			$this->Superadmin_model->delete_parcours($id,$etat);
			echo $id;
	}
}

 ?>