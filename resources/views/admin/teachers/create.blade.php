@extends('layouts.admin')

@section('title', isset($teacher) ? 'Edit Teacher' : 'New Teacher Profile')
@section('page_title', isset($teacher) ? 'Edit Faculty Member' : 'Add New Faculty Member')

@section('content')
  <div class="admin-card" style="max-width: 860px;">
    <div class="admin-card__header">
      <h3 class="admin-card__title">{{ isset($teacher) ? 'Edit: ' . $teacher->name : 'Add Faculty Profile' }}</h3>
      <a href="{{ route('admin.teachers.index') }}" class="admin-btn admin-btn-secondary admin-btn-sm">&larr; Back</a>
    </div>
    <div class="admin-card__body">
      <form action="{{ isset($teacher) ? route('admin.teachers.update', $teacher) : route('admin.teachers.store') }}" method="POST">
        @csrf
        @if(isset($teacher))
          @method('PUT')
        @endif

        <div class="admin-form-row">
          <div class="admin-form-group">
            <label class="admin-form-label">Full Name <span style="color:red;">*</span></label>
            <input type="text" name="name" class="admin-form-control" value="{{ old('name', $teacher->name ?? '') }}" required placeholder="e.g. Mrs. Sunethra Perera">
          </div>
          <div class="admin-form-group">
            <label class="admin-form-label">School Section <span style="color:red;">*</span></label>
            <select name="section" class="admin-form-control" required>
              <option value="international" {{ old('section', $teacher->section ?? '') == 'international' ? 'selected' : '' }}>International School</option>
              <option value="preschool" {{ old('section', $teacher->section ?? '') == 'preschool' ? 'selected' : '' }}>Preschool</option>
              <option value="both" {{ old('section', $teacher->section ?? '') == 'both' ? 'selected' : '' }}>Both</option>
            </select>
          </div>
        </div>

        <div class="admin-form-row">
          <div class="admin-form-group">
            <label class="admin-form-label">Designation / Role (English) <span style="color:red;">*</span></label>
            <input type="text" name="role_en" class="admin-form-control" value="{{ old('role_en', $teacher->role_en ?? '') }}" required placeholder="e.g. Senior Cambridge English Lecturer">
          </div>
          <div class="admin-form-group">
            <label class="admin-form-label">Designation / Role (Sinhala)</label>
            <input type="text" name="role_si" class="admin-form-control" value="{{ old('role_si', $teacher->role_si ?? '') }}" placeholder="උදා: ජ්‍යෙෂ්ඨ ඉංග්‍රීසි ආචාර්යවරිය">
          </div>
        </div>

        <div class="admin-form-row">
          <div class="admin-form-group">
            <label class="admin-form-label">Subject / Focus Area (English)</label>
            <input type="text" name="subject_en" class="admin-form-control" value="{{ old('subject_en', $teacher->subject_en ?? '') }}" placeholder="e.g. English Literature & Oratory">
          </div>
          <div class="admin-form-group">
            <label class="admin-form-label">Photo URL</label>
            <input type="url" name="photo" class="admin-form-control" value="{{ old('photo', $teacher->photo ?? '') }}" placeholder="https://images.unsplash.com/...">
          </div>
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label">Academic Qualifications (English)</label>
          <input type="text" name="qualifications_en" class="admin-form-control" value="{{ old('qualifications_en', $teacher->qualifications_en ?? '') }}" placeholder="e.g. BA (Hons) English, PGDE (UK), Cambridge Certified">
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label">Professional Biography (English)</label>
          <textarea name="bio_en" class="admin-form-control" rows="3">{{ old('bio_en', $teacher->bio_en ?? '') }}</textarea>
        </div>

        <div class="admin-form-row">
          <div class="admin-form-group">
            <label class="admin-form-label">Sort Order</label>
            <input type="number" name="sort_order" class="admin-form-control" value="{{ old('sort_order', $teacher->sort_order ?? 0) }}">
          </div>
          <div class="admin-form-group" style="display:flex; align-items:center; gap:10px; margin-top:28px;">
            <label style="cursor:pointer; display:flex; align-items:center; gap:8px;">
              <input type="checkbox" name="is_visible" value="1" {{ old('is_visible', $teacher->is_visible ?? true) ? 'checked' : '' }}>
              <strong>Display Profile on Website</strong>
            </label>
          </div>
        </div>

        <div style="margin-top: 24px; display: flex; gap: 12px;">
          <button type="submit" class="admin-btn admin-btn-primary">
            {{ isset($teacher) ? 'Update Faculty Profile' : 'Save Teacher Profile' }}
          </button>
          <a href="{{ route('admin.teachers.index') }}" class="admin-btn admin-btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
@endsection
