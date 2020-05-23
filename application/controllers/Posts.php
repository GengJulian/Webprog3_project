<?php


class Posts extends CI_Controller{
	public function  index($offset = 0){

		$config['base_url'] = base_url(). 'posts/index/';
		$config['total_rows'] = $this->db->count_all('posts');
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$config['attributes'] = array('class' => 'pagination-links');

		$this->pagination->initialize($config);

		$data['title'] = 'Latest Posts';

		$data['posts'] = $this->post_model->get_posts(FALSE,$config['per_page'],$offset);

		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');

	}

	public function view($slug = NULL){
		$data['posts'] = $this->post_model->get_posts($slug);
		$data['comments'] = $this->comment_model->get_comments($data['posts'][0]['id']);

		if(empty($data['posts'])){
			show_404();
		}

		$this->load->view('templates/header');
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');

	}

	public function create(){
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['title'] = 'Create Post';
		$data['categories'] = $this->post_model->get_categories();

		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('body','Body','required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('posts/create', $data);
			$this->load->view('templates/footer');
		}else{
			$config['upload_path'] = './assets/images/posts';
			$config['allowed_types'] ='png|jpg|gif';
			$config['max_size'] = '2048';
			$config['max_width'] = '500';
			$config['max_height'] = '500';

			$this->load->library('upload',$config);

			if(!$this->upload->do_upload()){
				$errors = array('error' => $this->upload->display_errors());
				echo $errors;
				$post_image = 'blankimage.png';
			}else{
				$data = array('upload_data' =>$this->upload->data());
				$post_image = $_FILES['userfile']['name'];
			}

			$this->post_model->create_post($post_image);
			$this->session->set_flashdata('post_created','Sikeres poszt kiírás!');
			redirect('posts');
		}
	}

	public function delete($id){
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$this->post_model->delete_post($id);
		$this->session->set_flashdata('post_deleted','Poszt sikeresen el lett távolítva!');
		redirect('posts');
	}

	public function edit($slug){
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['posts'] = $this->post_model->get_posts($slug);

		if($this->session->userdata('user_id') !== $data['posts'][0]['user_id']){
			redirect('posts');
		}
		$data['categories'] = $this->post_model->get_categories();

		if(empty($data['posts'])){
			show_404();
		}
		$data['title'] = 'Edit Post';

		$this->load->view('templates/header');
		$this->load->view('posts/edit', $data);
		$this->load->view('templates/footer');
}

	public function update(){
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		$this->post_model->update_post();
		$this->session->set_flashdata('post_updated','Poszt sikeresen módosításra került!');
			redirect('posts');
	}

	public function export(){
		$this->load->dbutil();
		$result = $this->post_model->export_posts();
		$csvContent = $this->dbutil->csv_from_result($result);
		force_download('posts.csv',$csvContent);

		/*if ( ! write_file('./exports/posts.csv', $csvContent)) {
			$this->session->set_flashdata('export_success','Sikeres post export!');
		} else {
			$this->session->set_flashdata('export_fail','Sikertelen post export!');
		}*/
		redirect('posts');
	}

}
