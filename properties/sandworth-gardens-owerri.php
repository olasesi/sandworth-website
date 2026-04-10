<?php
$prop = [
    'title'    => 'Sandworth Gardens',
    'slug'     => 'sandworth-gardens-owerri',
    'location' => 'Owerri · Imo State',
    'type'     => 'Gardens',
    'status'   => 'For Sale',
    'price'    => '&#8358;850M',
    'desc'     => "This prestigious estate is sitting on a land area of approximately 5850 Sqm, and it is located at Urata Egbu layout, Owerri in Imo State, it can be accessed either through Toronto Junction by Wethedral Road or the Road Safety Roundabout by Airport Road. Sandworth Gardens represent luxury and Style. The topologies of the estate guarantees comfort, serenity and tranquility.",
    'images'   => [
        './../images/AREPO-LIVNG-AREA-1024x768.jpg',
        './../images/AREPO-BEDROOM02-1024x768.jpg',
        './../images/AREPO-KITCHEN-01-1024x768.jpg',
    ],
    'specs' => [
        ['val' => '5',        'lbl' => 'Bedroom Terrace Duplex'],
        ['val' => '3', 'lbl' => 'Bedroom  Luxury Flats'],
        ['val' => '5',   'lbl' => 'Bedroom Semi –Detached'],
        ['val' => 'owerri', 'lbl' => 'Location'],
    ],
    'features' => [
        '24 hours security network',
        'Perimeter fencing with Gate House',
        'Street light/illumination',
        'Electrical Room',
        'Drainage network',
        'Playground and Recreational area',
        'Transformers for Electricity',
        'Full Capacity Generator',
    ],
    'badges' => [
        ['cls' => 'villa', 'label' => 'Gardens'],
        ['cls' => 'sale',  'label' => 'For Sale'],
    ],
    'nearby' => [
        [
            'title'    => 'Sandworth Homes, Ajah',
            'slug'     => 'sandworth-homes-ajah',
            'img'      => './../images/Arepo-II4-1024x576.jpg',
            'location' => 'Ajah, Lagos State',
            'type'     => 'For Sale',
        ],
        [
            'title'    => 'Sandworth Court',
            'slug'     => 'sandworth-court-arepo',
            'img'      => './../images/arepo-slider-1-1024x598.png',
            'location' => 'Arepo, Ogun State',
            'type'     => 'For Sale',
        ],
    ],
];

$page_title   = 'Sandworth Gardens — Luxury Estate Owerri Imo State';
$meta_desc    = 'Experience luxury and tranquility at Sandworth Gardens, a prestigious estate in Owerri, Imo State. Featuring 24-hour security, recreational areas, and modern amenities.';
$current_page = 'properties';
$og_image     = './../images/AREPO-LIVNG-AREA-1024x768.jpg';
$canonical    = 'https://sandworthproperties.ng/properties/sandworth-gardens-owerri';

require './../partials/property-page.php';
