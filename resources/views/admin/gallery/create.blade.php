@extends('layouts.admin')

@section('title', 'Create Album')
@section('page_title', 'New Campus Photo Album')

@section('content')
  <div class="admin-card" style="max-width: 860px;">
    <div class="admin-card__header">
      <h3 class="admin-card__title">Create Album</h3>
      <a href="{{ route('admin.gallery.index') }}" class="admin-btn admin-btn-secondary admin-btn-sm">&larr; Back</a>
    </div>
    <div class="admin-card__body">
      <form action="{{ route('admin.gallery.store') }}" method="POST">
        @csrf

        <div class="admin-form-row">
          <div class="admin-form-group">
            <label class="admin-form-label">Album Title (English) <span style="color:red;">*</span></label>
            <input type="text" name="title_en" class="admin-form-control" value="{{ old('title_en') }}" required placeholder="e.g. Science Laboratory Discoveries">
          </div>
          <div class="admin-form-group">
            <label class="admin-form-label">Album Title (Sinhala)</label>
            <input type="text" name="title_si" class="admin-form-control" value="{{ old('title_si') }}" placeholder="උදා: විද්‍යාගාර අත්දැකීම්">
          </div>
        </div>

        <div class="admin-form-row">
          <div class="admin-form-group">
            <label class="admin-form-label">Category <span style="color:red;">*</span></label>
            <select name="category" class="admin-form-control" required>
              <option value="campus">Campus & Grounds</option>
              <option value="classroom">Classroom & Academic</option>
              <option value="activities">Activities & Clubs</option>
              <option value="sports">Sports & Athletics</option>
              <option value="events">Events & Celebrations</option>
              <option value="preschool">Preschool & Early Years</option>
              <option value="international">International School</option>
            </select>
          </div>
          <div class="admin-form-group">
            <label class="admin-form-label">Cover Image URL</label>
            <input type="url" name="cover_image" class="admin-form-control" value="{{ old('cover_image') }}" placeholder="https://images.unsplash.com/...">
          </div>
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label">Album Description (English)</label>
          <textarea name="description_en" class="admin-form-control" rows="3">{{ old('description_en') }}</textarea>
        </div>

        <div class="admin-form-group" style="display:flex; align-items:center; gap:8px;">
          <label style="cursor:pointer; display:flex; align-items:center; gap:8px;">
            <input type="checkbox" name="is_visible" value="1" checked>
            <strong>Make Album Publicly Visible in Gallery</strong>
          </label>
        </div>

        <div style="margin-top: 24px; display: flex; gap: 12px;">
          <button type="submit" class="admin-btn admin-btn-primary">Create Album</button>
          <a href="{{ route('admin.gallery.index') }}" class="admin-btn admin-btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
@endsection
