<?php


class Posts extends CI_Controller{
	public function  index(){
		$data['title'] = 'Latest Posts';

		$data['posts'] = $this->post_model->get_posts();

		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');

	}

	public function view($slug = NULL){
		$data['posts'] = $this->post_model->get_posts($slug);

		if(empty($data['posts'])){
			show_404();
		}

		$this->load->view('templates/header');
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');

	}

	public function create(){
		$data['title'] = 'Create Post';

		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('body','Body','required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('posts/create', $data);
			$this->load->view('templates/footer');
		}else{
			$this->post_model->create_post();
			redirect('posts');
		}
	}

	public function delete($id){
		$this->post_model->delete_post($id);
	}

}
