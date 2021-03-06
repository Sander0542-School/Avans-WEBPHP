<?php

return [
    'title' => [
        'index' => 'Home',
        'events' => 'Events',
        'restaurants' => 'Restaurants',
    ],
    'lists' => [
        'events' => [
            'header' => [
                'name' => 'Name',
                'location' => 'Location',
                'duration' => 'Duration',
            ],
            'section' => [
                'order' => [
                    'title' => 'Order',
                    'option' => [
                        'name-asc' => 'Name (A - Z)',
                        'name-desc' => 'Name (Z - A)',
                        'start-asc' => 'Start (first - last)',
                        'start-desc' => 'Start (last - first)',
                        'end-asc' => 'End (first - last)',
                        'end-desc' => 'End (last - first)',
                        'location-asc' => 'Location (A - Z)',
                        'location-desc' => 'Location (Z - A)',
                    ],
                ],
                'types' => [
                    'title' => 'Types',
                    'option' => [
                        'events' => 'Events',
                        'movies' => 'Movies',
                    ],
                ],
            ],
        ],
    ],
];
