import {Component, OnInit, NgZone} from '@angular/core';
import {Router} from "@angular/router";
import {EmployeeService} from "./employee-service";
import {EmployeeList} from "./employeelist";

@Component({
  moduleId: module.id,
  templateUrl: 'employeeList.component.html'
  //styleUrls: ['employee.component.css']
})


export class EmployeeListComponent implements OnInit {
  constructor(public employeeservice: EmployeeService,public router:Router) {
  }
  public employeeListData: EmployeeList[]=[];
  public empID:any;

  ngOnInit() {
   alert("Employee Data");
    this.employeeservice.getEmployeeList().subscribe(response => {
      alert("Employee Data"+JSON.stringify(response));
      this.employeeListData = response;


    });
    }

  editEmployee(event:any)
  {
    alert(JSON.stringify(event.emp_id));
    this.empID =  window.btoa(event.emp_id);
    this.router.navigate(['/Editemployee/'+this.empID]);
  }
}

