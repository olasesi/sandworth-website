<?php
/**
 * Sandworth — Individual Property Page Template
 *
 * Required variables (set before including):
 *   $prop          array  — full property data (see structure below)
 *   $page_title    string
 *   $meta_desc     string
 *   $current_page  string — always 'properties'
 *   $og_image      string
 *
 * $prop structure:
 * [
 *   'title'      => string,
 *   'slug'       => string,         // used for canonical + breadcrumb
 *   'location'   => string,         // plain text, e.g. "Owerri, Imo State"
 *   'type'       => string,         // e.g. "Retail & Mall"
 *   'status'     => string,         // e.g. "Available"
 *   'price'      => string,         // HTML allowed, e.g. "&#8358;2.5M<small>/sqm</small>"
 *   'desc'       => string,
 *   'images'     => string[],       // relative paths
 *   'specs'      => [['val'=>'', 'lbl'=>''], ...],
 *   'features'   => string[],
 *   'badges'     => [['cls'=>'', 'label'=>''], ...],
 *   'nearby'     => [['title'=>'', 'slug'=>'', 'img'=>'', 'type'=>''], ...] (optional)
 * ]
 */

require __DIR__ . '/header.php';
$p = $prop;

// JSON-LD for the property itself
$schema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'RealEstateListing',
    'name'        => $p['title'],
    'description' => strip_tags($p['desc']),
    'url'         => $canonical,
    'image'       => array_map(fn($img) => SITE_URL . $img, $p['images']),
    'address'     => [
        '@type'           => 'PostalAddress',
        'addressLocality' => $p['location'],
        'addressCountry'  => 'NG',
    ],
];
?>

<!-- Per-property JSON-LD -->
<script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>

<div class="prop-detail-page">

  <!-- BREADCRUMB -->
  <nav class="prop-breadcrumb" aria-label="Breadcrumb">
    <div class="pbc-inner">
      <a href="<?= SITE_URL ?>/">Home</a>
      <span class="pbc-sep">&#8250;</span>
      <a href="<?= SITE_URL ?>/all-properties">Properties</a>
      <span class="pbc-sep">&#8250;</span>
      <span aria-current="page"><?= htmlspecialchars($p['title']) ?></span>
    </div>
  </nav>

  <!-- HERO GALLERY -->
  <div class="pdp-hero">
    <div class="pdp-hero-main">
      <img id="pdpMainImg"
           src="<?= htmlspecialchars($p['images'][0]) ?>"
           alt="<?= htmlspecialchars($p['title']) ?> — main image"/>
      <div class="pdp-badges">
        <?php foreach ($p['badges'] as $b): ?>
        <span class="plbadge <?= htmlspecialchars($b['cls']) ?>"><?= htmlspecialchars($b['label']) ?></span>
        <?php endforeach; ?>
      </div>
    </div>
    <?php if (count($p['images']) > 1): ?>
    <div class="pdp-thumbs">
      <?php foreach ($p['images'] as $i => $img): ?>
      <div class="pdp-thumb <?= $i === 0 ? 'active' : '' ?>"
           onclick="pdpSwitch(this, '<?= htmlspecialchars($img) ?>')">
        <img src="<?= htmlspecialchars($img) ?>"
             alt="<?= htmlspecialchars($p['title']) ?> photo <?= $i + 1 ?>"
             loading="lazy"/>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>

  <!-- CONTENT + SIDEBAR -->
  <div class="pdp-body section">
    <div class="pdp-main">

      <!-- Title block -->
      <div class="pdp-title-block">
        <div>
          <p class="pdp-loc">&#128205; <?= htmlspecialchars($p['location']) ?></p>
          <h1><?= htmlspecialchars($p['title']) ?></h1>
        </div>
        <div class="pdp-price-box">
          <span>Starting From</span>
          <strong><?= $p['price'] ?></strong>
        </div>
      </div>

      <!-- Description -->
      <div class="pdp-desc">
        <p><?= htmlspecialchars($p['desc']) ?></p>
      </div>

      <!-- Specs grid -->
      <div class="pdp-specs-grid">
        <?php foreach ($p['specs'] as $spec): ?>
        <div class="pdp-spec">
          <div class="pdp-spec-val"><?= htmlspecialchars($spec['val']) ?></div>
          <div class="pdp-spec-lbl"><?= htmlspecialchars($spec['lbl']) ?></div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Features -->
      <div class="pdp-features-section">
        <h2 class="pdp-section-title">Key Features &amp; Amenities</h2>
        <div class="pdp-features">
          <?php foreach ($p['features'] as $feat): ?>
          <span class="pmod-feat"><?= htmlspecialchars($feat) ?></span>
          <?php endforeach; ?>
        </div>
      </div>

    </div><!-- /.pdp-main -->

    <!-- SIDEBAR -->
    <aside class="pdp-sidebar">
      <div class="pdp-cta-card">
        <h3>Interested in this Property?</h3>
        <p>Our advisors are available to arrange a private viewing or answer any questions.</p>
        <a class="btn-primary pdp-cta-btn" href="<?= SITE_URL ?>/contact-us?property=<?= urlencode($p['title']) ?>">
          Book a Viewing
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <a class="btn-outline pdp-cta-btn" href="<?= SITE_URL ?>/contact-us?property=<?= urlencode($p['title']) ?>&enquiry=general">
          Send Enquiry
        </a>
        <div class="pdp-contact-info">
          <div class="pdp-ci">
            <span>&#128222;</span>
            <a href="tel:+2348180452173">+234 (0) 818 0452 173</a>
          </div>
          <div class="pdp-ci">
            <span>&#9993;</span>
            <a href="mailto:sales@sandworthproperties.ng">sales@sandworthproperties.ng</a>
          </div>
        </div>
      </div>

      <div class="pdp-summary-card">
        <h4>Property Summary</h4>
        <div class="pdp-summary-rows">
          <div class="pdp-srow"><span>Type</span><strong><?= htmlspecialchars($p['type']) ?></strong></div>
          <div class="pdp-srow"><span>Status</span><strong><?= htmlspecialchars($p['status']) ?></strong></div>
          <div class="pdp-srow"><span>Location</span><strong><?= htmlspecialchars($p['location']) ?></strong></div>
          <div class="pdp-srow"><span>Price</span><strong><?= $p['price'] ?></strong></div>
        </div>
      </div>
    </aside>
  </div><!-- /.pdp-body -->

  <!-- NEARBY PROPERTIES -->
  <?php if (!empty($p['nearby'])): ?>
  <div class="section pdp-nearby">
    <div class="sec-tag">Also Consider</div>
    <h2>Similar Properties</h2>
    <div class="props-grid" style="margin-top:32px">
      <?php foreach ($p['nearby'] as $np): ?>
      <div class="prop-card reveal">
        <div class="prop-img">
          <img src="<?= htmlspecialchars($np['img']) ?>" alt="<?= htmlspecialchars($np['title']) ?>" loading="lazy"/>
          <div class="prop-badges"><span class="pbadge sale"><?= htmlspecialchars($np['type']) ?></span></div>
          <div class="prop-ov"><a href="<?= SITE_URL ?>/properties/<?= htmlspecialchars($np['slug']) ?>">View Property</a></div>
        </div>
        <div class="prop-body">
          <p class="prop-loc">&#128205; <?= htmlspecialchars($np['location']) ?></p>
          <h4><?= htmlspecialchars($np['title']) ?></h4>
          <div class="prop-foot">
            <a href="<?= SITE_URL ?>/properties/<?= htmlspecialchars($np['slug']) ?>">View Details &#8594;</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>

  <!-- CTA -->
  <div class="cta-strip">
    <div class="cta-strip-inner">
      <div>
        <h2>Ready to Make Your Move?</h2>
        <p>Speak with a Sandworth advisor and take the next step towards your perfect property.</p>
      </div>
      <a class="btn-white" href="<?= SITE_URL ?>/contact-us">
        Schedule a Consultation
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
  </div>

</div><!-- /.prop-detail-page -->

<script>
function pdpSwitch(el, src) {
  document.getElementById('pdpMainImg').src = src;
  document.querySelectorAll('.pdp-thumb').forEach(t => t.classList.remove('active'));
  el.classList.add('active');
}
</script>

<?php require __DIR__ . '/footer.php'; ?>
