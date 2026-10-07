@extends('layouts.admin')

@section('title', 'Admissions Intakes')
@section('page_title', 'Manage Admissions Intakes')

@section('content')
  <div class="admin-page-header">
    <h2 class="admin-page-title">Intake Notices</h2>
    <a href="{{ route('admin.intakes.create') }}" class="admin-btn admin-btn-primary">+ New Intake</a>
  </div>

  <div class="admin-card">
    <div class="admin-card__body" style="padding: 0;">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Section</th>
            <th>Ages / Grades</th>
            <th>Academic Year</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($intakes as $intake)
            <tr>
              <td><strong>{{ $intake->title_en }}</strong></td>
              <td><span class="badge badge-blue">{{ ucfirst($intake->section) }}</span></td>
              <td>{{ $intake->grades_ages_en ?: '—' }}</td>
              <td>{{ $intake->academic_year ?: '—' }}</td>
              <td>
                <span class="badge {{ $intake->status == 'open' ? 'badge-green' : ($intake->status == 'closed' ? 'badge-yellow' : 'badge-gray') }}">
                  {{ strtoupper($intake->status) }}
                </span>
              </td>
              <td style="display: flex; gap: 8px;">
                <a href="{{ route('admin.intakes.edit', $intake) }}" class="admin-btn admin-btn-secondary admin-btn-sm">Edit</a>
                <form action="{{ route('admin.intakes.destroy', $intake) }}" method="POST" onsubmit="return confirm('Delete intake notice?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" style="text-align: center; color: var(--clr-text-light); padding: 32px;">No intake records created yet.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
