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
          <p>This prestigious estate is sitting on a land area of approximately 5850 Sqm, and it is located at Urata Egbu layout, Owerri in Imo State, it can be accessed either through Toronto Junction by Wethedral Road or the Road Safety Roundabout by Airport Road. Sandworth Gardens represent luxury and Style. The topologies of the estate guarantees comfort, serenity and tranquility.</p>
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
