<?php

class Test1 extends CI_Controller{

    public function __construct(){  
        parent::__construct();
        $this->load->model("Respoclasse_model");

    }

    public function index(){

       if($this->Respoclasse_model-> matricule_existant("hgfk",$this->Respoclasse_model->annee()))
        echo "false" ;
    else
    echo "sdfghg";
        
    }



}


?>