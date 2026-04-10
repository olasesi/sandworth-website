<?php
$page_title   = 'Properties — Premium Real Estate Across Nigeria';
$meta_desc    = 'Browse Sandworth Properties\' portfolio — luxury residential estates, Grade-A commercial spaces, retail malls, and premium villas across Lagos, Ogun State, and Nigeria.';
$current_page = 'properties';
$og_image     = '/images/arepo-slider-1-1024x598.png';

// Pre-filter from query string (e.g. /properties?type=residential)
$active_filter = htmlspecialchars($_GET['type'] ?? 'all', ENT_QUOTES, 'UTF-8');
$allowed_filters = ['all', 'residential', 'commercial', 'retail', 'villa'];
if (!in_array($active_filter, $allowed_filters, true)) $active_filter = 'all';

require 'partials/header.php';
?>

<section class="page active" id="page-properties">

  <!-- HERO -->
  <div class="prop-page-hero">
    <div class="prop-page-hero-img" style="background-image:url('/images/interior-hero.jpg')"></div>
    <div class="prop-page-hero-overlay"></div>
    <div class="prop-page-hero-content">
      <div class="sec-tag light">Our Portfolio</div>
      <h1>Premium Properties<br><em>Across Nigeria</em></h1>
      <p class="prop-hero-desc">From luxury residential estates to Grade-A commercial spaces — every Sandworth property is a masterclass in quality and design.</p>
      <div class="prop-hero-pills">
        <span>&#127968; Residential</span>
        <span>&#127963; Commercial</span>
        <span>&#127978; Retail &amp; Mall</span>
        <span>&#127749; Luxury Villas</span>
      </div>
    </div>
    <div class="prop-hero-scroll">
      <span>Scroll to explore</span>
      <div class="scroll-line"></div>
    </div>
  </div>

  <!-- FILTER BAR -->
  <div class="prop-page-filters">
    <div class="ppf-inner">
      <div class="ppf-tabs">
        <?php
        $filters = ['all' => 'All', 'residential' => 'Residential', 'commercial' => 'Commercial', 'retail' => 'Retail', 'villa' => 'Villas'];
        foreach ($filters as $val => $label):
          $cls = $val === $active_filter ? ' active' : '';
        ?>
        <button class="ppf-tab<?= $cls ?>" data-pfilter="<?= $val ?>"><?= $label ?></button>
        <?php endforeach; ?>
      </div>
      <div class="ppf-count" id="ppfCount">6 Properties</div>
    </div>
  </div>

  <!-- LISTING GRID -->
  <div class="section prop-listing-section">
    <div class="prop-listing-grid" id="propListingGrid">

      <!-- Card 1: L'Arcade Mall -->
      <div class="plcard reveal" data-ptype="retail" id="prop-arcade">
        <div class="plcard-media">
          <img src="./images/Larcade13.jpg" alt="L'Arcade Mall Owerri — Retail shopping mall" loading="lazy"/>
          <div class="plcard-media-overlay">
            <a href="properties/arcade-mall-owerri" class="plcard-view-btn">
              <svg viewBox="0 0 24 24" fill="none"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              View Detail
            </a>
          </div>
          <div class="plcard-badges">
            <span class="plbadge retail">Retail &amp; Mall</span>
            <span class="plbadge avail">Available</span>
          </div>
        </div>
        <div class="plcard-body">
          <div class="plcard-top">
            <div>
              <p class="plcard-loc">&#128205; Owerri, Imo State</p>
              <h3>L'Arcade Mall Owerri</h3>
            </div>
            <!-- <div class="plcard-price-tag">
              <span>From</span>
              <strong>&#8358;2.5M<small>/sqm</small></strong>
            </div> -->
          </div>
          <p class="plcard-desc">L’ARCADE is an enclosed centre located approximately 5 minutes from Control and it’s a 3-minute drive from the popular Concorde Hotel in Owerri. The locational advantage of the site is unparalleled due to its central disposition and accessibility from all quarters of Owerri Metropolis.</p>
          <div class="plcard-feats">
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><rect x="2" y="2" width="12" height="12" rx="1" stroke="currentColor" stroke-width="1.4"/><path d="M2 6h12" stroke="currentColor" stroke-width="1.4"/></svg><span>4,800 sqm</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M8 2v12M2 8h12" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg><span>3 Trading floors</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="1.4"/><path d="M8 5v3l2 2" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg><span>For Lease</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M8 2C5.2 2 3 4.2 3 7c0 4 5 9 5 9s5-5 5-9c0-2.8-2.2-5-5-5z" stroke="currentColor" stroke-width="1.4"/></svg><span>Owerri</span></div>
          </div>
          <div class="plcard-foot">
            <a href="properties/arcade-mall-owerri" class="plcard-detail-btn">
              View Full Details
              <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <a href="contact-us" class="plcard-enquire-btn">Enquire</a>
          </div>
        </div>
      </div>

      <!-- Card 2: Sandworth Homes Ajah -->
      <div class="plcard reveal" data-ptype="residential" id="prop-sandworth-homes" style="--d:.06s">
        <div class="plcard-media">
          <img src="images/Arepo-II4-1024x576.jpg" alt="Sandworth Homes Ajah — gated residential estate" loading="lazy"/>
          <div class="plcard-media-overlay">
            <a href="properties/sandworth-homes-ajah" class="plcard-view-btn">
              <svg viewBox="0 0 24 24" fill="none"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              View Detail
            </a>
          </div>
          <div class="plcard-badges">
            <span class="plbadge residential">Residential</span>
            <span class="plbadge sale">For Sale</span>
          </div>
        </div>
        <div class="plcard-body">
          <div class="plcard-top">
            <div>
              <p class="plcard-loc">&#128205; Ajah, Lagos State</p>
              <h3>Sandworth Homes, Ajah</h3>
            </div>
            <!-- <div class="plcard-price-tag">
              <span>From</span>
              <strong>&#8358;85M</strong>
            </div> -->
          </div>
          <p class="plcard-desc">This Prestigious estate is sitting on a land mass area of approximately 6917.709 Square meters. Access to the estate is through the dual carriage way of the Lekki -Epe expressway. Sandworth homes represent luxury and class. The topology of the houses guarantees comfort, serenity and premium luxury that you desire. The interiors are magnificently finished with impeccable detailing and design.</p>
          <div class="plcard-feats">
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M2 12V7l6-5 6 5v5H2z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></svg><span>35 Units</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><rect x="3" y="7" width="10" height="7" rx="1" stroke="currentColor" stroke-width="1.4"/><path d="M5 7V5a3 3 0 016 0v2" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg><span>Gated Security</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M8 2v12M2 8h12" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg><span>3–5 Bedrooms</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M8 2C5.2 2 3 4.2 3 7c0 4 5 9 5 9s5-5 5-9c0-2.8-2.2-5-5-5z" stroke="currentColor" stroke-width="1.4"/></svg><span>Ajah Expressway</span></div>
          </div>
          <div class="plcard-foot">
            <a href="properties/sandworth-homes-ajah" class="plcard-detail-btn">
              View Full Details
              <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <a href="contact-us" class="plcard-enquire-btn">Enquire</a>
          </div>
        </div>
      </div>

      <!-- Card 3: Sandworth Court Arepo -->
      <div class="plcard reveal" data-ptype="residential" id="prop-sandworth-court" style="--d:.12s">
        <div class="plcard-media">
          <img src="images/arepo_enterance.png" alt="Sandworth Court Victoria Island — Grade-A commercial" loading="lazy"/>
          <div class="plcard-media-overlay">
            <a href="properties/sandworth-court-arepo" class="plcard-view-btn">
              <svg viewBox="0 0 24 24" fill="none"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              View Detail
            </a>
          </div>
          <div class="plcard-badges">
            <span class="plbadge residential">Residential</span>
            <span class="plbadge rent">For Lease</span>
          </div>
        </div>
        <div class="plcard-body">
          <div class="plcard-top">
            <div>
              <p class="plcard-loc">&#128205; Ogun state</p>
              <h3>Sandworth Court Arepo</h3>
            </div>
            <!-- <div class="plcard-price-tag">
              <span>From</span>
              <strong>&#8358;18M<small>/yr</small></strong>
            </div> -->
          </div>
          <p class="plcard-desc">This is situated in a serene and organized environment at the boundary of Lagos and Ogun State, hosting many estates including Journalist Estate and Citi-View Estate etc. It is a private owned estate that seeks to reinvent the concept of old G.R.A. with cutting edge architecture and delivers high class living standards at an affordable price. The estate sets a high level benchmark in service delivery and world class infrastructure. </p>
          <div class="plcard-feats">
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><rect x="2" y="2" width="12" height="12" rx="1" stroke="currentColor" stroke-width="1.4"/><path d="M2 6h12" stroke="currentColor" stroke-width="1.4"/></svg><span>3,200 Units</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M8 2v12M2 8h12" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg><span>20ha Estate Area</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M2 14l4-4 3 3 5-7" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg><span>3–5
Bedrooms</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M8 2C5.2 2 3 4.2 3 7c0 4 5 9 5 9s5-5 5-9c0-2.8-2.2-5-5-5z" stroke="currentColor" stroke-width="1.4"/></svg><span>Arepo
Ogun</span></div>
          </div>
          <div class="plcard-foot">
            <a href="properties/sandworth-court-arepo" class="plcard-detail-btn">
              View Full Details
              <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <a href="contact-us" class="plcard-enquire-btn">Enquire</a>
          </div>
        </div>
      </div>

      <!-- Card 4: Sandworth Estate Abuja -->
      <div class="plcard reveal" data-ptype="residential" id="prop-abuja" style="--d:.18s">
        <div class="plcard-media">
          <img src="images/arepo-slider-1-1024x598.png" alt="Arepo Gardens Estate — flagship residential development" loading="lazy"/>
          <div class="plcard-media-overlay">
            <a href="properties/sandworth-estate-abuja" class="plcard-view-btn">
              <svg viewBox="0 0 24 24" fill="none"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              View Detail
            </a>
          </div>
          <div class="plcard-badges">
            <span class="plbadge residential">Residential</span>
            <span class="plbadge sale">For Sale</span>
          </div>
        </div>
        <div class="plcard-body">
          <div class="plcard-top">
            <div>
              <p class="plcard-loc">&#128205; Kura, Abuja</p>
              <h3>Sandworth Estate</h3>
            </div>
            <!-- <div class="plcard-price-tag">
              <span>From</span>
              <strong>&#8358;45M</strong>
            </div> -->
          </div>
          <p class="plcard-desc">Sandworth Estate, Karu, Abuja is a 342 units of housing estate sitting on 119,700sqm that offers premium class apartments yet very affordable. It’s appearance and fitting boasts of impeccable finishing, elegance presence, comfort and luxury. Other notable estates within Sandworth Estate neighborhood are Civil Defense Quarters, Army Post Housing Estate Phase 5, Prince & Princess Estate and Emmy Dan.</p>
          <div class="plcard-feats">
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M2 12V7l6-5 6 5v5H2z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></svg><span>342
House units</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M8 2C5.2 2 3 4.2 3 7c0 4 5 9 5 9s5-5 5-9c0-2.8-2.2-5-5-5z" stroke="currentColor" stroke-width="1.4"/></svg><span>2,200sqm
Per Floor Plate</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><rect x="3" y="7" width="10" height="7" rx="1" stroke="currentColor" stroke-width="1.4"/><path d="M5 7V5a3 3 0 016 0v2" stroke="currentColor" stroke-width="1.4"/></svg><span>24/7 Security</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M2 14l4-4 3 3 5-7" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg><span>All Titles Verified</span></div>
          </div>
          <div class="plcard-foot">
            <a href="properties/sandworth-estate-abuja" class="plcard-detail-btn">
              View Full Details
              <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <a href="contact-us" class="plcard-enquire-btn">Enquire</a>
          </div>
        </div>
      </div>

      <!-- Card 5: Sandworth Gardens -->
      <div class="plcard reveal" data-ptype="villa" id="prop-sandworth-gardens-owerri" style="--d:.24s">
        <div class="plcard-media">
          <img src="images/AREPO-LIVNG-AREA-1024x768.jpg" alt="Sandworth Gardens — luxury estate Owerri Imo State" loading="lazy"/>
          <div class="plcard-media-overlay">
            <a href="properties/sandworth-gardens-owerri" class="plcard-view-btn">
              <svg viewBox="0 0 24 24" fill="none"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              View Detail
            </a>
          </div>
          <div class="plcard-badges">
            <span class="plbadge villa">Luxury Villa</span>
            <span class="plbadge sale">For Sale</span>
          </div>
        </div>
        <div class="plcard-body">
          <div class="plcard-top">
            <div>
              <p class="plcard-loc">&#128205; Owerri · Imo State</p>
              <h3>Sandworth Gardens</h3>
            </div>
            <!-- <div class="plcard-price-tag">
              <span>From</span>
              <strong>&#8358;850M</strong>
            </div> -->
          </div>
          <p class="plcard-desc">This prestigious estate is sitting on a land area of approximately 5850 Sqm, and it is located at Urata Egbu layout, Owerri in Imo State, it can be accessed either through Toronto Junction by Wethedral Road or the Road Safety Roundabout by Airport Road. Sandworth Gardens represent luxury and Style. The topologies of the estate guarantees comfort, serenity and tranquility.</p>
          <div class="plcard-feats">
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M2 12V7l6-5 6 5v5H2z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></svg><span>24 hours security</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M2 8l6-5 6 5M5 8v6h6V8" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></svg><span>5
Bedroom Terrace Duplex</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M8 2v12M2 8h12" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg><span>5
Bedroom Semi –Detached</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M8 2C5.2 2 3 4.2 3 7c0 4 5 9 5 9s5-5 5-9c0-2.8-2.2-5-5-5z" stroke="currentColor" stroke-width="1.4"/></svg><span>owerri
</span></div>
          </div>
          <div class="plcard-foot">
            <a href="properties/sandworth-gardens-owerri" class="plcard-detail-btn">
              View Full Details
              <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <a href="contact-us" class="plcard-enquire-btn">Enquire</a>
          </div>
        </div>
      </div>

      <!-- Card 6: Sandworth Lekki Towers -->
      <div class="plcard reveal" data-ptype="residential" id="prop-lekki-towers" style="--d:.30s">
        <div class="plcard-media">
          <img src="images/Arepo-III3-1024x576.jpg" alt="Sandworth Lekki Towers — serviced apartments Lekki Phase 1" loading="lazy"/>
          <div class="plcard-media-overlay">
            <a href="properties/sandworth-resort-ibeju-lekki" class="plcard-view-btn">
              <svg viewBox="0 0 24 24" fill="none"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              View Detail
            </a>
          </div>
          <div class="plcard-badges">
            <span class="plbadge residential">Residential</span>
            <span class="plbadge rent">For Rent</span>
          </div>
        </div>
        <div class="plcard-body">
          <div class="plcard-top">
            <div>
              <p class="plcard-loc">&#128205; Ibeju Lekki, Lagos</p>
              <h3>Sandworth Resort</h3>
            </div>
            <!-- <div class="plcard-price-tag">
              <span>From</span>
              <strong>&#8358;18M<small>/yr</small></strong>
            </div> -->
          </div>
          <p class="plcard-desc">In view of the recent infrastructural development, rapid urbanization, industrialization and migration within Ibeju Lekki axis, the need for home ownership cannot be under-emphasized. The above factors motivated SANDWORTH PROPERTIES LTD to propose the conception, design and delivery of the RESORT.</p>
          <div class="plcard-feats">
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M2 12V7l6-5 6 5v5H2z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></svg><span>488
Plots of Land</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M8 2v12M2 8h12" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg><span>2
No of Plot sizes</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="1.4"/><path d="M8 5v3l2 2" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg><span>500sqm-600sqm
Plot sizes</span></div>
            <div class="plf"><svg viewBox="0 0 16 16" fill="none"><path d="M8 2C5.2 2 3 4.2 3 7c0 4 5 9 5 9s5-5 5-9c0-2.8-2.2-5-5-5z" stroke="currentColor" stroke-width="1.4"/></svg><span>Ibeju-Lekki</span></div>
          </div>
          <div class="plcard-foot">
            <a href="properties/sandworth-resort-ibeju-lekki" class="plcard-detail-btn">
              View Full Details
              <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <a href="contact-us" class="plcard-enquire-btn">Enquire</a>
          </div>
        </div>
      </div>

    </div><!-- /prop-listing-grid -->
  </div>

  <div class="cta-strip">
    <div class="cta-strip-inner">
      <div>
        <h2>Can't Find What You're Looking For?</h2>
        <p>Our team has access to off-market listings not shown here. Speak with an advisor today.</p>
      </div>
      <a class="btn-white" href="contact-us">
        Talk to an Advisor
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
  </div>

</section>

<?php require 'partials/footer.php'; ?>
