import { Component, OnInit } from '@angular/core';
import { PropertiesService } from '../services/properties.service';
import {HttpClientModule} from '@angular/common/http';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  API_ENDPOINT = 'http://localhost:8000/api';
  constructor(private propertyService: PropertiesService, private httpClient: HttpClientModule) { }

  ngOnInit(): void {
  }

}
