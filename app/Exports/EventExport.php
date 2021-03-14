<?php

namespace App\Exports;

use App\Models\EventReservation;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Excel;

class EventExport implements FromCollection, Responsable, WithMapping, WithHeadings
{
    use Exportable;

    private $fileName = 'events.csv';

    private $writerType = Excel::CSV;

    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return EventReservation::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'id',
            'event_id',
            'name',
            'count',
            'start_date',
            'end_date',
            'picture',
        ];
    }

    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->id,
            $row->event_id,
            $row->user->name,
            $row->ticket_count,
            $row->start_date->format('Y-m-d'),
            $row->end_date->format('Y-m-d'),
            asset('storage/'.$row->picture),
        ];
    }
}
