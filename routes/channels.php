<?php

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});




// Broadcast::channel('chat.{receiver_id}', function (Doctor $user, $receiver_id) {
//     return $user->id === $receiver_id;
// },
//     ['guards' => ['web', 'admin', 'patient', 'doctor', 'ray_employee', 'laboratory_employee', 'api']]
// );

// Broadcast::channel('chat2.{receiver_id}', function (Patient $user, $receiver_id) {
//     return $user->id === $receiver_id;
// },
//     ['guards' => ['web', 'admin', 'patient', 'doctor', 'ray_employee', 'laboratory_employee', 'api']]
// );