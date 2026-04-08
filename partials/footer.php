<?php
/**
 * Sandworth Properties — Shared Footer Partial
 */
?>
</main><!-- /#app -->

<footer id="site-footer">
  <div class="footer-top-bar"></div>
  <div class="footer-inner">
    <div class="footer-grid">

      <div class="footer-brand">
        <a class="logo" href="<?= $site_url ?>/">
          <img src="<?= $site_url ?>/logo.jpg" alt="Sandworth Properties Ltd." class="logo-img footer-logo"/>
        </a>
        <p>Nigeria's premier estate management company — delivering luxury real estate experiences since 2006.</p>
        <div class="footer-socials">
          <a href="#" aria-label="Facebook"  class="fsoc">f</a>
          <a href="#" aria-label="Instagram" class="fsoc">ig</a>
          <a href="#" aria-label="LinkedIn"  class="fsoc">in</a>
          <a href="#" aria-label="X"         class="fsoc">X</a>
        </div>
      </div>

      <div class="footer-col">
        <h5>Company</h5>
        <a href="<?= $site_url ?>/">Home</a>
        <a href="<?= $site_url ?>/about-us">About Us</a>
        <a href="<?= $site_url ?>/our-team">Our Team</a>
        <a href="<?= $site_url ?>/contact-us">Contact</a>
      </div>

      <div class="footer-col">
        <h5>Services</h5>
        <a href="<?= $site_url ?>/properties?type=residential">Residential Properties</a>
        <a href="<?= $site_url ?>/properties?type=commercial">Commercial Properties</a>
        <a href="<?= $site_url ?>/contact-us?enquiry=Property+Management">Property Management</a>
        <a href="<?= $site_url ?>/contact-us?enquiry=Land+Acquisition">Land Acquisition</a>
        <a href="<?= $site_url ?>/contact-us?enquiry=Investment+Advisory">Investment Advisory</a>
        <a href="<?= $site_url ?>/contact-us?enquiry=Facility+Management">Facility Management</a>
      </div>

      <div class="footer-col">
        <h5>Contact</h5>
        <p>The Nigeria Army Shopping Complex (The Arena),<br>Bolade-Oshodi, Lagos State.</p>
        <p>+234 (0) 818 0452 173</p>
        <p>info@sandworthproperties.ng</p>
        <p>sandworthproperties.ng</p>
      </div>

    </div>

    <div class="footer-bottom">
      <p>&copy; <?= date('Y') ?> Sandworth Properties Ltd. All rights reserved. RC 1234567.</p>
      <div class="footer-legal">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Use</a>
        <a href="#">Cookie Policy</a>
      </div>
    </div>
  </div>
</footer>

<script src="<?= $site_url ?>/app.js"></script>
</body>
</html>
