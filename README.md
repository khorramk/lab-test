# Labe test 

1. Laravel used for admin interface and livewire
2. Reverb used 
3. laravel 12 is used to create interface.
4. angualr 19 as an spa in separate folder.

## Running The apps

- open three terminals or cmd
- in terminal one go to message-processor-admin
- do composer install
- run php artisan serve after composer depencies updated
- in another terminal - term 2: run php artisan reverb:start 
- in another terminal - go to lab-front-end
- run npm ci
- run ng serve

## Reason for choosing this way

- developement time easier
- not to entangle front end with backend
- Chossing working solution that is out there already instead of reinventing the wheel.

## optimisation

Can use cache when querying data in livewire.
Can use loadblancing to hand load request infront using nginx and docker or if in aws use ALB instance with elatic beanstalk
Can use more fun status on dashboard in laravel to make it freindly. This can be shown in placeholders in dashboard.

## links

[https://laravel.com/docs/12.x/broadcasting#main-content]
[https://laravel.com/]
[https://livewire.laravel.com/]
[https://angular.dev/overview]
[https://tailwindcss.com/]