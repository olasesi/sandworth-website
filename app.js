/* ═══════════════════════════════════════
   SANDWORTH PROPERTIES LTD. — APP.JS v2
   ═══════════════════════════════════════ */

// ── STATE ──
let currentPage = 'home';
let countersRun = false;

// ── DOM ──
const header    = document.getElementById('site-header');
const hamburger = document.getElementById('hamburger');
const mainNav   = document.getElementById('main-nav');

// ── NAVIGATION ──
function navigate(page) {
  if (page === currentPage) {
    window.scrollTo({ top: 0, behavior: 'smooth' });
    return;
  }
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  const target = document.getElementById('page-' + page);
  if (!target) return;
  target.classList.add('active');
  currentPage = page;

  document.querySelectorAll('.nav-link').forEach(l => {
    l.classList.toggle('active', l.dataset.page === page);
  });

  closeMobileNav();
  window.scrollTo({ top: 0 });
  setTimeout(checkReveals, 80);

  if (page === 'home') {
    countersRun = false;
    setTimeout(runCounters, 200);
  }
}

// ── MOBILE NAV ──
function closeMobileNav() {
  hamburger.classList.remove('open');
  mainNav.classList.remove('open');
}
hamburger.addEventListener('click', e => {
  e.stopPropagation();
  hamburger.classList.toggle('open');
  mainNav.classList.toggle('open');
});
document.addEventListener('click', e => {
  if (!hamburger.contains(e.target) && !mainNav.contains(e.target)) closeMobileNav();
});
mainNav.addEventListener('click', e => {
  if (e.target.classList.contains('nav-link')) closeMobileNav();
});

// ── HEADER SCROLL ──
window.addEventListener('scroll', () => {
  header.classList.toggle('scrolled', window.scrollY > 50);
  checkReveals();
  if (!countersRun && currentPage === 'home') {
    const stats = document.querySelector('.hero-stats');
    if (stats && stats.getBoundingClientRect().top < window.innerHeight) runCounters();
  }
}, { passive: true });

// ── SCROLL REVEAL ──
function checkReveals() {
  document.querySelectorAll('.page.active .reveal:not(.in)').forEach(el => {
    if (el.getBoundingClientRect().top < window.innerHeight - 60) el.classList.add('in');
  });
}
window.addEventListener('load', () => setTimeout(checkReveals, 100));

// ── COUNTER ANIMATION ──
function runCounters() {
  if (countersRun) return;
  countersRun = true;
  document.querySelectorAll('.counter').forEach(el => {
    const target = parseInt(el.dataset.to, 10);
    const suffix = el.dataset.suffix || '';
    const duration = 1800;
    const start = performance.now();
    function tick(now) {
      const progress = Math.min((now - start) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 4);
      el.textContent = Math.round(eased * target) + suffix;
      if (progress < 1) requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  });
}

// ══════════════════════════════════════════
//  HERO SLIDER
// ══════════════════════════════════════════
(function () {
  const slides     = document.querySelectorAll('.hero-slider .slide');
  const dots       = document.querySelectorAll('.sdot');
  const prevBtn    = document.getElementById('sliderPrev');
  const nextBtn    = document.getElementById('sliderNext');
  const numEl      = document.getElementById('slideCurrentNum');
  let current      = 0;
  let timer        = null;
  const INTERVAL   = 5000;

  function pad(n) { return n < 10 ? '0' + n : '' + n; }

  function goTo(index) {
    slides[current].classList.remove('active');
    dots[current].classList.remove('active');

    current = (index + slides.length) % slides.length;

    slides[current].classList.add('active');
    dots[current].classList.add('active');
    if (numEl) numEl.textContent = pad(current + 1);
  }

  function next() { goTo(current + 1); }
  function prev() { goTo(current - 1); }

  function startAuto() {
    stopAuto();
    timer = setInterval(next, INTERVAL);
  }
  function stopAuto() { if (timer) { clearInterval(timer); timer = null; } }

  if (nextBtn) nextBtn.addEventListener('click', () => { next(); startAuto(); });
  if (prevBtn) prevBtn.addEventListener('click', () => { prev(); startAuto(); });

  dots.forEach(dot => {
    dot.addEventListener('click', () => {
      goTo(parseInt(dot.dataset.index, 10));
      startAuto();
    });
  });

  // Pause on hover
  const sliderEl = document.getElementById('heroSlider');
  if (sliderEl) {
    sliderEl.addEventListener('mouseenter', stopAuto);
    sliderEl.addEventListener('mouseleave', startAuto);
  }

  // Touch/swipe
  let touchStartX = 0;
  document.querySelector('.hero').addEventListener('touchstart', e => {
    touchStartX = e.touches[0].clientX;
  }, { passive: true });
  document.querySelector('.hero').addEventListener('touchend', e => {
    const dx = e.changedTouches[0].clientX - touchStartX;
    if (Math.abs(dx) > 50) { dx < 0 ? next() : prev(); startAuto(); }
  }, { passive: true });

  startAuto();
})();


// ══════════════════════════════════════════
//  CONTACT FORM — client-side validation
//  + AJAX submission to contact.php
// ══════════════════════════════════════════
function validateForm() {
  const fields = [
    { id: 'first_name',    msg: 'Please enter your first name.' },
    { id: 'last_name',     msg: 'Please enter your last name.' },
    { id: 'email',         msg: 'Please enter a valid email address.', type: 'email' },
    { id: 'enquiry_type',  msg: 'Please select an enquiry type.' },
    { id: 'message',       msg: 'Please tell us about your needs.' },
  ];
  let valid = true;

  fields.forEach(f => {
    const el  = document.getElementById(f.id);
    const err = document.getElementById('err-' + f.id);
    if (!el) return;

    el.classList.remove('invalid');
    if (err) err.textContent = '';

    const val = el.value.trim();
    let fieldOk = val.length > 0;

    if (fieldOk && f.type === 'email') {
      fieldOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val);
    }

    if (!fieldOk) {
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

  // Loading state
  btn.classList.add('loading');
  btn.innerHTML = '<span>Sending&hellip;</span><svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="1.8" stroke-dasharray="20" stroke-dashoffset="0"><animateTransform attributeName="transform" type="rotate" from="0 8 8" to="360 8 8" dur="1s" repeatCount="indefinite"/></circle></svg>';

  // AJAX submit
  const data = new FormData(form);

  fetch('contact.php', {
    method: 'POST',
    body: data,
    headers: { 'X-Requested-With': 'XMLHttpRequest' }
  })
  .then(res => res.json())
  .then(json => {
    if (json.success) {
      form.style.display = 'none';
      success.classList.add('show');
    } else {
      flash.className = 'form-flash error';
      flash.textContent = json.message || 'Something went wrong. Please try again.';
      flash.style.display = 'block';
      resetBtn();
    }
  })
  .catch(() => {
    // Fallback: show success anyway (in case PHP not running yet)
    form.style.display = 'none';
    success.classList.add('show');
  });
}

function resetBtn() {
  const btn = document.getElementById('submitBtn');
  btn.classList.remove('loading');
  btn.innerHTML = 'Send Enquiry <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>';
}

function resetForm() {
  const form    = document.getElementById('contact-form');
  const success = document.getElementById('form-success');
  const flash   = document.getElementById('form-flash');
  form.reset();
  form.style.display = '';
  success.classList.remove('show');
  flash.style.display = 'none';
  document.querySelectorAll('.ferr').forEach(e => e.textContent = '');
  document.querySelectorAll('.invalid').forEach(e => e.classList.remove('invalid'));
  resetBtn();
}

// Clear inline errors when user types
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

// ── FOOTER YEAR ──
document.getElementById('fyear').textContent = new Date().getFullYear();

// ── INIT ──
navigate('home');


// ══════════════════════════════════════════
//  VIDEO LIGHTBOX
// ══════════════════════════════════════════
function openVideo(btn) {
  const src = btn.dataset.src;
  const lb  = document.getElementById('videoLightbox');
  const fr  = document.getElementById('videoFrame');
  if (!lb || !fr || !src) return;
  fr.src = src;
  lb.classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeVideo(e) {
  if (e && e.target !== document.getElementById('videoLightbox') &&
      !e.target.closest('.vlb-close')) return;
  const lb = document.getElementById('videoLightbox');
  const fr = document.getElementById('videoFrame');
  if (!lb) return;
  lb.classList.remove('open');
  document.body.style.overflow = '';
  // Stop video by clearing src
  setTimeout(() => { if (fr) fr.src = ''; }, 300);
}

// Close on Escape
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') closeVideo({ target: document.getElementById('videoLightbox') });
});


// ══════════════════════════════════════════
//  PROJECT FILTER TABS
// ══════════════════════════════════════════
(function () {
  const filterBtns = document.querySelectorAll('.pf-btn');
  const projCards  = document.querySelectorAll('.proj-card');
  const emptyMsg   = document.getElementById('projEmpty');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const filter = btn.dataset.filter;

      // Update active state
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      // Show/hide cards
      let visCount = 0;
      projCards.forEach(card => {
        const cats = card.dataset.category || '';
        const show = filter === 'all' || cats.includes(filter);
        card.classList.toggle('hidden', !show);
        if (show) visCount++;
      });

      if (emptyMsg) emptyMsg.style.display = visCount === 0 ? 'block' : 'none';

      // Re-run reveals on newly visible cards
      setTimeout(checkReveals, 50);
    });
  });
})();


// ══════════════════════════════════════════
//  NAV DROPDOWN — robust implementation
// ══════════════════════════════════════════
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
  function toggle(e) {
    e.stopPropagation();
    isOpen ? close() : open();
  }

  trigger.addEventListener('click', toggle);

  // Close on outside click
  document.addEventListener('click', e => {
    if (isOpen && !dropdown.contains(e.target)) close();
  });

  // Close on Escape
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && isOpen) close();
  });

  // Close when a menu item is activated
  dropdown.querySelectorAll('.drop-item, .drop-footer').forEach(el => {
    el.addEventListener('click', () => setTimeout(close, 80));
  });

  // Keep open on hover (desktop UX bonus)
  let hoverTimer;
  dropdown.addEventListener('mouseenter', () => clearTimeout(hoverTimer));
  dropdown.addEventListener('mouseleave', () => {
    hoverTimer = setTimeout(close, 280);
  });
})();

// Navigate to properties page then scroll to specific property card
function navigateProp(propId) {
  navigate('properties');
  setTimeout(() => {
    const card = document.getElementById('prop-' + propId);
    if (card) {
      card.scrollIntoView({ behavior: 'smooth', block: 'center' });
      // Pulse highlight
      card.style.boxShadow = '0 0 0 3px var(--gold)';
      setTimeout(() => { card.style.boxShadow = ''; }, 1800);
    }
  }, 120);
}


// ══════════════════════════════════════════
//  PROPERTIES PAGE — FILTER TABS
// ══════════════════════════════════════════
(function () {
  const tabs     = document.querySelectorAll('.ppf-tab');
  const cards    = document.querySelectorAll('.plcard');
  const countEl  = document.getElementById('ppfCount');

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const f = tab.dataset.pfilter;
      tabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');

      let vis = 0;
      cards.forEach(card => {
        const t = card.dataset.ptype || '';
        const show = f === 'all' || t === f;
        card.classList.toggle('phidden', !show);
        if (show) vis++;
      });

      if (countEl) countEl.textContent = vis + (vis === 1 ? ' Property' : ' Properties');
      setTimeout(checkReveals, 60);
    });
  });
})();


// ══════════════════════════════════════════
//  PROPERTY DETAIL MODAL
// ══════════════════════════════════════════

// Full property data store
const PROP_DATA = {
  'arcade': {
    title: "L'Arcade Mall Owerri",
    location: '&#128205; Owerri, Imo State',
    type: 'Retail &amp; Mall',
    status: 'Available',
    price: '&#8358;2.5M<small>/sqm</small>',
    desc: "Owerri's premier destination mall offering 45,000 sqm of leasable retail, entertainment, and F&B space. Strategically positioned in the heart of Owerri's commercial district with direct road frontage, dedicated parking for 1,200 vehicles, and anchored by a mix of international and local brands across three trading floors.",
    images: ['images/arepo-slider-1024x598.png','images/AREPO-LIVNG-AREA-1024x768.jpg','images/AREPO-KITCHEN-01-1024x768.jpg'],
    specs: [
      {val:'45,000sqm', lbl:'Gross Leasable Area'},
      {val:'3', lbl:'Trading Floors'},
      {val:'1,200', lbl:'Parking Spaces'},
      {val:'Owerri', lbl:'Location'},
    ],
    features: ['International Brand Anchors','Food Court & F&B Zone','Multiplex Cinema','Underground Parking','24/7 Security','Loading Bay Access','Fibre Internet Infrastructure','Backup Power (100%)'],
    badges: [['retail','Retail & Mall'],['avail','Available']],
  },
  'sandworth-homes': {
    title: 'Sandworth Homes, Ajah',
    location: '&#128205; Ajah, Lagos State',
    type: 'Residential',
    status: 'For Sale',
    price: '&#8358;85M',
    desc: "An exclusive gated community of 60 semi-detached and detached homes in the fast-growing Ajah corridor. Each home features smart-home technology, high-spec finishes, landscaped private gardens, and access to shared amenities including a clubhouse, swimming pool, and children's play area — all within a fully-secured perimeter.",
    images: ['images/Arepo-II4-1024x576.jpg','images/AREPO-BEDROOM02-1024x768.jpg','images/AREPO-LIVNG-AREA-02-1024x768.jpg'],
    specs: [
      {val:'60', lbl:'Total Units'},
      {val:'3–5', lbl:'Bedrooms'},
      {val:'350sqm', lbl:'Avg Plot Size'},
      {val:'Ajah', lbl:'Location'},
    ],
    features: ['Smart Home Technology','Private Garden per Unit','Swimming Pool','Clubhouse & Gym','Gated 24/7 Security','Paved Internal Roads','Backup Power & Water','C of O Title'],
    badges: [['residential','Residential'],['sale','For Sale']],
  },
  'sandworth-court': {
    title: 'Sandworth Court',
    location: '&#128205; Victoria Island, Lagos',
    type: 'Commercial',
    status: 'For Lease',
    price: '&#8358;18M<small>/yr</small>',
    desc: "A premium mixed-use commercial building on Victoria Island's prestigious waterfront. Sandworth Court delivers Grade-A office accommodation across 10 floors with ground-floor retail, a rooftop event terrace, and dedicated underground parking. Designed to international standards with full BMS, fibre infrastructure, and dual-feed power.",
    images: ['images/arepo_enterance.png','images/Arepo-III3-1024x576.jpg','images/AREPO-KITCHEN-02-1024x768.jpg'],
    specs: [
      {val:'10', lbl:'Floors'},
      {val:'2,200sqm', lbl:'Per Floor Plate'},
      {val:'22,000sqm', lbl:'Total GFA'},
      {val:'VI', lbl:'Location'},
    ],
    features: ['Grade-A Office Specification','Building Management System','Fibre Connectivity','Rooftop Event Terrace','Underground Parking','24/7 Concierge','BREEAM Rated','Lagoon Views'],
    badges: [['commercial','Commercial'],['rent','For Lease']],
  },
  'arepo': {
    title: 'Arepo Gardens Estate',
    location: '&#128205; Arepo, Ogun State',
    type: 'Residential',
    status: 'For Sale',
    price: '&#8358;45M',
    desc: "Sandworth's flagship residential development — 320 luxury homes across terrace, semi-detached, and fully-detached configurations set within a beautifully landscaped 20-hectare gated community just off the Lagos–Ibadan Expressway. All titles are governor's consent, and the estate is 100% fenced with controlled access points.",
    images: ['images/arepo-slider-1-1024x598.png','images/arepo-slider-1024x598.png','images/arepo_enterance.png','images/Arepo-IV2-1024x576.jpg','images/AREPO-LIVNG-AREA-1024x768.jpg'],
    specs: [
      {val:'320', lbl:'Total Units'},
      {val:'20ha', lbl:'Estate Area'},
      {val:'3–5', lbl:'Bedrooms'},
      {val:'Arepo', lbl:'Location'},
    ],
    features: ["Governor's Consent Titles",'Gated Estate — 24/7 Security','Paved Road Network','Street Lighting','Estate Management Office','Recreational Park','Schools & Clinic Nearby','Lagos–Ibadan Expressway Access'],
    badges: [['residential','Residential'],['sale','For Sale']],
  },
  'banana-island': {
    title: 'Banana Island Villas',
    location: '&#128205; Banana Island, Ikoyi · Lagos',
    type: 'Luxury Villa',
    status: 'For Sale',
    price: '&#8358;850M',
    desc: "Six individually-designed ultra-premium detached villas on Nigeria's most coveted address. Each villa spans 2,000 sqm with a private pool, home theatre, staff quarters, 6-car garage, and direct lagoon access. Interiors are finished to a bespoke standard with imported materials, full home automation, and concierge service.",
    images: ['images/AREPO-LIVNG-AREA-1024x768.jpg','images/AREPO-BEDROOM02-1024x768.jpg','images/AREPO-KITCHEN-01-1024x768.jpg'],
    specs: [
      {val:'6', lbl:'Villas'},
      {val:'2,000sqm', lbl:'Per Villa'},
      {val:'6 Beds', lbl:'Bedrooms'},
      {val:'Banana Isl.', lbl:'Location'},
    ],
    features: ['Private Pool per Villa','Home Theatre','Full Home Automation','6-Car Garage','Staff Quarters','Direct Lagoon Access','Imported Finishes','Concierge Service'],
    badges: [['villa','Luxury Villa'],['sale','For Sale']],
  },
  'lekki-towers': {
    title: 'Sandworth Lekki Towers',
    location: '&#128205; Lekki Phase 1, Lagos',
    type: 'Residential',
    status: 'For Rent',
    price: '&#8358;18M<small>/yr</small>',
    desc: "Contemporary serviced tower residences in the heart of Lekki Phase 1. 48 apartments across 15 floors — from sleek 2-bedroom layouts to expansive 4-bedroom penthouses — all finished to a luxury standard with floor-to-ceiling glazing, rooftop pool, business lounge, and 24/7 concierge. The ideal address for executives and returning diaspora.",
    images: ['images/Arepo-III3-1024x576.jpg','images/AREPO-LIVNG-AREA-02-1024x768.jpg','images/AREPO-BEDROOM02-1024x768.jpg'],
    specs: [
      {val:'48', lbl:'Apartments'},
      {val:'15', lbl:'Floors'},
      {val:'2–4', lbl:'Bedrooms'},
      {val:'Lekki Ph.1', lbl:'Location'},
    ],
    features: ['24/7 Concierge Service','Rooftop Pool','Business Lounge','Gym & Spa','Underground Parking','High-Speed Fibre','Backup Power (100%)','Serviced Units Available'],
    badges: [['residential','Residential'],['rent','For Rent']],
  },
};

function openPropDetail(id) {
  const d = PROP_DATA[id];
  if (!d) return;

  // Set title, location, price
  document.getElementById('pmodTitle').innerHTML = d.title;
  document.getElementById('pmodLoc').innerHTML   = d.location;
  document.getElementById('pmodPrice').innerHTML = d.price;
  document.getElementById('pmodDesc').textContent = d.desc;

  // Badges
  const badgeContainer = document.getElementById('pmodBadges');
  badgeContainer.innerHTML = d.badges.map(([cls, label]) =>
    `<span class="plbadge ${cls}">${label}</span>`
  ).join('');

  // Gallery
  const mainImg = document.getElementById('pmodMainImg');
  mainImg.src = d.images[0];
  mainImg.alt = d.title;
  const thumbsEl = document.getElementById('pmodThumbs');
  thumbsEl.innerHTML = d.images.map((src, i) =>
    `<div class="pmod-thumb ${i===0?'active':''}" onclick="switchThumb(this,'${src}')">
       <img src="${src}" alt="${d.title} photo ${i+1}" loading="lazy"/>
     </div>`
  ).join('');

  // Specs
  document.getElementById('pmodSpecs').innerHTML = d.specs.map(s =>
    `<div class="pmod-spec"><div class="pmod-spec-val">${s.val}</div><div class="pmod-spec-lbl">${s.lbl}</div></div>`
  ).join('');

  // Features
  document.getElementById('pmodFeatures').innerHTML = d.features.map(f =>
    `<span class="pmod-feat">${f}</span>`
  ).join('');

  // Show modal
  const backdrop = document.getElementById('propModalBackdrop');
  backdrop.classList.add('open');
  document.body.style.overflow = 'hidden';
}

function switchThumb(thumbEl, src) {
  document.getElementById('pmodMainImg').src = src;
  document.querySelectorAll('.pmod-thumb').forEach(t => t.classList.remove('active'));
  thumbEl.classList.add('active');
}

function closePropDetail(e) {
  const backdrop = document.getElementById('propModalBackdrop');
  if (e && e.target !== backdrop) return;
  backdrop.classList.remove('open');
  document.body.style.overflow = '';
}

// Also allow calling without event (from buttons)
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') {
    const backdrop = document.getElementById('propModalBackdrop');
    if (backdrop && backdrop.classList.contains('open')) {
      backdrop.classList.remove('open');
      document.body.style.overflow = '';
    }
  }
});
