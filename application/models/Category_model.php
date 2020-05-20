<?php


class Category_model extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function create_category(){
		$data = array('name' => $this->input->post('name'));
		$this->db->insert('categories',$data);
	}

	public function get_categories(){
		$this->db->order_by('name');
		$query = $this->db->get('categories');
		return $query->result_array();
	}
}
