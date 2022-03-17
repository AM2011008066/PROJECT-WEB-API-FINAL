import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { ApiService } from '../api.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  loginForm = new FormGroup({
    email:new FormControl('',Validators.required),
    password:new FormControl('',Validators.required)
  });
  router: any;
  http: any;

  constructor(private service:ApiService) { }

  ngOnInit(): void {


  }

  loginSubmit()

//   {

//     this.service.login(this.loginForm.value).subscribe((res)=>{
//         const user =console.log((a: any) => {
//           return a.email === this.loginForm.value.email && a.password === this.loginForm.value.password
//         });
//         if (user) {
//           alert("Login Success");
//           this.loginForm.reset();
//           this.router.navigate(['home']);
//         } else {
//           alert("User not found")
//         }

//       })
//   }

// }
  {
    if(this.loginForm.valid)
    {
          console.log(this.loginForm.value, 'loginvalue##')
          this.service.login(this.loginForm.value).subscribe((res)=>{
            if(res.status==true)
            {
              console.log(res,'resss');
              //store data in local storage
              localStorage.clear();
              localStorage.setItem('token',res.token);
              localStorage.setItem('email',res.result);
              this.router.navigate(['home']).then(()=>{
              window.location.reload();
            });
          }

            else
            {
              alert('Data invalid')

            }
          });
    }
    else

    {

      alert('All field required!')
    }
  }
}





