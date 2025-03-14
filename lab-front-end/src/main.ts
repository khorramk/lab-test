import { bootstrapApplication } from '@angular/platform-browser';
import { appConfig } from './app/app.config';
import { AppComponent } from './app/app.component';
import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
import { environment } from './environments/environment';
declare global {
  interface Window {
      Pusher:any;
      Echo:any;
  }
}

window.Pusher = Pusher;
window.Echo = new Echo({
  broadcaster: 'reverb',
  key: environment.reverb_key,
  wsHost: environment.reverb_host,
  wsPort: environment.reverb_port,
  wssPort: environment.reverb_secure_port,
  forceTLS: (environment.reverb_scheme ?? 'https') === 'https',
  enabledTransports: ['ws', 'wss'],
});

bootstrapApplication(AppComponent, appConfig)
  .catch((err) => console.error(err));
