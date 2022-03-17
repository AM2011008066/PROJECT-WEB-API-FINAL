import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
//import { map } from 'rxjs/operators';
//import { url } from 'inspector';


@Injectable({
  providedIn: 'root'
})
export class ApiService {


  constructor(private http : HttpClient) { }

  //connect frontend to backend
  apiUrl = 'http://localhost:3000/alladmin';
  addUrl = 'http://localhost:3000/admin/add';
  delUrl = 'http://localhost:3000/admin/del';
  updUrl = 'http://localhost:3000/admin/put';
  api2Url = 'http://localhost:3000/admin';
  bookUrl = 'http://localhost:3000/allbooking';

  //get all admin data
  getAllAdmin():Observable<any>
  {
    return this.http.get(`${this.apiUrl}`)
  }

  //get all booking data
  getAllBook():Observable<any>
  {
    return this.http.get(`${this.bookUrl}`)
  }


  //create new admin
  createAdmin(data:any):Observable<any>
  {
    console.log(data,'createapi=>')
    return this.http.post(`${this.addUrl}`,data)
  }

  //delete data admin
  deleteAdmin(id:any):Observable<any>
  {
    let ids = id;
    return this.http.delete(`${this.delUrl}/${ids}`);
  }

  //update data admin
  updateAdmin(data:any, id:any):Observable<any>
  {
    let ids = id;
    return this.http.put(`${this.updUrl}/${ids}`,data);
  }

  //getsingledata
  getSingleData(id:any):Observable<any>
  {
    let ids = id;
    return this.http.get(`${this.api2Url}/${ids}`);
  }

  //login
  login(data:any):Observable<any>
  {

    console.log(data,'data###')
    return this.http.post(`${this.api2Url}/login`,data);
  }

  //token
  getToken()
  {
    return localStorage.getItem('token');
  }


}

