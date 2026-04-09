<?php
$page_title   = 'Projects — Ongoing & Completed Developments';
$meta_desc    = 'Browse Sandworth Properties\' portfolio of ongoing and completed residential and commercial developments across Lagos, Ogun State, and Nigeria.';
$current_page = 'projects';
$og_image     = './images/arepo-slider-1024x598.png';
require 'partials/header.php';
?>

<section class="page active" id="page-projects">

  <div class="page-hero">
    <div class="page-hero-bg ph-projects"></div>
    <div class="page-hero-content">
      <div class="sec-tag light">Ongoing &amp; Completed</div>
      <h1>Our Projects<br><em>In Progress</em></h1>
      <p>Premium developments crafted for lasting value across Lagos and Nigeria.</p>
    </div>
  </div>

  <div class="section proj-section">
    <!-- Filter tabs -->
    <div class="proj-filters">
      <button class="pf-btn active" data-filter="all">All Projects</button>
      <button class="pf-btn" data-filter="ongoing">Ongoing</button>
      <button class="pf-btn" data-filter="completed">Completed</button>
      <button class="pf-btn" data-filter="commercial">Commercial</button>
      <button class="pf-btn" data-filter="residential">Residential</button>
    </div>

    <div class="proj-grid" id="projGrid">

      <!-- Project 1 -->
      <div class="proj-card reveal" data-category="ongoing residential" style="--d:0s">
        <div class="proj-img-wrap">
          <img src="./images/arepo-slider-1024x598.png" alt="Arepo Gardens Phase III" loading="lazy"/>
          <div class="proj-status ongoing">Ongoing</div>
          <div class="proj-type-badge">Residential</div>
        </div>
        <div class="proj-body">
          <div class="proj-meta">
            <span class="proj-loc">&#128205; Arepo, Ogun State</span>
            <span class="proj-year">2023 &ndash; 2025</span>
          </div>
          <h3>Arepo Gardens Phase III</h3>
          <p>120 luxury 3 &amp; 4-bedroom terrace homes with smart-home integrations, gated security, and resort-style amenities set across 8 landscaped hectares.</p>
          <div class="proj-progress-wrap">
            <div class="proj-progress-head"><span>Construction Progress</span><strong>72%</strong></div>
            <div class="proj-progress-bar"><div class="proj-progress-fill" style="--pct:72%"></div></div>
          </div>
          <div class="proj-specs-row">
            <div class="ps-item"><div class="ps-val">120</div><div class="ps-lbl">Units</div></div>
            <div class="ps-item"><div class="ps-val">8ha</div><div class="ps-lbl">Land Area</div></div>
            <div class="ps-item"><div class="ps-val">&#8358;4.2B</div><div class="ps-lbl">GDV</div></div>
            <div class="ps-item"><div class="ps-val">Q4 2025</div><div class="ps-lbl">Delivery</div></div>
          </div>
          <a class="btn-outline proj-btn" href="<?= SITE_URL ?>/contact-us">Enquire About This Project</a>
        </div>
      </div>

      <!-- Project 2 -->
      <div class="proj-card reveal" data-category="ongoing commercial" style="--d:.08s">
        <div class="proj-img-wrap">
          <img src="./images/arepo_enterance.png" alt="Sandworth VI Commercial Tower" loading="lazy"/>
          <div class="proj-status ongoing">Ongoing</div>
          <div class="proj-type-badge commercial">Commercial</div>
        </div>
        <div class="proj-body">
          <div class="proj-meta">
            <span class="proj-loc">&#128205; Victoria Island, Lagos</span>
            <span class="proj-year">2024 &ndash; 2026</span>
          </div>
          <h3>Sandworth VI Commercial Tower</h3>
          <p>A 12-storey Grade-A office development offering 2,800 sqm of premium leasable space per floor, designed to BREEAM sustainability standards with panoramic lagoon views.</p>
          <div class="proj-progress-wrap">
            <div class="proj-progress-head"><span>Construction Progress</span><strong>38%</strong></div>
            <div class="proj-progress-bar"><div class="proj-progress-fill" style="--pct:38%"></div></div>
          </div>
          <div class="proj-specs-row">
            <div class="ps-item"><div class="ps-val">12</div><div class="ps-lbl">Floors</div></div>
            <div class="ps-item"><div class="ps-val">33,600sqm</div><div class="ps-lbl">GFA</div></div>
            <div class="ps-item"><div class="ps-val">&#8358;7.8B</div><div class="ps-lbl">GDV</div></div>
            <div class="ps-item"><div class="ps-val">Q2 2026</div><div class="ps-lbl">Delivery</div></div>
          </div>
          <a class="btn-outline proj-btn" href="<?= SITE_URL ?>/contact-us">Enquire About This Project</a>
        </div>
      </div>

      <!-- Project 3 -->
      <div class="proj-card reveal" data-category="ongoing residential" style="--d:.16s">
        <div class="proj-img-wrap">
          <img src="./images/Arepo-II4-1024x576.jpg" alt="Lekki Waterfront Residences" loading="lazy"/>
          <div class="proj-status ongoing">Ongoing</div>
          <div class="proj-type-badge">Residential</div>
        </div>
        <div class="proj-body">
          <div class="proj-meta">
            <span class="proj-loc">&#128205; Lekki Phase 1, Lagos</span>
            <span class="proj-year">2024 &ndash; 2026</span>
          </div>
          <h3>Lekki Waterfront Residences</h3>
          <p>48 serviced apartments and penthouses positioned directly on the Lekki lagoon waterfront. Each unit features floor-to-ceiling glazing, private balconies, and concierge services.</p>
          <div class="proj-progress-wrap">
            <div class="proj-progress-head"><span>Construction Progress</span><strong>55%</strong></div>
            <div class="proj-progress-bar"><div class="proj-progress-fill" style="--pct:55%"></div></div>
          </div>
          <div class="proj-specs-row">
            <div class="ps-item"><div class="ps-val">48</div><div class="ps-lbl">Units</div></div>
            <div class="ps-item"><div class="ps-val">Lagoon</div><div class="ps-lbl">Front</div></div>
            <div class="ps-item"><div class="ps-val">&#8358;5.6B</div><div class="ps-lbl">GDV</div></div>
            <div class="ps-item"><div class="ps-val">Q1 2026</div><div class="ps-lbl">Delivery</div></div>
          </div>
          <a class="btn-outline proj-btn" href="<?= SITE_URL ?>/contact-us">Enquire About This Project</a>
        </div>
      </div>

      <!-- Project 4 (Completed) -->
      <div class="proj-card reveal" data-category="completed residential" style="--d:.24s">
        <div class="proj-img-wrap">
          <img src="./images/Arepo-III3-1024x576.jpg" alt="Arepo Gardens Phase I and II" loading="lazy"/>
          <div class="proj-status completed">Completed</div>
          <div class="proj-type-badge">Residential</div>
        </div>
        <div class="proj-body">
          <div class="proj-meta">
            <span class="proj-loc">&#128205; Arepo, Ogun State</span>
            <span class="proj-year">2019 &ndash; 2022</span>
          </div>
          <h3>Arepo Gardens Phase I &amp; II</h3>
          <p>200 fully-delivered terrace homes across two phases, now home to over 800 residents. Achieved 100% sell-through prior to project completion.</p>
          <div class="proj-progress-wrap">
            <div class="proj-progress-head"><span>Delivery Status</span><strong>100% &#10003;</strong></div>
            <div class="proj-progress-bar"><div class="proj-progress-fill done" style="--pct:100%"></div></div>
          </div>
          <div class="proj-specs-row">
            <div class="ps-item"><div class="ps-val">200</div><div class="ps-lbl">Units</div></div>
            <div class="ps-item"><div class="ps-val">12ha</div><div class="ps-lbl">Land Area</div></div>
            <div class="ps-item"><div class="ps-val">100%</div><div class="ps-lbl">Sold</div></div>
            <div class="ps-item"><div class="ps-val">2022</div><div class="ps-lbl">Delivered</div></div>
          </div>
          <a class="btn-outline proj-btn" href="<?= SITE_URL ?>/contact-us">Enquire About This Project</a>
        </div>
      </div>

      <!-- Project 5 (Completed) -->
      <div class="proj-card reveal" data-category="completed commercial" style="--d:.32s">
        <div class="proj-img-wrap">
          <img src="./images/Arepo-IV2-1024x576.jpg" alt="Sandworth Ikoyi Office Plaza" loading="lazy"/>
          <div class="proj-status completed">Completed</div>
          <div class="proj-type-badge commercial">Commercial</div>
        </div>
        <div class="proj-body">
          <div class="proj-meta">
            <span class="proj-loc">&#128205; Ikoyi, Lagos</span>
            <span class="proj-year">2018 &ndash; 2021</span>
          </div>
          <h3>Sandworth Ikoyi Office Plaza</h3>
          <p>A landmark 8-floor commercial building on Bourdillon Road housing seven blue-chip corporate tenants. Fully let within six months of practical completion, generating a 9.4% annual yield for investors.</p>
          <div class="proj-progress-wrap">
            <div class="proj-progress-head"><span>Delivery Status</span><strong>100% &#10003;</strong></div>
            <div class="proj-progress-bar"><div class="proj-progress-fill done" style="--pct:100%"></div></div>
          </div>
          <div class="proj-specs-row">
            <div class="ps-item"><div class="ps-val">8</div><div class="ps-lbl">Floors</div></div>
            <div class="ps-item"><div class="ps-val">9.4%</div><div class="ps-lbl">Yield</div></div>
            <div class="ps-item"><div class="ps-val">100%</div><div class="ps-lbl">Let</div></div>
            <div class="ps-item"><div class="ps-val">2021</div><div class="ps-lbl">Delivered</div></div>
          </div>
          <a class="btn-outline proj-btn" href="<?= SITE_URL ?>/contact-us">Enquire About This Project</a>
        </div>
      </div>

      <!-- Project 6 (Ongoing) -->
      <div class="proj-card reveal" data-category="ongoing residential" style="--d:.4s">
        <div class="proj-img-wrap">
          <img src="./images/AREPO-LIVNG-AREA-02-1024x768.jpg" alt="The Sandworth Banana Island Villas" loading="lazy"/>
          <div class="proj-status ongoing">Ongoing</div>
          <div class="proj-type-badge">Residential</div>
        </div>
        <div class="proj-body">
          <div class="proj-meta">
            <span class="proj-loc">&#128205; Banana Island, Lagos</span>
            <span class="proj-year">2025 &ndash; 2027</span>
          </div>
          <h3>The Sandworth Banana Island Villas</h3>
          <p>Six ultra-premium detached villas — each individually designed — on Banana Island with private pools, staff quarters, and 24/7 guarded access. The pinnacle of Sandworth luxury.</p>
          <div class="proj-progress-wrap">
            <div class="proj-progress-head"><span>Construction Progress</span><strong>18%</strong></div>
            <div class="proj-progress-bar"><div class="proj-progress-fill" style="--pct:18%"></div></div>
          </div>
          <div class="proj-specs-row">
            <div class="ps-item"><div class="ps-val">6</div><div class="ps-lbl">Villas</div></div>
            <div class="ps-item"><div class="ps-val">2,000sqm</div><div class="ps-lbl">Each</div></div>
            <div class="ps-item"><div class="ps-val">&#8358;12B</div><div class="ps-lbl">GDV</div></div>
            <div class="ps-item"><div class="ps-val">Q3 2027</div><div class="ps-lbl">Delivery</div></div>
          </div>
          <a class="btn-outline proj-btn" href="<?= SITE_URL ?>/contact-us">Enquire About This Project</a>
        </div>
      </div>

    </div><!-- /proj-grid -->

    <div class="proj-empty" id="projEmpty" style="display:none">
      <p>No projects in this category yet.</p>
    </div>
  </div>

  <div class="cta-strip">
    <div class="cta-strip-inner">
      <div>
        <h2>Interested in Investing?</h2>
        <p>Speak with our development team about off-plan opportunities and investment structures.</p>
      </div>
      <a class="btn-white" href="<?= SITE_URL ?>/contact-us">
        Speak to an Advisor
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
  </div>

</section>

<?php require 'partials/footer.php'; ?>
