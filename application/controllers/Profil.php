<?php
class Profil extends CI_Controller {
      public function __construct()
      {
              parent::__construct();
              
              $this->load->model('Respocompet_model');
              $this->load->helper('url_helper');
              $this -> load -> helper ( 'form' ); 
              $this -> load -> library ( 'form_validation' );

              $this->load->library('user_agent');
  

      }
     
       
            public function user_info($pass=false)
            {   
              $data['data']= $this->Respocompet_model->get_user_profil($pass);
             
              if (empty(  $this->Respocompet_model->get_user_profil($pass))) {
              $this->load->view('respocompet/interfaces/menu');
              $this->load->view('respocompet/vide');
              $this->load->view('respocompet/interfaces/footer');
             } 
             else {
                   
              $this->load->view('respocompet/interfaces/menu');
              $this->load->view('respocompet/user/profil',$data);
              $this->load->view('respocompet/interfaces/footer');
               }
        }
        public function user($pass=false)
        {   
          $data['data']= $this->Respocompet_model->get_user_profil($pass);
         
          if (empty(  $this->Respocompet_model->get_user_profil($pass))) {
          $this->load->view('respocompet/interfaces/menu');
          $this->load->view('respocompet/vide');
          $this->load->view('respocompet/interfaces/footer');
         } 
         else {
               
          $this->load->view('respoclasse/interfaces/menu');
          $this->load->view('respocompet/user/profil',$data);
          $this->load->view('respoclasse/interfaces/footer');
           }
    }
        public function update()
        {   
           
           $nom   =      $this->Respocompet_model-> valid_donnees($this->input->post('nom'));
           $prenom   =   $this->Respocompet_model-> valid_donnees($this->input->post('prenom'));
           $username   = $this->Respocompet_model-> valid_donnees($this->input->post('username'));
           $password   = $this->Respocompet_model-> valid_donnees($this->input->post('password'));
           $email   =    $this->Respocompet_model-> valid_donnees($this->input->post('email'));
           $contact   =  $this->Respocompet_model-> valid_donnees($this->input->post('contact'));
               $this->Respocompet_model->update_profil( $nom , $prenom , $username ,$password , $email, $contact ,$this->input->post('id'));
           
        
    }


    }