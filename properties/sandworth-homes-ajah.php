<?php
$prop = [
    'title'    => 'Sandworth Homes, Ajah',
    'slug'     => 'sandworth-homes-ajah',
    'location' => 'Ajah, Lagos State',
    'type'     => 'Residential',
    'status'   => 'For Sale',
    'price'    => '&#8358;85M',
    'desc'     => "This Prestigious estate is sitting on a land mass area of approximately 6917.709 Square meters. Access to the estate is through the dual carriage way of the Lekki -Epe expressway. Sandworth homes represent luxury and class. The topology of the houses guarantees comfort, serenity and premium luxury that you desire. The interiors are magnificently finished with impeccable detailing and design. The Estate comprises of 35 units of four (4) En-suite luxury bedrooms [Terraces] and two (2) units of five (5) En-suite semi-detached duplex. The ambiance of our estates exudes a design pattern of simplicity, luxury, aesthetic and bespoke finishing. The five (5) bedroom Semi-detached is unique to those who seek extra touch of royalty.",
    'images'   => [
        './../images/Arepo-II4-1024x576.jpg',
        './../images/AREPO-BEDROOM02-1024x768.jpg',
        './../images/AREPO-LIVNG-AREA-02-1024x768.jpg',
    ],
    'specs' => [
        ['val' => '35',     'lbl' => 'Total Units'],
        ['val' => '3–5',    'lbl' => 'Bedrooms'],
        ['val' => '350sqm', 'lbl' => 'Avg Plot Size'],
        ['val' => 'Ajah',   'lbl' => 'Location'],
    ],
    'features' => [
        'Smart Home Technology',
        'Private Garden per Unit',
        'Swimming Pool',
        'Clubhouse & Gym',
        'Gated 24/7 Security',
        'Paved Internal Roads',
        'Backup Power & Water',
        'C of O Title',
    ],
    'badges' => [
        ['cls' => 'residential', 'label' => 'Residential'],
        ['cls' => 'sale',        'label' => 'For Sale'],
    ],
    'nearby' => [
        [
            'title'    => 'Arepo Gardens Estate',
            'slug'     => 'sandworth-court-arepo',
            'img'      => './../images/arepo-slider-1-1024x598.png',
            'location' => 'Arepo, Ogun State',
            'type'     => 'For Sale',
        ],
        [
            'title'    => 'Sandworth Resort Ibeju Lekki',
            'slug'     => 'sandworth-resort-ibeju-lekki',
            'img'      => './../images/Arepo-III3-1024x576.jpg',
            'location' => 'Ibeju Lekki, Lagos',
            'type'     => 'For Rent',
        ],
    ],
];

$page_title   = 'Sandworth Homes Ajah — Luxury Gated Residential Estate';
$meta_desc    = 'Sandworth Homes Ajah is an exclusive gated community of 60 luxury semi-detached and detached homes in the fast-growing Ajah corridor, Lagos';
$current_page = 'properties';
$og_image     = './../images/Arepo-II4-1024x576.jpg';
$canonical    = 'https://sandworthproperties.ng/properties/sandworth-homes-ajah';

require './../partials/property-page.php';
