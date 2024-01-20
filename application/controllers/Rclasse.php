<?php
defined('BASEPATH') OR exit('No direct script access allowed');   

                              
class Rclasse extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Rclasse_model','rclasse');
		$this->load->model('Respocompet_model');
		$this -> load -> helper ( 'form' );
	}


                              ///////////////////////////////////////////////////////////////////////////////////
                              /////////                 CONFIGURATION DES responsable de classe      ////////////
                              ///////////////////////////////////////////////////////////////////////////////////


	

	public function ajax_list()
	{    ;
    $list = $this->rclasse->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rclasse) {
			$no++;
			$row = array();
               $row[] = $no;
			$row[] = $rclasse->username;
			$row[] = $rclasse->role;
            $row[] = $rclasse->matricule;
            $row[] = $rclasse->password;
			//add html for action
			$row[] = '<a class="btn btn-outline-info btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_rclasse('."'".$rclasse->id."'".')"><i class="fas fa-edit"></i></a>
				  <a class="btn btn-outline-danger btn-sm" href="javascript:void(0)" title="Hapus" onclick="delete_rclasse('."'".$rclasse->id."'".')"><i class="fas fa-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->rclasse->count_all(),
						"recordsFiltered" => $this->rclasse->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->rclasse->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
        if( $this->rclasse->matricule_existant($this->input->post('matricule') )||$this->rclasse->user_existant($this->input->post('username') )){
                                    
			/// LOL 
			}else{
        $pwd="";
        for ($i=0; $i <= 2 ; $i++) 
        { 
            $random= rand(97,122);
            $random2= rand(0,9);
            $pwd =$pwd.chr($random).$random2;
        }
       
		$data = array(
            'username' => $this->input->post('username'),
            'matricule' => $this->input->post('matricule'),
			'role' => 'Responsable de classe',
           'password' => $pwd,
			);
        
			 $this->rclasse->save($data);
		     echo json_encode(array("status" => TRUE));
    }
		
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
            'username' => $this->input->post('username'),
            'matricule' => $this->input->post('matricule'),
				
			);
		$this->rclasse->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->rclasse->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('username') == '')
		{
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'l\'identifiant est requis ';
			$data['status'] = FALSE;
		}

		if($this->input->post('matricule') == '')
		{
			$data['inputerror'][] = 'matricule';
			$data['error_string'][] = ' Matricule oligatoire';
			$data['status'] = FALSE;
		}


		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}