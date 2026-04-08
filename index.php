<?php
$page_title   = 'Premium Estate Management · Lagos & Nigeria';
$meta_desc    = 'Sandworth Properties Ltd. — Nigeria\'s premier estate management company delivering luxury residential and commercial real estate solutions since 2006.';
$current_page = 'home';
$og_image     = './images/arepo-slider-1024x598.png';
require './partials/header.php';
?>

<section class="page active" id="page-home">

  <!-- HERO SLIDER -->
  <div class="hero">
    <div class="hero-slider" id="heroSlider">
      <div class="slide active" style="background-image:url('./images/arepo-slider-1024x598.png')"></div>
      <div class="slide" style="background-image:url('./images/arepo_enterance.png')"></div>
      <div class="slide" style="background-image:url('./images/Arepo-II4-1024x576.jpg')"></div>
      <div class="slide" style="background-image:url('./images/Arepo-III3-1024x576.jpg')"></div>
      <div class="slide" style="background-image:url('./images/Arepo-IV2-1024x576.jpg')"></div>
    </div>
    <div class="hero-overlay"></div>

    <button class="slider-btn slider-prev" id="sliderPrev" aria-label="Previous slide">
      <svg viewBox="0 0 24 24" fill="none"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <button class="slider-btn slider-next" id="sliderNext" aria-label="Next slide">
      <svg viewBox="0 0 24 24" fill="none"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>

    <div class="slider-dots" id="sliderDots">
      <button class="sdot active" data-index="0" aria-label="Slide 1"></button>
      <button class="sdot" data-index="1" aria-label="Slide 2"></button>
      <button class="sdot" data-index="2" aria-label="Slide 3"></button>
      <button class="sdot" data-index="3" aria-label="Slide 4"></button>
      <button class="sdot" data-index="4" aria-label="Slide 5"></button>
    </div>

    <div class="slider-counter">
      <span id="slideCurrentNum">01</span>
      <span class="sc-div"></span>
      <span class="sc-total">05</span>
    </div>

    <div class="hero-content">
      <div class="hero-eyebrow">
        <span class="eyebrow-dot"></span>
        ...Premium Estate Within Reach &nbsp;·&nbsp; anywhere in Nigeria
      </div>
      <h1>Crafting Spaces You'll Be <br>Proud to Call <em>Home</em></h1>
      <p class="hero-desc">Sandworth Properties Ltd. Leading real estate development company in Nigeria — from luxury residential estates to Grade-A commercial developments — for those who accept nothing less than the finest.</p>
      <div class="hero-btns">
        <a class="btn-primary" href="<?= $site_url ?>/properties">
          Explore Properties
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <a class="btn-ghost" href="<?= $site_url ?>/about-us">Our Story</a>
      </div>
    </div>
  </div><!-- /.hero -->

  <!-- INTERIOR PHOTO STRIP -->
  <div class="prop-strip">
    <div class="prop-strip-inner">
      <div class="ps-card">
        <img src="./images/AREPO-LIVNG-AREA-1024x768.jpg" alt="Luxury living area at Sandworth Properties"/>
        <div class="ps-overlay"><span>Living Areas</span></div>
      </div>
      <div class="ps-card">
        <img src="./images/AREPO-BEDROOM02-1024x768.jpg" alt="Luxury bedroom"/>
        <div class="ps-overlay"><span>Luxury Bedrooms</span></div>
      </div>
      <div class="ps-card">
        <img src="./images/AREPO-KITCHEN-01-1024x768.jpg" alt="Modern kitchen"/>
        <div class="ps-overlay"><span>Modern Kitchens</span></div>
      </div>
      <div class="ps-card">
        <img src="./images/AREPO-LIVNG-AREA-02-1024x768.jpg" alt="Elegant lounge space"/>
        <div class="ps-overlay"><span>Elegant Spaces</span></div>
      </div>
      <div class="ps-card">
        <img src="./images/AREPO-KITCHEN-02-1024x768.jpg" alt="Premium kitchen finishes"/>
        <div class="ps-overlay"><span>Premium Finishes</span></div>
      </div>
    </div>
  </div>

  <!-- SERVICES -->
  <div class="section section-services">
    <div class="sec-tag">What We Offer</div>
    <div class="sec-head-row">
      <h2>As an estate management firm &amp;<br>a Real estate development firm</h2>
      <p>From acquisition to asset management, we cover every dimension of your property journey.</p>
    </div>
    <div class="svc-grid">
      <div class="svc-card svc-residential reveal" style="--d:.0s">
        <div class="svc-ico"><svg viewBox="0 0 40 40" fill="none"><path d="M20 6l12 5v8c0 7-5 12-12 15-7-3-12-8-12-15v-8l12-5z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M16 20l3 3 5-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <h3>Security</h3>
        <p>Not only do we offer luxury apartments, duplexes, and gated communities across Lagos and beyond, we also provide trained personnel and a well-structured security framework — seamlessly integrated into estate management to ensure maximum protection of lives and property.</p>
        <span class="svc-chip">Security</span>
      </div>
      <div class="svc-card svc-featured reveal" style="--d:.08s">
        <div class="svc-ico"><svg viewBox="0 0 40 40" fill="none"><path d="M20 8l2 6 6 2-6 2-2 6-2-6-6-2 6-2 2-6z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M30 10l1 3 3 1-3 1-1 3-1-3-3-1 3-1 1-3z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg></div>
        <h3>Cleaning &amp; Maintenance</h3>
        <p>Registered Cleaning &amp; Maintenance Companies that have relevant equipment and expertise are employed. A daily routine of cleaning and inspecting the environment is implemented and supervised by the management.</p>
        <span class="svc-chip">Cleaning</span>
      </div>
      <div class="svc-card svc-management reveal" style="--d:.16s">
        <div class="svc-ico"><svg viewBox="0 0 40 40" fill="none"><circle cx="20" cy="20" r="13" stroke="currentColor" stroke-width="1.8"/><path d="M20 14v6l4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></div>
        <h3>24/7 Customer Services</h3>
        <p>Relationship with our clients is key. Sandworth Properties Limited has incorporated strategies, practices and technologies to manage and resolve challenges faced by our clients, enhancing interaction and feedback.</p>
        <span class="svc-chip">Customer Services</span>
      </div>
      <div class="svc-card svc-advisory reveal" style="--d:.24s">
        <div class="svc-ico"><svg viewBox="0 0 40 40" fill="none"><path d="M10 30l6-14 8 8 6-12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><circle cx="30" cy="12" r="2" fill="currentColor"/></svg></div>
        <h3>Property Development</h3>
        <p>Property development requires developing building plans, getting them approved from concerned authorities, and managing different work teams to get the project underway — through to final completion and handover. Sandworth ensures all areas of specialization are maximized to deliver a standard project within budget.</p>
        <span class="svc-chip">Property Development</span>
      </div>
      <div class="svc-card svc-land reveal" style="--d:.32s">
        <div class="svc-ico"><svg viewBox="0 0 40 40" fill="none"><path d="M20 6L34 16v18H6V16L20 6z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M14 34V24h12v10" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg></div>
        <h3>Development Consultancy</h3>
        <p>With experience in property development, Sandworth is active in development consultancy. We have hired some of the best professionals in this area and offer our services to aspiring clients on a short term, long term or makeshift basis.</p>
        <span class="svc-chip">Development Consultancy &amp; Advisory</span>
      </div>
      <div class="svc-card reveal" style="--d:.4s">
        <div class="svc-ico"><svg viewBox="0 0 40 40" fill="none"><path d="M20 8v4M20 28v4M8 20h4M28 20h4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><circle cx="20" cy="20" r="7" stroke="currentColor" stroke-width="1.8"/></svg></div>
        <h3>Integrated Facilities Management</h3>
        <p>As facilities managers, we know the asset is just the beginning. Our clients' facilities are ultimately about the people and businesses within them. We embed ourselves in our clients' organization and ensure our service is integrated and aligned with their short and long-term strategic objectives.</p>
        <span class="svc-chip">Facilities</span>
      </div>
    </div>
  </div>

  <!-- FEATURED PROPERTIES -->
  <div class="section props-section">
    <div class="sec-tag">Featured Listings</div>
    <div class="sec-head-row">
      <h2>Exceptional Properties<br>Awaiting You</h2>
      <a class="view-all" href="/properties">View All Listings &#8594;</a>
    </div>
    <div class="props-grid">
      <div class="prop-card reveal">
        <div class="prop-img">
          <img src="./images/arepo-slider-1-1024x598.png" alt="Sandworth Grand Residences, Arepo" loading="lazy"/>
          <div class="prop-badges"><span class="pbadge sale">For Rent</span><span class="pbadge prem">Premium</span></div>
          <div class="prop-ov"><a href="<?= $site_url ?>/properties/arepo-gardens-estate">Quick Enquiry</a></div>
        </div>
        <div class="prop-body">
          <p class="prop-loc">&#128205; Sandworth Court, Arepo, Ogun State</p>
          <h4>Sandworth Grand Residences</h4>
          <p>Situated in a serene and organized environment at the boundary of Lagos and Ogun State, hosting many estates including Journalist Estate and Citi-View Estate.</p>
          <div class="prop-specs"><span>3 Beds</span><span>3 Baths</span><span>1,200 sqm</span></div>
          <div class="prop-foot"><a href="<?= $site_url ?>/contact-us">Enquire &#8594;</a></div>
        </div>
      </div>

      <div class="prop-card reveal">
        <div class="prop-img">
          <img src="./images/Larcade13.jpg" alt="L'ARCADE Mall Owerri" loading="lazy"/>
          <div class="prop-badges"><span class="pbadge rent">For Rent</span></div>
          <div class="prop-ov"><a href="<?= $site_url ?>/properties/arcade-mall-owerri">Quick Enquiry</a></div>
        </div>
        <div class="prop-body">
          <p class="prop-loc">&#128205; L'ARCADE Mall, Owerri, Imo State</p>
          <h4>An Oasis of Calm and Beauty</h4>
          <p>L'ARCADE is the state of the art shopping mall developed by Sandworth Properties and located in Owerri the Imo state capital.</p>
          <div class="prop-specs"><span>Open Shops</span><span>Office Spaces</span><span>2,500 sqm</span></div>
          <div class="prop-foot"><a href="<?= $site_url ?>/contact-us">Enquire &#8594;</a></div>
        </div>
      </div>

      <div class="prop-card reveal">
        <div class="prop-img">
          <img src="./images/arepo_enterance.png" alt="Sandworth Homes Ajah" loading="lazy"/>
          <div class="prop-badges"><span class="pbadge sale">For Rent</span><span class="pbadge comm">For Sales</span></div>
          <div class="prop-ov"><a href="<?= $site_url ?>/properties/sandworth-homes-ajah">Quick Enquiry</a></div>
        </div>
        <div class="prop-body">
          <p class="prop-loc">&#128205; Sandworth Homes, Ajah, Lagos State</p>
          <h4>Starting from &#8358;1.8 Million Per Annum</h4>
          <p>This prestigious estate is sitting on a land mass area of approximately 6,917.709 sqm. Access through the dual carriageway of the Lekki-Epe Expressway.</p>
          <div class="prop-specs"><span>Open Plan</span><span>4 Floors</span><span>2,500 sqm</span></div>
          <div class="prop-foot"><a href="<?= $site_url ?>/contact-us">Enquire &#8594;</a></div>
        </div>
      </div>
    </div>
  </div>

  <!-- VIDEO SHOWCASE -->
  <div class="section video-section">
    <div class="sec-tag">In Motion</div>
    <div class="sec-head-row">
      <h2>Experience Our <br>Properties Up Close</h2>
      <p>Step inside Sandworth's finest developments through immersive video walkthroughs and site tours.</p>
    </div>
    <div class="video-grid">
      <div class="vcard reveal" style="--d:0s">
        <div class="vcard-thumb">
          <img src="./images/AREPO-LIVNG-AREA-1024x768.jpg" alt="Arepo Estate Walkthrough" loading="lazy"/>
          <div class="vcard-overlay">
            <button class="vplay-btn" onclick="openVideo(this)" data-src="https://www.youtube.com/embed/VIDEO_ID_1?autoplay=1&rel=0" aria-label="Play Arepo Estate walkthrough video">
              <svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="11" stroke="currentColor" stroke-width="1.5"/><path d="M10 8.5l6 3.5-6 3.5V8.5z" fill="currentColor"/></svg>
            </button>
          </div>
          <div class="vcard-badge"><span class="vduration">3:42</span></div>
        </div>
        <div class="vcard-body">
          <span class="vcard-tag">Property Tour</span>
          <h4>Arepo Estate &mdash; Full Walkthrough</h4>
          <p>An exclusive interior tour of our flagship Arepo development — living areas, master suite, and landscaped grounds.</p>
          <a class="vcard-cta" href="<?= $site_url ?>/projects">View Project &#8594;</a>
        </div>
      </div>
      <div class="vcard reveal" style="--d:.1s">
        <div class="vcard-thumb">
          <img src="./images/arepo_enterance.png" alt="Sandworth Lekki Phase Site Tour" loading="lazy"/>
          <div class="vcard-overlay">
            <button class="vplay-btn" onclick="openVideo(this)" data-src="https://www.youtube.com/embed/VIDEO_ID_2?autoplay=1&rel=0" aria-label="Play Lekki phase site tour video">
              <svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="11" stroke="currentColor" stroke-width="1.5"/><path d="M10 8.5l6 3.5-6 3.5V8.5z" fill="currentColor"/></svg>
            </button>
          </div>
          <div class="vcard-badge"><span class="vduration">2:18</span></div>
        </div>
        <div class="vcard-body">
          <span class="vcard-tag">Development Update</span>
          <h4>Sandworth Lekki Phase &mdash; Site Tour</h4>
          <p>A ground-level progress update on our newest Lekki development — from foundation to finishing touches.</p>
          <a class="vcard-cta" href="<?= $site_url ?>/projects">View Project &#8594;</a>
        </div>
      </div>
      <div class="vcard reveal" style="--d:.2s">
        <div class="vcard-thumb">
          <img src="./images/Arepo-IV2-1024x576.jpg" alt="Why clients choose Sandworth" loading="lazy"/>
          <div class="vcard-overlay">
            <button class="vplay-btn" onclick="openVideo(this)" data-src="https://www.youtube.com/embed/VIDEO_ID_3?autoplay=1&rel=0" aria-label="Play client testimonial video">
              <svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="11" stroke="currentColor" stroke-width="1.5"/><path d="M10 8.5l6 3.5-6 3.5V8.5z" fill="currentColor"/></svg>
            </button>
          </div>
          <div class="vcard-badge"><span class="vduration">4:05</span></div>
        </div>
        <div class="vcard-body">
          <span class="vcard-tag">Client Testimonial</span>
          <h4>Why Our Clients Choose Sandworth</h4>
          <p>Hear directly from homeowners and investors about their experience partnering with Sandworth Properties.</p>
          <a class="vcard-cta" href="<?= $site_url ?>/projects">View Project &#8594;</a>
        </div>
      </div>
    </div>
  </div>

  <!-- VIDEO LIGHTBOX -->
  <div class="video-lightbox" id="videoLightbox" onclick="closeVideo(event)">
    <div class="vlb-inner">
      <button class="vlb-close" onclick="closeVideo()" aria-label="Close video">
        <svg viewBox="0 0 24 24" fill="none"><path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
      </button>
      <div class="vlb-frame">
        <iframe id="videoFrame" src="" allow="autoplay; fullscreen" allowfullscreen frameborder="0" title="Property video"></iframe>
      </div>
    </div>
  </div>

  <!-- CTA STRIP -->
  <div class="cta-strip">
    <div class="cta-strip-inner">
      <div>
        <h2>Ready to Find Your Perfect Space?</h2>
        <p>Our advisors are available to guide you every step of the way.</p>
      </div>
      <a class="btn-white" href="<?= $site_url ?>/contact-us">
        Get in Touch Today
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
  </div>

</section>

<?php require 'partials/footer.php'; ?>
