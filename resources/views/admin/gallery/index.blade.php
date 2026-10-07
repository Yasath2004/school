@extends('layouts.admin')

@section('title', 'Campus Albums')
@section('page_title', 'Gallery & Campus Photos')

@section('content')
  <div class="admin-page-header">
    <h2 class="admin-page-title">Albums</h2>
    <a href="{{ route('admin.gallery.create') }}" class="admin-btn admin-btn-primary">+ Create Album</a>
  </div>

  <div class="admin-card">
    <div class="admin-card__body" style="padding: 0;">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Photos</th>
            <th>Visibility</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($albums as $album)
            <tr>
              <td><strong>{{ $album->title_en }}</strong></td>
              <td><span class="badge badge-blue">{{ ucfirst($album->category) }}</span></td>
              <td>{{ $album->images_count }} photos</td>
              <td>
                <span class="badge {{ $album->is_visible ? 'badge-green' : 'badge-gray' }}">
                  {{ $album->is_visible ? 'PUBLIC' : 'HIDDEN' }}
                </span>
              </td>
              <td style="display: flex; gap: 8px;">
                <a href="{{ route('admin.gallery.edit', $album) }}" class="admin-btn admin-btn-secondary admin-btn-sm">Manage Photos</a>
                <form action="{{ route('admin.gallery.destroy', $album) }}" method="POST" onsubmit="return confirm('Delete this album?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" style="text-align: center; color: var(--clr-text-light); padding: 32px;">No photo albums found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
