import { Message } from '@angular/compiler/src/i18n/i18n_ast';
import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';

@Component({
  selector: 'app-manage2',
  templateUrl: './manage2.component.html',
  styleUrls: ['./manage2.component.css']
})
export class Manage2Component implements OnInit {

  constructor(private service:ApiService) { }

  readAdmin:any;
  readBook:any;


  ngOnInit(): void {

    this.service.getAllAdmin().subscribe((res)=>{
      console.log(res, "res==>");
      this.readAdmin = res.data;
    });

    this.service.getAllBook().subscribe((res)=>{
      console.log(res, "res==>");
      this.readBook = res.data;
    });


  }

  //getdeleteid
  deleteID(id:any)
  {
    console.log(id,'deleteid==>');
    this.service.deleteAdmin(id).subscribe((res)=>{
      console.log(res,'deleteres==>')

      this.service.getAllAdmin().subscribe((res)=>{
        console.log(res, "res==>");
        this.readAdmin = res.data;
      });

    });
  }

}
