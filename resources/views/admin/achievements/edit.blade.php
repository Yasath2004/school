@extends('layouts.admin')

@section('title', isset($achievement) ? 'Edit Achievement' : 'Record Achievement')
@section('page_title', isset($achievement) ? 'Edit School Milestone' : 'Record School Achievement')

@section('content')
  <div class="admin-card" style="max-width: 860px;">
    <div class="admin-card__header">
      <h3 class="admin-card__title">{{ isset($achievement) ? 'Edit: ' . $achievement->title_en : 'Record Milestone / Award' }}</h3>
      <a href="{{ route('admin.achievements.index') }}" class="admin-btn admin-btn-secondary admin-btn-sm">&larr; Back</a>
    </div>
    <div class="admin-card__body">
      <form action="{{ isset($achievement) ? route('admin.achievements.update', $achievement) : route('admin.achievements.store') }}" method="POST">
        @csrf
        @if(isset($achievement))
          @method('PUT')
        @endif

        <div class="admin-form-row">
          <div class="admin-form-group">
            <label class="admin-form-label">Title (English) <span style="color:red;">*</span></label>
            <input type="text" name="title_en" class="admin-form-control" value="{{ old('title_en', $achievement->title_en ?? '') }}" required placeholder="e.g. National Robotics Championship — 1st Place">
          </div>
          <div class="admin-form-group">
            <label class="admin-form-label">Title (Sinhala)</label>
            <input type="text" name="title_si" class="admin-form-control" value="{{ old('title_si', $achievement->title_si ?? '') }}" placeholder="උදා: ජාතික රොබෝ තාක්ෂණ තරගාවලිය — ප්‍රථම ස්ථානය">
          </div>
        </div>

        <div class="admin-form-row">
          <div class="admin-form-group">
            <label class="admin-form-label">Award Date</label>
            <input type="date" name="event_date" class="admin-form-control" value="{{ old('event_date', isset($achievement) && $achievement->event_date ? $achievement->event_date->format('Y-m-d') : '') }}">
          </div>
          <div class="admin-form-group">
            <label class="admin-form-label">Status <span style="color:red;">*</span></label>
            <select name="status" class="admin-form-control" required>
              <option value="published" {{ old('status', $achievement->status ?? '') == 'published' ? 'selected' : '' }}>Published (Live on Website)</option>
              <option value="draft" {{ old('status', $achievement->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
              <option value="archived" {{ old('status', $achievement->status ?? '') == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
          </div>
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label">Description (English)</label>
          <textarea name="description_en" class="admin-form-control" rows="3">{{ old('description_en', $achievement->description_en ?? '') }}</textarea>
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label">Description (Sinhala)</label>
          <textarea name="description_si" class="admin-form-control" rows="3">{{ old('description_si', $achievement->description_si ?? '') }}</textarea>
        </div>

        <div style="margin-top: 24px; display: flex; gap: 12px;">
          <button type="submit" class="admin-btn admin-btn-primary">
            {{ isset($achievement) ? 'Update Milestone' : 'Record Achievement' }}
          </button>
          <a href="{{ route('admin.achievements.index') }}" class="admin-btn admin-btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
@endsection
