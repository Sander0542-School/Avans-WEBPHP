<?php

return [
    'event' => [
        'title' => [
            'header' => 'Reservations - Event',
            'step' => [
                '0' => 'Step 1: Select event',
                '1' => 'Step 2: Confirm event',
                '2' => 'Step 3: Select tickets',
                '3' => 'Step 4: Upload pictures',
                '4' => 'Step 5: Confirm reservation',
                '5' => 'Reservation made',
                '6' => 'Something happened',
            ]
        ],
        'message' => [
            'could-not-create' => 'Could not create the reservation, please try again.'
        ],
        'information' => [
            'name' => 'Name',
            'days' => 'Days',
            'location' => 'Location',
            'max-tickets' => 'Maximum Tickets',
            'ticket-count' => 'Ticket Count',
            'picture' => 'Picture',
            'start-date' => 'Start Date',
            'end-date' => 'End Date',
        ],
        'button' => [
            'select-tickets' => 'Next: Select Tickets',
            'upload-picture' => 'Next: Upload Picture',
            'confirm-reservation' => 'Next: Confirm Reservation',
            'finish' => 'Next: Finish Reservation',
            'home' => 'Go Home',
        ],
        'form' => [
            'event' => [
                'label' => 'Event',
                'option' => [
                    'default' => 'Choose an event',
                ]
            ],
            'ticket-count' => [
                'label' => 'Ticket Count',
            ],
            'day-count' => [
                'label' => 'Days',
                'option' => [
                    'default' => 'Choose the stay duration',
                    'all' => 'All days',
                    '1' => '1 day',
                    '2' => '2 days',
                ]
            ],
            'start-date' => [
                'label' => 'Start day',
                'option' => [
                    'default' => 'Choose the start day',
                ]
            ],
            'picture' => [
                'label' => 'Picture',
            ],
        ],
    ],
    'restaurant' => [
        'title' => [
            'header' => 'Reservations - Restaurant',
            'step' => [
                '0' => 'Step 1: Select restaurant',
                '1' => 'Step 2: Confirm restaurant',
                '2' => 'Step 3: Select date and time',
                '3' => 'Step 4: Confirm reservation',
                '4' => 'Reservation made',
                '5' => 'Something happened',
            ]
        ],
        'message' => [
            'could-not-create' => 'Could not create the reservation, please try again.'
        ],
        'information' => [
            'name' => 'Name',
            'location' => 'Location',
            'opening-hours' => 'Opening Hours',
            'seats' => 'Seats',
            'date' => 'Date',
            'time' => 'Time',
        ],
        'button' => [
            'select-time' => 'Next: Select Time',
            'confirm-reservation' => 'Next: Confirm Reservation',
            'finish' => 'Next: Finish Reservation',
            'home' => 'Go Home',
        ],
        'form' => [
            'restaurant' => [
                'label' => 'Restaurant',
                'option' => [
                    'default' => 'Choose an restaurant',
                ]
            ],
            'day' => [
                'label' => 'Date',
                'option' => [
                    'default' => 'Choose a date',
                ]
            ],
            'day-part' => [
                'label' => 'Time',
                'option' => [
                    'default' => 'Choose a time',
                ]
            ],
        ],
    ],
];
