<?php
/**
 * Sandworth Properties — Shared Header Partial
 * 
 * Expected variables (set before including this file):
 *   $page_title       string  <title> tag value
 *   $meta_desc        string  meta description
 *   $og_image         string  absolute URL for og:image (optional)
 *   $current_page     string  slug: 'home'|'about-us'|'projects'|'properties'|'our-team'|'contact-us'
 *   $canonical        string  full canonical URL (optional, auto-built if omitted)
 */

//Use this in production, but for local testing we can hardcode the site URL to avoid issues with $_SERVER vars
//$site_url   = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http')
 //             . '://' . ($_SERVER['HTTP_HOST'] ?? 'sandworthproperties.ng');

//Use this for local testing to avoid issues with $_SERVER vars
$site_url   = "http://localhost/sandworth";


$canonical  = $canonical  ?? $site_url . strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
$og_image   = $og_image   ?? $site_url . '/images/arepo-slider-1024x598.png';
$meta_desc  = $meta_desc  ?? 'Sandworth Properties Ltd. — Nigeria\'s premier estate management company delivering luxury residential and commercial real estate solutions since 2006.';

function nav_class(string $page, string $current): string {
    return 'nav-link' . ($page === $current ? ' active' : '');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= htmlspecialchars($page_title) ?> | Sandworth Properties Ltd.</title>
  <meta name="description" content="<?= htmlspecialchars($meta_desc) ?>"/>
  <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>"/>

  <!-- Open Graph -->
  <meta property="og:title"       content="<?= htmlspecialchars($page_title) ?> | Sandworth Properties"/>
  <meta property="og:description" content="<?= htmlspecialchars($meta_desc) ?>"/>
  <meta property="og:image"       content="<?= htmlspecialchars($og_image) ?>"/>
  <meta property="og:url"         content="<?= htmlspecialchars($canonical) ?>"/>
  <meta property="og:type"        content="website"/>
  <meta property="og:site_name"   content="Sandworth Properties Ltd."/>

  <!-- Twitter Card -->
  <meta name="twitter:card"        content="summary_large_image"/>
  <meta name="twitter:title"       content="<?= htmlspecialchars($page_title) ?>"/>
  <meta name="twitter:description" content="<?= htmlspecialchars($meta_desc) ?>"/>
  <meta name="twitter:image"       content="<?= htmlspecialchars($og_image) ?>"/>

  <link rel="icon" href="/logo.jpg" type="image/jpeg"/>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="<?= $site_url ?>/style.css"/>

  <!-- JSON-LD Organisation Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "RealEstateAgent",
    "name": "Sandworth Properties Ltd.",
    "url": "<?= $site_url ?>",
    "logo": "<?= $site_url ?>/logo.jpg",
    "description": "Nigeria's premier estate management company delivering luxury residential and commercial real estate solutions since 2006.",
    "telephone": "+2348180452173",
    "email": "info@sandworthproperties.ng",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "1, Tafawa Balewa Crescent, off Adeniran Ogunsanya",
      "addressLocality": "Surulere",
      "addressRegion": "Lagos State",
      "addressCountry": "NG"
    },
    "sameAs": []
  }
  </script>
</head>
<body>

<header id="site-header">
  <div class="header-inner">
    <a class="logo" href="<?= $site_url ?>/">
      <img src="<?= $site_url ?>/sandworth.jpeg" alt="Sandworth Properties Ltd." class="logo-img"/>
    </a>

    <nav class="main-nav" id="main-nav" aria-label="Primary navigation">
      <a class="<?= nav_class('home', $current_page) ?>"       href="<?= $site_url ?>/">Home</a>
      <a class="<?= nav_class('about-us', $current_page) ?>"   href="<?= $site_url ?>/about-us">About Us</a>
      <a class="<?= nav_class('projects', $current_page) ?>"   href="<?= $site_url ?>/projects">Projects</a>

      <!-- Properties Dropdown -->
      <div class="nav-dropdown" id="navDropdown">
        <button class="nav-link nav-drop-trigger <?= $current_page === 'properties' ? 'active' : '' ?>"
                aria-haspopup="true" aria-expanded="false" id="dropTrigger">
          Properties
          <svg class="drop-arrow" width="12" height="12" viewBox="0 0 12 12" fill="none">
            <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        <div class="drop-menu" id="dropMenu" role="menu">
          <div class="drop-header">Our Properties</div>
          <a class="drop-item" href="<?= $site_url ?>/properties/arcade-mall-owerri" role="menuitem">
            <span class="drop-text">
              <strong>L'Arcade Mall Owerri</strong>
              <span>Owerri, Imo State</span>
            </span>
          </a>
          <a class="drop-item" href="<?= $site_url ?>/properties/sandworth-homes-ajah" role="menuitem">
            <span class="drop-text">
              <strong>Sandworth Homes, Ajah</strong>
              <span>Ajah, Lagos State</span>
            </span>
          </a>
          <a class="drop-item" href="<?= $site_url ?>/properties/sandworth-court" role="menuitem">
            <span class="drop-text">
              <strong>Sandworth Court</strong>
              <span>Victoria Island, Lagos</span>
            </span>
          </a>
          <a class="drop-item" href="<?= $site_url ?>/properties/arepo-gardens-estate" role="menuitem">
            <span class="drop-text">
              <strong>Arepo Gardens Estate</strong>
              <span>Arepo, Ogun State</span>
            </span>
          </a>
          <a class="drop-item" href="<?= $site_url ?>/properties/banana-island-villas" role="menuitem">
            <span class="drop-text">
              <strong>Banana Island Villas</strong>
              <span>Banana Island, Ikoyi · Lagos</span>
            </span>
          </a>
          <a class="drop-item" href="<?= $site_url ?>/properties/sandworth-lekki-towers" role="menuitem">
            <span class="drop-text">
              <strong>Sandworth Lekki Towers</strong>
              <span>Lekki Phase 1, Lagos</span>
            </span>
          </a>
          <a class="drop-footer" href="<?= $site_url ?>/properties">View All Properties &nbsp;&#8594;</a>
        </div>
      </div>

      <a class="<?= nav_class('our-team', $current_page) ?>"   href="<?= $site_url ?>/our-team">Our Team</a>
      <a class="<?= nav_class('contact-us', $current_page) ?>" href="<?= $site_url ?>/contact-us">Contact</a>
    </nav>

    <a class="header-cta" href="<?= $site_url ?>/contact-us">Schedule a Tour</a>

    <button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<main id="app">
