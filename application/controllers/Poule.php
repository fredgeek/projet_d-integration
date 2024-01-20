<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poule extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Poule_model','poule');
		$this->load->model('Respocompet_model');
		$this -> load -> helper ( 'form' );
	}

	public function index($pass = false)
	{
		$default  =  array ( 'compet','discipline');
		$pass =  $this -> uri -> uri_to_assoc ( 3 ,$default); 
		$dat3  = $pass['compet'];
		$data['data']= $this->Respocompet_model->get_phase($dat3);
		$this->load->helper('url');
		$this->load->view('respocompet/formpoule',$data);
	}

	// ajouter les poules pour une phase donnée;
	public function add_groupe($pass = false)
	{
		$default  =  array ( 'phase','compet');
		$pass =  $this -> uri -> uri_to_assoc ( 3 ,$default); 
		$data['data']= $this->Respocompet_model->get_phase_2_parameters($pass['compet'],$pass['phase']);
		$this->load->helper('url');
		$this->load->view('respocompet/formpoule_add',$data);
	}

	public function ajax_list($var)
	{
		$list = $this->poule->get_datatables($var);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $poule) {
			$no++;
			$row = array();
			$row[] = $poule->nom_poule;
			//$row[] = $poule->nom_phase;
			//$row[] = $poule->gender;
			
			//$row[] = $poule->dob;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_poule('."'".$poule->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_poule('."'".$poule->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->poule->count_all(),
						"recordsFiltered" => $this->poule->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->poule->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();

		$data = array(
				'nom_poule' => $this->input->post('nom_poule'),
				'phase_id' => $this->input->post('phase_id'),
				'competition_id' => $this->input->post('compet_id'),
				
				//'dob' => $this->input->post('dob'),
			);
		$insert = $this->poule->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
            'nom_poule' => $this->input->post('nom_poule'),
            'phase_id' => $this->input->post('phase_id'),
            //'gender' => $this->input->post('gender'),
            
            //'dob' => $this->input->post('dob'),
			);
		$this->poule->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->poule->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('nom_poule') == '')
		{
			$data['inputerror'][] = 'nom_poule';
			$data['error_string'][] = 'le nom de la poule est requis';
			$data['status'] = FALSE;
		}

		if($this->input->post('phase_id') == '')
		{
			$data['inputerror'][] = 'phase_id';
			$data['error_string'][] = 'choississez la phase associée';
			$data['status'] = FALSE;
		}


		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
