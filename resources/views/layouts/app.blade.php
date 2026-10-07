<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Chalk & Chauser International School') — Dedicated to Standards of Excellence</title>
  <meta name="description" content="@yield('meta_description', 'Chalk & Chauser International School and Preschool in Sri Lanka. Dedicated to Standards of Excellence. Bilingual English & Sinhala education.')">
  <meta name="keywords" content="Chalk Chauser International School, Sri Lanka school, preschool Sri Lanka, bilingual school">
  <meta property="og:title" content="@yield('title', 'Chalk & Chauser International School')">
  <meta property="og:description" content="@yield('meta_description', 'Dedicated to Standards of Excellence')">
  <meta property="og:type" content="website">
  <link rel="icon" type="image/jpeg" href="/images/logo.jpg">
  <link rel="stylesheet" href="/css/school.css">
  @stack('head')
</head>
<body>

  {{-- Navigation --}}
  @include('components.nav')

  {{-- Main Content --}}
  <main id="main">
    @yield('content')
  </main>

  {{-- Footer --}}
  @include('components.footer')

  {{-- Lightbox --}}
  <div class="lightbox" id="lightbox" role="dialog" aria-modal="true" aria-label="Image viewer">
    <div class="lightbox__inner">
      <button class="lightbox__close" aria-label="Close">&times;</button>
      <img class="lightbox__img" src="" alt="Gallery image">
    </div>
  </div>

  <script src="/js/school.js"></script>
  @stack('scripts')
</body>
</html>
