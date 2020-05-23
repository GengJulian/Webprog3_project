<?php


class Admin_panel extends CI_Controller{
	public function list_users(){
		$data['title'] = 'Manage users';
		$data['users'] = $this->user_model->get_users();
		$this->load->view('templates/header');
		$this->load->view('admin_panel/users', $data);
		$this->load->view('templates/footer');
	}
}
