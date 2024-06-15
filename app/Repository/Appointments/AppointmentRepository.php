<?php

namespace App\Repository\Appointments;

use Twilio\Rest\Client;
use GuzzleHttp\Psr7\Request;
use App\Models\AppointmentPatient;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmation;
use App\Interfaces\Appointments\AppointmentRepositoryInterface;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    public function appointments()
    {
        $appointments = AppointmentPatient::where('type', 0)->get();
        return view('Dashboard.Appointments.index', compact('appointments'));
    }

    public function confirmed_appointment()
    {
        $appointments = AppointmentPatient::where('type', 1)->get();
        return view('Dashboard.Appointments.confirmed_appointment', compact('appointments'));
    }
    public function complete_appointment()
    {
        $appointments = AppointmentPatient::where('type', 2)->get();
        return view('Dashboard.Appointments.complete_appointment', compact('appointments'));
    }

    public function update_appointment($request, $id)
    {
        try {
            $appointment = AppointmentPatient::findOrFail($id);
            $appointment->update([
                'type' => 1,
                'date_appointment' => $request->appointment,
            ]);
            // Send message to email #################### just can send to (meroua30@yahoo.com) #################### 
            // Mail::to($appointment->email)->send(new AppointmentConfirmation($appointment->name, $appointment->date_appointment));
            // #################### #################### Send message to phone #################### ####################
            // $receiverNumber = '+2' . $appointment->phone;
            // $message = 'An appointment has been made for the medical examination with Dr/ ' . $appointment->Doctor->name . ' on: '  . $appointment->date_appointment;
            // $sid = env('TWILIO_SID');
            // $token = env('TWILIO_TOKEN');
            // $fromNumber = env('TWILIO_FROM');
            // $client = new Client($sid, $token);
            // $client->messages->create($receiverNumber, [
            //     'from' => $fromNumber,
            //     'body' => $message
            // ]);
            // #################### #################### #################### #################### ####################
            session()->flash('edit');
            return redirect()->route('appointments');
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function complete($request, $id)
    {
        $appointment = AppointmentPatient::findOrFail($id);
        $appointment->update([
            'type' => 2,
        ]);
        session()->flash('edit');
        return redirect()->route('appointments');
    }

    public function destroy($id)
    {
        AppointmentPatient::FindOrFail($id)->delete();
        session()->flash('delete');
        return redirect()->route('appointments');
    }
}
