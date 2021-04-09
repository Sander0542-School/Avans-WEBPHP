<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventReservationResource;
use App\Models\EventReservation;

class DownloadController extends Controller
{
    public function index()
    {
        return view('pages.download.index');
    }

    public function events()
    {
        switch (request()->get('type')) {
            case 'json':
                return EventReservationResource::collection(EventReservation::all());
            case 'csv':
                $reservations = EventReservation::all();
                $csv = '"ID","Event ID","Name","Count","Start Date","End Date","Picture"'.PHP_EOL;

                foreach ($reservations as $reservation) {
                    $csv .= $reservation->id.','.$reservation->event_id.',"'.$reservation->user->name.'",'.$reservation->ticket_count.',"'.$reservation->start_date->format('Y-m-d').'","'.$reservation->end_date->format('Y-m-d').'","'.asset('storage/'.$reservation->picture).'"'.PHP_EOL;
                }

                return response()->csv($csv, 'events.csv');
        }
    }
}
