import { Component, OnInit } from '@angular/core';
import { Property } from '../interfaces/property';
import { PropertiesService } from '../services/properties.service';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.css']
})
export class FormComponent implements OnInit {
  property: Property = {
    name: null,
    description: null,
    location: null,
    postal_code: null,
    n_rooms: null,
    n_baths: null,
    property_type: null
  };

  constructor(private propertiesService: PropertiesService) {
   }

  ngOnInit(): void {
  }

  saveProperty(){
    this.propertiesService.save(this.property).subscribe( (data) => {
      alert('Propietat afegida');
      console.log(data);
    }, (error) => {
      console.log(error);
      alert('Hi ha un error')
    });
  }

}
