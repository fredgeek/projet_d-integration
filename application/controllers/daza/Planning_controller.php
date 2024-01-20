<?php
 class Planning_controller extends CI_Controller
 {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Daza_model');
	}
 	
 	public function planning()
 	{
 	$data['result'] = $this->Daza_model->get_competition_etab();
   $i=0;
        foreach ($data['result'] as $key => $value) {
            $i++;
            $data['data'][$key]['title'] = $value['nom'].' '.$value['nom_etablissement'];
            $data['data'][$key]['start'] = $value['date_debut'];
            $data['data'][$key]['end'] = $value['date_fin'];
            $origin =date_create($value['date_debut']) ;
            $target = date_create ($value['date_fin']);
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
                    $data['data'][$key]['backgroundColor'] = "yellow";
                    $data['data'][$key][' borderColor '] = "yellow";//
                }
                if($i > 152  ){
                    $data['data'][$key]['backgroundColor'] = "#788b84";//secondary
                    $data['data'][$key][' borderColor '] = "##788b84";
                }

           }elseif($value['statut_competition']==1){
            $data['data'][$key]['backgroundColor'] = "#dc3545";//red
            $data['data'][$key][' borderColor '] = "#dc3545";
           }
          

        
        }
 		$this->load->view('daza/planning',$data);
 	}
 } 
?>