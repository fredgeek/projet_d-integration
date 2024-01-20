<?php
class Publication extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Publication_model');
                $this->load->helper('url_helper');
                $this->load->library('user_agent');
        }
     
                public function mes_publication($user = NULL) 
                                                                
                        {                                          
                                $default  =  array ( 'user');
                                $user =  $this -> uri -> uri_to_assoc ( 3 ,$default); 
                            
                                $this -> load -> helper ( 'form' ); 
                                $data['pub_item'] = $this->Publication_model->get_publication_user($user['user']); // receperation des donnees ds la table news
                                $news_id=$data['pub_item'];
                        
                              
                                $this->load->view('respocompet/interfaces/menu');
                                $this -> load -> view ('respocompet/mes_publications',$data ); 
                               
                        }


                  public  function  create () // insertion ds la bd d'une nouvelle 
                                {                           // ici c'est vue create qui recevra ces instructions
                                $this -> load -> helper ( 'form' ); 
                                $this -> load -> library ( 'form_validation' );

                                $data [ 'title' ]  =  'Nouvelle publication' ;
                                $data['categorie'] = $this->Publication_model->get_categorie();   // recuperation ds la table categorie


                                $this -> form_validation -> set_rules ( 'titre' ,  'Tit'  ); 
                                $this -> form_validation -> set_rules ( 'text' ,  'Text' ,  'required' );

                                if  ( $this -> form_validation -> run ()  ===  FALSE ) 
                                { 
                                        $this->load->view('respocompet/interfaces/menu');
                                        $this -> load -> view ( 'respocompet/publication',$data ); 
                                        
                                } 
                                else 
                                { 
                                        // chargement de l'image.....  et configuration 
                                        $config['upload_path']='./assets/images';
                                        $config['allowed_types']='gif|jpg|png';
                                        $config['max_size']='2048';
                                        $config['max_width']='500';
                                        $config['max_height']='500';

                                        $this->load->library('upload', $config);
                                        if ($this->upload->do_upload()) {

                                                $data = array('upload_data'=>$this->upload->data());
                                                $image = $_FILES['userfile']['name'];
                                                

                                        } else {
                                                $errors = array('error'=> $this->upload->display_errors()) ;
                                                $image = 'vide.png';
                                                
                                        }
                                        
                                        // End config
                                        
                                        $this -> Publication_model -> set_publication ($image); //

                                        $this ->session->set_flashdata ( 'news_created', ' La publication  est disponible' );
                                        redirect('respocompet/index');
                                        
                                } 
                                
                                }
         public  function  delete () // appel de la suppression
         {                           // 
                $id = $this->input->post('id');
            $this->Publication_model->delete_post($id);

            $this ->session->set_flashdata ( 'news_delete', '  La publication a été supprimée ' );
           
          }
          public  function  edit ($user) // 
          {                           // Appel de la vue edit
              
                $default  =  array ( 'user','post');
                $user =  $this -> uri -> uri_to_assoc ( 3 ,$default);                            

                $this -> load -> helper ( 'form' ); 
                $data['pub_item'] = $this->Publication_model->get_publication_user_row($user['user'] , $user['post']);
                $data['categorie'] = $this->Publication_model->get_categorie();   // recuperation ds la table categorie

                if (empty($data['pub_item']))
                {
                        show_404();
                }

                $data['title'] = 'Modifier';

                $this->load->view('respocompet/interfaces/menu');
                $this->load->view('respocompet/edit_publication', $data);
                $this->load->view('respocompet/interfaces/footer');
               
               
               
                
           }
           public  function  update () // appel de la   modidification 
          {                                 
                $data['pub_item'] = $this->Publication_model->update();


                $this ->session->set_flashdata ( 'news_update', 'La publication a été  modifiée ' );
                redirect('respocompet/index');
           }
 
        
}