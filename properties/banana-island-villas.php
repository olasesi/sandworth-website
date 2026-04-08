<?php
$prop = [
    'title'    => 'Banana Island Villas',
    'slug'     => 'banana-island-villas',
    'location' => 'Banana Island, Ikoyi · Lagos',
    'type'     => 'Luxury Villa',
    'status'   => 'For Sale',
    'price'    => '&#8358;850M',
    'desc'     => "Six individually-designed ultra-premium detached villas on Nigeria's most coveted address. Each villa spans 2,000 sqm with a private pool, home theatre, staff quarters, 6-car garage, and direct lagoon access. Interiors are finished to a bespoke standard with imported materials, full home automation, and concierge service.",
    'images'   => [
        './../images/AREPO-LIVNG-AREA-1024x768.jpg',
        './../images/AREPO-BEDROOM02-1024x768.jpg',
        './../images/AREPO-KITCHEN-01-1024x768.jpg',
    ],
    'specs' => [
        ['val' => '6',        'lbl' => 'Villas'],
        ['val' => '2,000sqm', 'lbl' => 'Per Villa'],
        ['val' => '6 Beds',   'lbl' => 'Bedrooms'],
        ['val' => 'Banana Isl.', 'lbl' => 'Location'],
    ],
    'features' => [
        'Private Pool per Villa',
        'Home Theatre',
        'Full Home Automation',
        '6-Car Garage',
        'Staff Quarters',
        'Direct Lagoon Access',
        'Imported Finishes',
        'Concierge Service',
    ],
    'badges' => [
        ['cls' => 'villa', 'label' => 'Luxury Villa'],
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
            'title'    => 'Arepo Gardens Estate',
            'slug'     => 'arepo-gardens-estate',
            'img'      => './../images/arepo-slider-1-1024x598.png',
            'location' => 'Arepo, Ogun State',
            'type'     => 'For Sale',
        ],
    ],
];

$page_title   = 'Banana Island Villas — Ultra-Premium Luxury Villas Ikoyi Lagos';
$meta_desc    = 'Six ultra-premium detached villas on Banana Island, Ikoyi — Nigeria\'s most prestigious address. Private pool, home theatre, lagoon access, and full home automation. From ₦850M.';
$current_page = 'properties';
$og_image     = './../images/AREPO-LIVNG-AREA-1024x768.jpg';
$canonical    = 'https://sandworthproperties.ng/properties/banana-island-villas';

require './../partials/property-page.php';
