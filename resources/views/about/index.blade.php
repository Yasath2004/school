@extends('layouts.app')

@section('title', 'About Us — Chalk & Chauser International School')

@section('content')
  <div class="page-header">
    <div class="container reveal">
      <span class="section-eyebrow" style="color: var(--clr-accent);">Who We Are</span>
      <h1 style="color: white; margin-bottom: 16px;">About Chalk &amp; Chauser</h1>
      <p style="color: rgba(255,255,255,0.8); max-width: 600px;">
        An institution dedicated to the pursuit of knowledge, timeless values, and comprehensive child development in Sri Lanka.
      </p>
    </div>
  </div>

  <section class="section">
    <div class="container">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 48px; align-items: center;" class="mb-4">
        <div class="reveal">
          <span class="section-eyebrow">Our Vision &amp; Mission</span>
          <h2 class="section-title">Dedicated to Standards of Excellence</h2>
          <p>
            Chalk &amp; Chauser International School was established with a singular conviction: that academic distinction and compassionate character development should go hand in hand.
          </p>
          <p>
            Drawing inspiration from classical learning traditions symbolized by Chaucer's literary heritage, alongside modern inquiry-based methods, our learners cultivate curiosity, articulate thinking, and resilient problem-solving abilities.
          </p>
          <div style="border-left: 3px solid var(--clr-accent); padding-left: 16px; margin: 24px 0; font-style: italic;">
            "We do not merely prepare students for examinations; we prepare them to navigate and uplift society with confidence, wisdom, and moral compass."
          </div>
        </div>
        <div class="reveal">
          <div style="border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-lg);">
            <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=800&q=80" alt="Students in Classroom" loading="lazy">
          </div>
        </div>
      </div>

      <div class="why-grid reveal mt-4">
        <div class="why-item">
          <h4 class="why-item__title">🌟 Vision</h4>
          <p class="why-item__text">To be a premier benchmark of holistic education in Sri Lanka, producing articulate, compassionate, and globally competent citizens.</p>
        </div>
        <div class="why-item">
          <h4 class="why-item__title">🎯 Mission</h4>
          <p class="why-item__text">To inspire curiosity, ignite critical intellect, and foster high ethical standards within an inclusive, warm, and supportive bilingual learning environment.</p>
        </div>
        <div class="why-item">
          <h4 class="why-item__title">💡 Core Values</h4>
          <p class="why-item__text">Integrity, Excellence, Empathy, Intellectual Curiosity, and Respect for our multicultural heritage.</p>
        </div>
        <div class="why-item">
          <h4 class="why-item__title">🏫 Community</h4>
          <p class="why-item__text">A collaborative partnership between educators, parents, and learners that nurtures long-term growth and emotional well-being.</p>
        </div>
      </div>
    </div>
  </section>
@endsection
