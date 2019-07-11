import {Component, OnInit, NgZone, OnDestroy} from '@angular/core';
import * as moment from 'moment-timezone';
import {DatePipe} from "@angular/common";
import {Router, ActivatedRoute} from "@angular/router";
import {EmployeeList} from "./employeelist";
import {EmployeeService} from "./employee-service";
import * as _ from 'underscore';
import {Config} from "../config/config";


@Component({
  templateUrl: 'editEmployee.component.html'
  //'styleUrls: ['meetingmanagement.component.css']
})

export class EditEmployeeComponent implements OnInit {
  constructor(public employeeService: EmployeeService,
              public router: Router,public route: ActivatedRoute) {


  }


  public employeeListData: EmployeeList ={};
  public jname:any;
  public errorMsg:any;
  public errcnt = [];
  public setAlert: boolean = false;

  ngOnInit() {
    let urlBase64Id = this.route.snapshot.params['id'];
    this.employeeService.geteditEmployee(urlBase64Id).subscribe(response => {
      this.employeeListData = response[0];
    });



  }


  editemployee() {
    alert("test");
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
      this.employeeService.posteditEmployee(this.employeeListData).subscribe(response => {
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
