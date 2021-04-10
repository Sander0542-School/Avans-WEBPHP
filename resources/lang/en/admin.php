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
            'restaurants-crowding' => [
                'title' => 'Restaurant Crowding',
                'button' => 'View stats',
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
    'restaurants' => [
        'title' => [
            'index' => 'Restaurants',
            'create' => 'Create Restaurant',
            'edit' => 'Edit Restaurant',
        ],
        'information' => [
            'id' => 'Id',
            'name' => 'Name',
            'location' => 'Location',
            'kitchen' => 'Kitchen',
            'opening-hours' => 'Opening Hours',
            'seats' => 'Seats',
        ],
        'form' => [
            'name' => [
                'label' => 'Name',
            ],
            'kitchen' => [
                'label' => 'Location',
                'option' => [
                    'default' => 'Choose a kitchen'
                ]
            ],
            'location' => [
                'label' => 'Location',
            ],
            'opens' => [
                'label' => 'Opens at',
            ],
            'closes' => [
                'label' => 'Closes at',
            ],
            'seats' => [
                'label' => 'Seats',
            ],
        ],
        'button' => [
            'create' => 'Create Restaurant',
            'save' => 'Save Restaurant',
        ],
        'crowding' => [
            'title' => [
                'index' => 'Restaurant Crowding'
            ],
            'information' => [
                'name' => 'Name',
                'seats' => 'Seats',
                'reservations' => 'Reservations',
                'state' => 'State',
            ],
            'state' => [
                'quiet' => 'Quiet',
                'crowded' => 'Crowded',
                'busy' => 'Busy',
            ]
        ]
    ],
];
