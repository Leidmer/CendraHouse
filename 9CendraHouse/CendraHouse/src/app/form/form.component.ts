import { Component, OnInit } from '@angular/core';
import { Property } from '../interfaces/property';
import { PropertiesService } from '../services/properties.service';
import { ActivatedRoute } from '@angular/router';

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

  id: any;
  editing: boolean = false;
  properties: Property[];
  constructor(private propertiesService: PropertiesService, private activatedRoute: ActivatedRoute) {
    this.id = this.activatedRoute.snapshot.params['id'];
    if(this.id){
      this.editing = true;
      this.propertiesService.get().subscribe((data: Property[]) => {
        this.properties = data;
        this.property = this.properties.find((p) => {return p.id == this.id});
        console.log(this.property);
      }, (error) => {
        console.log(error);
      });
    }else{
      this.editing = false;
    }
   }

  ngOnInit(): void {
  }

  saveProperty(){
    if(this.editing){
      this.propertiesService.put(this.property).subscribe( (data) => {
        alert('Propietat actualitzada');
        console.log(data);
      }, (error) => {
        console.log(error);
        alert('Hi ha un error')
      });
    }
    else{
      this.propertiesService.save(this.property).subscribe( (data) => {
        alert('Propietat afegida');
        console.log(data);
      }, (error) => {
        console.log(error);
        alert('Hi ha un error')
      });
    }
   
  }

}
