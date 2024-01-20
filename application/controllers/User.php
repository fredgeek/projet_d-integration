<?php
class User extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('Messages_model');
            $this->load->model('News_model');
          //  $this->load->model('User_model');
            $this->load->helper('url_helper');
    }
//enregistrer un user
        public function enregistrement()
        {
           
            $data [ 'title' ]  =  'Créer un compte' ;
           

            $this -> load -> helper ( 'form' ); 
            $this -> form_validation -> set_message ( 'rule','champ requis' );
            
            $this -> form_validation -> set_rules ( 'name' ,  'Nom Utilisateur','require|callback_username_exist' ,'rule' );
            $this -> form_validation -> set_rules ( 'password' ,  'Mot de passe' ,  'required' );
            $this -> form_validation -> set_rules ( 'code' ,  'Code' ,  'required' );
            $this -> form_validation -> set_rules ( 'password2' ,  'Confirmer mot de passe' ,  'matches[password]' );
            
            if  ( $this -> form_validation -> run ()  ===  FALSE ) 
            {
               
                $this -> load -> view ( 'user/enregistrement', $data); 
                
            }
            else{ //cryptons le password .....
                $enc_password = md5($this->input->post('password') ) ;
                $this->User_model->enregistrer($enc_password); 

                $this ->session->set_flashdata ( 'user_registred', 'enregistrement reussi connectez-vous ' );
                redirect('News');
                //  
                
            }
        } 
        // connexion
        public function connexion()
        {
           
            $data [ 'title' ]  =  'Connexion' ;
           

            $this -> load -> helper ( 'form' ); 
            $this -> load -> library ( 'form_validation' );
            $this -> form_validation -> set_message ( 'rule','champ requis' );
            
            $this -> form_validation -> set_rules ( 'username' ,  'Nom Utilisateur','required' ,'rule' );
            //$this -> form_validation -> set_rules ( 'password' ,  'Mot de passe' ,  'required' );
            $this -> form_validation -> set_rules ( 'code' ,  'code' ,  'required' );
           
            
            if  ( $this -> form_validation -> run ()  ===  FALSE ) 
            {
            
                $this -> load -> view ( 'user/connexion', $data); 
                
            }
            else{ 
              //Get username

                $username = $this->input->post('username');
              // Get and encryot the password
               // $password = md5($this->input->post('password') ) ;
               $code = $this->input->post('code');

                // connexion user 
               $user_id= $this->User_model->connexion( $username, $code);
                
                if ($user_id){
                  // create session
                 $user_data = array(
                    'id_user'=> $user_id,
                    'user_name'=>$username,
                    'connexion'=>true
                  );
                  $this->session->set_userdata($user_data);
                  //set message
                  $this ->session->set_flashdata ( 'user_login', 'connexion reussi' );
                  redirect('news');
                }else{
                  // set_message
                  $this ->session->set_flashdata ( 'user_failed', 'connexion invalide' );
                  redirect('User/connexion');
                }

               
                //  
                
            }
        }  
        /// deconnexion
        public function deconnexion(){
          // sortir l'utilisateur
          $this->session->unset_userdata('connexion');
      
          $this->session->unset_userdata('user_id');
          $this->session->unset_userdata('username');

          //set message
          $this ->session->set_flashdata ( 'user_logout', 'deconnecté avec success' );
          redirect('User/connexion');
        }
        
        /// utilisateur existant  
       public function username_exist($name){ 
            $this -> form_validation -> set_message ( 'username_exist','Nom d utilisateur existant; choississez un autre');
          if( $this -> User_model ->username_exist ( $name)){

          }else{
             return false;
          }
        }

    } 