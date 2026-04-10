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
        <a class="logo" href="<?= SITE_URL ?>/">
          <img src="<?= SITE_URL ?>/images/logo.jpg" alt="Sandworth Properties Ltd." class="logo-img footer-logo"/>
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
        <a href="<?= SITE_URL ?>/">Home</a>
        <a href="<?= SITE_URL ?>/about-us">About Us</a>
        <a href="<?= SITE_URL ?>/our-team">Our Team</a>
        <a href="<?= SITE_URL ?>/contact-us">Contact</a>
      </div>

      <div class="footer-col">
        <h5>Services</h5>
        <a href="<?= SITE_URL ?>/all-properties?type=residential">Residential Properties</a>
        <a href="<?= SITE_URL ?>/all-properties?type=commercial">Commercial Properties</a>
        <a href="<?= SITE_URL ?>/contact-us?enquiry=Property+Management">Property Management</a>
        <a href="<?= SITE_URL ?>/contact-us?enquiry=Land+Acquisition">Land Acquisition</a>
        <a href="<?= SITE_URL ?>/contact-us?enquiry=Investment+Advisory">Investment Advisory</a>
        <a href="<?= SITE_URL ?>/contact-us?enquiry=Facility+Management">Facility Management</a>
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

<script src="<?= SITE_URL ?>/app.js"></script>
<script>
  async function handleForm(event) {
    event.preventDefault(); // Stop the page from reloading

    const form = document.getElementById('contact-form');
    const submitBtn = document.getElementById('submitBtn');
    const flash = document.getElementById('form-flash');
    const successDiv = document.getElementById('form-success');
    const formData = new FormData(form);

    // Disable button to prevent double submission
    submitBtn.disabled = true;
    submitBtn.innerText = 'Sending...';

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const result = await response.json();

        // Clear previous errors
        document.querySelectorAll('.ferr').forEach(el => el.innerText = '');

        if (result.success) {
            // Hide the form and show the success div
            form.style.display = 'none';
            successDiv.style.display = 'block';
            successDiv.scrollIntoView({ behavior: 'smooth' });
        } else {
            // Show error in the flash message
            flash.style.display = 'block';
            flash.className = 'form-flash error'; // Ensure you have CSS for this
            flash.innerText = result.message;

            // Map specific errors to their input fields
            if (result.errors) {
                for (const [field, msg] of Object.entries(result.errors)) {
                    const errSpan = document.getElementById(`err-${field}`);
                    if (errSpan) errSpan.innerText = msg;
                }
            }
            submitBtn.disabled = false;
            submitBtn.innerText = 'Send Enquiry';
        }
    } catch (error) {
        console.error('Submission Error:', error);
        alert('Something went wrong. Please check your internet connection.');
        submitBtn.disabled = false;
        submitBtn.innerText = 'Send Enquiry';
    }
}
</script>
</body>
</html>
