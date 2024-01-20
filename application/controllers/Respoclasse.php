<?php
class Respoclasse extends CI_Controller {
      public function __construct()
      {
              parent::__construct();
              
              $this->load->model('Respoclasse_model');
              $this->load->helper('url_helper');
              $this -> load -> helper ( 'form' ); 
              $this -> load -> library ( 'form_validation' );
              #$this->load->library('excel');

      }

            //   ADD     JOUEURS . JOUEUSES    ////
     
        public function index()
            {       
                  $this->load->view('respoclasse/index');

            }
            public function add_player()
            {   
                  $data = $this->session->userdata('matricule');
                  $this->load->view('respoclasse/interfaces/menu'); 
                  $this->load->view('respoclasse/add_update');
                  $this->load->view('respoclasse/interfaces/footer'); 
                 }
              
            //      
            //     LES JOUEURS ET JOUEUSES DISPONIBLES     ////



                 public function voir_liste()
                 {   
                  $dat = $this->session->userdata('matricule');
                  $data['data']= $this->Respoclasse_model->get_joueurs(strtoupper($dat));
                  
            
               
                  $this->load->view('respoclasse/interfaces/menu'); 
                  $this->load->view('respoclasse/vue_listejoueurs',$data);
                  $this->load->view('respoclasse/interfaces/footer');           
                }
                
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                   //                            CAS     MASCULIN                                         //
                            
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
             public function discipline_masculine()
             {   
                   
                
                   $this->load->view('respoclasse/interfaces/menu'); 
                   $this->load->view('respoclasse/masculin/vue_discipline_masculine');
                   $this->load->view('respoclasse/interfaces/footer');      
              }
            


                 public function equipe_masculine_football()
                  {   

                   $genre ='Masculine';
                   $discipline = 'Football';
                 
                    /// verifier l'existence de l'equipe 
                    if(empty( $this->Respoclasse_model->recup_id_equipe($this->session->userdata('matricule'),$genre,$discipline))){

                        $this ->session->set_flashdata ( 'indisponible1', 'Votre  équipe de Football n\'est pas disponible' );
                        $this->load->view('respoclasse/index');
                        
                  } else{
                        /// verification de l'existence des joueurs
                       $donnee['info']=$this->Respoclasse_model->info_equipe($this->session->userdata('matricule'),$genre,$discipline);
                       $donnee['data']= $this->Respoclasse_model->get_joueur($this->Respoclasse_model->recup_id_equipe($this->session->userdata('matricule'),$genre,$discipline),'Football');
                       $this->load->view('respoclasse/interfaces/menu'); 
                       $this->load->view('respoclasse/masculin/vue_football_m',$donnee);
                       $this->load->view('respoclasse/interfaces/footer');      
                 
                        
                 
                  }
                 
                                 
                   }

                   public function equipe_masculine_basketball()
                   {   
 
                    $genre ='Masculine';
                    $discipline = 'Basket';
                  
                     /// verifier l'existence de l'equipe 
                     if(empty( $this->Respoclasse_model->recup_id_equipe($this->session->userdata('matricule'),$genre,$discipline))){
                        $this ->session->set_flashdata ( 'indisponible2', 'Votre  équipe de Basketball n\'est pas disponible' );
                        $this->load->view('respoclasse/index');
                   } else{
                         /// verification de l'existence des joueurs
                        $donnee['info']=$this->Respoclasse_model->info_equipe($this->session->userdata('matricule'),$genre,$discipline);
                        $donnee['data']= $this->Respoclasse_model->get_joueur($this->Respoclasse_model->recup_id_equipe($this->session->userdata('matricule'),$genre,$discipline),'Basket');
                        $this->load->view('respoclasse/interfaces/menu'); 
                        $this->load->view('respoclasse/masculin/vue_basket_m',$donnee);
                        $this->load->view('respoclasse/interfaces/footer');      
                  
                     
                     }      
                  
                   }

                   public function equipe_masculine_handball()
                   {   
 
                    $genre ='Masculine';
                    $discipline = 'Handball';
                  
                     /// verifier l'existence de l'equipe 
                     if(empty( $this->Respoclasse_model->recup_id_equipe($this->session->userdata('matricule'),$genre,$discipline))){
                        $this ->session->set_flashdata ( 'indisponible3', 'Votre  équipe de Handball n\'est pas disponible' );
                        $this->load->view('respoclasse/index'); 
                   } else{
                         /// verification de l'existence des joueurs
                        $donnee['info']=$this->Respoclasse_model->info_equipe($this->session->userdata('matricule'),$genre,$discipline);
                        $donnee['data']= $this->Respoclasse_model->get_joueur($this->Respoclasse_model->recup_id_equipe($this->session->userdata('matricule'),$genre,$discipline),'Handball');
                        $this->load->view('respoclasse/interfaces/menu'); 
                        $this->load->view('respoclasse/masculin/vue_handball_m',$donnee);
                        $this->load->view('respoclasse/interfaces/footer');      
                  
                     
                     }      
                  
                   }
                   public function equipe_masculine_volleyball()
                   {   
 
                    $genre ='Masculine';
                    $discipline = 'Volley';
                  
                     /// verifier l'existence de l'equipe 
                     if(empty( $this->Respoclasse_model->recup_id_equipe($this->session->userdata('matricule'),$genre,$discipline))){

                        $this ->session->set_flashdata ( 'indisponible4', 'Votre  équipe de Volleyball n\'est pas disponible' );
                        $this->load->view('respoclasse/index');
                   } else{
                         /// verification de l'existence des joueurs
                        $donnee['info']=$this->Respoclasse_model->info_equipe($this->session->userdata('matricule'),$genre,$discipline);
                        $donnee['data']= $this->Respoclasse_model->get_joueur($this->Respoclasse_model->recup_id_equipe($this->session->userdata('matricule'),$genre,$discipline),'Volley');
                        $this->load->view('respoclasse/interfaces/menu'); 
                        $this->load->view('respoclasse/masculin/vue_volley_m',$donnee);
                        $this->load->view('respoclasse/interfaces/footer');      
                  
                     
                     }      
                  
                   }
             
                     
                                    
                        public function joueurs_m($pass)
                        {   

                              $default  =  array ( 'id','discipline');
                              $pass =  $this -> uri -> uri_to_assoc ( 3 ,$default);
                              $dat = $this->session->userdata('matricule');
                              $g='Masculine';
                              $pass['joueurs'] =$this->Respoclasse_model->recup_joueur(strtoupper($dat),$g);
                              $this->load->view('respoclasse/interfaces/menu'); 
                              $this->load->view('respoclasse/masculin/vue_equipemasculine',$pass);
                              $this->load->view('respoclasse/interfaces/footer');      
                        }

                     
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                   //                            CAS  FEMININ                                         //
                            
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


                        public function discipline_feminine()
                        {   
                              
                           
                              $this->load->view('respoclasse/interfaces/menu'); 
                              $this->load->view('respoclasse/feminin/vue_discipline_feminine');
                              $this->load->view('respoclasse/interfaces/footer');      
                         }
                         public function equipe_feminine_football()
                         {   
       
                          $genre ='Feminine';
                          $discipline = 'Football';
                        
                           /// verifier l'existence de l'equipe 
                           if(empty( $this->Respoclasse_model->recup_id_equipe($this->session->userdata('matricule'),$genre,$discipline))){
       
                               $this ->session->set_flashdata ( 'indisponible5', 'Votre  équipe de Football n\'est pas disponible' );
                               $this->load->view('respoclasse/index');
                               
                         } else{
                               /// verification de l'existence des joueurs
                              $donnee['info']=$this->Respoclasse_model->info_equipe($this->session->userdata('matricule'),$genre,$discipline);
                              $donnee['data']= $this->Respoclasse_model->get_joueur($this->Respoclasse_model->recup_id_equipe($this->session->userdata('matricule'),$genre,$discipline),'Football');
                              $this->load->view('respoclasse/interfaces/menu'); 
                              $this->load->view('respoclasse/feminin/vue',$donnee);
                              $this->load->view('respoclasse/interfaces/footer');      
                        
                               
                        
                         }
                        
                                        
                          }
       
                          public function equipe_feminine_basketball()
                          {   
        
                           $genre ='Feminine';
                           $discipline = 'Basket';
                         
                            /// verifier l'existence de l'equipe 
                            if(empty( $this->Respoclasse_model->recup_id_equipe($this->session->userdata('matricule'),$genre,$discipline))){
                               $this ->session->set_flashdata ( 'indisponible6', 'Votre  équipe de Basketball n\'est pas disponible' );
                               $this->load->view('respoclasse/index');
                          } else{
                                /// verification de l'existence des joueurs
                               $donnee['info']=$this->Respoclasse_model->info_equipe($this->session->userdata('matricule'),$genre,$discipline);
                               $donnee['data']= $this->Respoclasse_model->get_joueur($this->Respoclasse_model->recup_id_equipe($this->session->userdata('matricule'),$genre,$discipline),'Basket');
                               $this->load->view('respoclasse/interfaces/menu'); 
                               $this->load->view('respoclasse/feminin/vue',$donnee);
                               $this->load->view('respoclasse/interfaces/footer');      
                         
                            
                            }      
                         
                          }
       
                          public function equipe_feminine_handball()
                          {   
        
                           $genre ='Feminine';
                           $discipline = 'Handball';
                         
                            /// verifier l'existence de l'equipe 
                            if(empty( $this->Respoclasse_model->recup_id_equipe($this->session->userdata('matricule'),$genre,$discipline))){
                               $this ->session->set_flashdata ( 'indisponible7', 'Votre  équipe de Handball n\'est pas disponible' );
                               $this->load->view('respoclasse/index'); 
                          } else{
                                /// verification de l'existence des joueurs
                               $donnee['info']=$this->Respoclasse_model->info_equipe($this->session->userdata('matricule'),$genre,$discipline);
                               $donnee['data']= $this->Respoclasse_model->get_joueur($this->Respoclasse_model->recup_id_equipe($this->session->userdata('matricule'),$genre,$discipline),'Handball');
                               $this->load->view('respoclasse/interfaces/menu'); 
                               $this->load->view('respoclasse/feminin/vue',$donnee);
                               $this->load->view('respoclasse/interfaces/footer');      
                         
                            
                            }      
                         
                          }
                          public function equipe_feminine_volleyball()
                          {   
        
                           $genre ='Feminine';
                           $discipline = 'Volley';
                         
                            /// verifier l'existence de l'equipe 
                            if(empty( $this->Respoclasse_model->recup_id_equipe($this->session->userdata('matricule'),$genre,$discipline))){
       
                               $this ->session->set_flashdata ( 'indisponible8', 'Votre  équipe de Volleyball n\'est pas disponible' );
                               $this->load->view('respoclasse/index');
                          } else{
                                /// verification de l'existence des joueurs
                               $donnee['info']=$this->Respoclasse_model->info_equipe($this->session->userdata('matricule'),$genre,$discipline);
                               $donnee['data']= $this->Respoclasse_model->get_joueur($this->Respoclasse_model->recup_id_equipe($this->session->userdata('matricule'),$genre,$discipline),'Volley');
                               $this->load->view('respoclasse/interfaces/menu'); 
                               $this->load->view('respoclasse/feminin/vue',$donnee);
                               $this->load->view('respoclasse/interfaces/footer');      
                         
                            
                            }      
                         
                          }
                    




                         public function joueurs_f($pass)
                         {   
       
                         $default  =  array ( 'id','discipline');
                         $pass =  $this -> uri -> uri_to_assoc ( 3 ,$default);
                         $dat = $this->session->userdata('matricule');
                         $g='Feminine';
                   // $data =$this->Respoclasse_model->get_equipe_masculine($dat,$g);
                        $pass['joueur'] =$this->Respoclasse_model->recup_joueur(strtoupper($dat),$g);
                         $this->load->view('respoclasse/interfaces/menu'); 
                         $this->load->view('respoclasse/feminin/vue_equipefeminine',$pass);
                         $this->load->view('respoclasse/interfaces/footer');      
                   
                         
                   
                   }

 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                   
                   //                            ROUTAGE                                      //

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
          public function joueur_equipe()
          {   
           
            $id  = $this->input->post('id');
          $equipe_id = $this->input->post('equipe_id');
        
          $discipline = $this->input->post('discipline');
         
         
            
              for ($i=0; $i < sizeof($id); $i++) { 
                   $id_discipline[$i] = $this->Respoclasse_model->id_discipline($discipline[$i]);
                  
                   if(empty( $this->Respoclasse_model->id_joueur_discipline($id[$i], $id_discipline[$i]))){
                        $data= array('joueur_id'=>$id[$i],'discipline_id'=> $id_discipline[$i]);
                        $this->db->insert('joueur_discipline',$data);

                        $id_joueur=$this->Respoclasse_model->id_joueur_discipline($id[$i], $id_discipline[$i]);
                        echo $id_joueur;
                        $data= array('equipe_id'=>$equipe_id[$i],'id_jr'=> $id_joueur);
                        $this->db->insert('joueur_equipe',$data);
                   }
                  
              }

              $this ->session->set_flashdata ( 'reussi', 'Enregistrement reussi' );
              
                   redirect('respoclasse/index');
           }

///////////////////////////////////////////////////////////////////////////////////////////////

                   //   IMPORTATION DU FICHIER EXCEL DES JOUEURS   //

///////////////////////////////////////////////////////////////////////////////////////////
           function vue()
	{
		
            $this->load->view('respoclasse/interfaces/menu'); 
            $this->load->view('respoclasse/import_joueur');
            $this->load->view('respoclasse/interfaces/footer'); 
	}
	
	function import()
	{
            $respo = $this->session->userdata('matricule');
            $annee = $this->Respoclasse_model->annee();
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$matricule = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nom = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$prenom = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$sexe = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                              /// 
                              ///   INSERTION DU GENRE CORRESPONDANT
                              ///
                              if( (stristr($sexe, 'f'))){
                                    
                                    $genre_discipline = "Feminine";
                                   
                                   } else{
                                    $genre_discipline = "Masculine";
                                   }
					$contact= $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                              $email= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                               /// 
                              ///  VERIFICATION D'INSERTION
                              ///
                              if( $this->Respoclasse_model->matricule_existant($matricule, $annee )){
                                    
                                   /// LOL 
                                   }else{

                                    $data[] = array(
                                          'matricule'		=>	$matricule,
                                          'nom'			=>	$nom,
                                          'prenom'		=>	$prenom,
                                          'Genre_discipline'	=> $genre_discipline,
                                          'contact'		=>	$contact,
                                          'email'		=>	$email,
                                          'annee_academique'		=> $annee,
                                          'matricule_respo'		=>	$respo
                                    );
                                   }
					
				}
			}
			$this->Respoclasse_model->insert($data);
		}	
	}


            
}