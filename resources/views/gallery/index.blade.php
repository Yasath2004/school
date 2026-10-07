@extends('layouts.app')

@section('title', 'Campus Gallery — Chalk & Chauser')

@section('content')
  <div class="page-header">
    <div class="container reveal">
      <span class="section-eyebrow" style="color: var(--clr-accent);">Visual Moments</span>
      <h1 style="color: white; margin-bottom: 16px;">Campus Gallery</h1>
      <p style="color: rgba(255,255,255,0.8); max-width: 600px;">
        A glimpse into daily life, classroom discoveries, sports, and celebrations at Chalk &amp; Chauser.
      </p>
    </div>
  </div>

  <section class="section">
    <div class="container">
      {{-- Filter tabs --}}
      <div class="reveal mb-4" style="display: flex; gap: 8px; flex-wrap: wrap; justify-content: center;">
        <button class="btn btn-outline btn-sm active" data-filter="all">All Albums</button>
        @foreach($categories as $cat)
          <button class="btn btn-outline btn-sm" data-filter="{{ $cat }}">{{ ucfirst($cat) }}</button>
        @endforeach
      </div>

      {{-- Gallery items --}}
      <div class="gallery-masonry reveal">
        @forelse($albums as $album)
          <div class="gallery-item" data-category="{{ $album->category }}" data-lightbox="{{ $album->cover_image ?: ($album->images->first()->image_path ?? '') }}">
            <img src="{{ $album->cover_image ?: ($album->images->first()->image_path ?? 'https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=600&q=80') }}" alt="{{ $album->title() }}" loading="lazy">
            <div class="gallery-item__overlay">
              <h4 style="color: white; margin-bottom: 4px;">{{ $album->title() }}</h4>
              <span style="font-size: 0.8rem; color: var(--clr-accent);">{{ ucfirst($album->category) }} • {{ $album->images->count() }} Photos</span>
            </div>
          </div>
        @empty
          <p style="color: var(--clr-text-light); text-align: center; grid-column: 1 / -1;">No gallery albums uploaded yet.</p>
        @endforelse
      </div>
    </div>
  </section>
@endsection
