<?php
$prop = [
    'title'    => 'Sandworth Resort Ibeju Lekki',
    'slug'     => 'sandworth-resort-ibeju-lekki',
    'location' => 'Ibeju-Lekki, Lagos',
    'type'     => 'Resort',
    'status'   => 'For Sale',
    'price'    => '&#8358;18M<small>/yr</small>',
    'desc'     => "In view of the recent infrastructural development, rapid urbanization, industrialization and migration within Ibeju Lekki axis, the need for home ownership cannot be under-emphasized. The above factors motivated SANDWORTH PROPERTIES LTD to propose the conception, design and delivery of the RESORT. Sandworth Resort comprises of 488 plots of land; The available plot sizes at SANDWORTH RESORT, Ibeju Lekki are: 600sqm and 500sqm respectively.",
    'images'   => [
        './../images/Arepo-III3-1024x576.jpg',
        './../images/AREPO-LIVNG-AREA-02-1024x768.jpg',
        './../images/AREPO-BEDROOM02-1024x768.jpg',
    ],
    'specs' => [
        ['val' => '488',      'lbl' => 'Plots of Land'],
        ['val' => '2',       'lbl' => 'No of Plot sizes'],
        ['val' => '500sqm-600sqm',      'lbl' => 'Plot sizes'],
        ['val' => 'Ibeju-Lekki','lbl' => 'Location'],
    ],
    'features' => [
        'Good Return on Investment (ROI)',
        'Good road network',
        'Absolute Serenity and ambience',
        'Well-planned Drainage System',
        'Comfort and peace of mind',
        'Security and Perimeter fencing',
        'Free from encumbrances',
        'Proposed Prayer Centers',
        'Proposed Estate Clinic',
    ],
    'badges' => [
        ['cls' => 'residential', 'label' => 'Residential'],
        ['cls' => 'rent',        'label' => 'For Rent'],
    ],
    'nearby' => [
        [
            'title'    => 'Sandworth Gardens',
            'slug'     => 'sandworth-gardens-owerri',
            'img'      => './../images/AREPO-LIVNG-AREA-1024x768.jpg',
            'location' => 'Owerri, Imo State',
            'type'     => 'For Sale',
        ],
        [
            'title'    => 'Sandworth Estate',
            'slug'     => 'sandworth-estate-abuja',
            'img'      => './../images/arepo_enterance.png',
            'location' => 'Karu, Abuja',
            'type'     => 'For Lease',
        ],
    ],
];

$page_title   = 'Sandworth Resort Ibeju-Lekki — Plots of Land Ibeju-Lekki Lagos';
$meta_desc    = 'Sandworth Resort Ibeju-Lekki offers 488 plots of land across 2 sizes in Ibeju-Lekki, Lagos — good return on investment, security, and amenities.';
$current_page = 'properties';
$og_image     = './../images/Arepo-III3-1024x576.jpg';
$canonical    = 'https://sandworthproperties.ng/properties/sandworth-resort-ibeju-lekki';

require './../partials/property-page.php';
