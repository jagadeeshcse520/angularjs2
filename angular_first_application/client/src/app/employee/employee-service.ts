import {Injectable} from "@angular/core";
import 'rxjs/Rx';
import {Headers, Http, Response,RequestOptions} from '@angular/http';
import {Observable} from 'rxjs/Rx';
import {Config} from './../config/config';
import {EmployeeList} from "./employeelist";

@Injectable()
export class EmployeeService {
  constructor(public httpService: Http) {
  }


  public employeeObj:EmployeeList;


  getEmployeeList():Observable<any>{
    alert("testservice");
    return this.httpService
      .get('http://localhost/test_project/index.php/api/Employee/employeeList')
      .map((response: Response) =>  response.json() as EmployeeList[])
      .catch((error: any) => Observable.throw(error.json().error || 'Server error'));

  }

  postaddEmployee(subObj:any):Observable<any>{
    let headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' });
    let options = new RequestOptions({ headers: headers });
    return this.httpService
      .post('http://localhost/test_project/index.php/api/Employee/insertEmployee',subObj,options)
      .map((response: Response) => response.json() as EmployeeList[] )
      .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
  }

  geteditEmployee(empId: any): Observable<any> {
    return this.httpService
      .get('http://localhost/test_project/index.php/api/Employee/employee_edit/'+empId)
      .map((response: Response) => response.json() as any)
      .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
  }

  posteditEmployee(subObj:any):Observable<any>{
    let headers = new Headers({ 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' });
    let options = new RequestOptions({ headers: headers });
    return this.httpService
      .post('http://localhost/test_project/index.php/api/Employee/editEmployee',subObj,{ headers: headers })
      .map((response: Response) => response.json() as EmployeeList[] )
      .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
  }

}
