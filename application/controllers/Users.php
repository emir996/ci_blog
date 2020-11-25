<?php 

class Users extends CI_Controller {
    public function register()
    {
        $data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				// Set message
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');

				redirect('posts');
			}

    }

    // Log in user
	public function login(){
		$data['title'] = 'Sign In';

		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('users/login', $data);
			$this->load->view('templates/footer');
		} else {

            //get email
            $email = $this->input->post('email');
            //get and encrypt password
            $password = md5($this->input->post('password'));

            //Login user
            $user_id = $this->user_model->login($email, $password);

            if($user_id){
                $user_data = array(
                    'user_id' => $user_id,
                    'email' => $email,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                //Create session
                $this->session->set_flashdata('login_success', 'You are now logged in');

			    redirect('posts');

            } else {
                $this->session->set_flashdata('login_failed', 'Login is invalid');

			    redirect('users/login');
            }

			// Set message
			
				
			}
    }

    public function logout(){
        // unset user data 
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('email');

        $this->session->set_flashdata('user_loggedout', 'User is log out');

        redirect('users/login');
        
    }
    
    //check if username exists
    public function check_username_exists($username)
    {
        $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');

        if($this->user_model->check_username_exists($username)){
            return true;
        } else {
            return false;
        }
    }

    //check if email exists
    public function check_email_exists($email)
    {
        $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');

        if($this->user_model->check_email_exists($email)){
            return true;
        } else {
            return false;
        }
    }
}