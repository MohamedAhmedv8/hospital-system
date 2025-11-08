## Hospital System

<img src="https://d2xqcz296oofyv.cloudfront.net/wp-content/uploads/2022/08/ratio-utility-billing-system-rubs.jpg">

**Created By :**  Mohamed Ahmed
**Email :** mohamed.ahmed.rc@gmail.com


Key Features:

◦ Integrated System: Manages patient records, appointments, and daily operations, improving workflow efficiency by 35%.

◦ Real-time Notifications: Sends alerts via email and SMS for appointments and updates.

◦ Secure Access: Implements authentication, permissions, and role-based access control.

◦ Multilingual Support: Offers translation features for accessibility, increasing user engagement by 20%.

◦ Doctor-Patient Communication: Live chat using Livewire and Pusher for instant messaging.

◦ User-Friendly Interface: Optimized frontend and backend for a seamless experience.



## Installation

To get started, clone this repository.

```
git clone https://github.com/MohamedAhmedv8/hospital-system
```

Next, copy your `.env.example` file as `.env` and configure your Database connection.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YOUR-DATABASE-NAME
DB_USERNAME=YOUR-DATABASE-USERNAME
DB_PASSWORD=YOUR-DATABASE-PASSWROD
```

## Run Packages and helpers

You have to all used packages and load helpers as below.

```
composer install
npm install
npm run build
```

## Generate new application key

You have to generate new application key as below.

```
php artisan key:generate
```

## Run Migrations and Seeders

You have to run all the migration files included with the project and also run seeders as below.

```
php artisan migrate
```
