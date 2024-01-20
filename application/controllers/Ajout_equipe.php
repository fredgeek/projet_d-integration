<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajout_equipe extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ajoutequipe_model','ajoutequipe');
	}


	public function ajax_list()
	{
       // $val=$_POST['val'];
		$list = $this->ajoutequipe->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $ajoutequipe) {
			$no++;
			$row = array();
            $row[] = $no;
            $row[] = $ajoutequipe->nom;
			$row[] = $ajoutequipe->discipline;
            $row[] = $ajoutequipe->genre;
			$row[] = $ajoutequipe->matricule_responsable;
		

			//add html for action
			$row[] = '<a class="btn btn-sm btn-outline-info" href="javascript:void(0)" title="Edit" onclick="edit_equipe('."'".$ajoutequipe->equipe_id."'".')"><i class="fas fa-edit"></i></a>
				  <a class="btn btn-sm btn-outline-danger" href="javascript:void(0)" title="Hapus" onclick="delete_equipe('."'".$ajoutequipe->equipe_id."'".')"><i class="fas fa-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->ajoutequipe->count_all(),
						"recordsFiltered" => $this->ajoutequipe->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->ajoutequipe->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
                
				'nom' => ucfirst($this->input->post('nom')),
                'matricule_responsable' => strtoupper($this->input->post('matricule')),
				'discipline' => ucfirst($this->input->post('discipline')),
				'genre' => ucfirst($this->input->post('genre')),
               
			);
		$insert = $this->ajoutequipe->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		
		$data = array(
		
			'matricule_responsable' => strtoupper($this->input->post('matricule')),
			
			); 
		$this->ajoutequipe->update(array('equipe_id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->ajoutequipe->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
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

		if($this->input->post('nom') == '')
		{
			$data['inputerror'][] = 'Nom';
			$data['error_string'][] = 'Le nom  est un champ requis';
			$data['status'] = FALSE;
		}

		if($this->input->post('genre') == '')
		{
			$data['inputerror'][] = 'genre';
			$data['error_string'][] = ' champ requis';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
