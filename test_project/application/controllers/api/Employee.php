<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Employee extends REST_Controller {
	public function __construct() {
		parent::__construct();
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		
		// load libraries
		$this->load->library('session');
		$this->load->library('form_validation');
		
		// load model
		$this->load->model('Employee_model');
	}
	
	public function employeeList_get() {
       $url = base_url() . 'Employee/employeeList';	   
	   $emp_data['employeeList'] = $this->Employee_model->emp_list();
	   if (isset($emp_data['employeeList']) && count($emp_data['employeeList']) > 0) {								
                $this->response($emp_data['employeeList'], 200);                
            } else {
				$this->response($emp_data['employeeList'], 200);                
            }
	}
	
	/*e_url() . 'Employee/employeeId';
		//$empid = $this->input->post('empid');
		//echo $empid;
		$post_json_data = file_get_contents('php://input');			 
		//$jsonData = json_decode($post_json_data, true);
		// print_r($jsonData);
		$empid = $post_json_data['empid'];		
	    $empId_data['employeeListbyId'] = $this->Employee_model->getDetailsById($empid);
	    print_r($empId_data);
	    if (isset($empId_data['employeeListbyId']) && count($empId_data['employeeListbyId']) > 0) {								
                $this->response($empId_data['employeeListbyId'], 200);                
            } else {
				$this->response($empId_data['employeeListbyId'], 200);                
            }
	}*/
	
	public function getEmployee_POST() {
		//echo "here";
		$url = base_url() . 'Employee/getEmployee';
		$post_json_data = file_get_contents('php://input');			 
		$jsonData = json_decode($post_json_data, true);
		// print_r($jsonData);
		 $empid = $jsonData['empid'];		
	    $empId_data['employeeListbyId'] = $this->Employee_model->getDetailsById($empid);
	    print_r($empId_data);
	    if (isset($empId_data['employeeListbyId']) && count($empId_data['employeeListbyId']) > 0) {								
                $this->response($empId_data['employeeListbyId'], 200);                
            } else {
				$this->response($empId_data['employeeListbyId'], 200);                
            }
	}
	
	public function insertEmployee_POST() {
		$url = base_url() . 'Employee/insertEmployee';
		$insert_data = file_get_contents('php://input');			 
		$employeeData = json_decode($insert_data, true);
		// print_r($jsonData);
		 $emp_name = $employeeData['emp_name'];
		 $emp_email = $employeeData['emp_email'];
		 $pwd = md5($employeeData['pwd']);
		 $emp_gender = $employeeData['emp_gender'];
		 $emp_address = $employeeData['emp_address'];
		 $country = $employeeData['country'];
		 $state = $employeeData['state'];
		$password = $this->input->post('pwd');
		//$password = $this->encrypt->md5($pwd);
		$emp_data = array(
		//'emp_id' => $this->input->post('emp_id'),
		'emp_name' => $emp_name,
		'emp_email' => $emp_email,
		'pwd' => $pwd,
		'emp_gender' => $emp_gender,
		'emp_address' => $emp_address,
		'country_id' => $country,
		'state_id' => $state);
		$empEmail_data['employeeListbyEmail'] = $this->Employee_model->getDetailsByEmail($emp_email);
		echo count($empEmail_data['employeeListbyEmail']);
		//$cnt = mysqli_num_rows($get_query);
		if (count($empEmail_data['employeeListbyEmail']) == 0) {	
			$result = $this->Employee_model->emp_insert($emp_data);
			$this->response(array("status"=>True,"result"=>"Succesfully registered employee details"), 200);               
		} else {
			$this->response(array("status"=>True,"result"=>"Employee already exists"), 200);               
		}
		
	}
	
	
	public function insertEmployees_POST() {
		$url = base_url() . 'Employee/insertEmployees';
		$insert_data = file_get_contents('php://input');			 
		$employeeData = json_decode($insert_data, true);
		print_r($employeeData);
		echo "test";
		exit;
		 $emp_fname = $employeeData['fname'];
		 $emp_lname = $employeeData['lname'];
		
		$emp_data = array(
		//'emp_id' => $this->input->post('emp_id'),
		'emp_name' => $emp_fname."".$emp_lname
		);
		//$empEmail_data['employeeListbyEmail'] = $this->Employee_model->getDetailsByEmail($emp_email);
		//echo count($empEmail_data['employeeListbyEmail']);		
		//if (count($empEmail_data['employeeListbyEmail']) == 0) {	
			$result = $this->Employee_model->emp_insert($emp_data);
			$this->response(array("status"=>True,"result"=>"Succesfully registered employee details"), 200);               
		/* } else {
			$this->response(array("status"=>True,"result"=>"Employee already exists"), 200);               
		} */
		
	}
	
	/* public function editEmployee_POST() {
		$url = base_url() . 'Employee/editEmployee';
		$edit_data = file_get_contents('php://input');			 
		$employeeData = json_decode($edit_data, true);
		// print_r($jsonData);
		$emp_id = $employeeData['emp_id'];
		 $emp_name = $employeeData['emp_name'];
		 $emp_email = $employeeData['emp_email'];
		 $pwd = md5($employeeData['pwd']);
		 $emp_gender = $employeeData['emp_gender'];
		 $emp_address = $employeeData['emp_address'];
		 $country = $employeeData['country'];
		 $state = $employeeData['state'];
		$password = $this->input->post('pwd');
		//$password = $this->encrypt->md5($pwd);
		$emp_data = array(
		//'emp_id' => $this->input->post('emp_id'),
		'emp_name' => $emp_name,
		'emp_email' => $emp_email,
		'pwd' => $pwd,
		'emp_gender' => $emp_gender,
		'emp_address' => $emp_address,
		'country_id' => $country,
		'state_id' => $state);
		$empEmail_data['employeeListbyEmail'] = $this->Employee_model->getDetailsById($emp_id);
		echo count($empEmail_data['employeeListbyEmail']);
		//$cnt = mysqli_num_rows($get_query);
		if (count($empEmail_data['employeeListbyEmail']) > 0) {	
			$result = $this->Employee_model->update_employee($emp_id,$emp_data);
			$this->response(array("status"=>True,"result"=>"Succesfully Updated employee details"), 200);               
		} else {
			$this->response(array("status"=>True,"result"=>"Employee doesnt exists"), 200);               
		}
		
	}*/
	
	public function employee_edit_get($form_id) {		
			 $url = base_url() . 'Employee/employee_edit';			
            if ($form_id) {
                $form_id = base64_decode($form_id);
            }  	           
		   $emp_data['employeeData'] = $this->Employee_model->emp_data($form_id);
	   if (isset($emp_data['employeeData']) && count($emp_data['employeeData']) > 0) {								
                $this->response($emp_data['employeeData'], 200);                
            } else {
				$this->response($emp_data['employeeData'], 200);                
            }
	}
	
	public function editEmployee_POST() {
		$url = base_url() . 'Employee/editEmployee';
		$insert_data = file_get_contents('php://input');			 
		$employeeData = json_decode($insert_data, true);
		print_r($employeeData);
		echo "test";
		exit;
		 $emp_fname = $employeeData['fname'];
		 $emp_lname = $employeeData['lname'];
		
		$emp_data = array(
		//'emp_id' => $this->input->post('emp_id'),
		'emp_name' => $emp_fname."".$emp_lname
		);
		
		
	}
	
	
	
}
?>