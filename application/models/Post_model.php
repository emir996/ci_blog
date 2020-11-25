<?php 
    class Post_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }

        public function get_name($currentId)
        {
            $this->db->get_where('users', array('id' => $currentId));
            $query = $this->db->row()->name;
            return $query;
        }

        //count all posts
        public function get_num_of_posts(){
            return $this->db->count_all('posts');
        }

        //get all posts
        public function get_posts($limit = false, $offset = false){

            if($limit)
            {
                $this->db->limit($limit, $offset);
            }

            $this->db->order_by('created_at', 'desc');
            $query = $this->db->get('posts');
            return $query->result_array();
            
        }

        //get single post with specified slug
        public function get_post($id){
            $query = $this->db->get_where('posts', array('id' => $id));
            return $query->row_array();
        }

        //create new post
        public function create_post(){
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => strtolower($slug),
                'body' => $this->input->post('body'),
                'user_id' => $this->session->userdata('user_id')
            );

            $this->db->insert('posts',$data);
            $insert_id = $this->db->insert_id();

            return $insert_id;
        }

        //delete specified post
        public function delete_post($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }

        //update specified post
        public function update_post()
        {
            $slug = url_title($this->input->post('title'));
        
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => strtolower($slug),
                'body' => $this->input->post('body')
            );

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('posts', $data);
        }

        //section for images with database operations
        public function upload_img($create_and_get_id){
            $image = array();
            $imageCount = count($_FILES['files']['name']);

            for($i = 0; $i < $imageCount; $i++){

                $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                $_FILES['file']['size'] = $_FILES['files']['size'][$i];

            // File upload configuration
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            // $config['max_size'] = '5000';
            // $config['max_width'] = '1000';
            // $config['max_height'] = '1000';

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $image_data = $this->upload->data();
                $upload_data_img[$i]['file_name'] = $image_data['file_name'];
                $upload_data_img[$i]['post_id'] = $create_and_get_id;

            } else {
                return false;
                }
            }

            $this->multiple_images($upload_data_img);
        
        }


        public function multiple_images($upload_img_data){

            $this->db->insert_batch('files', $upload_img_data);
           
        }

        public function get_images_of_blog($id){
            
            $query = $this->db->get_where('files', array('post_id' => $id));
            return $query->result_array();

        }

        public function delete_image($id,$filename){

            $cwd = getcwd();
            $image_file_path = $cwd."\\assets\\images\\posts\\";
            chdir($image_file_path); // save the current working directory;
            unlink($filename);
            chdir($cwd); // restore the previous working directory

            $this->db->where('id', $id);
            $this->db->delete('files');
            return true;
        }

        public function get_filename_of_images($id){
           
            $query = $this->db->get_where('files', array('post_id' => $id));
            return $query->result_array();

        }

        public function delete_images_path_from_db($id){

            $this->db->where('post_id', $id);
            $this->db->delete('files');
            return true;

        }

    }