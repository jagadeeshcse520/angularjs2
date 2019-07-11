<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Employee extends REST_Controller {
	
	public function __construct() {
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
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
	
	public function employee_List_get() {
       $url = base_url() . 'Employee/employee_List';	   
	   $emp_data['employeeList'] = $this->Employee_model->emp_list();
	   if (isset($emp_data['employeeList']) && count($emp_data['employeeList']) > 0) {								
                $this->response($emp_data['employeeList'], 200);                
            } else {
				$this->response($emp_data['employeeList'], 200);                
            }
	}
	
	public function employeeView_post() {
       $url = base_url() . 'Employee/employeeView';	   
	   $emp_data['employeeList'] = $this->Employee_model->emp_list();
	   if (isset($emp_data['employeeList']) && count($emp_data['employeeList']) > 0) {								
                $this->response($emp_data['employeeList'], 200);                
            } else {
				$this->response($emp_data['employeeList'], 200);                
            }
	}
	
	
}
?>