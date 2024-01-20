<?php
class Test extends CI_Controller {

    public function __construct()
    {
        
            parent::__construct();
          //  $this->load->model('messages_model');
          //  $this->load->model('News_model');
           // $this->load->model('user_model');
            $this->load->model('Test_model');
            $this->load->helper('url_helper');
    }
//enregistrer un user
        public function register()
        {
           
            $data [ 'title' ]  =  'Créer un compte' ;
           

            $this -> load -> helper ( 'form' ); 
            $this -> form_validation -> set_message ( 'rule','champ requis' );  // possibilité de definir ses propre messages d'erreur
            
            $this -> form_validation -> set_rules ( 'name' ,  'Nom Utilisateur' );
            $this -> form_validation -> set_rules ( 'password' ,  'Mot de passe' ,  'required' );
            $this -> form_validation -> set_rules ( 'role' ,  'role' ,  'required' );
            $this -> form_validation -> set_rules ( 'password2' ,  'Confirmer mot de passe' ,  'matches[password]' );
            
            if  ( $this -> form_validation -> run ()  ===  FALSE ) 
            {
               
                $this -> load -> view ( 'Test/register', $data); 
                
            }
            else{ //cryptons le password .....
                $enc_password = $this->input->post('password') ;
               
                $this->Test_model->register($enc_password); 

                $this ->session->set_flashdata ( 'user_registred', 'enregistrement reussi connectez-vous ' );
                redirect('Pages/about');  // prevoir l'interface du super admin
                //  
                
            }
        } 
        public function login()
        {
           
            $data [ 'title' ]  =  'Connexion' ;
            $data['role'] = $this->Test_model->get_role();
          
            $this -> load -> helper ( 'form' ); 
            $this -> load -> library ( 'form_validation' );
            $this -> form_validation -> set_message ( 'rule','champ requis' );
            
            $this -> form_validation -> set_rules ( 'username' ,  'Nom Utilisateur','required' ,'rule' );
            $this -> form_validation -> set_rules ( 'password' ,  'Mot de passe' ,  'required' );
           
           
            
            if  ( $this -> form_validation -> run ()  ===  FALSE ) 
            {

                $this -> load -> view ( 'test/connexion', $data);
                
            }
            else{ 
               // recuperation et stockage
               $username = ucfirst($this->Test_model->valid_donnees( $this->input->post('username')));
               $password = ucfirst($this->Test_model->valid_donnees( $this->input->post('password')));
              
              // $role = $this->input->post('role');
               $this->Test_model->get_role();
               // fonction qui retournera L'id de l'user
               $user_id = $this->Test_model->login( $username,$password);
               $role_recup =  $this->Test_model->recup_role($user_id);
               $matricule =  $this->Test_model->recup_matricule($user_id);
    
              if ($user_id ){
                   // creation de sa session
                 $user_data = array(
                    'id_user'=> $user_id,
                    'user_name'=>$username,
                    'rol'=> $this->Test_model->recup_role($user_id),
                    'matricule'=>$matricule,
                    'connexion'=>true
                  );
                  $this->session->set_userdata($user_data);
                 
                 
                           if($role_recup == 'Administrateur'){
                                            //set message
                                    $this ->session->set_flashdata ( 'user_login', 'connexion reussi' );
                                    redirect('superadmin/Accueil_controller/accueil');
                                }
                            else{


                                    if($role_recup === 'Responsable de classe')
                                    {
                                            //set message
                                       
                                        redirect('Respoclasse/index');
                                        }
                                         else{   
                                               if($role_recup ==='Daza'){
                        
                                                $this->session->set_flashdata('user_login', 'connexion reussi');
                                                redirect('daza/Accueil_controller/accueil');
                                            }else{ 
                                                   if($role_recup ==='Responsable de competition'){
                                                    $this->session->set_flashdata('user_login', 'connexion reussi');
                                                    redirect('Respocompet/index');
                                            }

                                        }
                        
                            } 
            }
        }
               else{

                     // set_message
                     
                   $this ->session->set_flashdata ( 'user_failed', 'connexion invalide' );
                   redirect('Test/login');
             }
        
            
            
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
        redirect('Principal/index');
      }
    
    
    } 
 



    
