<?php

return [
    'title' => [
        'index' => 'Thuis',
        'events' => 'Evenementen',
        'restaurants' => 'Restaurants',
    ],
    'lists' => [
        'events' => [
            'header' => [
                'name' => 'Naam',
                'location' => 'Locatie',
                'duration' => 'Duratie',
            ],
            'section' => [
                'order' => [
                    'title' => 'Volgorde',
                    'option' => [
                        'name-asc' => 'Naam (A - Z)',
                        'name-desc' => 'Naam (Z - A)',
                        'start-asc' => 'Start (eerste - laatste)',
                        'start-desc' => 'Start (laatste - eerste)',
                        'end-asc' => 'Einde (eerste - laatste)',
                        'end-desc' => 'Einde (laatste - eerste)',
                        'location-asc' => 'Locatie (A - Z)',
                        'location-desc' => 'Locatie (Z - A)',
                    ],
                ],
                'types' => [
                    'title' => 'Types',
                    'option' => [
                        'events' => 'Evenementen',
                        'movies' => 'Films',
                    ],
                ],
                'location' => [
                    'title' => 'Locatie',
                    'option' => [
                        'default' => 'Alle locaties',
                    ],
                ],
                'date' => [
                    'title' => 'Datum',
                    'label' => [
                        'start' => 'Start',
                        'end' => 'Einde',
                    ],
                ],
            ],
            'messages' => [
                'no-events' => 'Er zijn geen evenmenten die overeenkomen met de zoek criteria.'
            ]
        ],
    ],
    'button' => [
        'go' => 'Terug naar de thuispagina',
    ],
];
