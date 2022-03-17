import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { AnyCatcher } from 'rxjs/internal/AnyCatcher';
import { ApiService } from '../api.service';
import {ActivatedRoute} from '@angular/router';

@Component({
  selector: 'app-create',
  templateUrl: './create.component.html',
  styleUrls: ['./create.component.css']
})
export class CreateComponent implements OnInit {

  constructor(private service:ApiService, private router:ActivatedRoute) { }

  getparamid:any;

  ngOnInit(): void {
    //console.log(this.router.snapshot.paramMap.get('id'),'getid');
    this.getparamid = this.router.snapshot.paramMap.get('id');
    if(this.getparamid)
    {
      this.service.getSingleData(this.getparamid).subscribe((res)=>{
        console.log(res,'res==>');
        this.adminForm.patchValue({
          email:res.data[0].email,
          password:res.data[0].password,
        });
      });
    }


  }

  adminForm = new FormGroup({
    'email':new FormControl('',Validators.required),
    'password':new FormControl('',Validators.required)

  });

  adminSubmit()
  {
    if(this.adminForm.valid)
    {
      console.log(this.adminForm.value);
      this.service.createAdmin(this.adminForm.value).subscribe((res)=>{
        console.log(res, 'res==>');
        this.adminForm.reset();
        alert("Data successfully created")

      });
    }
    else
    {
      alert("All field is required");
    }

  }


  adminUpdate()
  {
    console.log(this.adminForm.value,'updatedform');

    if(this.adminForm.valid)
    {
      this.service.updateAdmin(this.adminForm.value,this.getparamid).subscribe((res)=>{
        console.log(res,'resupdated');
        alert('Data sucessfully updated')

      });

    }

  }




}
