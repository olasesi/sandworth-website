<?php
$prop = [
    'title'    => 'Sandworth Court Arepo',
    'slug'     => 'arepo-court',
    'location' => 'Arepo, Ogun State',
    'type'     => 'Residential',
    'status'   => 'For Sale',
    'price'    => '&#8358;45M',
    'desc'     => "This is situated in a serene and organized environment at the boundary of Lagos and Ogun State, hosting many estates including Journalist Estate and Citi-View Estate etc. It is a private owned estate that seeks to reinvent the concept of old G.R.A. with cutting edge architecture and delivers high class living standards at an affordable price. The estate sets a high level benchmark in service delivery and world class infrastructure. It is covered by a Global Certificate of Occupancy and is a five (5) minutes’ drive from Magodo/Lagos State Government Secretariat, Alausa and fifteen (15) minutes’ drive to Muritala Mohammed International Airport, while it is a twenty five (25) minutes’ drive from the business community of Victoria Island, Lagos Island Central Business District and Ikoyi in Lagos State.",
    'images'   => [
        './../images/arepo-slider-1-1024x598.png',
        './../images/arepo-slider-1024x598.png',
        './../images/arepo_enterance.png',
        './../images/Arepo-IV2-1024x576.jpg',
        './../images/AREPO-LIVNG-AREA-1024x768.jpg',
    ],
    'specs' => [
        ['val' => '320',   'lbl' => 'Total Units'],
        ['val' => '20ha',  'lbl' => 'Estate Area'],
        ['val' => '3–5',   'lbl' => 'Bedrooms'],
        ['val' => 'Arepo', 'lbl' => 'Location'],
    ],
    'features' => [
        "Governor's Consent Titles",
        'Gated Estate — 24/7 Security',
        'Paved Road Network',
        'Street Lighting',
        'Estate Management Office',
        'Recreational Park',
        'Schools & Clinic Nearby',
        'Lagos–Ibadan Expressway Access',
    ],
    'badges' => [
        ['cls' => 'residential', 'label' => 'Residential'],
        ['cls' => 'sale',        'label' => 'For Sale'],
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
             'title'    => 'Sandworth Estate',
            'slug'     => 'sandworth-estate-abuja',
            'img'      => './../images/AREPO-LIVNG-AREA-1024x768.jpg',
            'location' => 'Karu, Abuja, Lagos',
            'type'     => 'For Lease',
        ],
    ],
];

$page_title   = 'Arepo Court — Luxury Gated Community off Lagos-Ibadan Expressway';
$meta_desc    = 'Arepo Court is Sandworth Properties\' flagship development — 320 luxury homes across 20 hectares in Arepo, Ogun State, just off the Lagos-Ibadan Expressway.';
$current_page = 'properties';
$og_image     = './../images/arepo-slider-1-1024x598.png';
$canonical    = 'https://sandworthproperties.ng/properties/arepo-gardens-estate';

require './../partials/property-page.php';