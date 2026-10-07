@extends('layouts.admin')

@section('title', 'Staff & Faculty Management')
@section('page_title', 'Teachers & Faculty Profiles')

@section('content')
  <div class="admin-page-header">
    <h2 class="admin-page-title">Faculty Roster</h2>
    <a href="{{ route('admin.teachers.create') }}" class="admin-btn admin-btn-primary">+ Add Teacher</a>
  </div>

  <div class="admin-card">
    <div class="admin-card__body" style="padding: 0;">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Section</th>
            <th>Subject</th>
            <th>Visible</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($teachers as $teacher)
            <tr>
              <td><strong>{{ $teacher->name }}</strong></td>
              <td>{{ $teacher->role_en }}</td>
              <td><span class="badge badge-blue">{{ ucfirst($teacher->section) }}</span></td>
              <td>{{ $teacher->subject_en ?: '—' }}</td>
              <td>
                <span class="badge {{ $teacher->is_visible ? 'badge-green' : 'badge-gray' }}">
                  {{ $teacher->is_visible ? 'VISIBLE' : 'HIDDEN' }}
                </span>
              </td>
              <td style="display: flex; gap: 8px;">
                <form action="{{ route('admin.teachers.toggle', $teacher) }}" method="POST">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="admin-btn admin-btn-secondary admin-btn-sm">
                    {{ $teacher->is_visible ? 'Hide' : 'Show' }}
                  </button>
                </form>
                <a href="{{ route('admin.teachers.edit', $teacher) }}" class="admin-btn admin-btn-secondary admin-btn-sm">Edit</a>
                <form action="{{ route('admin.teachers.destroy', $teacher) }}" method="POST" onsubmit="return confirm('Remove teacher?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" style="text-align: center; color: var(--clr-text-light); padding: 32px;">No teachers listed.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
