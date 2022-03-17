import { Component, OnInit } from '@angular/core';
import { FormBuilder,FormGroup } from '@angular/forms';
import { AdminModel } from './admin.model';
import { ApiService } from '../api.service';
import { taggedTemplate } from '@angular/compiler/src/output/output_ast';
//import { Observable } from 'rxjs';

@Component({
  selector: 'app-manage',
  templateUrl: './manage.component.html',
  styleUrls: ['./manage.component.css']
})

export class ManageComponent implements OnInit {

  formValue !: FormGroup;
  adminModelObj: AdminModel = new AdminModel();
  adminData !: any;

  constructor(private formbuilder: FormBuilder,
    private api : ApiService) { }



  ngOnInit(): void {

    this.formValue = this.formbuilder.group({
      email : [''],
      password : [''],

    })

    this.getAllAdmin();
  }

  postAdminDetails(){
    this.adminModelObj.email = this.formValue.value.email;
    this.adminModelObj.password = this.formValue.value.password;

    this.api.createAdmin(this.adminModelObj)
    .subscribe(res=> {
      console.log(res);
      alert("Admin Added Successfully")
      let ref = document.getElementById('cancel')
      ref?.click;
      this.formValue.reset();
      this.getAllAdmin();
    },

      (    _err: any)=>{
    alert("Something went wrong");
  })


}

getAllAdmin(){
  this.api.getAdmin()
  .subscribe(res=>{
    this.adminData = res;
  })
}

deleteAdmin(row : any){
  this.api.deleteAdmin(row.id)
  .subscribe(res=>{
    alert("Employee Deleted")
  })

}


}

