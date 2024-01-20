<?php
class Competitioncontroller extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Ajoutmodel');
		$this->load->helper('url_helper');
	}
	public function competition()
	{
		$result=array();
		$result['result']=$this->Ajoutmodel->recupere_annee();
		#$result=array();
		#$result['result']=$this->Ajoutmodel->recupere_nom_competition();
		$this->form_validation->set_rules('nom','nom competition','required',array('required'=>'<h3 style="color:dc3545; font-size:18px"><b><i> veillez renseigner le %s</i></b></h3>'));
		$this->form_validation->set_rules('debut','date debut competition','required|exact_length[10]',
			array('required'=>'<h3 style="color:dc3545; font-size:18px"><b><i>veillez renseigner la %s</i></b></h3>',
				'exact_length'=>'<h3 style="color:dc3545; font-size:18px"><b><i>le champ %s doit respecter se format "aaaa-mm-jj"</i></b></h3>'));
		$this->form_validation->set_rules('fin','date fin','required|exact_length[10]',array('required'=>'<h3 style="color:dc3545; font-size:18px"><b><i>veillez renseigner la %s competition</i></b></h3>',
			'exact_length'=>'<h3 style="color:dc3545; font-size:18px"><b><i>le champ %s doit respecter se format "aaaa-mm-jj"</i></b></h3>'));
		if ($this->form_validation->run()) 
		{
			$annee=$this->input->post('annee');
			if ($annee=="") 
			{
				#$data['error']='<h3 style="color:green; font-size:72px">veillez inserer une année academiqueg</h3>';
				echo '<h3 style="color:green; font-size:22px">veillez inserer une année academique</h3>';
			}
			else
			{
				$nom=$this->input->post('nom');
				$data['nom']=$this->input->post('nom');
				$data['date_debut']=$this->input->post('debut');
				$data['date_fin']=$this->input->post('fin');
				$data['genre_competition']=$this->input->post('type');
				$annee_competition['id_annee_academique']=$this->input->post('annee');
				$annee_competition['id_nom_competition']=$this->input->post('nom');
				$type_com['competition_type']=$this->input->post('type');
				$q=$this->db->query("select * from competition where nom='$nom'"); 
				$row=$q->num_rows();
				if ($row>0) 
				{
					echo '<h3 style="color:dc3545; font-size:22px">echec enregistrement competition existante!</h3>';
				}else
				{
					$reponse=$this->Ajoutmodel->inserecompetion($data,$type_com,$annee_competition);
					if ($reponse==true) 
					{
						#$result['var']='<h3 style="color:dc3545; font-size:22px">enregistrement effectue avec success!</h3>';
						echo '<h3 style="color:dc3545; font-size:22px">enregistrement effectue avec success!</h3>';	
					}else
					{
						echo '<h3 style="color:dc3545; font-size:22px">echec enregistrement</h3>';
					}
				}
			}
		}
		$this->load->view('creecompetition',$result);
	}
}
?>