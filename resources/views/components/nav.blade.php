@php
  $lang = app()->getLocale();
  $isHero = isset($heroPage) && $heroPage;
  $currentRoute = request()->route();
  $currentRouteName = $currentRoute && $currentRoute->getName() ? $currentRoute->getName() : 'home';
  $currentRouteParams = $currentRoute ? $currentRoute->parameters() : [];
@endphp
<nav class="navbar navbar--transparent" id="navbar" role="navigation" aria-label="Main navigation">
  <div class="container">
    <div class="navbar__inner">

      {{-- Logo --}}
      <a href="{{ route('home', ['lang' => $lang]) }}" class="navbar__logo">
        <img src="/images/logo.jpg" alt="Chalk & Chauser International School Logo" width="52" height="52">
        <div class="navbar__logo-text">
          <div class="navbar__logo-name">Chalk &amp; Chauser</div>
          <div class="navbar__logo-tag">International School</div>
        </div>
      </a>

      {{-- Nav Links --}}
      <ul class="navbar__nav" id="mainNav" role="list">
        <button class="navbar__nav-close" style="display:none;" aria-label="Close menu">&times;</button>
        <li><a href="{{ route('home', ['lang' => $lang]) }}">{{ __('school.nav.home') }}</a></li>
        <li><a href="{{ route('about', ['lang' => $lang]) }}">{{ __('school.nav.about') }}</a></li>
        
        {{-- Schools Dropdown --}}
        <li class="navbar__dropdown">
          <button type="button" class="navbar__dropdown-toggle {{ request()->routeIs('international-school') || request()->routeIs('preschool') ? 'active' : '' }}" aria-haspopup="true" aria-expanded="false">
            <span>{{ __('school.nav.schools') }}</span>
            <svg class="navbar__dropdown-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="m6 9 6 6 6-6"/>
            </svg>
          </button>
          <div class="navbar__dropdown-menu">
            <a href="{{ route('international-school', ['lang' => $lang]) }}" class="navbar__dropdown-item {{ request()->routeIs('international-school') ? 'active' : '' }}">
              <div class="navbar__dropdown-icon">🎓</div>
              <div>
                <div class="navbar__dropdown-title">{{ __('school.nav.international') }}</div>
                <div class="navbar__dropdown-desc">Grades 1 – 12 Cambridge Curriculum</div>
              </div>
            </a>
            <a href="{{ route('preschool', ['lang' => $lang]) }}" class="navbar__dropdown-item {{ request()->routeIs('preschool') ? 'active' : '' }}">
              <div class="navbar__dropdown-icon">🧸</div>
              <div>
                <div class="navbar__dropdown-title">{{ __('school.nav.preschool') }}</div>
                <div class="navbar__dropdown-desc">Ages 2.5 – 5 Early Years Development</div>
              </div>
            </a>
          </div>
        </li>

        <li><a href="{{ route('teachers', ['lang' => $lang]) }}">{{ __('school.nav.teachers') }}</a></li>
        <li><a href="{{ route('admissions', ['lang' => $lang]) }}">{{ __('school.nav.admissions') }}</a></li>
        <li><a href="{{ route('events', ['lang' => $lang]) }}">{{ __('school.nav.events') }}</a></li>
        <li><a href="{{ route('gallery', ['lang' => $lang]) }}">{{ __('school.nav.gallery') }}</a></li>
        <li><a href="{{ route('contact', ['lang' => $lang]) }}">{{ __('school.nav.contact') }}</a></li>
      </ul>

      {{-- Actions --}}
      <div class="navbar__actions">
        {{-- Language Switcher --}}
        <div class="lang-switcher" role="navigation" aria-label="Language switcher">
          <a href="{{ route($currentRouteName, array_merge($currentRouteParams, ['lang' => 'en'])) }}"
             class="{{ $lang === 'en' ? 'active' : '' }}"
             lang="en" hreflang="en">EN</a>
          <a href="{{ route($currentRouteName, array_merge($currentRouteParams, ['lang' => 'si'])) }}"
             class="{{ $lang === 'si' ? 'active' : '' }}"
             lang="si" hreflang="si">සිංහල</a>
        </div>

        <a href="{{ route('admissions', ['lang' => $lang]) }}" class="btn btn-accent btn-sm" style="display:none;" id="navCta">
          {{ __('school.sections.enquire_now') }}
        </a>

        {{-- Hamburger --}}
        <button class="navbar__toggle" id="navToggle" aria-label="Open menu" aria-expanded="false">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>
  </div>
</nav>

<script>
  // Show CTA after scroll
  window.addEventListener('scroll', function() {
    const cta = document.getElementById('navCta');
    if (cta) cta.style.display = window.scrollY > 300 ? 'inline-flex' : 'none';
  }, { passive: true });
  // Toggle
  const nt = document.getElementById('navToggle');
  const nm = document.getElementById('mainNav');
  if (nt && nm) {
    nt.addEventListener('click', function() {
      nm.classList.toggle('open');
      this.setAttribute('aria-expanded', nm.classList.contains('open'));
    });
  }
</script>
