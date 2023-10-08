import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './pages/home/home.component';
import { WhoAreWe1Component } from './pages/who-are-we1/who-are-we1.component';
import { WhoAreWe2Component } from './pages/who-are-we2/who-are-we2.component';
import { FooterComponent } from './components/footer/footer.component';
import { NavComponent } from './components/nav/nav.component';
import { IntroComponent } from './components/intro/intro.component';
import { NosServicesComponent } from './components/nos-services/nos-services.component';
import { ProjectsComponent } from './components/projects/projects.component';
import { AboutUsComponent } from './components/about-us/about-us.component';
import { PriceComponent } from './components/price/price.component';
import { HttpClientModule } from '@angular/common/http';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    WhoAreWe1Component,
    WhoAreWe2Component,
    FooterComponent,
    NavComponent,
    IntroComponent,
    NosServicesComponent,
    ProjectsComponent,
    AboutUsComponent,
    PriceComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
