<?php
$prop = [
    'title'    => 'Arepo Gardens Estate',
    'slug'     => 'arepo-gardens-estate',
    'location' => 'Arepo, Ogun State',
    'type'     => 'Residential',
    'status'   => 'For Sale',
    'price'    => '&#8358;45M',
    'desc'     => "Sandworth's flagship residential development — 320 luxury homes across terrace, semi-detached, and fully-detached configurations set within a beautifully landscaped 20-hectare gated community just off the Lagos–Ibadan Expressway. All titles are governor's consent, and the estate is 100% fenced with controlled access points.",
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
            'title'    => 'Banana Island Villas',
            'slug'     => 'banana-island-villas',
            'img'      => './../images/AREPO-LIVNG-AREA-1024x768.jpg',
            'location' => 'Banana Island, Ikoyi',
            'type'     => 'For Sale',
        ],
    ],
];

$page_title   = 'Arepo Gardens Estate — Luxury Gated Community off Lagos-Ibadan Expressway';
$meta_desc    = 'Arepo Gardens Estate is Sandworth Properties\' flagship development — 320 luxury homes across 20 hectares in Arepo, Ogun State, just off the Lagos-Ibadan Expressway. From ₦45M.';
$current_page = 'properties';
$og_image     = './../images/arepo-slider-1-1024x598.png';
$canonical    = 'https://sandworthproperties.ng/properties/arepo-gardens-estate';

require './../partials/property-page.php';