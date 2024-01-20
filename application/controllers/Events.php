<?php

/*  **************r ************
    **************                                                                                                    ************ */


class Events extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Event_model');
        $this->load->database();
	}

        public function e1()
        {
            $data['result'] = $this->Event_model->get_event();
   $i=0;
        foreach ($data['result'] as $key => $value) {
            $i++;
            $data['data'][$key]['title'] = $value->title;
            $data['data'][$key]['start'] = $value->start_date;
            $data['data'][$key]['end'] = $value->end_date;
		
			
            $origin =date_create($value->start_date) ;
            $target = date_create ($value->end_date);
            $interval = date_diff( $target,$origin);
      $i  =  $interval->format('%a ');
      //echo $i;

           if($i >= 0){
            if($i < 7){
                $data['data'][$key]['backgroundColor'] = "#00a65a";//success color
                $data['data'][$key][' borderColor '] = "#00a65a";
                 }
                if($i >= 7 && $i < 28){
                    $data['data'][$key]['backgroundColor'] = "#3c8dbc"; //pramry
                    $data['data'][$key][' borderColor '] = "#3c8dbc";
                }
                if($i >= 28 && $i < 62){
                    $data['data'][$key]['backgroundColor'] = "#f39c12";//warning
                    $data['data'][$key][' borderColor '] = "#f39c12";
                }
                if($i >= 62 && $i < 152 ){
                    $data['data'][$key]['backgroundColor'] = "#f56954";
                    $data['data'][$key][' borderColor '] = "#f56954";//red
                }
                if($i > 152  ){
                    $data['data'][$key]['backgroundColor'] = "#788b84";//secondary
                    $data['data'][$key][' borderColor '] = "##788b84";
                }

           }else{
            $data['data'][$key]['backgroundColor'] = "#788b84";//secondary
            $data['data'][$key][' borderColor '] = "##788b84";
           }
          

        
        }
           
        
            $this->load->view('respocompet/interfaces/main_ev');
            $this->load->view('respocompet/events', $data);
            $this->load->view('respocompet/interfaces/foot_ev');
           
        }
	

        public function event_dasa()
        {
            $this->load->view('respocompet/interfaces/menu');
            $this->load->view('test/event');
            $this->load->view('respocompet/interfaces/footer');
           }
		   public function event_user()
		   {
			   $this->load->view('respocompet/interfaces/menu');
			   $this->load->view('test/event_user');
			   $this->load->view('respocompet/interfaces/footer');
			  }
           
        

			  public function ajax_list_user()
			  {
			$val=$_POST['val'];
			$list = $this->Event_model->get_datatables_user($val);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $Event_model) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $Event_model->title;
				$row[] = $Event_model->start_date;
				$row[] = $Event_model->end_date;
				
	
				//add html for action
				$row[] = '<a class="btn btn-sm btn-outline-info" href="javascript:void(0)" title="Edit" onclick="edit_event('."'".$Event_model->id."'".')"><i class="fas fa-edit"></i></a>
					  <a class="btn btn-sm btn-outline-danger" href="javascript:void(0)" title="Hapus" onclick="delete_event('."'".$Event_model->id."'".')"><i class="fas fa-trash"></i></a>';
			
				$data[] = $row;
			}
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Event_model->count_all(),
							"recordsFiltered" => $this->Event_model->count_filtered(),
							"data" => $data,
					);
			//output to json format
			echo json_encode($output);
		} 
       
     public function ajax_list()
      	{
        //$val=$_POST['val'];
		$list = $this->Event_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Event_model) {
			$no++;
			$row = array();
            $row[] = $no;
			$row[] = $Event_model->title;
            $row[] = $Event_model->start_date;
            $row[] = $Event_model->end_date;
			

			//add html for action
			$row[] = '<a class="btn btn-sm btn-outline-info" href="javascript:void(0)" title="Edit" onclick="edit_event('."'".$Event_model->id."'".')"><i class="fas fa-edit"></i></a>
				  <a class="btn btn-sm btn-outline-danger" href="javascript:void(0)" title="Hapus" onclick="delete_event('."'".$Event_model->id."'".')"><i class="fas fa-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Event_model->count_all(),
						"recordsFiltered" => $this->Event_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->Event_model->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		if( empty($this->input->post('val'))){
				$data = array(
              
			'title' => ucfirst($this->input->post('title')),
			'start_date' => $this->input->post('debut'),
			'end_date' => $this->input->post('fin'),
			
		   
		);

		} else{
			$data = array(
              
			'title' => ucfirst($this->input->post('title')),
			'start_date' => $this->input->post('debut'),
			'end_date' => $this->input->post('fin'),
			'user_id' => $this->input->post('val'),
		   
		);

		}
		$insert = $this->Event_model->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
            'title' => ucfirst($this->input->post('title')),
            'start_date' => $this->input->post('debut'),
            'end_date' => $this->input->post('fin'),
			);
		$this->Event_model->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->Event_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('title') == '')
		{
			$data['inputerror'][] = 'title';
			$data['error_string'][] = 'le titre est requis';
			$data['status'] = FALSE;
		}

		if($this->input->post('debut') == '')
		{
			$data['inputerror'][] = 'debut';
			$data['error_string'][] = 'la date de debut est requise';
			$data['status'] = FALSE;
		}

		if($this->input->post('fin') == '')
		{
			$data['inputerror'][] = 'fin';
			$data['error_string'][] = 'la date de fin est requise';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}