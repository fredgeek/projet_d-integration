<?php

/*  **************r ************
    **************                                                                                                    ************ */


class Principal extends CI_Controller {


   public function __construct()
	{
		parent::__construct();
		$this->load->model('Principal_model');
      
	}
        public function index()
        {
         $this -> load -> helper ( 'text' );
           
        $data['pub']=$this->Principal_model->get_pub();
        $data['compet']=$this->Principal_model->get_compet();
        $data['rencontre']=$this->Principal_model->get_rencontre();
        $data['stade']=$this->Principal_model->get_stade();
        $data['equipe']=$this->Principal_model->get_equipe();
        
           $this->load->view('principal/index',$data);
          

           
        }
        public function apropos()
        {
           
    
        
           $this->load->view('principal/apropos');
          

           
        }
        public function blog()
        {
           
    
        
           $this->load->view('principal/blog');
          

           
        }
        public function publication($id)
        {
         $data['pub'] = $this->Principal_model->get_publication($id);
    
           $this->load->view('principal/vue_publication',$data);
          

           
        }
        public function competition($id)
        {
         $data['compet'] = $this->Principal_model->get_competition($id);
         $data['phase'] = $this->Principal_model->getphase($id);
    
        
           $this->load->view('principal/vue_competition',$data);
          

           
        }
        public function rencontre($id)
        {
         $data['rencontre'] = $this->Principal_model->rencontre($id);
         $this->load->view('principal/vue_rencontre',$data);
         
        }
        public function resultat($id)
        {

         if (empty(  $data['rencontre'] = $this->Principal_model->resultat($id)))  {
           
            redirect('principal/index');
         }else {
           $this->load->view('principal/vue_resultat',$data);
          
               }
        }
        public function equipe()
        {

         $data['equipe']=$this->Principal_model->equipe();
           $this->load->view('principal/vue_equipe',$data);
          
          }
          
          public function calendrier()
          {
             
      
              $data['result']=$this->Principal_model->get_stade1();
             $this->load->view('principal/vue_calendrier',$data);
            
  
             
          }
        
}