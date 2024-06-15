<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Appointments\AppointmentRepositoryInterface;

class AppointmentController extends Controller
{
    private $appointments;
    public function __construct(AppointmentRepositoryInterface $appointments)
    {
        $this->appointments = $appointments;
    }

    public function appointments()
    {
        return $this->appointments->appointments();
    }

    public function confirmed_appointment()
    {
        return $this->appointments->confirmed_appointment();
    }

    public function complete_appointment()
    {
        return $this->appointments->complete_appointment();
    }

    public function update_appointment(Request $request, $id)
    {
        return $this->appointments->update_appointment($request, $id);
    }

    public function complete(Request $request, $id)
    {
        return $this->appointments->complete($request, $id);
    }

    public function destroy($id)
    {
        return $this->appointments->destroy($id);
    }
}
