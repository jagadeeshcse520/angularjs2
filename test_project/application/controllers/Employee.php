<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Employee extends CI_Controller {
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
	
	public function index() {
		$this->load->view('templates/header');
		$this->load->view('employee/login');
	}
	
	public function signup() {
		$data['countryList'] = $this->Employee_model->country_list()->result_array();
		//print_r($data);
		$this->load->view('templates/header');
		$this->load->view('employee/register', $data);
	}
	
	public function listing_page() {
		$email = $this->input->post('emp_email');
		$pwd = $this->input->post('pwd');
		$emp_data = $this->Employee_model->check_login($email,$pwd)->row();
		echo count($emp_data);
		echo "<br>";
		echo $emp_data->emp_name;
		if(count($emp_data)>0) {
			$user_name = $this->session->set_userdata('user_name',$emp_data->emp_name);
			$user_id = $this->session->set_userdata('user_id',$emp_data->emp_id);
			redirect('Employee/profile');
		} else {
			echo "User doesn't exists";
		}
		
	}
	
	public function profile() {
		if($this->session->userdata("user_id")) {
			$id = $this->session->userdata("user_id");
			//echo $id;
			$data['emp_profile'] = $this->Employee_model->profile_view()->result_array();
			//print_r($data['emp_profile']);
			$this->load->view('templates/header');
			$this->load->view('employee/emp_profile', $data);
		} else {
			redirect('Employee/index');
		}
	}
	
	public function register() {
		$emp_data = array(
		//'emp_id' => $this->input->post('emp_id'),
		'emp_name' => $this->input->post('emp_name'),
		'emp_email' => $this->input->post('emp_email'),
		'pwd' => $this->input->post('pwd'),
		'emp_gender' => $this->input->post('emp_gender'),
		'emp_address' => $this->input->post('emp_address'),
		'country_id' => $this->input->post('country'),
		'state_id' => $this->input->post('state'));
		$result = $this->Employee_model->emp_insert($emp_data);
			redirect('Employee/employeelist');
			redirect('UploadImage/profile_upload');
		
	}
	
	public function edit_employee($id) {
		if($this->session->userdata("user_id")) {
			$data['employee_edit'] = $this->Employee_model->edit_employee($id)->result_array();
			$this->load->view('templates/header');
			$this->load->view('employee/edit_employee', $data);
		} else {
			redirect('Employee/index');
		}
	}
	
	public function update_employee() {
		$id = $this->input->post('emp_id');
		$data = array(
			'emp_name' => $this->input->post('emp_name'),
		'emp_email' => $this->input->post('emp_email'),
		'emp_gender' => $this->input->post('emp_gender'),
		'emp_address' => $this->input->post('emp_address'));
		
		$upadte_res = $this->Employee_model->update_employee($id,$data);
		print_r($upadte_res);
		redirect('Employee/employeelist');
		redirect('UploadImage/profile_upload');
	}
	
	public function employeelist() {
		if($this->session->userdata("user_id")) {
			$emp_data['employeeList'] = $this->Employee_model->emp_list()->result_array();
			//$data['emp_data'] = $emp_data[0];
			//print_r($emp_data);
			$this->load->view('templates/header');
			$this->load->view('employee/emp_list',$emp_data);
		} else {
			redirect('Employee/index');
		}
	}
	
	public function delete_employee($id) {
		echo $id;
		$this->Employee_model->delete_employee($id);
		redirect('Employee/employeelist');
		
	}
	
	public function state_list() {
			$cntryid = $this->input->post('cntry_id');
			$state_data = $this->Employee_model->state_list($cntryid)->result_array();
			foreach($state_data as $row){
				
				echo "<option value='".$row['state_id']."' 'Selected'>".$row['state_name']."</option>";
			}
	}
	
	public function employee_List_post() {
       $url = base_url() . 'Employee/employee_List';
	   $emp_data['employeeList'] = $this->Employee_model->emp_list()->result_array();
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Employee/index');
	}
}
?>