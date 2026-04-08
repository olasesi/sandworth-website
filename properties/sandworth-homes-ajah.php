<?php
$prop = [
    'title'    => 'Sandworth Homes, Ajah',
    'slug'     => 'sandworth-homes-ajah',
    'location' => 'Ajah, Lagos State',
    'type'     => 'Residential',
    'status'   => 'For Sale',
    'price'    => '&#8358;85M',
    'desc'     => "An exclusive gated community of 60 semi-detached and detached homes in the fast-growing Ajah corridor. Each home features smart-home technology, high-spec finishes, landscaped private gardens, and access to shared amenities including a clubhouse, swimming pool, and children's play area — all within a fully-secured perimeter.",
    'images'   => [
        './../images/Arepo-II4-1024x576.jpg',
        './../images/AREPO-BEDROOM02-1024x768.jpg',
        './../images/AREPO-LIVNG-AREA-02-1024x768.jpg',
    ],
    'specs' => [
        ['val' => '60',     'lbl' => 'Total Units'],
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
            'slug'     => 'arepo-gardens-estate',
            'img'      => './../images/arepo-slider-1-1024x598.png',
            'location' => 'Arepo, Ogun State',
            'type'     => 'For Sale',
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

$page_title   = 'Sandworth Homes Ajah — Luxury Gated Residential Estate';
$meta_desc    = 'Sandworth Homes Ajah is an exclusive gated community of 60 luxury semi-detached and detached homes in the fast-growing Ajah corridor, Lagos — from ₦85 million.';
$current_page = 'properties';
$og_image     = './../images/Arepo-II4-1024x576.jpg';
$canonical    = 'https://sandworthproperties.ng/properties/sandworth-homes-ajah';

require './../partials/property-page.php';
