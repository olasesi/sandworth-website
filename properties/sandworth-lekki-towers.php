<?php
$prop = [
    'title'    => 'Sandworth Lekki Towers',
    'slug'     => 'sandworth-lekki-towers',
    'location' => 'Lekki Phase 1, Lagos',
    'type'     => 'Residential',
    'status'   => 'For Rent',
    'price'    => '&#8358;18M<small>/yr</small>',
    'desc'     => "Contemporary serviced tower residences in the heart of Lekki Phase 1. 48 apartments across 15 floors — from sleek 2-bedroom layouts to expansive 4-bedroom penthouses — all finished to a luxury standard with floor-to-ceiling glazing, rooftop pool, business lounge, and 24/7 concierge. The ideal address for executives and returning diaspora.",
    'images'   => [
        './../images/Arepo-III3-1024x576.jpg',
        './../images/AREPO-LIVNG-AREA-02-1024x768.jpg',
        './../images/AREPO-BEDROOM02-1024x768.jpg',
    ],
    'specs' => [
        ['val' => '48',       'lbl' => 'Apartments'],
        ['val' => '15',       'lbl' => 'Floors'],
        ['val' => '2–4',      'lbl' => 'Bedrooms'],
        ['val' => 'Lekki Ph.1','lbl' => 'Location'],
    ],
    'features' => [
        '24/7 Concierge Service',
        'Rooftop Pool',
        'Business Lounge',
        'Gym & Spa',
        'Underground Parking',
        'High-Speed Fibre',
        'Backup Power (100%)',
        'Serviced Units Available',
    ],
    'badges' => [
        ['cls' => 'residential', 'label' => 'Residential'],
        ['cls' => 'rent',        'label' => 'For Rent'],
    ],
    'nearby' => [
        [
            'title'    => 'Banana Island Villas',
            'slug'     => 'banana-island-villas',
            'img'      => './../images/AREPO-LIVNG-AREA-1024x768.jpg',
            'location' => 'Banana Island, Ikoyi',
            'type'     => 'For Sale',
        ],
        [
            'title'    => 'Sandworth Court',
            'slug'     => 'sandworth-court',
            'img'      => './../images/arepo_enterance.png',
            'location' => 'Victoria Island, Lagos',
            'type'     => 'For Lease',
        ],
    ],
];

$page_title   = 'Sandworth Lekki Towers — Serviced Apartments Lekki Phase 1 Lagos';
$meta_desc    = 'Sandworth Lekki Towers offers 48 luxury serviced apartments across 15 floors in Lekki Phase 1, Lagos — rooftop pool, business lounge, 24/7 concierge. From ₦18M/yr.';
$current_page = 'properties';
$og_image     = './../images/Arepo-III3-1024x576.jpg';
$canonical    = 'https://sandworthproperties.ng/properties/sandworth-lekki-towers';

require './../partials/property-page.php';
