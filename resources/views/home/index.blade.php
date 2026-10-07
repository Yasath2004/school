@extends('layouts.app')

@section('title', 'Chalk & Chauser International School & Preschool')

@section('content')
  {{-- Hero Section --}}
  <section class="hero">
    <div class="hero__bg"></div>
    <div class="container hero__content">
      <div class="reveal">
        <div class="hero__badge">
          ✨ {{ __('school.sections.intake_badge') }} • 2025/2026 Admissions
        </div>
        <h1 class="hero__headline">
          {!! __('school.hero.headline') !!}
        </h1>
        <p class="hero__subtext">
          {{ __('school.hero.subtext') }}
        </p>
        <div class="hero__actions">
          <a href="{{ route('admissions', ['lang' => $lang]) }}" class="btn btn-accent btn-lg">
            {{ __('school.hero.cta_primary') }}
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
          <a href="{{ route('about', ['lang' => $lang]) }}" class="btn btn-white btn-lg">
            {{ __('school.hero.cta_secondary') }}
          </a>
        </div>
      </div>
    </div>
    <div class="hero__scroll">
      <span>Scroll</span>
      <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
    </div>
  </section>

  {{-- Two School Sections Chooser --}}
  <section class="section" style="background: white;">
    <div class="container">
      <div class="reveal text-center mb-4">
        <span class="section-eyebrow">Academic Pathways</span>
        <h2 class="section-title">Two Dedicated Learning Environments</h2>
        <p class="section-subtitle" style="margin: 0 auto;">Designed specifically for each developmental stage, providing continuous growth from foundation to Cambridge International standards.</p>
      </div>

      <div class="school-chooser reveal">
        {{-- International School --}}
        <div class="school-chooser__item" onclick="window.location='{{ route('international-school', ['lang' => $lang]) }}'">
          <div class="school-chooser__bg">
            <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=1200&q=80" alt="International School Classroom" loading="lazy">
          </div>
          <div class="school-chooser__content">
            <span class="school-chooser__tag">Primary to Senior Secondary</span>
            <h3 class="school-chooser__title">International School</h3>
            <p class="school-chooser__desc">Globally benchmarked curriculum, state-of-the-art science labs, and holistic enrichment preparing students for world-class universities.</p>
            <div>
              <span class="btn btn-white btn-sm">{{ __('school.sections.learn_more') }} &rarr;</span>
            </div>
          </div>
        </div>

        {{-- Preschool --}}
        <div class="school-chooser__item" onclick="window.location='{{ route('preschool', ['lang' => $lang]) }}'">
          <div class="school-chooser__bg">
            <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1200&q=80" alt="Preschool Learning Space" loading="lazy">
          </div>
          <div class="school-chooser__content">
            <span class="school-chooser__tag">Ages 2.5 – 5 Years</span>
            <h3 class="school-chooser__title">Early Learning Preschool</h3>
            <p class="school-chooser__desc">Play-based, child-centered early childhood development cultivating curiosity, social confidence, and foundational literacy & numeracy.</p>
            <div>
              <span class="btn btn-white btn-sm">{{ __('school.sections.learn_more') }} &rarr;</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Current Intake Banner --}}
  @if($openIntakes->count() > 0)
    <section class="section" style="padding-top: 0;">
      <div class="container">
        @foreach($openIntakes as $intake)
          <div class="intake-banner reveal">
            <div class="intake-banner__badge">
              ● Admissions Notice
            </div>
            <h3 class="intake-banner__title">{{ $intake->title() }}</h3>
            <p class="intake-banner__subtitle">{{ $intake->description() ?: 'Applications are currently being reviewed on a rolling basis. Limited places available per class.' }}</p>
            <div style="display: flex; gap: 16px; flex-wrap: wrap; align-items: center;">
              <a href="{{ route('admissions', ['lang' => $lang]) }}" class="btn btn-accent">
                {{ __('school.sections.enquire_now') }}
              </a>
              @if($intake->grades_ages_en)
                <span style="font-size: 0.85rem; color: rgba(255,255,255,0.85);">
                  Target: <strong>{{ app()->getLocale() == 'si' && $intake->grades_ages_si ? $intake->grades_ages_si : $intake->grades_ages_en }}</strong>
                </span>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </section>
  @endif

  {{-- Why Choose Us (Editorial Grid) --}}
  <section class="section">
    <div class="container">
      <div class="reveal mb-4">
        <span class="section-eyebrow">The Chalk &amp; Chauser Distinction</span>
        <h2 class="section-title">Rooted in Heritage. Geared for Tomorrow.</h2>
        <p class="section-subtitle">We balance British educational heritage with genuine Sri Lankan warmth and values.</p>
      </div>

      <div class="why-grid reveal">
        <div class="why-item">
          <div class="why-item__icon">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
          </div>
          <h4 class="why-item__title">Academic Rigor &amp; Individual Care</h4>
          <p class="why-item__text">Small student-to-teacher ratios ensure tailored academic roadmaps, continuous assessment, and close mentorship.</p>
        </div>

        <div class="why-item">
          <div class="why-item__icon">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/></svg>
          </div>
          <h4 class="why-item__title">Bilingual Cultural Grounding</h4>
          <p class="why-item__text">Fluency in English as the primary medium, supported by comprehensive Sinhala language appreciation and cultural identity.</p>
        </div>

        <div class="why-item">
          <div class="why-item__icon">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
          </div>
          <h4 class="why-item__title">Safe, Purpose-Built Campus</h4>
          <p class="why-item__text">Modern indoor & outdoor play zones, STEM labs, library resources, and dedicated sports infrastructure.</p>
        </div>

        <div class="why-item">
          <div class="why-item__icon">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
          <h4 class="why-item__title">Emotional Well-being &amp; Values</h4>
          <p class="why-item__text">Character building inspired by our motto "Dedicated to Standards of Excellence", cultivating empathy, integrity, and discipline.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- Teachers Preview --}}
  @if($teachers->count() > 0)
    <section class="section" style="background: white;">
      <div class="container">
        <div class="reveal d-flex justify-between align-center mb-4" style="flex-wrap: wrap; gap: 16px;">
          <div>
            <span class="section-eyebrow">Faculty</span>
            <h2 class="section-title">Led by Dedicated Educators</h2>
          </div>
          <a href="{{ route('teachers', ['lang' => $lang]) }}" class="btn btn-outline btn-sm">
            View All Faculty &rarr;
          </a>
        </div>

        <div class="reveal" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 24px;">
          @foreach($teachers as $teacher)
            <div class="teacher-card">
              <div class="teacher-card__photo">
                @if($teacher->photo)
                  <img src="{{ $teacher->photo }}" alt="{{ $teacher->name }}">
                @else
                  <div class="teacher-card__photo-placeholder">🎓</div>
                @endif
              </div>
              <div class="teacher-card__body">
                <h4 class="teacher-card__name">{{ $teacher->name }}</h4>
                <div class="teacher-card__role">{{ $teacher->role() }}</div>
                <div class="teacher-card__section">{{ strtoupper($teacher->section) }}</div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  {{-- Admissions CTA --}}
  <section class="section" style="background: var(--clr-primary-dark); color: white; text-align: center;">
    <div class="container reveal">
      <h2 style="color: white; margin-bottom: 16px;">Ready to Begin Your Child's Journey?</h2>
      <p style="color: rgba(255,255,255,0.8); max-width: 600px; margin: 0 auto 32px; font-size: 1.1rem;">
        Speak directly with our academic coordinators and discover how our community will support your child's highest aspirations.
      </p>
      <a href="{{ route('admissions', ['lang' => $lang]) }}" class="btn btn-accent btn-lg">
        {{ __('school.hero.cta_primary') }}
      </a>
    </div>
  </section>
@endsection
