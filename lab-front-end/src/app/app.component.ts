import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { Component, computed, Signal, signal, WritableSignal } from '@angular/core';
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
  success: WritableSignal<boolean> = signal(false);
  loading: WritableSignal<boolean> = signal(false);
  pending: WritableSignal<boolean> = signal(false);

  errorEmpty: Signal<boolean> = computed(() => {
    return Object.keys(this.error()).length === 0;
  });
  networkStatus: Signal<string> = computed(() => {
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
        return status[422]
      case 404:
        return status[404]
      case 500:
        return status[500]
      default:
        return status[0]
    }
  })
  constructor(private http: HttpClient) {
  }
  messageForm = new FormGroup({
    messageQuery: new FormControl('', Validators.required),
  });

  sendMessage() {
      this.error.set({});
      const self = this;
      this.loading.set(true);
      this.http.post(`${environment.apiURL}/process/message`, {
        message: this.messageForm.value.messageQuery
      }, {observe: 'response'})
      .subscribe({
        next(response) {
           self.success.set(true);
           self.reset();
        },
        error(error) {
         self.error.set(error);
         self.loading.set(false);
        }
      })
  }

  reset() {
    setTimeout(() => {
      this.loading.set(false);
      this.success.set(false);
      this.pending.set(true);
    }, 200);
  }
}
