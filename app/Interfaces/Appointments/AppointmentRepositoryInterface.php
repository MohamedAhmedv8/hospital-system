<?php

namespace App\Interfaces\Appointments;



interface AppointmentRepositoryInterface
{
    public function appointments();
    public function confirmed_appointment();
    public function complete_appointment();
    public function update_appointment($request, $id);
    public function complete($request, $id);
    public function destroy($id);
}
