import { Component, OnInit } from '@angular/core';
import { PropertiesService } from '../services/properties.service';
import {HttpClient} from '@angular/common/http';
import {Property} from '../interfaces/property';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  API_ENDPOINT = 'http://localhost:8000/api';
  properties : Property[];
  constructor(private propertyService: PropertiesService, private httpClient: HttpClient) { 
    this.propertyService.get().subscribe( (data: Property[]) => {
      this.properties = data;
    }, (error) => {
      console.log(error);
      alert('Hi ha un error');
    });
  }

  ngOnInit() {
  }

}
