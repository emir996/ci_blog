<?php 

class Posts extends CI_Controller{
    public function index($offset = 0){

        //check first is guest or user and say hi
        if($this->session->userdata('logged_in')){
            $data['name'] = $this->user_model->get_name($this->session->userdata['user_id']);
        } else {
            $data['name'] = 'Guest';
        }

        //print_r($this->session->userdata('logged_in'));
        
        // Pagination Config

        $config['base_url'] = base_url() . 'posts/index/';
        $config['total_rows'] = $this->post_model->get_num_of_posts();
        $config['per_page'] = 3;
        $config['url_segment'] = 3;
        $config['attributes'] = array('class' => 'pagination-link');

        $this->pagination->initialize($config);
        //print_r($this->session->userdata['user_id']);
        

        $data['title'] = ucfirst('Latest Posts');
        $data['posts'] = $this->post_model->get_posts($config['per_page'], $offset);

        $this->load->view('templates/header');
        $this->load->view('posts/index',$data);
        $this->load->view('templates/footer');
    }

    public function view($id){

        $data['post'] = $this->post_model->get_post($id);
        $data['images'] = $this->post_model->get_images_of_blog($id);

        if(empty($data['post'])){
            show_404();
        }

        $data['title'] = $data['post']['title'];
        

        $this->load->view('templates/header');
        $this->load->view('posts/view',$data);
        $this->load->view('templates/footer');
    }

    public function create(){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $data['title'] = 'Create Post';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if($this->form_validation->run() === false)
        {
            $this->load->view('templates/header');
            $this->load->view('posts/create',$data);
            $this->load->view('templates/footer');
        } 
        else 
        {

            $create_and_get_id = $this->post_model->create_post();

            // insert images into app file for images
            $upload_data = $this->post_model->upload_img($create_and_get_id);

            $this->session->flashdata('post_created', 'Your post has been created');
            redirect('posts');
        }
        
    }

    public function delete($id)
    {
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $files = $this->post_model->get_filename_of_images($id);

        
        foreach($files as $file){
            $cwd = getcwd(); // save the current working directory
            $image_file_path = $cwd."\\assets\\images\\posts\\";
            chdir($image_file_path);
            unlink($file['file_name']);
            chdir($cwd); // restore preivous working directory
        }

        $this->post_model->delete_images_path_from_db($id);
        $this->post_model->delete_post($id);
        
        $this->session->flashdata('post_deleted', 'Your post has been deleted');
        redirect('posts');
    }

    public function edit($id){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $data['post'] = $this->post_model->get_post($id);
        $data['images'] = $this->post_model->get_images_of_blog($id);

        //Check user
        if($this->session->userdata('user_id') != $this->post_model->get_post($id)['user_id']){
            redirect('posts');
        }

        if(empty($data['post'])){
            show_404();
        }

        $data['title'] = 'Edit Post';

        $this->load->view('templates/header');
        $this->load->view('posts/edit',$data);
        $this->load->view('templates/footer');
    }

    public function update(){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $id_post = $this->input->post('id');

        $this->post_model->update_post();

        $this->post_model->upload_img($id_post);

        $this->session->flashdata('post_updated', 'Your post has been updated');
        redirect('posts');
    }

    public function deleteimg($id, $filename, $post_id){

        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $this->post_model->delete_image($id, $filename);

        redirect('posts/edit/'.$post_id);
    }

}