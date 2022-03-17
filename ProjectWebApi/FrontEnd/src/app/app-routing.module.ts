import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { NavbarComponent } from './navbar/navbar.component';
import { AboutComponent } from './about/about.component';
import { FaqComponent } from './faq/faq.component';
import { LoginComponent } from './login/login.component';
import { Manage2Component } from './manage2/manage2.component';
import { CreateComponent } from './create/create.component';
import { HomeComponent } from './home/home.component';

const routes: Routes = [
{ path: '', redirectTo: 'login', pathMatch:'full'},
{ path: "navbar", component:NavbarComponent },
{ path: "about", component:AboutComponent },
{ path: "faq", component:FaqComponent },
{ path: "login", component:LoginComponent },
{ path: "manage2", component:Manage2Component },
{ path: "create", component:CreateComponent },
{ path: "create/:id", component:CreateComponent },
{ path: "home", component:HomeComponent },

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
