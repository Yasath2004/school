@extends('layouts.app')

@section('title', 'Faculty & Educators — Chalk & Chauser')

@section('content')
  <div class="page-header">
    <div class="container reveal">
      <span class="section-eyebrow" style="color: var(--clr-accent);">Leadership &amp; Faculty</span>
      <h1 style="color: white; margin-bottom: 16px;">Our Educators</h1>
      <p style="color: rgba(255,255,255,0.8); max-width: 600px;">
        Qualified, passionate mentors who inspire excellence, nurture curiosity, and uphold the highest pedagogical standards.
      </p>
    </div>
  </div>

  <section class="section">
    <div class="container">
      {{-- International School Teachers --}}
      <div class="reveal mb-4">
        <span class="section-eyebrow">Academic Department</span>
        <h2 class="section-title">International School Faculty</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 24px;" class="mt-2">
          @forelse($internationalTeachers as $teacher)
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
                @if($teacher->subject_en)
                  <div style="font-size: 0.8rem; color: var(--clr-text-light);">{{ $teacher->subject_en }}</div>
                @endif
                @if($teacher->qualifications_en)
                  <div style="font-size: 0.75rem; color: var(--clr-primary); margin-top: 6px; font-weight: 500;">
                    {{ $teacher->qualifications_en }}
                  </div>
                @endif
              </div>
            </div>
          @empty
            <p style="color: var(--clr-text-light);">Faculty profiles are being updated.</p>
          @endforelse
        </div>
      </div>

      {{-- Preschool Teachers --}}
      <div class="reveal mt-4">
        <span class="section-eyebrow">Early Years Specialists</span>
        <h2 class="section-title">Preschool Educators</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 24px;" class="mt-2">
          @forelse($preschoolTeachers as $teacher)
            <div class="teacher-card">
              <div class="teacher-card__photo">
                @if($teacher->photo)
                  <img src="{{ $teacher->photo }}" alt="{{ $teacher->name }}">
                @else
                  <div class="teacher-card__photo-placeholder">🧸</div>
                @endif
              </div>
              <div class="teacher-card__body">
                <h4 class="teacher-card__name">{{ $teacher->name }}</h4>
                <div class="teacher-card__role">{{ $teacher->role() }}</div>
                @if($teacher->qualifications_en)
                  <div style="font-size: 0.75rem; color: var(--clr-primary); margin-top: 6px; font-weight: 500;">
                    {{ $teacher->qualifications_en }}
                  </div>
                @endif
              </div>
            </div>
          @empty
            <p style="color: var(--clr-text-light);">Preschool educator profiles are being updated.</p>
          @endforelse
        </div>
      </div>
    </div>
  </section>
@endsection
