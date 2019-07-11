import {NgModule}             from '@angular/core';
import {RouterModule, Routes} from '@angular/router';
//import {AuthGuard}            from '../login/auth-guard.service';

import {EmployeeListComponent} from './employeeList.component';
import {AddEmployeeComponent} from './addEmployee.component';
import {EditEmployeeComponent} from './editEmployee.component';

const employeeRoutes: Routes = [
  {path: 'employeeList', component: EmployeeListComponent},
  {path: 'Addemployee', component: AddEmployeeComponent},
  {path: 'Editemployee/:id', component: EditEmployeeComponent}
];

@NgModule({
  imports: [
    RouterModule.forChild(employeeRoutes)
  ],
  exports: [
    RouterModule
  ]
})

export class EmployeeRoutingModule {
}
