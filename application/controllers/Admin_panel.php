<?php


class Admin_panel extends CI_Controller{
	public function list_users(){
		$data['title'] = 'Manage users';
		$data['users'] = $this->user_model->get_users();
		$this->load->view('templates/header');
		$this->load->view('admin_panel/users', $data);
		$this->load->view('templates/footer');
	}

	public function delete_user($user_id){
		$this->user_model->delete_user($user_id);
		redirect('admin_panel/users');
	}

	public function add_user(){
		$data['title'] = 'Add a new user!';

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('username','Username','required|callback_check_username_exists');
		$this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('password2','Confirm Password','required|matches[password]');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('admin_panel/create_user', $data);
			$this->load->view('templates/footer');
		}else{
			$enc_password = md5($this->input->post('password'));
			$this->user_model->register($enc_password);

			$this->session->set_flashdata('user_added','Sikeresen létrehoztad a felhasználót!');
			redirect('admin_panel/users');
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
}
