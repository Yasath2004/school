@extends('layouts.app')

@section('title', 'Preschool & Early Years — Chalk & Chauser')

@section('content')
  <div class="page-header">
    <div class="container reveal">
      <span class="section-eyebrow" style="color: var(--clr-accent);">Early Childhood Development</span>
      <h1 style="color: white; margin-bottom: 16px;">Chalk &amp; Chauser Preschool</h1>
      <p style="color: rgba(255,255,255,0.8); max-width: 600px;">
        A warm, joyful, and stimulating foundation where young minds discover the joy of learning through play, sensory exploration, and loving guidance.
      </p>
    </div>
  </div>

  <section class="section">
    <div class="container">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 48px; align-items: center;" class="mb-4">
        <div class="reveal">
          <span class="section-eyebrow">A Nurturing Environment</span>
          <h2 class="section-title">Where Every Day is an Adventure in Discovery</h2>
          <p>
            At Chalk &amp; Chauser Preschool, we honor early childhood as a unique and precious window of development. Our play-informed pedagogy allows children to explore concepts through sensory activities, storytelling, music, and guided play.
          </p>
          <p>
            We cultivate early communication in both English and Sinhala, enabling children to express ideas, resolve conflicts gently, and build joyful friendships.
          </p>
        </div>
        <div class="reveal">
          <div style="border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-lg);">
            <img src="https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=800&q=80" alt="Preschool Activities" loading="lazy">
          </div>
        </div>
      </div>

      <div class="reveal mt-4">
        <span class="section-eyebrow">Age Groups</span>
        <h2 class="section-title">Our Learning Levels</h2>
        <div class="why-grid">
          <div class="why-item">
            <h4 class="why-item__title">🧸 Playgroup (2.5 – 3 Years)</h4>
            <p class="why-item__text">Separation ease, social awareness, sensory exploration, movement coordination, and musical rhythms.</p>
          </div>
          <div class="why-item">
            <h4 class="why-item__title">🎨 Nursery (3 – 4 Years)</h4>
            <p class="why-item__text">Early phonics readiness, vocabulary expansion, fine motor precision, sharing, and imaginative dramatic play.</p>
          </div>
          <div class="why-item">
            <h4 class="why-item__title">📚 Kindergarten / Pre-Prep (4 – 5 Years)</h4>
            <p class="why-item__text">Early reading &amp; writing skills, foundational numeracy, scientific inquiry, and confidence transition to Grade 1.</p>
          </div>
          <div class="why-item">
            <h4 class="why-item__title">🌳 Safe Sensory Playground</h4>
            <p class="why-item__text">Dedicated child-safe outdoor equipment, splash pool time, sand discovery, and physical balance tracks.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
