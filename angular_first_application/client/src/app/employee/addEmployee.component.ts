import {Component, OnInit, NgZone, OnDestroy} from '@angular/core';
import * as moment from 'moment-timezone';
import {DatePipe} from "@angular/common";
import {Router, ActivatedRoute} from "@angular/router";
import {EmployeeList} from "./employeelist";
import {EmployeeService} from "./employee-service";
import * as _ from 'underscore';
import {Config} from "../config/config";


@Component({
  templateUrl: 'addEmployee.component.html'
  //'styleUrls: ['meetingmanagement.component.css']
})

export class AddEmployeeComponent implements OnInit {
  constructor(public employeeService: EmployeeService,
              public router: Router) {


  }


  public employeeListData: EmployeeList ={};
  public jname:any;
  public errorMsg:any;
  public errcnt = [];
  public setAlert: boolean = false;

  ngOnInit() {



  }


	  submitEmployee() {
      this.errcnt = [];
		if (!this.employeeListData.emp_name) {
      this.setAlert = true;
      this.errorMsg = "Please Enter Employee Name";
      this.errcnt.push(1);
      return;
		}
		if(!this.employeeListData.pwd) {
      this.setAlert = true;
      this.errorMsg = "Please Enter Employee  Password";
      this.errcnt.push(1);
      return;
		}
		if(!this.employeeListData.emp_email) {
      this.setAlert = true;
      this.errorMsg = "Please Enter Email ID";
      this.errcnt.push(1);
      return;
		}

		if(this.errcnt.length<=0)
    {
      this.employeeService.postaddEmployee(this.employeeListData).subscribe(response => {
      });
      //this.router.navigate(['/employeeList']);
    }

	}

  employeeList()
  {
    this.router.navigate(['/employeeList']);
  }

  closeAlertBox()
  {
    this.setAlert = false;
  }

}
