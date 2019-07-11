import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import {DataTableModule, SharedModule} from 'primeng/primeng';

//import { InMemoryWebApiModule } from 'angular-in-memory-web-api';
//import { InMemoryDataService } from './in-memory-data.service';

import { AppComponent } from './app.component';
import { AppRoutingModule } from './app-routing.module';
import { HeroService } from './hero.service';
import { DashboardComponent } from './dashboard.component';
import { HeroesComponent } from './heroes.component';
import { HeroDetailComponent } from './hero-detail.component';
import { HeroSearchComponent } from './hero-search.component';
import {EmployeeModule} from './employee/employee.module';
import {EmployeeListComponent} from './employee/employeeList.component';
import {EmployeeService} from "./employee/employee-service";
import {AddEmployeeComponent} from "./employee/addEmployee.component";
import {EditEmployeeComponent} from "./employee/editEmployee.component";

@NgModule({
  imports: [
    BrowserModule,
    FormsModule,
    DataTableModule,
    SharedModule,
    AppRoutingModule,
    HttpModule,
    EmployeeModule
    //InMemoryWebApiModule.forRoot(InMemoryDataService, { delay: 600 })
  ],
  declarations: [
    AppComponent,
    DashboardComponent,
    HeroSearchComponent,
    HeroesComponent,
    EmployeeListComponent,
    HeroDetailComponent,
    AddEmployeeComponent,
    EditEmployeeComponent
  ],
  providers: [HeroService, EmployeeService],
  bootstrap: [AppComponent]
})
export class AppModule { }
