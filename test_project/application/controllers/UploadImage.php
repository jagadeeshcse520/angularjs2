<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadImage extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		
		// load libraries
		$this->load->library('session');
		$this->load->library('form_validation');
		
		// load model
		$this->load->model('Employee_model');
	}
	/*public function index() {
		$this->load->view('templates/header');
		$this->load->view('employee/register');
	}
	
	public function login() {
		$this->load->view('templates/header');
		$this->load->view('employee/login');
	}*/
	
	public function profile_upload()
	{
		    $temp = explode(".", $_FILES['emp_image']['name']);
			$newfilename = $this->session->userdata("user_id") . '.' . end($temp); //this is image name
		    $target_file = 'assets/uploads/'.$newfilename;  // we are moving file to uploads/profiles/ in  root folder
	        move_uploaded_file($_FILES['emp_image']['tmp_name'], $target_file);
			$data = array(
			'emp_image' => $newfilename  		
			);  // we are updating image file
            $emp_id = $this->session->userdata("user_id"); //gettting the user id from session
			//$this->db->where('emp_id', $emp_id);
			$this->db->insert('emp_details', $data); 
	}
}
?>