import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ApiService } from './api.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit{
  title = 'Court Booking Management System';

  showmenu = false;



  constructor(private service : ApiService, private router:Router){}
  token = this.service.getToken();
  name = localStorage.getItem('email');


 ngOnInit(){


  if(this.token)
  {
    this.showmenu = true;
  }
  else
  {
    this.showmenu = false;
  }


 }

}
