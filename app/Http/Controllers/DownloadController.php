<?php

namespace App\Http\Controllers;

use App\Exports\EventExport;
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
                return new EventExport();
        }
    }
}
