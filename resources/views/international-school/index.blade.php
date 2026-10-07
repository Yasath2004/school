@extends('layouts.app')

@section('title', 'International School — Chalk & Chauser')

@section('content')
  <div class="page-header">
    <div class="container reveal">
      <span class="section-eyebrow" style="color: var(--clr-accent);">Primary &amp; Secondary Education</span>
      <h1 style="color: white; margin-bottom: 16px;">International School</h1>
      <p style="color: rgba(255,255,255,0.8); max-width: 600px;">
        Providing structured Cambridge-aligned pathways from primary through secondary school, delivering world-class academic preparation.
      </p>
    </div>
  </div>

  <section class="section">
    <div class="container">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 32px;" class="reveal mb-4">
        <div class="card">
          <div class="card__body">
            <span class="card__label">Grades 1 – 5</span>
            <h3 class="card__title">Primary School</h3>
            <p class="card__text">
              Focuses on building solid literacy, numerical competence, scientific reasoning, and positive social habits through hands-on collaborative learning.
            </p>
          </div>
        </div>

        <div class="card">
          <div class="card__body">
            <span class="card__label">Grades 6 – 9</span>
            <h3 class="card__title">Junior Secondary</h3>
            <p class="card__text">
              Deepens critical inquiry across humanities, sciences, computing, and creative arts, preparing learners for demanding examination curriculums.
            </p>
          </div>
        </div>

        <div class="card">
          <div class="card__body">
            <span class="card__label">Grades 10 – 12</span>
            <h3 class="card__title">Senior Secondary</h3>
            <p class="card__text">
              Rigorous IGCSE / Advanced Level preparation with individual career counseling, university readiness workshops, and leadership portfolios.
            </p>
          </div>
        </div>
      </div>

      <div class="reveal mt-4">
        <span class="section-eyebrow">Academic Pillars</span>
        <h2 class="section-title">Curriculum &amp; Co-Curricular Enrichment</h2>
        <div class="why-grid">
          <div class="why-item">
            <h4 class="why-item__title">🧪 Science &amp; STEM Discovery</h4>
            <p class="why-item__text">Modern science laboratories equipped for experimental learning in Physics, Chemistry, Biology, and Robotics.</p>
          </div>
          <div class="why-item">
            <h4 class="why-item__title">🗣 English Language &amp; Oratory</h4>
            <p class="why-item__text">Public speaking, debates, drama festivals, and creative writing programs strengthening confident expression.</p>
          </div>
          <div class="why-item">
            <h4 class="why-item__title">⚽ Athletics &amp; Physical Fitness</h4>
            <p class="why-item__text">Cricket, badminton, swimming, track events, and sportsmanship values integrated weekly.</p>
          </div>
          <div class="why-item">
            <h4 class="why-item__title">🎨 Creative &amp; Performing Arts</h4>
            <p class="why-item__text">Music, traditional dance, painting, and visual arts studios encouraging personal expression.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
