@extends('layouts.admin')

@section('title', isset($event) ? 'Edit Post' : 'New Event / News')
@section('page_title', isset($event) ? 'Edit Event or Announcement' : 'Create New Event / News')

@section('content')
  <div class="admin-card" style="max-width: 860px;">
    <div class="admin-card__header">
      <h3 class="admin-card__title">{{ isset($event) ? 'Edit: ' . $event->title_en : 'Create Post / Event' }}</h3>
      <a href="{{ route('admin.events.index') }}" class="admin-btn admin-btn-secondary admin-btn-sm">&larr; Back</a>
    </div>
    <div class="admin-card__body">
      <form action="{{ isset($event) ? route('admin.events.update', $event) : route('admin.events.store') }}" method="POST">
        @csrf
        @if(isset($event))
          @method('PUT')
        @endif

        <div class="admin-form-row">
          <div class="admin-form-group">
            <label class="admin-form-label">Type <span style="color:red;">*</span></label>
            <select name="type" class="admin-form-control" required>
              <option value="event" {{ old('type', $event->type ?? '') == 'event' ? 'selected' : '' }}>Campus Event (Calendar)</option>
              <option value="news" {{ old('type', $event->type ?? '') == 'news' ? 'selected' : '' }}>News / Announcement</option>
              <option value="achievement" {{ old('type', $event->type ?? '') == 'achievement' ? 'selected' : '' }}>Achievement / Milestone</option>
            </select>
          </div>
          <div class="admin-form-group">
            <label class="admin-form-label">Date & Time</label>
            <input type="datetime-local" name="event_date" class="admin-form-control" value="{{ old('event_date', isset($event) && $event->event_date ? $event->event_date->format('Y-m-d\TH:i') : '') }}">
          </div>
        </div>

        <div class="admin-form-row">
          <div class="admin-form-group">
            <label class="admin-form-label">Title (English) <span style="color:red;">*</span></label>
            <input type="text" name="title_en" class="admin-form-control" value="{{ old('title_en', $event->title_en ?? '') }}" required placeholder="e.g. Annual Literary & Arts Day">
          </div>
          <div class="admin-form-group">
            <label class="admin-form-label">Title (Sinhala)</label>
            <input type="text" name="title_si" class="admin-form-control" value="{{ old('title_si', $event->title_si ?? '') }}" placeholder="උදා: වාර්ෂික සාහිත්‍ය හා කලා දිනය">
          </div>
        </div>

        <div class="admin-form-row">
          <div class="admin-form-group">
            <label class="admin-form-label">Location (English)</label>
            <input type="text" name="location_en" class="admin-form-control" value="{{ old('location_en', $event->location_en ?? '') }}" placeholder="e.g. Main Auditorium, Colombo">
          </div>
          <div class="admin-form-group">
            <label class="admin-form-label">Location (Sinhala)</label>
            <input type="text" name="location_si" class="admin-form-control" value="{{ old('location_si', $event->location_si ?? '') }}" placeholder="උදා: ප්‍රධාන ශ්‍රවණාගාරය">
          </div>
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label">Description (English)</label>
          <textarea name="description_en" class="admin-form-control" rows="3">{{ old('description_en', $event->description_en ?? '') }}</textarea>
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label">Description (Sinhala)</label>
          <textarea name="description_si" class="admin-form-control" rows="3">{{ old('description_si', $event->description_si ?? '') }}</textarea>
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label">Status <span style="color:red;">*</span></label>
          <select name="status" class="admin-form-control" required>
            <option value="published" {{ old('status', $event->status ?? '') == 'published' ? 'selected' : '' }}>Published (Live on Website)</option>
            <option value="draft" {{ old('status', $event->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="archived" {{ old('status', $event->status ?? '') == 'archived' ? 'selected' : '' }}>Archived</option>
          </select>
        </div>

        <div style="margin-top: 24px; display: flex; gap: 12px;">
          <button type="submit" class="admin-btn admin-btn-primary">
            {{ isset($event) ? 'Update Post' : 'Save & Publish Post' }}
          </button>
          <a href="{{ route('admin.events.index') }}" class="admin-btn admin-btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
@endsection
