@extends('layouts.app')

@section('title', 'Events, News & Milestones — Chalk & Chauser')

@section('content')
  <div class="page-header">
    <div class="container reveal">
      <span class="section-eyebrow" style="color: var(--clr-accent);">Campus Life</span>
      <h1 style="color: white; margin-bottom: 16px;">Events, News &amp; Achievements</h1>
      <p style="color: rgba(255,255,255,0.8); max-width: 600px;">
        Stay updated with recent celebrations, competitive triumphs, and upcoming school calendar activities.
      </p>
    </div>
  </div>

  <section class="section">
    <div class="container">
      {{-- Upcoming Events --}}
      <div class="reveal mb-4">
        <span class="section-eyebrow">Mark Your Calendar</span>
        <h2 class="section-title">Upcoming Events</h2>

        <div style="display: grid; gap: 16px;" class="mt-2">
          @forelse($events as $event)
            <div class="event-card">
              <div class="event-card__date">
                <div class="event-card__day">{{ $event->event_date ? $event->event_date->format('d') : '—' }}</div>
                <div class="event-card__month">{{ $event->event_date ? $event->event_date->format('M') : 'TBA' }}</div>
              </div>
              <div>
                <h4 class="event-card__title">{{ $event->title() }}</h4>
                <div class="event-card__meta">
                  @if($event->location())
                    <span>📍 {{ $event->location() }}</span>
                  @endif
                  @if($event->event_date)
                    <span>🕐 {{ $event->event_date->format('h:i A') }}</span>
                  @endif
                </div>
                <p class="event-card__desc">{{ $event->description() }}</p>
              </div>
            </div>
          @empty
            <p style="color: var(--clr-text-light);">No scheduled public events at this time.</p>
          @endforelse
        </div>
      </div>

      {{-- News & Announcements --}}
      @if($news->count() > 0)
        <div class="reveal mt-4">
          <span class="section-eyebrow">Bulletin</span>
          <h2 class="section-title">Latest News &amp; Announcements</h2>
          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;" class="mt-2">
            @foreach($news as $item)
              <div class="card">
                <div class="card__body">
                  <span class="card__label">{{ $item->event_date ? $item->event_date->format('M d, Y') : 'News' }}</span>
                  <h4 class="card__title">{{ $item->title() }}</h4>
                  <p class="card__text">{{ $item->description() }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endif

      {{-- School Achievements --}}
      @if($achievements->count() > 0)
        <div class="reveal mt-4">
          <span class="section-eyebrow">Excellence</span>
          <h2 class="section-title">Recent Achievements &amp; Awards</h2>
          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;" class="mt-2">
            @foreach($achievements as $ach)
              <div class="card" style="border-top: 4px solid var(--clr-accent);">
                <div class="card__body">
                  <span class="card__label" style="color: var(--clr-accent-dark);">🏆 Milestone</span>
                  <h4 class="card__title">{{ $ach->title() }}</h4>
                  <p class="card__text">{{ $ach->description() }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endif
    </div>
  </section>
@endsection
