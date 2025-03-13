import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { Component, computed, signal, WritableSignal } from '@angular/core';
import {ReactiveFormsModule, Validators, FormGroup, FormControl} from '@angular/forms';
import { environment } from '../environments/environment';
@Component({
  selector: 'app-root',
  imports: [ReactiveFormsModule],
  templateUrl: './app.component.html',
})


export class AppComponent {
  title = 'lab-front-end';

  error: WritableSignal<any> = signal({});
  sucess: WritableSignal<string> = signal('');
  errorEmpty = computed(() => {
    return Object.keys(this.error()).length === 0;
  });
  networkStatus = computed(() => {
    const status = {
      0: 'Network error! please contact system support: 010001890',
      422: 'Validation error! please write only messages',
      404: 'not found',
      500: 'Server error! please contact system support on 020 9303030'
    };

    switch (this.error().status) {
      case 0:
        return status[0]
      case 422:
        return status[0]
      case 404:
        return status[404]
      case 500:
        return status[500]
      default:
        return 0
    }
  })
  constructor(private http: HttpClient) {
    // This service can now make HTTP requests via `this.http`.
  }
  messageForm = new FormGroup({
    messageQuery: new FormControl('', Validators.required),
  });

  sendMessage() {
      this.error.set({});
      const self = this;
      this.http.post(`${environment.apiURL}/process/message`, {
        messages: this.messageForm.value.messageQuery
      }, {observe: 'response'})
      .subscribe({
        next(response) {

        },
        error(error) {
          console.dir(error);
         self.error.set(error);
        }
      })


  }
}
