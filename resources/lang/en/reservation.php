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
                '4' => 'Step 5: Buy Tickets',
            ]
        ],
        'information' => [
            'name' => 'Name',
            'days' => 'Days',
            'location' => 'Location',
            'max-tickets' => 'Maximum Tickets',
        ],
        'button' => [
            'select-tickets' => 'Next: Select Tickets',
            'upload-pictures' => 'Next: Upload Picture(s)',
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
        ],
    ],
];
