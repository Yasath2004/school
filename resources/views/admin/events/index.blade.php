@extends('layouts.admin')

@section('title', 'Events, News & Posts')
@section('page_title', 'Campus Events & Announcements')

@section('content')
  <div class="admin-page-header">
    <h2 class="admin-page-title">All Posts &amp; Events</h2>
    <a href="{{ route('admin.events.create') }}" class="admin-btn admin-btn-primary">+ Add New Item</a>
  </div>

  <div class="admin-card">
    <div class="admin-card__body" style="padding: 0;">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Date</th>
            <th>Title</th>
            <th>Type</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($events as $event)
            <tr>
              <td>{{ $event->event_date ? $event->event_date->format('M d, Y') : '—' }}</td>
              <td><strong>{{ $event->title_en }}</strong></td>
              <td><span class="badge badge-blue">{{ strtoupper($event->type) }}</span></td>
              <td>
                <span class="badge {{ $event->status == 'published' ? 'badge-green' : ($event->status == 'draft' ? 'badge-yellow' : 'badge-gray') }}">
                  {{ strtoupper($event->status) }}
                </span>
              </td>
              <td style="display: flex; gap: 8px;">
                <a href="{{ route('admin.events.edit', $event) }}" class="admin-btn admin-btn-secondary admin-btn-sm">Edit</a>
                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Delete this post?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" style="text-align: center; color: var(--clr-text-light); padding: 32px;">No posts or events recorded.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
