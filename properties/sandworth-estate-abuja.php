<?php
$prop = [
    'title'    => 'Sandworth Estate',
    'slug'     => 'sandworth-estate-abuja',
    'location' => 'Karu, Abuja',
    'type'     => 'Residential',
    'status'   => 'For Lease',
    'price'    => '&#8358;18M<small>/yr</small>',
    'desc'     => "Sandworth Estate, Karu, Abuja is a 342 units of housing estate sitting on 119,700sqm that offers premium class apartments yet very affordable. It’s appearance and fitting boasts of impeccable finishing, elegance presence, comfort and luxury. Other notable estates within Sandworth Estate neighborhood are Civil Defense Quarters, Army Post Housing Estate Phase 5, Prince & Princess Estate and Emmy Dan. It is an environment characterized with modern structures predominantly occupied by the middle income professionals. Sandworth Estate is within 5 minutes driving distance from Abuja city Centre.",
    'images'   => [
        './../images/arepo_enterance.png',
        './../images/Arepo-III3-1024x576.jpg',
        './../images/AREPO-KITCHEN-02-1024x768.jpg',
    ],
    'specs' => [
        ['val' => '342',       'lbl' => 'House units'],
        ['val' => '2,200sqm', 'lbl' => 'Per Floor Plate'],
        ['val' => '119,700sqm','lbl' => 'Total Area'],
        ['val' => 'Karu, Abuja',       'lbl' => 'Location'],
    ],
    'features' => [
        '2-beroom flats',
        '3-bedroom flats',
        'Terrace duplexes',
        'Detached houses',
        'Semi-detached houses',
        'Schools',
        'supermarkets',
        'Gym', 
        'Clinic',
        'FM Office',
        'Lawn Tennis',
        'Play Ground',
         'Swimming Pool',
        'Water Treatment Plant',
        'Electrical Room',
        
    ],
    'badges' => [
        ['cls' => 'residential', 'label' => 'Residential'],
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
            'title'    => 'Sandworth Court',
            'slug'     => 'sandworth-court-arepo',
            'img'      => './../images/Arepo-III3-1024x576.jpg',
            'location' => 'Ogun state',
            'type'     => 'For Rent',
        ],
    ],
];

$page_title   = 'Sandworth Estate Karu, Abuja — Grade-A Commercial Office Space';
$meta_desc    = 'Sandworth Estate on Karu, Abuja offers premium Grade-A  accommodation across 10 floors with rooftop terrace, and underground parking';
$current_page = 'properties';
$og_image     = './../images/arepo_enterance.png';
$canonical    = 'https://sandworthproperties.ng/properties/sandworth-court-arepo';

require './../partials/property-page.php';
