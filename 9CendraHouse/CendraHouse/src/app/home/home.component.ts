import { Component, OnInit } from '@angular/core';
import { PropertiesService } from '../services/properties.service';
import {Property} from '../interfaces/property';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  API_ENDPOINT = 'http://localhost:8000/api';
  properties : Property[];
  constructor(private propertyService: PropertiesService) { 
    this.getProperties();
  }
  getProperties(){
    this.propertyService.get().subscribe( (data: Property[]) => {
      this.properties = data;
    }, (error) => {
      console.log(error);
      alert('Hi ha un error');
    });
  }
  ngOnInit() {
  }

  delete(id){
    if (confirm('Estas segur/a que vols eliminar aquesta propietat?')){
      this.propertyService.delete(id).subscribe( (data) => {
        alert('La propietat ha estat eliminada');
        console.log(data);
        this.getProperties();
      }, (error) => {
        console.log(error);
      });
    }
  }

}
