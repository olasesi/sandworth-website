/* ═══════════════════════════════════════
   SANDWORTH PROPERTIES LTD. — APP.JS v3
   Multi-page PHP version — no SPA router
   ═══════════════════════════════════════ */

// ── HEADER SCROLL ──
const header = document.getElementById('site-header');
if (header) {
  window.addEventListener('scroll', () => {
    header.classList.toggle('scrolled', window.scrollY > 50);
  }, { passive: true });
}

// ── MOBILE NAV ──
const hamburger = document.getElementById('hamburger');
const mainNav   = document.getElementById('main-nav');

if (hamburger && mainNav) {
  function closeMobileNav() {
    hamburger.classList.remove('open');
    hamburger.setAttribute('aria-expanded', 'false');
    mainNav.classList.remove('open');
  }

  hamburger.addEventListener('click', e => {
    e.stopPropagation();
    const isOpen = hamburger.classList.toggle('open');
    hamburger.setAttribute('aria-expanded', String(isOpen));
    mainNav.classList.toggle('open', isOpen);
  });

  document.addEventListener('click', e => {
    if (!hamburger.contains(e.target) && !mainNav.contains(e.target)) closeMobileNav();
  });

  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeMobileNav();
  });
}

// ── SCROLL REVEAL ──
function checkReveals() {
  document.querySelectorAll('.reveal:not(.in)').forEach(el => {
    if (el.getBoundingClientRect().top < window.innerHeight - 60) el.classList.add('in');
  });
}
window.addEventListener('scroll', checkReveals, { passive: true });
window.addEventListener('load', () => setTimeout(checkReveals, 100));

// ── NAV DROPDOWN ──
(function () {
  const dropdown = document.getElementById('navDropdown');
  const trigger  = document.getElementById('dropTrigger');
  
  if (!dropdown || !trigger) return;

  let isOpen = false;

  function open() {
    isOpen = true;
    dropdown.classList.add('open');
    trigger.setAttribute('aria-expanded', 'true');
  }
  function close() {
    isOpen = false;
    dropdown.classList.remove('open');
    trigger.setAttribute('aria-expanded', 'false');
  }

  trigger.addEventListener('click', e => {
    e.stopPropagation();
    isOpen ? close() : open();
  });

  document.addEventListener('click', e => {
    if (isOpen && !dropdown.contains(e.target)) close();
  });

  document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && isOpen) close();
  });

  dropdown.querySelectorAll('.drop-item, .drop-footer').forEach(el => {
    el.addEventListener('click', () => setTimeout(close, 80));
  });

  let hoverTimer;
  dropdown.addEventListener('mouseenter', () => clearTimeout(hoverTimer));
  dropdown.addEventListener('mouseleave', () => {
    hoverTimer = setTimeout(close, 280);
  });
})();

// ══════════════════════════════════════════
//  HERO SLIDER
// ══════════════════════════════════════════
(function () {
  const slides   = document.querySelectorAll('.hero-slider .slide');
  const dots     = document.querySelectorAll('.sdot');
  const prevBtn  = document.getElementById('sliderPrev');
  const nextBtn  = document.getElementById('sliderNext');
  const numEl    = document.getElementById('slideCurrentNum');
  if (!slides.length) return;

  let current  = 0;
  let timer    = null;
  const INTERVAL = 5000;

  function pad(n) { return n < 10 ? '0' + n : '' + n; }

  function goTo(index) {
    slides[current].classList.remove('active');
    if (dots[current]) dots[current].classList.remove('active');

    current = (index + slides.length) % slides.length;

    slides[current].classList.add('active');
    if (dots[current]) dots[current].classList.add('active');
    if (numEl) numEl.textContent = pad(current + 1);
  }

  function next() { goTo(current + 1); }
  function prev() { goTo(current - 1); }

  function startAuto() { stopAuto(); timer = setInterval(next, INTERVAL); }
  function stopAuto()  { if (timer) { clearInterval(timer); timer = null; } }

  if (nextBtn) nextBtn.addEventListener('click', () => { next(); startAuto(); });
  if (prevBtn) prevBtn.addEventListener('click', () => { prev(); startAuto(); });

  dots.forEach(dot => {
    dot.addEventListener('click', () => {
      goTo(parseInt(dot.dataset.index, 10));
      startAuto();
    });
  });

  const sliderEl = document.getElementById('heroSlider');
  if (sliderEl) {
    sliderEl.addEventListener('mouseenter', stopAuto);
    sliderEl.addEventListener('mouseleave', startAuto);
  }

  // Touch/swipe
  const heroEl = document.querySelector('.hero');
  if (heroEl) {
    let touchStartX = 0;
    heroEl.addEventListener('touchstart', e => {
      touchStartX = e.touches[0].clientX;
    }, { passive: true });
    heroEl.addEventListener('touchend', e => {
      const dx = e.changedTouches[0].clientX - touchStartX;
      if (Math.abs(dx) > 50) { dx < 0 ? next() : prev(); startAuto(); }
    }, { passive: true });
  }

  startAuto();
})();

// ══════════════════════════════════════════
//  VIDEO LIGHTBOX
// ══════════════════════════════════════════
function openVideo(btn) {
  const src = btn.dataset.src;
  const lb  = document.getElementById('videoLightbox');
  const fr  = document.getElementById('videoFrame');
  if (!lb || !fr || !src) return;

  // Show spinner, hide stale iframe
  fr.style.opacity = '0';
  lb.classList.add('open', 'vlb-loading');
  document.body.style.overflow = 'hidden';

  // Once iframe has loaded, fade it in and remove spinner
  fr.onload = () => {
    lb.classList.remove('vlb-loading');
    fr.style.opacity = '1';
  };

  fr.src = src;
}

function closeVideo(e) {
  if (e && e.target) {
    const isBackdrop = e.target === document.getElementById('videoLightbox');
    const isCloseBtn = !!e.target.closest('.vlb-close');
    if (!isBackdrop && !isCloseBtn) return;
  }
  const lb = document.getElementById('videoLightbox');
  const fr = document.getElementById('videoFrame');
  if (!lb) return;
  lb.classList.remove('open', 'vlb-loading');
  document.body.style.overflow = '';
  setTimeout(() => {
    if (fr) {
      fr.src = '';
      fr.style.opacity = '0';
    }
  }, 300);
}

document.addEventListener('keydown', e => {
  if (e.key === 'Escape') {
    const lb = document.getElementById('videoLightbox');
    if (lb && lb.classList.contains('open')) closeVideo({ target: lb });
  }
});

// ══════════════════════════════════════════
//  PROJECT FILTER TABS
// ══════════════════════════════════════════
(function () {
  const filterBtns = document.querySelectorAll('.pf-btn');
  const projCards  = document.querySelectorAll('.proj-card');
  const emptyMsg   = document.getElementById('projEmpty');
  if (!filterBtns.length) return;

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const filter = btn.dataset.filter;

      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      let visCount = 0;
      projCards.forEach(card => {
        const cats = card.dataset.category || '';
        const show = filter === 'all' || cats.includes(filter);
        card.classList.toggle('hidden', !show);
        if (show) visCount++;
      });

      if (emptyMsg) emptyMsg.style.display = visCount === 0 ? 'block' : 'none';
      setTimeout(checkReveals, 50);
    });
  });
})();

// ══════════════════════════════════════════
//  PROPERTIES PAGE — FILTER TABS
// ══════════════════════════════════════════
(function () {
  const tabs    = document.querySelectorAll('.ppf-tab');
  const cards   = document.querySelectorAll('.plcard');
  const countEl = document.getElementById('ppfCount');
  if (!tabs.length) return;

  // Apply URL filter on load
  const params = new URLSearchParams(window.location.search);
  const urlType = params.get('type') || 'all';

  function applyFilter(f) {
    tabs.forEach(t => t.classList.toggle('active', t.dataset.pfilter === f));
    let vis = 0;
    cards.forEach(card => {
      const t = card.dataset.ptype || '';
      const show = f === 'all' || t === f;
      card.classList.toggle('phidden', !show);
      if (show) vis++;
    });
    if (countEl) countEl.textContent = vis + (vis === 1 ? ' Property' : ' Properties');
    setTimeout(checkReveals, 60);
  }

  applyFilter(urlType);

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const f = tab.dataset.pfilter;
      // Update URL without reload
      const url = new URL(window.location.href);
      f === 'all' ? url.searchParams.delete('type') : url.searchParams.set('type', f);
      window.history.replaceState({}, '', url);
      applyFilter(f);
    });
  });
})();

// ══════════════════════════════════════════
//  CONTACT FORM — validation + AJAX
// ══════════════════════════════════════════
function validateForm() {
  const fields = [
    { id: 'first_name',   msg: 'Please enter your first name.' },
    { id: 'last_name',    msg: 'Please enter your last name.' },
    { id: 'email',        msg: 'Please enter a valid email address.', type: 'email' },
    { id: 'enquiry_type', msg: 'Please select an enquiry type.' },
    { id: 'message',      msg: 'Please tell us about your needs.' },
  ];
  let valid = true;

  fields.forEach(f => {
    const el  = document.getElementById(f.id);
    const err = document.getElementById('err-' + f.id);
    if (!el) return;
    el.classList.remove('invalid');
    if (err) err.textContent = '';
    const val = el.value.trim();
    let ok = val.length > 0;
    if (ok && f.type === 'email') ok = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val);
    if (!ok) {
      el.classList.add('invalid');
      if (err) err.textContent = f.msg;
      valid = false;
    }
  });
  return valid;
}

function handleForm(e) {
  e.preventDefault();
  if (!validateForm()) return;

  const form    = document.getElementById('contact-form');
  const success = document.getElementById('form-success');
  const btn     = document.getElementById('submitBtn');
  const flash   = document.getElementById('form-flash');

  btn.classList.add('loading');
  btn.innerHTML = '<span>Sending&hellip;</span><svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="1.8" stroke-dasharray="20" stroke-dashoffset="0"><animateTransform attributeName="transform" type="rotate" from="0 8 8" to="360 8 8" dur="1s" repeatCount="indefinite"/></circle></svg>';

  fetch('/contact.php', {
    method: 'POST',
    body: new FormData(form),
    headers: { 'X-Requested-With': 'XMLHttpRequest' }
  })
  .then(res => res.json())
  .then(json => {
    if (json.success) {
      form.style.display = 'none';
      success.classList.add('show');
    } else {
      if (flash) {
        flash.className = 'form-flash error';
        flash.textContent = json.message || 'Something went wrong. Please try again.';
        flash.style.display = 'block';
      }
      resetBtn();
    }
  })
  .catch(() => {
    form.style.display = 'none';
    success.classList.add('show');
  });
}

function resetBtn() {
  const btn = document.getElementById('submitBtn');
  if (!btn) return;
  btn.classList.remove('loading');
  btn.innerHTML = 'Send Enquiry <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>';
}

// Clear inline errors on input
document.addEventListener('input', e => {
  if (e.target.closest('.cform')) {
    e.target.classList.remove('invalid');
    const err = document.getElementById('err-' + e.target.id);
    if (err) err.textContent = '';
  }
});
document.addEventListener('change', e => {
  if (e.target.closest('.cform')) {
    e.target.classList.remove('invalid');
    const err = document.getElementById('err-' + e.target.id);
    if (err) err.textContent = '';
  }
});
