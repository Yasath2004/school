@extends('layouts.admin')

@section('title', 'Achievements & Honors')
@section('page_title', 'School Milestones & Honors')

@section('content')
  <div class="admin-page-header">
    <h2 class="admin-page-title">Honors &amp; Awards</h2>
    <a href="{{ route('admin.achievements.create') }}" class="admin-btn admin-btn-primary">+ Add Achievement</a>
  </div>

  <div class="admin-card">
    <div class="admin-card__body" style="padding: 0;">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Date</th>
            <th>Title</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($achievements as $ach)
            <tr>
              <td>{{ $ach->event_date ? $ach->event_date->format('M d, Y') : '—' }}</td>
              <td><strong>{{ $ach->title_en }}</strong></td>
              <td>
                <span class="badge {{ $ach->status == 'published' ? 'badge-green' : 'badge-yellow' }}">
                  {{ strtoupper($ach->status) }}
                </span>
              </td>
              <td style="display: flex; gap: 8px;">
                <a href="{{ route('admin.achievements.edit', $ach) }}" class="admin-btn admin-btn-secondary admin-btn-sm">Edit</a>
                <form action="{{ route('admin.achievements.destroy', $ach) }}" method="POST" onsubmit="return confirm('Remove achievement record?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" style="text-align: center; color: var(--clr-text-light); padding: 32px;">No achievements registered.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
