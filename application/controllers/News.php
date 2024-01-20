<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('messages_model');
                $this->load->model('News_model');
                $this->load->helper('url_helper');
        }
        public function index()
{        $this -> load -> helper ( 'text' ); // ***** Chargement du helper **** ce que je comprends c'est que 
                                             // s'il n'est pas mentionné certaines fonctions ne prennent pas******
        $data['news'] = $this->News_model->get_news();
        $data['title'] = 'Publications';
        if (empty($data['news']))
        {
                $this->load->view('templates/header', $data);
                $this->load->view('news/success', $data);
                $this->load->view('templates/footer');
        }
        else{
                $this->load->view('templates/header', $data);
                $this->load->view('news/index', $data);
                $this->load->view('templates/footer');
          }
}
       

        
        public function view($slug = NULL) // appel de la vue 'view'
                                           // $data ['news_item'] recois le titre venu de la vue "create" qui contient le formulaire d'insertion et 
{                                          // c'est la methode get_news qui est ulisée elle est ds le model "New_model"

        $this -> load -> helper ( 'form' ); 
        $data['news_item'] = $this->News_model->get_news($slug); // receperation des donnees ds la table news
        $news_id=$data['news_item']['id'];
        $data['messages'] = $this->messages_model->get_messages($news_id);// receperation des donnees ds la table messages
        if (empty($data['news_item']))
        {
                show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
}
        public  function  create () // insertion ds la bd d'une nouvelle 
        {                           // ici c'est vue create qui recevra ces instructions
            $this -> load -> helper ( 'form' ); 
            $this -> load -> library ( 'form_validation' );

            $data [ 'title' ]  =  'Créer une nouvelle' ;
            $data['categorie'] = $this->News_model->get_categorie();   // recuperation ds la table categorie


            $this -> form_validation -> set_rules ( 'titre' ,  'Tit'  ); 
            $this -> form_validation -> set_rules ( 'text' ,  'Text' ,  'required' );

            if  ( $this -> form_validation -> run ()  ===  FALSE ) 
            { 
                $this -> load -> view ( 'templates/header' ,  $data ); 
                $this -> load -> view ( 'news/create' ); 
                $this -> load -> view ( 'templates/footer' );

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
                
                $this -> News_model -> set_news ($image); //

                $this ->session->set_flashdata ( 'news_created', 'nouvelle creee ' );
                redirect('news');
                
            } 
           
         }
         public  function  delete ($id) // appel de la suppression
         {                           // 
             
            $this->News_model->delete_post($id);

            $this ->session->set_flashdata ( 'news_delete', 'nouvelle supprimée ' );
            redirect('news');
          }
          public  function  edit ($slug) // 
          {                           // Appel de la vue edit
              
                                                 

                $this -> load -> helper ( 'form' ); 
                $data['news_item'] = $this->News_model->get_news($slug);
                $data['categorie'] = $this->News_model->get_categorie();   // recuperation ds la table categorie

                if (empty($data['news_item']))
                {
                        show_404();
                }

                $data['title'] = 'Editer';

                $this->load->view('temp/header', $data);
                $this->load->view('news/edit', $data);
                $this->load->view('templates/footer');
                
           }
           public  function  update () // appel de la   modidification 
          {                                 
                $data['news_item'] = $this->News_model->update();


                $this ->session->set_flashdata ( 'news_update', 'nouvelle modifiee ' );
                redirect('news');
           }
 
        
}