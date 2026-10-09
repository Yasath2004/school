@extends('layouts.admin')

@section('title', 'Manage Photos: ' . $album->title_en)
@section('page_title', 'Manage Album Photos')

@section('content')
  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
    {{-- Edit Album Info --}}
    <div class="admin-card">
      <div class="admin-card__header">
        <h3 class="admin-card__title">Album Details</h3>
        <a href="{{ route('admin.gallery.index') }}" class="admin-btn admin-btn-secondary admin-btn-sm">&larr; Back</a>
      </div>
      <div class="admin-card__body">
        <form action="{{ route('admin.gallery.update', $album) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="admin-form-group">
            <label class="admin-form-label">Title (English) <span style="color:red;">*</span></label>
            <input type="text" name="title_en" class="admin-form-control" value="{{ old('title_en', $album->title_en) }}" required>
          </div>

          <div class="admin-form-group">
            <label class="admin-form-label">Category <span style="color:red;">*</span></label>
            <select name="category" class="admin-form-control" required>
              @foreach(['campus','classroom','activities','sports','events','preschool','international'] as $cat)
                <option value="{{ $cat }}" {{ $album->category == $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
              @endforeach
            </select>
          </div>

          <div class="admin-form-group">
            <label class="admin-form-label">Cover Image URL</label>
            <input type="url" name="cover_image" class="admin-form-control" value="{{ old('cover_image', $album->cover_image) }}">
          </div>

          <div class="admin-form-group">
            <label class="admin-form-label">Description (English)</label>
            <textarea name="description_en" class="admin-form-control" rows="2">{{ old('description_en', $album->description_en) }}</textarea>
          </div>

          <div class="admin-form-group">
            <label style="cursor:pointer; display:flex; align-items:center; gap:8px;">
              <input type="checkbox" name="is_visible" value="1" {{ $album->is_visible ? 'checked' : '' }}>
              <strong>Publicly Visible</strong>
            </label>
          </div>

          <button type="submit" class="admin-btn admin-btn-primary">Update Album Details</button>
        </form>
      </div>
    </div>

    {{-- Add Image Form --}}
    <div class="admin-card">
      <div class="admin-card__header">
        <h3 class="admin-card__title">Add Photo to Album</h3>
      </div>
      <div class="admin-card__body">
        <form action="{{ route('admin.gallery.images.upload', $album) }}" method="POST">
          @csrf
          <div class="admin-form-group">
            <label class="admin-form-label">Image URL <span style="color:red;">*</span></label>
            <input type="url" name="image_url" class="admin-form-control" required placeholder="https://images.unsplash.com/...">
          </div>
          <div class="admin-form-group">
            <label class="admin-form-label">Caption / Description</label>
            <input type="text" name="caption_en" class="admin-form-control" placeholder="e.g. Science lab experiments">
          </div>
          <button type="submit" class="admin-btn admin-btn-primary">+ Add Image</button>
        </form>

        <hr style="margin: 24px 0; border: none; border-top: 1px solid var(--clr-border);">

        <h4 style="font-size: 1rem; margin-bottom: 16px;">Photos in this Album ({{ $album->images->count() }})</h4>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); gap: 12px;">
          @forelse($album->images as $img)
            <div style="position: relative; border-radius: 8px; overflow: hidden; border: 1px solid #ddd;">
              <img src="{{ $img->image_path }}" style="width: 100%; height: 80px; object-fit: cover;">
              <form action="{{ route('admin.gallery.images.delete', [$album, $img]) }}" method="POST" onsubmit="return confirm('Remove photo?');" style="position: absolute; top: 4px; right: 4px;">
                @csrf
                @method('DELETE')
                <button type="submit" style="background: rgba(220,38,38,0.85); color:white; border:none; border-radius:50%; width:22px; height:22px; cursor:pointer; font-size:12px; display:flex; align-items:center; justify-content:center;">&times;</button>
              </form>
            </div>
          @empty
            <p style="color: #888; font-size: 0.85rem; grid-column: 1 / -1;">No photos added yet.</p>
          @endforelse
        </div>
      </div>
    </div>
  </div>
@endsection
