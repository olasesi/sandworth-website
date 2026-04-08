<?php
$prop = [
    'title'    => "L'Arcade Mall Owerri",
    'slug'     => 'arcade-mall-owerri',
    'location' => 'Owerri, Imo State',
    'type'     => 'Retail & Mall',
    'status'   => 'Available',
    'price'    => '&#8358;2.5M<small>/sqm</small>',
    'desc'     => "Owerri's premier destination mall offering 45,000 sqm of leasable retail, entertainment, and F&B space. Strategically positioned in the heart of Owerri's commercial district with direct road frontage, dedicated parking for 1,200 vehicles, and anchored by a mix of international and local brands across three trading floors.",
    'images'   => [
        './../images/arepo-slider-1024x598.png',
        './../images/AREPO-LIVNG-AREA-1024x768.jpg',
        './../images/AREPO-KITCHEN-01-1024x768.jpg',
    ],
    'specs' => [
        ['val' => '45,000sqm', 'lbl' => 'Gross Leasable Area'],
        ['val' => '3',         'lbl' => 'Trading Floors'],
        ['val' => '1,200',     'lbl' => 'Parking Spaces'],
        ['val' => 'Owerri',    'lbl' => 'Location'],
    ],
    'features' => [
        'International Brand Anchors',
        'Food Court & F&B Zone',
        'Multiplex Cinema',
        'Underground Parking',
        '24/7 Security',
        'Loading Bay Access',
        'Fibre Internet Infrastructure',
        'Backup Power (100%)',
    ],
    'badges' => [
        ['cls' => 'retail', 'label' => 'Retail & Mall'],
        ['cls' => 'avail',  'label' => 'Available'],
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

$page_title   = "L'Arcade Mall Owerri — Retail & Commercial Space";
$meta_desc    = "L'Arcade Mall is Owerri's premier destination mall offering 45,000 sqm of leasable retail, entertainment, and F&B space in the heart of Imo State's capital city.";
$current_page = 'properties';
$og_image     = './../images/arepo-slider-1024x598.png';
$canonical    = 'https://sandworthproperties.ng/properties/arcade-mall-owerri';

require './../partials/property-page.php';
