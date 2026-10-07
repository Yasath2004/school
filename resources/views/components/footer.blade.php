@php $lang = app()->getLocale(); @endphp
<footer class="footer" role="contentinfo">
  <div class="container">
    <div class="footer__grid">

      {{-- Col 1: Brand --}}
      <div>
        <div class="footer__logo">
          <img src="/images/logo.jpg" alt="School logo" width="44" height="44">
          <div class="footer__logo-name">Chalk &amp; Chauser</div>
        </div>
        <p class="footer__tagline">&ldquo;{{ __('school.site_tagline') }}&rdquo;</p>
        <p class="footer__desc">An international school and preschool in Sri Lanka, committed to nurturing every child to reach their fullest potential.</p>
        <div class="footer__social" style="margin-top:16px;">
          <a href="#" aria-label="Facebook">f</a>
          <a href="#" aria-label="Instagram">in</a>
          <a href="#" aria-label="YouTube">▶</a>
          <a href="#" aria-label="WhatsApp">W</a>
        </div>
      </div>

      {{-- Col 2: Quick Links --}}
      <div>
        <h4 class="footer__heading">Quick Links</h4>
        <ul class="footer__links">
          <li><a href="{{ route('home', ['lang' => $lang]) }}">{{ __('school.nav.home') }}</a></li>
          <li><a href="{{ route('about', ['lang' => $lang]) }}">{{ __('school.nav.about') }}</a></li>
          <li><a href="{{ route('international-school', ['lang' => $lang]) }}">{{ __('school.nav.international') }}</a></li>
          <li><a href="{{ route('preschool', ['lang' => $lang]) }}">{{ __('school.nav.preschool') }}</a></li>
          <li><a href="{{ route('teachers', ['lang' => $lang]) }}">{{ __('school.nav.teachers') }}</a></li>
          <li><a href="{{ route('admissions', ['lang' => $lang]) }}">{{ __('school.nav.admissions') }}</a></li>
        </ul>
      </div>

      {{-- Col 3: School Life --}}
      <div>
        <h4 class="footer__heading">School Life</h4>
        <ul class="footer__links">
          <li><a href="{{ route('events', ['lang' => $lang]) }}">{{ __('school.nav.events') }}</a></li>
          <li><a href="{{ route('gallery', ['lang' => $lang]) }}">{{ __('school.nav.gallery') }}</a></li>
          <li><a href="{{ route('contact', ['lang' => $lang]) }}">{{ __('school.nav.contact') }}</a></li>
        </ul>
      </div>

      {{-- Col 4: Contact --}}
      <div>
        <h4 class="footer__heading">{{ __('school.contact.title') }}</h4>
        <ul class="footer__links">
          <li style="color:rgba(255,255,255,0.7);font-size:0.85rem;">📍 Sample Address, Colombo, Sri Lanka</li>
          <li><a href="tel:+94XXXXXXXXX">📞 +94 XX XXX XXXX</a></li>
          <li><a href="mailto:info@chalkchauser.lk">✉ info@chalkchauser.lk</a></li>
          <li style="color:rgba(255,255,255,0.7);font-size:0.85rem;">🕐 Mon–Fri: 7:30am – 4:30pm</li>
        </ul>
      </div>
    </div>

    <div class="footer__bottom">
      <span>&copy; {{ date('Y') }} Chalk &amp; Chauser International School. {{ __('school.footer.rights') }}</span>
      <span>Designed with ❤ for Sri Lanka's future</span>
    </div>
  </div>
</footer>
