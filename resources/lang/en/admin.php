<?php

return [
    'dashboard' => [
        'title' => [
            'index' => 'Admin Dashboard',
        ],
        'section' => [
            'events' => [
                'title' => 'Events',
                'button' => 'Manage events',
            ],
            'restaurants' => [
                'title' => 'Restaurants',
                'button' => 'Manage restaurants',
            ],
            'cinemas' => [
                'title' => 'Cinemas',
                'button' => 'Manage cinemas',
            ],
            'downloads' => [
                'title' => 'Downloads',
                'button' => 'Download stats',
            ],
        ],
    ],
    'downloads' => [
        'title' => [
            'index' => 'Downloads',
        ],
        'subtitle' => [
            'export-events' => 'Export Events',
        ],
        'events' => [
            'button' => [
                'json' => 'Download as JSON',
                'cvs' => 'Download as CSV',
            ],
            'message' => [
                'info' => 'Download events',
            ],
        ],
    ],
    'events' => [
        'title' => [
            'index' => 'Events',
            'create' => 'Create Event',
            'edit' => 'Edit Event',
        ],
        'information' => [
            'id' => 'Id',
            'name' => 'Name',
            'location' => 'Location',
            'duration' => 'Duration',
            'reservations' => 'Reservations',
        ],
        'form' => [
            'name' => [
                'label' => 'Name',
            ],
            'location' => [
                'label' => 'Location',
            ],
            'start' => [
                'label' => 'Start',
            ],
            'end' => [
                'label' => 'End',
            ],
            'tickets' => [
                'label' => 'Tickets',
            ],
        ],
        'button' => [
            'create' => 'Create Event',
            'save' => 'Save Event',
        ],
    ],
];
