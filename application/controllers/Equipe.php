<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class equipe extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Equipe_model','equipe');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('respocompet/add_equipe');
	}

	public function ajax_list()
	{   $val = $_POST['val'];
        $val2 = $this->equipe->get_compet($val);	
		$genre = $this->equipe->get_genre($val2);
		$discipline = $this->equipe->get_discipline($val2);
	    $etablissement = $this->equipe->get_etab($val2);
		$list = $this->equipe->get_datatables($genre,$discipline,$etablissement);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $equipe) {
			$no++;
			
			$row = array();
			$row[] = $no;
			$row[] = $equipe->nom;
			$row[] = $equipe->discipline;
            $row[] = $equipe->genre;
			if(empty($equipe->matricule_responsable)){
				$row[] = ' <small> Equipe non atribuée </small>';
			} else{
				$row[] = $equipe->matricule_responsable;
			}
			

			//add html for action
			if(empty($equipe->matricule_responsable)){
				$row[] = '<a  class="btn btn-outline-danger" href="javascript:void(0)" 
            title="" onclick="edit_equip('."'".$equipe->equipe_id."'".')"  ><i class="fas fa-external-link-alt"></i> Attribuer </a>';
			}  else{
				
				$row[] = '<a  class="btn btn-outline-success" href="javascript:void(0)" 
				title="Ajouter l\'equipe" onclick="add_equipe('."'".$equipe->equipe_id."'".')" ><i class="fas fa-plus"></i>ajouter </a> <a  class="btn btn-outline-info" href="javascript:void(0)" 
				title=" Liste des Joueurs disponibles" onclick="joueur_equipe('."'".$equipe->equipe_id."'".')" > <i class="fas fa-paste"></i> </a>';
			}
			
		    $data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->equipe->count_all(),
						"recordsFiltered" => $this->equipe->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id) 
	{
		$data = $this->equipe->get_by_id($id);
		echo json_encode($data);
	}
	public function joueur_e($id) 
	{
		$data = $this->equipe->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_addl()
	{
		
		$data = array(
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'gender' => $this->input->post('gender'),
				'address' => $this->input->post('address'),
				'dob' => $this->input->post('dob'),
			);
		$insert = $this->equipe->save($data);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_update()
	{
		$this->_validate();
		$data = array(
		
			'matricule_responsable' => strtoupper($this->input->post('matricule')),
			
			); 
		$this->equipe->update(array('equipe_id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function liste_joueurs($id)
	{
		///$data =  $this->equipe->recup_phase($id);
		//$data3['id_equipe'] = $this->equipe->cross_join($id);
		//echo json_encode(array("status" => TRUE));
	//	$this->load->view('respocompet/interfaces/footer');//
		
		redirect('respocompet/interfaces/footer');
		
	}


	private function _validate()
	{
		
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('matricule') == '')
		{
			$data['inputerror'][] = 'matricule';
			$data['error_string'][] = 'le matricule est requis';
			$data['status'] = FALSE;
		}

		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	
	public function ajax_add($id)
	{ 
        $data = array(
            'id_poule' => $this->input->post('poule'),
            'id_equipe' =>$id,
			'phase'=>$this->input->post('phase')
              );
		$data1 = $this->input->post('poule');
		$data2 =  $this->equipe->recup_phase( $this->input->post('phase'));
		$val = $this->equipe->nombre_equipe($this->input->post('poule'));
		$data3['id_equipe'] = $this->equipe->cross_join( $this->input->post('phase'),$id);
	
		if($val<=1 && $data2!='Eliminatoire'){

			if($this->equipe->cross_join( $this->input->post('phase'),$id)){

	        	if( $this->equipe->equipe_exist($id,$data1) )
						{ 
							$this->equipe->add_equipe($data);
							echo json_encode(array("status" => TRUE));	
						} 
	                 }
		     }
		if($val<=3 && $data2 =='Eliminatoire'){

		if($this->equipe->cross_join( $this->input->post('phase'),$id)){
			if( $this->equipe->equipe_exist($id,$data1)||$this->equipe->cross_join( $this->input->post('phase'),$id))
						{ 
							$this->equipe->add_equipe($data);
							echo json_encode(array("status" => TRUE)); 
						} 
		     } 
		}
		
	}
	
}
