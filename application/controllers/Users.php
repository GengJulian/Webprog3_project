<?php

class Users extends CI_Controller{
	public function register(){
		$data['title'] = 'Register a new user';

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('username','Username','required|callback_check_username_exists');
		$this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('password2','Confirm Password','required|matches[password]');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
		}else{
			$enc_password = md5($this->input->post('password'));
			$this->user_model->register($enc_password);

			$this->session->set_flashdata('user_registered','Sikeres regisztráció!');
			redirect('posts');
		}
	}

	public function check_username_exists($username)
	{
		$this->form_validation->set_message('check_username_exists', 'A választott felhasználónév foglalt!');
		if ($this->user_model->check_username_exists($username)) {
			return true;
		} else {
			return false;
		}
	}

	public function check_email_exists($email){
		$this->form_validation->set_message('check_email_exists','Ezzel az email címmel már van regisztrált felhasználó!');
		if($this->user_model->check_email_exists($email)){
			return true;
		}else{
			return false;
		}
	}

	public function login(){
		$data['title'] = 'Login';

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('users/login', $data);
			$this->load->view('templates/footer');
		}else{
			$username = $this->input->post('username');
			$enc_password = md5($this->input->post('password'));
			$user_id = $this->user_model->login($username,$enc_password);
			if($user_id){
				$user_data = array('user_id'=>$user_id,
									'username'=>$username,
									'logged_in'=>true);
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('login_success','Sikeres bejelentkezés!');
				redirect('posts');
			}else{
				$this->session->set_flashdata('login_failed','Sikertelen bejelentkezés!');
				redirect('users/login');
			}

		}
	}
}

