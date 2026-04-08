<?php
$prop = [
    'title'    => 'Sandworth Court',
    'slug'     => 'sandworth-court',
    'location' => 'Victoria Island, Lagos',
    'type'     => 'Commercial',
    'status'   => 'For Lease',
    'price'    => '&#8358;18M<small>/yr</small>',
    'desc'     => "A premium mixed-use commercial building on Victoria Island's prestigious waterfront. Sandworth Court delivers Grade-A office accommodation across 10 floors with ground-floor retail, a rooftop event terrace, and dedicated underground parking. Designed to international standards with full BMS, fibre infrastructure, and dual-feed power.",
    'images'   => [
        './../images/arepo_enterance.png',
        './../images/Arepo-III3-1024x576.jpg',
        './../images/AREPO-KITCHEN-02-1024x768.jpg',
    ],
    'specs' => [
        ['val' => '10',       'lbl' => 'Floors'],
        ['val' => '2,200sqm', 'lbl' => 'Per Floor Plate'],
        ['val' => '22,000sqm','lbl' => 'Total GFA'],
        ['val' => 'VI',       'lbl' => 'Location'],
    ],
    'features' => [
        'Grade-A Office Specification',
        'Building Management System',
        'Fibre Connectivity',
        'Rooftop Event Terrace',
        'Underground Parking',
        '24/7 Concierge',
        'BREEAM Rated',
        'Lagoon Views',
    ],
    'badges' => [
        ['cls' => 'commercial', 'label' => 'Commercial'],
        ['cls' => 'rent',       'label' => 'For Lease'],
    ],
    'nearby' => [
        [
            'title'    => "L'Arcade Mall Owerri",
            'slug'     => 'arcade-mall-owerri',
            'img'      => './../images/arepo-slider-1024x598.png',
            'location' => 'Owerri, Imo State',
            'type'     => 'For Lease',
        ],
        [
            'title'    => 'Sandworth Lekki Towers',
            'slug'     => 'sandworth-lekki-towers',
            'img'      => './../images/Arepo-III3-1024x576.jpg',
            'location' => 'Lekki Phase 1, Lagos',
            'type'     => 'For Rent',
        ],
    ],
];

$page_title   = 'Sandworth Court Victoria Island — Grade-A Commercial Office Space';
$meta_desc    = 'Sandworth Court on Victoria Island, Lagos offers premium Grade-A office accommodation across 10 floors with lagoon views, rooftop terrace, and underground parking — from ₦18M/yr.';
$current_page = 'properties';
$og_image     = './../images/arepo_enterance.png';
$canonical    = 'https://sandworthproperties.ng/properties/sandworth-court';

require './../partials/property-page.php';
