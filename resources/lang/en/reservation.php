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
                '6' => 'Something happend',
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
];
