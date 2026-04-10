<?php
$page_title   = 'About Us — Built on Trust, Driven by Excellence';
$meta_desc    = 'Founded in 2006, Sandworth Properties Ltd. grew from a boutique Lagos firm into one of Nigeria\'s most respected estate management companies with a ₦8B+ portfolio.';
$current_page = 'about-us';
$og_image     = './images/arepo-slider-1024x598.png';
require 'partials/header.php';
?>

<section class="page active" id="page-about">

  <div class="page-hero">
    <div class="page-hero-bg ph-about"></div>
    <div class="page-hero-content">
      <div class="sec-tag light">About Sandworth Properties</div>
      <h1>Built on Trust.<br><em>Driven by Excellence.</em></h1>
      <p>Two decades of shaping Nigeria's finest addresses.</p>
    </div>
  </div>

  <div class="section about-grid">
    <div class="about-text reveal">
      <div class="sec-tag">Our Story</div>
      <h2>From Boutique Firm to Nigeria's Most Trusted Name in Real Estate</h2>
      <p>Founded in 2006, Sandworth Properties Ltd. began as a boutique Lagos real estate firm with a bold ambition: to professionalise estate management in West Africa. Guided by an unwavering commitment to integrity, we grew from a small advisory practice into one of Nigeria's most respected property management companies.</p>
      <p>Today, we manage a portfolio valued at over <strong>&#8358;8 billion</strong>, serving discerning individuals, families, corporations, and institutional investors who trust us with their most valuable assets.</p>
      <a class="btn-primary" href="<?= SITE_URL ?>/contact-us">
        Work With Us
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
    <div class="about-cards reveal">
      <div class="acard ac1"><span class="ac-n">2006</span><span class="ac-l">Year Founded</span></div>
      <div class="acard ac2"><span class="ac-n">250+</span><span class="ac-l">Properties Managed</span></div>
      <div class="acard ac3"><span class="ac-n">&#8358;8B+</span><span class="ac-l">Portfolio Value</span></div>
      <div class="acard ac4"><span class="ac-n">Lagos</span><span class="ac-l">Nigerian HQ</span></div>
    </div>
  </div>

  <div class="vals-section">
    <div class="vals-inner">
      <div class="sec-tag light">Core Values</div>
      <h2>The Principles That Guide Everything We Do</h2>
      <div class="vals-grid">
        <div class="val reveal" style="--d:0s">
          <div class="val-n">01</div>
          <h3>Integrity</h3>
          <p>Complete transparency — no hidden fees, no half-truths. Just honest counsel and fully accountable service on every engagement.</p>
        </div>
        <div class="val reveal" style="--d:.1s">
          <div class="val-n">02</div>
          <h3>Excellence</h3>
          <p>We set our bar higher than our clients ever would. Every listing, transaction, and interaction reflects our uncompromising standard.</p>
        </div>
        <div class="val reveal" style="--d:.2s">
          <div class="val-n">03</div>
          <h3>Innovation</h3>
          <p>From digital property platforms to smart-building integrations, we constantly evolve to deliver modern solutions.</p>
        </div>
        <div class="val reveal" style="--d:.3s">
          <div class="val-n">04</div>
          <h3>Community</h3>
          <p>We don't just build properties — we create communities where people thrive, and we invest back into the neighbourhoods we serve.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="section mv-section">
    <div class="mv-grid">
      <div class="mv-card reveal">
        <p class="mv-label">Our Mission</p>
        <blockquote>"To deliver premium real estate solutions that transform properties into thriving, value-generating assets for every client we serve."</blockquote>
      </div>
      <div class="mv-card mv-accent reveal">
        <p class="mv-label">Our Vision</p>
        <blockquote>"To be West Africa's most trusted name in estate management — known for unmatched integrity, expertise, and an unwavering client-first culture."</blockquote>
      </div>
    </div>
  </div>

  <div class="cta-strip">
    <div class="cta-strip-inner">
      <div>
        <h2>Ready to Work with Us?</h2>
        <p>Get in touch and let's discuss how Sandworth can serve your property needs.</p>
      </div>
      <a class="btn-white" href="<?= SITE_URL ?>/contact-us">
        Contact Our Team
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
  </div>

</section>

<?php require 'partials/footer.php'; ?>
