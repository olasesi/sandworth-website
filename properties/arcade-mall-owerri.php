<?php
$prop = [
    'title'    => "L'Arcade Mall Owerri",
    'slug'     => 'arcade-mall-owerri',
    'location' => 'Owerri, Imo State',
    'type'     => 'Retail & Mall',
    'status'   => 'Available',
    'price'    => '&#8358;2.5M<small>/sqm</small>',
    'desc'     => "L’ARCADE is an enclosed centre located approximately 5 minutes from Control and it’s a 3-minute drive from the popular Concorde Hotel in Owerri. The locational advantage of the site is unparalleled due to its central disposition and accessibility from all quarters of Owerri Metropolis. The Centre provides lettable area of 12sqm of over 400 stalls targeting amongst others to attract outlets like Furniture, Clothing, Shoes and Bags, Electronics, Food & Drinks, Supermarkets and Pharmacy and counting from local and international owners. L’ARCADE’s innovative design, connects the dynamic urban surroundings to the history and splendour of the city. A distinctive, spectacularly designed retail, food & beverage experience is guaranteed to attract a huge number of visitors to meet, shop, eat, drink and relax. Its unique central location will make L’ARCADE a major hotspot for (inter)national business, leisure and entertainment. L’ARCADE offers everything a successful retailer needs. Visitors will enjoy the center’s amazing ambience.",
    'images'   => [
        './../images/arepo-slider-1024x598.png',
        './../images/AREPO-LIVNG-AREA-1024x768.jpg',
        './../images/AREPO-KITCHEN-01-1024x768.jpg',
    ],
    'specs' => [
        ['val' => '4,800sqm', 'lbl' => 'Gross Lettable Area'],
        ['val' => '3',         'lbl' => 'Trading Floors'],
        ['val' => '400',     'lbl' => 'Stalls'],
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

$page_title   = "L'Arcade Mall Owerri — Retail & Commercial Space";
$meta_desc    = "L'Arcade Mall is Owerri's premier destination mall offering 45,000 sqm of leasable retail, entertainment, and F&B space in the heart of Imo State's capital city.";
$current_page = 'properties';
$og_image     = './../images/arepo-slider-1024x598.png';
$canonical    = 'https://sandworthproperties.ng/properties/arcade-mall-owerri';

require './../partials/property-page.php';
