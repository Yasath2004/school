// ============================================================
// Chalk & Chauser International School — Main JS
// ============================================================

document.addEventListener('DOMContentLoaded', function () {

  // ---- Navbar scroll behaviour ----
  const navbar = document.querySelector('.navbar');
  if (navbar) {
    const updateNavbar = () => {
      if (window.scrollY > 60) {
        navbar.classList.add('navbar--solid');
        navbar.classList.remove('navbar--transparent');
      } else {
        navbar.classList.remove('navbar--solid');
        navbar.classList.add('navbar--transparent');
      }
    };
    window.addEventListener('scroll', updateNavbar, { passive: true });
    updateNavbar();
  }

  // ---- Mobile nav toggle ----
  const toggle = document.querySelector('.navbar__toggle');
  const nav = document.querySelector('.navbar__nav');
  const closeBtn = document.querySelector('.navbar__nav-close');

  if (toggle && nav) {
    toggle.addEventListener('click', () => {
      nav.classList.toggle('open');
      document.body.style.overflow = nav.classList.contains('open') ? 'hidden' : '';
    });
    // Close on link click
    nav.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        nav.classList.remove('open');
        document.body.style.overflow = '';
      });
    });
  }

  // ---- Scroll reveal animation ----
  const revealEls = document.querySelectorAll('.reveal');
  if (revealEls.length > 0) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    revealEls.forEach(el => observer.observe(el));
  }

  // ---- FAQ Accordion ----
  document.querySelectorAll('.faq-item__question').forEach(btn => {
    btn.addEventListener('click', function () {
      const item = this.closest('.faq-item');
      const isActive = item.classList.contains('active');

      // Close all
      document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));

      // Toggle this
      if (!isActive) item.classList.add('active');
    });
  });

  // ---- Gallery Lightbox ----
  const lightbox = document.querySelector('.lightbox');
  const lightboxImg = document.querySelector('.lightbox__img');

  document.querySelectorAll('[data-lightbox]').forEach(el => {
    el.addEventListener('click', function () {
      if (lightbox && lightboxImg) {
        lightboxImg.src = this.dataset.lightbox;
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
      }
    });
  });

  if (lightbox) {
    lightbox.addEventListener('click', function (e) {
      if (e.target === lightbox || e.target.classList.contains('lightbox__close')) {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
      }
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
      }
    });
  }

  // ---- Gallery filter ----
  const filterBtns = document.querySelectorAll('[data-filter]');
  const galleryItems = document.querySelectorAll('[data-category]');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', function () {
      const filter = this.dataset.filter;

      filterBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');

      galleryItems.forEach(item => {
        if (filter === 'all' || item.dataset.category === filter) {
          item.style.display = '';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });

  // ---- Admin sidebar toggle (mobile) ----
  const sidebarToggle = document.querySelector('.admin-sidebar-toggle');
  const adminSidebar = document.querySelector('.admin-sidebar');

  if (sidebarToggle && adminSidebar) {
    sidebarToggle.addEventListener('click', () => {
      adminSidebar.classList.toggle('open');
    });
    // Close on outside click
    document.addEventListener('click', (e) => {
      if (!adminSidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
        adminSidebar.classList.remove('open');
      }
    });
  }

  // ---- Flash message auto dismiss ----
  const flash = document.querySelector('.flash-message');
  if (flash) {
    setTimeout(() => flash.remove(), 4000);
  }

  // ---- Active nav link ----
  const currentPath = window.location.pathname;
  document.querySelectorAll('.navbar__nav a').forEach(link => {
    const href = link.getAttribute('href');
    if (href && (currentPath === href || (href !== '/' && currentPath.startsWith(href)))) {
      link.classList.add('active');
    }
  });

  // ---- Smooth counter ----
  function animateCounter(el) {
    const target = parseInt(el.dataset.count, 10);
    const duration = 1500;
    const step = target / (duration / 16);
    let current = 0;
    const update = () => {
      current = Math.min(current + step, target);
      el.textContent = Math.floor(current).toLocaleString();
      if (current < target) requestAnimationFrame(update);
    };
    requestAnimationFrame(update);
  }

  const counterEls = document.querySelectorAll('[data-count]');
  if (counterEls.length > 0) {
    const cObserver = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          cObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });
    counterEls.forEach(el => cObserver.observe(el));
  }

  // ---- Image lazy loading polyfill ----
  document.querySelectorAll('img[loading="lazy"]').forEach(img => {
    if (!('loading' in HTMLImageElement.prototype)) {
      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.src = entry.target.dataset.src || entry.target.src;
          }
        });
      });
      observer.observe(img);
    }
  });

});
