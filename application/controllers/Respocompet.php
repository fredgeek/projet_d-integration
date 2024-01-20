<?php
class Respocompet extends CI_Controller {
      public function __construct()
      {
              parent::__construct();
              
              $this->load->model('Respocompet_model');
              $this->load->model('Event_model');
              $this->load->helper('url_helper');
              $this -> load -> helper ( 'form' ); 
              $this -> load -> library ( 'form_validation' );

              $this->load->library('user_agent');
  

      }
      public function index()
      {       
            $this->load->view('respocompet/index');

      }
       
            public function invalide() 
            {   
            echo $this->Respocompet_model->match_joue1()+ $this->Respocompet_model->match_joue2();
         
            echo   $this->Respocompet_model->victoire_r1();
            echo   $this->Respocompet_model->victoire_r2();
            echo   $this->Respocompet_model->victoire_null();
             die();
            }

      //enregistrer une competition
      public function register_compet()
      {
          $data['data'] = $this->Respocompet_model->get_type();
          $data['data2'] = $this->Respocompet_model->get_discipline();
          $this -> form_validation -> set_message ( 'rule',' est un champ requis' );  // possibilité de definir ses propre messages d'erreur
          
          $this->form_validation->set_rules('nomcompet', 'Nom compétition','required|min_length[4]|max_length[25]');
          $this->form_validation->set_rules('debut', 'la date de debut','required',array('required'=>'<span style="color:red" id="a"> %s est vide</span> '));
          $this->form_validation->set_rules('fin', 'la date de fin','required',array('required'=>'<p p style="color:red" id="b"> %s est vide</p>'));
          $this->form_validation->set_rules('nom_etab', 'l\'etablissement','required',array('required'=>'<span style="color:red" id="c"> %s est vide</span> '));
         
         
          
          if  ( $this -> form_validation -> run ()  ===  FALSE ) 
          {
              $this->load->view('respocompet/interfaces/menu');
              $this -> load -> view ( 'respocompet/editer',$data); 
              $this->load->view('respocompet/interfaces/footer');
              
          }
          else{ 
          
            $name = $this->Respocompet_model->valid_donnees( $this->input->post('nomcompet'));
            $debut = $this->Respocompet_model->valid_donnees( $this->input->post('debut')) ;  
            $fin = $this->Respocompet_model->valid_donnees( $this->input->post('fin')) ;  
            $type = $this->Respocompet_model->valid_donnees($this->input->post('typecompet'));
            $annee = $this->Respocompet_model->valid_donnees($this->input->post('annee'));
            $nom_etab = $this->Respocompet_model->valid_donnees($this->input->post('nom_etab'));
             $data['id'] = $this->input->post('discipline');
            $id_etab = $this->Respocompet_model->id_etab( $nom_etab); 

            /// Elimination des incohérences de nom dau niveau des compéttions avant leur création 

          
           
       if(    $name== 'Coupe du Doyen' && (stristr($nom_etab, 'facult'))=== false ) {
        $this ->session->set_flashdata ( 'invalide1', 'La coupe du doyen concerne les falcutés' );
        redirect('respocompet/register_compet');
       } else{  
        if($name == 'Coupe du Directeur' && (stristr($nom_etab, 'facult')) ){

          $this ->session->set_flashdata ( 'invalide2', 'La coupe directeur concerne les établissements de formation' );
          redirect('respocompet/register_compet');
         } else{

          if(  empty($this->Respocompet_model->competition_exist($annee, $id_etab,$data['id'], $type)) ){
            /////SI ELLE N'EXISTE PAS ON LA CREE
            $compet_id['id']  =  $this->Respocompet_model->register_compet(); 
               // fonction qui retournera L'id de la competition nouvellement inseree
               $compet_id_recup = $compet_id['id'];//id_compet  
               $id_discipline = $this->input->post('discipline');
               $this->Respocompet_model->insert_compet_annee($compet_id_recup,$annee);
               $this->Respocompet_model->insert_compet_etab($compet_id_recup,$id_etab);
               $this->Respocompet_model->insert_compet_discipline($compet_id_recup);
              $data['debut']=$this->input->post('debut');
              $data['fin']=$this->input->post('fin');
                 // creation de sa session
                 $compet_id_recup2 = array(
                     'id_compet'=>  $compet_id_recup,
                     'id_discipline'=>$id_discipline,
                   );
                   $this->session->set_userdata($compet_id_recup2);
                  // 
                  $this->load->view('respocompet/interfaces/menu');
                  $this -> load -> view ( 'respocompet/formphase',$data);
                  $this->load->view('respocompet/interfaces/footer');
                    /// suite dans phase.php
            }
              else{
               $this ->session->set_flashdata ( 'competition_exist', 'La compétition a déjà été crée pour cette année académique' );
               $this->load->view('respocompet/interfaces/menu');
               $this -> load -> view ( 'respocompet/editer',$data); 
               $this->load->view('respocompet/interfaces/footer');
               
              }
         }
         
       }

     }
     
    } 



        public function actual_phase()
        {    
          $default  =  array ( 'compet','discipline');
          $pass =  $this -> uri -> uri_to_assoc ( 3 ,$default);
          $data =$pass['compet'];
             
              $this->load->view('respocompet/interfaces/menu');
               $this -> load -> view ( 'respocompet/formphase_actual',$data);
               $this->load->view('respocompet/interfaces/footer');
        }
          
      public function update_compet()
                     {    
                          $data['data'] = $this->Respocompet_model->get_type();
                        $this->load->view('respocompet/interfaces/menu');
                        $this->load->view('respocompet/update_competition',$data);
                        $this->load->view('respocompet/interfaces/footer');
                      }
                  public function ajout_groupe($pass = false) // ds la partie suivre la competition on peut vouloir ajouter des groupes pour une phase
                    {    
                      $this->load->view('respocompet/formpoule',$pass);
                    }

               
            public function organigramme()
            {    
                  $data = $this->input->post('compet_id');
                   $data2['data'] = $this->Respocompet_model->get_phase($data);
                   $data2['data2'] = $this->Respocompet_model->get_poule();
                   $data2['data3'] = $this->Respocompet_model->recup_discipline($data);
                   $data2['data5'];
                   $this->load->view('respocompet/interfaces/menu');
                   $this->load->view('respocompet/organigramme',$data2);
                  $this->load->view('respocompet/interfaces/footer');
            }
       public function mes_competition($data = false)
            {    
               
                   $data2['data'] = $this->Respocompet_model->recup_compet($data);
                   if (empty(  $this->Respocompet_model->recup_compet($data))) {
                   $this->load->view('respocompet/interfaces/menu');
                   $this->load->view('respocompet/vide');
                   $this->load->view('respocompet/interfaces/footer');
                  }else {
                        
                    $this->load->view('respocompet/interfaces/menu');
                    $this->load->view('respocompet/mes_competition',$data2);
                //    $this->load->view('respocompet/interfaces/footer');
                    }
            }
            public function  invalide_competition($data = false)
            {    
               
                   $data2['data'] = $this->Respocompet_model->recup_compet_invalide($data);
                   if (empty(  $data2['data'])) {
                   $this->load->view('respocompet/interfaces/menu');
                   $this->load->view('respocompet/vide');
                   $this->load->view('respocompet/interfaces/footer');
                  }else {
                        
                    $this->load->view('respocompet/interfaces/menu');
                    $this->load->view('respocompet/competition_invalide',$data2);  
                    $this->load->view('respocompet/interfaces/footer');
                    }
            }

            public function  responsable_classe($data = false)
            {    
               
                 //  $data2['data'] = $this->Respocompet_model->respo_classe($data);  
                   if (empty(  $data)) {
                   $this->load->view('respocompet/interfaces/menu');
                   $this->load->view('respocompet/vide');
                   $this->load->view('respocompet/interfaces/footer');
                  }else {
                        
                    $this->load->view('respocompet/interfaces/menu');
                    $this->load->view('respocompet/respoclasse');
                    $this->load->view('respocompet/interfaces/footer');
                    }
            }
           
       public function voir_organigramme($pass = false)
              {    
                  $default  =  array ( 'compet','discipline');
                  $pass =  $this -> uri -> uri_to_assoc ( 3 ,$default);
                  $dat =$pass['compet'];
                   $data['data'] = $this->Respocompet_model->get_phase($dat);
                   $data['data2'] = $this->Respocompet_model->get_poule($dat);
                   $data['data5'] = $this->Respocompet_model->get_equipe();
                   $data['data3'] = $dat;  // recuperation de l'id_compet
                   $data['data4'] = $pass['discipline'];
                   
                   if (empty( $this->Respocompet_model->get_phase($dat))) {
                         
                    
                   $this->load->view('respocompet/interfaces/menu');
                   $this->load->view('respocompet/vide_organigramme',$data);
                   $this->load->view('respocompet/interfaces/footer');
                   } 
                   else 
                   {
                        
                   $this->load->view('respocompet/interfaces/menu_collapse');
                   $this->load->view('respocompet/organigramme',$data);
                   $this->load->view('respocompet/interfaces/footer');
                   }
                  
            }

            //// creation des groupes independamment  de l'user qui cree les compet
            public function create_groupes($pass = false)
                      {
              $default  =  array ( 'compet','discipline');
              $pass =  $this -> uri -> uri_to_assoc ( 3 ,$default); 
              $dat3  = $pass['compet'];
              $data = $this->Respocompet_model->get_phase($dat3);
             foreach($data as $phase):
                          
              
                            if( $phase['nom_phase']=='Eliminatoire'){
                            
                                $insr_compet  = array();
                                $insr_idphase   = array(); 
                                $insr_idphase   = array(); 
                                      for($i=0;$i<6;$i++)
                                      {

                                        
                                    $insr_nom_poule []  = 'Groupe '.($i+1);
                                    
                                    $insr_idphase []= $phase['id_phase'];
                                    
                                    $insr_compet[]= $pass['compet'];
                                    }
                                  for($j=0;$j<6;$j++){
                                    $data = array(
                                          'nom_poule' =>  $insr_nom_poule[$j],
                                          'phase_id' =>  $insr_idphase[$j],
                                          'competition_id' =>$insr_compet[$j],
                                          
                                          //'dob' => $this->input->post('dob'),
                                        );
                                      // die('ici');
                                      $this->Respocompet_model->save($data);
                                    }
                             
                              }
                        
                            if( $phase['nom_phase']=='8-Finales'){
                 
                              $insr_compet1  = array();
                              $insr_idphase1   = array(); 
                              $insr_idphase1   = array(); 
                                    for($i=0;$i<8;$i++)
                                    {
      
                                      
                                  $insr_nom_poule1 []  = '8-Finales '.($i+1);
                                  
                                  $insr_idphase1 []= $phase['id_phase'];
                                  
                                  $insr_compet1[]= $pass['compet'];
                                  }
                                for($j=0;$j<8;$j++){
                                  $data = array(
                                        'nom_poule' =>  $insr_nom_poule1[$j],
                                        'phase_id' =>  $insr_idphase1[$j],
                                        'competition_id' =>$insr_compet1[$j],
                                        
                                        //'dob' => $this->input->post('dob'),
                                      );
                                    // die('ici');
                                    $this->Respocompet_model->save($data);
                                  }
                              
                                   
                                  }
                                  if($phase['nom_phase']=='4-Finales'){
                 
                                    $insr_compet2  = array();
                                    $insr_idphase2   = array(); 
                                    $insr_idphase2   = array(); 
                                          for($i=0;$i<4;$i++)
                                          {
            
                                            
                                        $insr_nom_poule2[]  = '4-Finales '.($i+1);
                                        
                                        $insr_idphase2[]= $phase['id_phase'];
                                        
                                        $insr_compet2[]= $pass['compet'];
                                        }
                                      for($j=0;$j<4;$j++){
                                        $data = array(
                                              'nom_poule' =>  $insr_nom_poule2[$j],
                                              'phase_id' =>  $insr_idphase2[$j],
                                              'competition_id' =>$insr_compet2[$j],
                                              
                                              //'dob' => $this->input->post('dob'),
                                            );
                                          // die('ici');
                                          $this->Respocompet_model->save($data);
                                        }
                                    
                                       
                                        
                                        }
                                        if( $phase['nom_phase']=='Demies-Finales'){
                 
                                          $insr_compet3  = array();
                                          $insr_idphase3   = array(); 
                                          $insr_idphase3   = array(); 
                                                for($i=0;$i<2;$i++)
                                                {
                  
                                                  
                                              $insr_nom_poule3[]  = 'Demies-Finales '.($i+1);
                                              
                                              $insr_idphase3[]= $phase['id_phase'];
                                              
                                              $insr_compet3[]= $pass['compet'];
                                              }
                                            for($j=0;$j<2;$j++){
                                              $data = array(
                                                    'nom_poule' =>  $insr_nom_poule3[$j],
                                                    'phase_id' =>  $insr_idphase3[$j],
                                                    'competition_id' =>$insr_compet3[$j],
                                                    
                                                    //'dob' => $this->input->post('dob'),
                                                  );
                                                // die('ici');
                                                $this->Respocompet_model->save($data);
                                              }
                                          
                                              
                                              
                                              }
                                       if($phase['nom_phase']=='Finale'){
                 
                                                $insr_compet4  = array();
                                                $insr_idphase4   = array(); 
                                                $insr_idphase4   = array(); 
                                                      for($i=0;$i<1;$i++)
                                                      {
                        
                                                        
                                                   $insr_nom_poule4 []  = 'Finale';
                                                    
                                                   $insr_idphase4 []= $phase['id_phase'];
                                                   
                                                   $insr_compet4[]= $pass['compet'];
                                                    }
                                                  for($j=0;$j<1;$j++){
                                                    $data = array(
                                                          'nom_poule' =>  $insr_nom_poule4[$j],
                                                          'phase_id' =>  $insr_idphase4[$j],
                                                          'competition_id' =>$insr_compet4[$j],
                                                          
                                                          //'dob' => $this->input->post('dob'),
                                                        );
                                                      // die('ici');
                                                      $this->Respocompet_model->save($data);
                                                    }
                                                 }
                                           endforeach;
                   $this->load->helper('url');

                  

                   ////////////////////////////////////////////////

                  //////       MISE EN PLACE DES EQUIPES     ////

                 ////////////////////////////////////////////////
                   $id = $this->Respocompet_model->get_id_etab($pass['compet']);
                   $data['etab'] = $this->Respocompet_model->get_nom_etab($pass['compet']);
                   $data['genre'] = $this->Respocompet_model->get_genre($pass['compet']);
                   $data['discipline'] = $this->Respocompet_model->discipline($pass['discipline']);
                   $data['parcours'] = $this->Respocompet_model->get_parcours($id);
                   foreach($data['parcours'] as $parcours){
                    if ($parcours['id_filiere_parcours']==$parcours['id_filiere'] 
                    && $parcours['id_cycle_parcours']==$parcours['id_cycle'] && $parcours['id_niveau_parcours']==$parcours['id_niveau']) {
          
                //// verification de l'equipe si elle existe

                          if(empty($this->Respocompet_model->verif_equipe($parcours['id_parcours'],$data['discipline'],$data['genre']))){
                            $this->Respocompet_model->creation_equipe($parcours['id_parcours'],
                            $parcours['nom_filiere'],$parcours['nom_cycle'],$parcours['nom_niveau'],$data['discipline'],$data['genre'], $id );
       
                          }
                       

                    }
            
                   
 
                   }
               
           $this->load->view('respocompet/interfaces/menu_collapse.php');
           $this->load->view('respocompet/equipe_config/equipeconfig',$data);
           $this->load->view('respocompet/interfaces/footer');
            } 

          
     
     public function equipe_dispo($data)
     {   
      
       if (empty($data)){

        $this->load->view('respocompet/interfaces/menu_collapse.php');
        $this->load->view('respocompet/vide');
        $this->load->view('respocompet/interfaces/footer');
       }else{
        $this ->session->set_flashdata ( 'responsable' ,'vide');
        $this->load->view('respocompet/interfaces/menu_collapse.php');
        $this->load->view('respocompet/equipe_config/equipeconfig',$data);
        $this->load->view('respocompet/interfaces/footer');

       }
      
      
      }
   
      /////////////////////////////////////////////////////////////

     ////        AJOUT DES EQUIPES DANS LES GROUPES          //////

     /////////////////////////////////////////////////////////////
    public function add_equipe($pass)
              {   
               
                $default  =  array ( 'poule','phase','info');
                $pass =  $this -> uri -> uri_to_assoc ( 3 ,$default); //recuperation 
                $pass['info'] = $this->Respocompet_model->get_phase_poule_equipe($pass['poule'],$pass['phase']);
                $this->load->view('respocompet/interfaces/menu_collapse');
                $this->load->view('respocompet/add_equipe',$pass);
                $this->load->view('respocompet/interfaces/footer');
               }
            
      ////////////////////////////////////////////////////////////////

      //////        CONFIGURATION DES DATES DES RENCONTRES     //////

      //////////////////////////////////////////////////////////////

    public function edit_rencontre($pass = false)
               { 
                  $default  =  array ( 'poule','compet','phase','nbre_equipe');
                  $pass =  $this -> uri -> uri_to_assoc ( 3 ,$default);   
                  $dat= $pass['compet'];
                  

                  // rencontre existante
                 $data['existant']  = $this->Respocompet_model->recup_rencontre($pass['poule']);
                 $data['date']  = $this->Respocompet_model->recup_date( $data['existant']);
                 $data['data'] = $this->Respocompet_model->recup_compet2( $dat);
                 $data['poule_equipe'] = $this->Respocompet_model->recup_poule_equipe($pass['poule']);
                 $data['poule_phase'] = $this->Respocompet_model->get_poule_info($pass['poule']);
                 $data['id'] = $this->Respocompet_model->recup_idphase_discipline($pass['phase']);
                 $data['stade'] = $this->Respocompet_model->stade();
                 if (empty(  $this->Respocompet_model->recup_compet2( $dat))||empty($this->Respocompet_model->recup_poule_equipe($pass['poule']))||$pass['nbre_equipe']% 2 != 0){
                  $this->load->view('respocompet/interfaces/menu');
                  $this->load->view('respocompet/vide');
                  $this->load->view('respocompet/interfaces/footer');
                 }
                 else
                    {    
                      if ($data['existant']){
                        $this ->session->set_flashdata ( 'existant', '  vous avez déjà enregistré cette rencontre' );
                        $this->load->view('respocompet/interfaces/menu');
                        $this->load->view('respocompet/rencontre',$data);
                      //  $this->load->view('respocompet/interfaces/footer');


                      } else{
      
                        $this->load->view('respocompet/interfaces/menu');
                        $this->load->view('respocompet/rencontre',$data);
                       // $this->load->view('respocompet/interfaces/footer');
                      }
                       
                     }
               
              
             }
             public function update_rencontre($existant)
             {   

                 
                  $date = $_POST['date_rencontre']; 
                  $this->Respocompet_model->update_rencontre($existant,$date);
                  $this ->session->set_flashdata ( 'modification', 'Modification reussie' );
                redirect('respocompet/index');
              }


                public function save_rencontre()
                      {   
                         

                          if(isset($_POST['save']))
                          {
                                //$user_id=1;//Pass the userid here
                                $name = $_POST['home'];
                                $away= $_POST['away']; 
                                $journee = $_POST['journee']; 
                                $date = $_POST['date_rencontre']; 
                                $phase_discipline_id = $_POST['phase_discipline']; 
                                $id_poule = $_POST['id_poule'];
                               $id_stade = $_POST['stade'];
                              
                                for($i=0;$i<count($name);$i++){
                                    
                                         $jour=$journee[$i];
                                          $phase_dis=$phase_discipline_id[$i];
                                          $id_stade[$i];
                                         $date[$i];
                                         $date1 = new DateTime( $date[$i] );
                                         $dat = $date1->format("Y-m-d");

                                        $debut_occupation =  $date1->format("H:i");
                                        $date1->add(new DateInterval('PT2H15M'));
                                        $fin_occupation =  $date1->format(' H:i');
                                        $uniq = bin2hex( random_bytes(7));
                                      $val = $this->Respocompet_model->save_occupation( $debut_occupation, $fin_occupation , $id_stade[$i], $uniq);
                                       
                                         
                                         $unique = bin2hex( random_bytes(7));/// crypte pour une recuperation unique des rencontres
                                         $this->Respocompet_model->save_rencontre($dat, $jour, $phase_dis, $unique, $val);
                                         
                                                 $id_rencontre[$i]  = $this->Respocompet_model->recup_id_rencontre($phase_dis, $unique);
                                                 $poule_id =  $id_poule[$i];
                                                 $home =  $this->Respocompet_model->equipe_id( $id_poule[$i],$name[$i]);
                                                 $awa= $this->Respocompet_model->equipe_id( $id_poule[$i],$away[$i]);
                                                 $nom_equipe1 =  $name[$i];
                                                 $nom_equipe2 =  $away[$i];
                                          
                                            $this->Respocompet_model->save_equipe_rencontre($home, $awa,$id_rencontre[$i],$poule_id, $nom_equipe1, $nom_equipe2 );   //Call the modal*/
                                    
                                    
                                          }
                                        $this ->session->set_flashdata ( 'enregistrement_reussi', 'Rencontre(s) enregistrée(s)' );
                                      }
                        redirect('respocompet/index');
                      }

        //////////
        ///////// Resultats des rencontres 
               public function competition_dispo($pass= false)
               {    
                  
                      $data['data'] = $this->Respocompet_model->recup_compet($pass);
                      if (empty(  $this->Respocompet_model->recup_compet($pass))) {
                      $this->load->view('respocompet/interfaces/menu');
                      $this->load->view('respocompet/vide');
                      $this->load->view('respocompet/interfaces/footer');
                     }else {
                           
                       $this->load->view('respocompet/interfaces/menu');
                       $this->load->view('respocompet/voir_resultat',$data);
                     //  $this->load->view('respocompet/interfaces/footer');
                       }
               }
               public function organigramme_dispo($pass= false)
               {    
                  
               
               
              
                $data['data'] =  $this->Respocompet_model->get_rencontre_equipe($pass);
               
                 $this->load->view('respocompet/interfaces/menu');
                 $this->load->view('respocompet/resultatetmodif/vue_resultat',$data);
                 $this->load->view('respocompet/interfaces/footer');
                
               }



               public function edit_results($pass = false)
               { 
                $default  =  array ( 'compet','poule');
                $pass =  $this -> uri -> uri_to_assoc ( 3 ,$default);
                $data['data'] =  $this->Respocompet_model->get_rencontre_equipe_($pass['compet'],$pass['poule']);
               
                        foreach($data['data'] as $id){
                          $id['id_rencontre'];
                        if($id['id_rencontre'] && $id['poule_id'])
                          break;
                          }
                  $data['poule_equipe'] = $this->Respocompet_model->recup_poule_equipe($pass['poule']);
                  $data['poule_phase'] = $this->Respocompet_model->get_poule_info($pass['poule']);
               if (!empty($id['id_rencontre'])) {
                $this->load->view('respocompet/interfaces/menu');
                $this->load->view('respocompet/score',$data);
                $this->load->view('respocompet/interfaces/footer');
                }else {
                  $this->load->view('respocompet/interfaces/menu');
                  $this->load->view('respocompet/vide');
                  $this->load->view('respocompet/interfaces/footer');
            
                        }   
             }
             public function save_results()
             {  
               
              $perfo1 =  $this->input->post('score1'); 
              $perfo2 =  $this->input->post('score2'); 
              $poule_id =  $this->input->post('id_poule');
              $this->Respocompet_model->save_results($this->input->post('away'),$this->input->post('home') , $poule_id, $perfo1, $perfo2 ); 

               
               redirect('respocompet/index'); 
               
             }

////////////////////////
//////  voir rencontre  ///////////
//////////////////////competition_rencontre
            public function rencontre($pass= false)
            {    
              
                $data['data'] = $this->Respocompet_model->recup_compet($pass);
              if (empty(  $this->Respocompet_model->recup_compet($pass))) {
              $this->load->view('respocompet/interfaces/menu');
              $this->load->view('respocompet/vide');
              $this->load->view('respocompet/interfaces/footer');
              }else {
                    
                $this->load->view('respocompet/interfaces/menu');
                $this->load->view('respocompet/choix',$data);
                $this->load->view('respocompet/interfaces/footer');
                }
               
            }
              
              public function rencontre_dispo($pass= false)
              {    
                       $default  =  array ( 'compet','discipline');
                      $pass =  $this -> uri -> uri_to_assoc ( 3 ,$default);
                      $data['data'] =  $this->Respocompet_model->get_rencontre_equipe($pass['compet']);
                      foreach($data['data'] as $id){
                        if($id['id_rencontre'])
                        break;

                      }
                      if (!empty($id['id_rencontre']))   {
                        $this->load->view('respocompet/interfaces/menu');
                        $this->load->view('respocompet/rencontre_dispo',$data);
                       // $this->load->view('respocompet/interfaces/footer');
                       
                        }else {
                          $this->load->view('respocompet/interfaces/menu');
                          $this->load->view('respocompet/vide');
                         // $this->load->view('respocompet/interfaces/footer');
                     
                    }
                     
              }
/////////////////////////////////////////
//////    Statistiques        ///////////
////////////////////////////////////////    
     
            public function stats($pass= false)
            {    
              
               
                 if (empty(  $pass)) {
                      $this->load->view('respocompet/interfaces/menu');
                      $this->load->view('respocompet/vide');
                      $this->load->view('respocompet/interfaces/footer');
                }else{
                    
                      $this->load->view('respocompet/interfaces/menu');
                      $this->load->view('respocompet/stats/vue_stats');
                      $this->load->view('respocompet/interfaces/footer');
                }
              
            }
            public function stats_globales($pass= false)
            {    
              
              $data['compet_dispo'] =  $this->Respocompet_model->total_competition();
              $data['equipe_dispo'] =  $this->Respocompet_model->total_equipe();
              $data['stade'] =  $this->Respocompet_model->total_stade();
             ///////////////////////////////////////////////////////////////
             

             ///                   ici                        ///////////////////////////////

            //             revenir dessus concernant la pieChart JS
             ///////////////////////////////////////////
              $data ['chart'] =  $this->Respocompet_model->nb_discipline();  // fonction qui recupere le nom des diciplines 
               
              $data['football'] =  $this->Respocompet_model->football();  
              $data['basket'] =  $this->Respocompet_model->basket();  
              $data['volleyball'] =  $this->Respocompet_model->volley_ball();  
              $data['handball'] =  $this->Respocompet_model->hand_ball();  
 
                
               
            
           
//die();*/
              $data['pourcent_renc']= $this->Respocompet_model->pourcentage( $this->Respocompet_model->total_rencontre(), 
              $this->Respocompet_model->total_rencontre_jouee());
      
                 if (empty(  $pass)) {
                      $this->load->view('respocompet/interfaces/menu');
                      $this->load->view('respocompet/vide');
                      $this->load->view('respocompet/interfaces/footer');
                }else{
                    
                      $this->load->view('respocompet/interfaces/menu');
                      $this->load->view('respocompet/stats/vue_globales',$data);
                    //  $this->load->view('respocompet/interfaces/footer');
                }
              
            }
            /////////////////////////////////////////////////////
            // / resultat rencontre et modifications          ///
            ////////////////////////////////////////////////////
  
            public function competition_dispo2($pass= false)
            {    
               
                   $data['data'] = $this->Respocompet_model->recup_compet($pass);
                   if (empty(  $this->Respocompet_model->recup_compet($pass))) {
                   $this->load->view('respocompet/interfaces/menu');
                   $this->load->view('respocompet/vide');
                   $this->load->view('respocompet/interfaces/footer');
                  }else {
                        
                    $this->load->view('respocompet/interfaces/menu');
                    $this->load->view('respocompet/resultatetmodif/vue_competition',$data);
                    $this->load->view('respocompet/interfaces/footer');
                    }
            }
            public function result($pass= false)
            {    

             
              $data['data'] =  $this->Respocompet_model->get_rencontre_equipe($pass);
                      foreach($data['data'] as $id){
                        $id['id_rencontre'];
                        if($id['id_rencontre'])
                        break;
              
                              }
            
                      if (!empty($id['id_rencontre'])) {
                      $this->load->view('respocompet/interfaces/menu');
                      $this->load->view('respocompet/resultatetmodif/vue_rencontre',$data);
                      $this->load->view('respocompet/interfaces/footer');
                    
                          }else {
                        $this->load->view('respocompet/interfaces/menu');
                        $this->load->view('respocompet/vide');
                        $this->load->view('respocompet/interfaces/footer');
                  
                              }
            }
            public function update_score($pass= false)
               {    
                    $perfo1 =  $this->input->post('score1'); 
                    $perfo2 =  $this->input->post('score2'); 
                    $poule_id =  $this->input->post('id_poule');
                    $this->Respocompet_model->save_results($this->input->post('away'),$this->input->post('home') , $poule_id, $perfo1, $perfo2 ); 
                  
                    redirect("respocompet/index/");
             
                 }

                 public function e2($pass)
                 {
              
       
               
                     $data['result'] = $this->Event_model->get_events($pass);
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
                     $this->load->view('respocompet/calendrier', $data);
                     $this->load->view('respocompet/interfaces/foot_ev');
                    
                 }

                 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////                     DELETE
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function delete_poule() {

  $id = $this->input->post('id');
  $this->Respocompet_model->delete_poule($id);
}
public function delete_phase() {

  $id = $this->input->post('id');
  $this->Respocompet_model->delete_phase($id);
}
public function delete_compet() {

  $id = $this->input->post('id');
  $this->Respocompet_model->delete_compet1($id);
  $this->Respocompet_model->delete_compet2($id);
 
}
public function reporter_compet() {

  $id = $this->input->post('id');
  $time = $this->input->post('time');
  $new_debut = new DateTime( $this->Respocompet_model->date_debut($id));
  $new_fin = new DateTime( $this->Respocompet_model->date_fin($id));
  $new_debut->add(new DateInterval('P'.$time.'D'));
  $new_fin->add(new DateInterval('P'.$time.'D'));
  $debut = $new_debut->format("Y-m-d");
  $fin = $new_fin->format("Y-m-d");
  
  $this->Respocompet_model->reporter($id,$debut,$fin);
  
}

                  
}



