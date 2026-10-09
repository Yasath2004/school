@extends('layouts.admin')

@section('title', isset($intake) ? 'Edit Intake' : 'New Intake')
@section('page_title', isset($intake) ? 'Edit Admissions Intake' : 'Create New Admissions Intake')

@section('content')
  <div class="admin-card" style="max-width: 860px;">
    <div class="admin-card__header">
      <h3 class="admin-card__title">{{ isset($intake) ? 'Edit Intake: ' . $intake->title_en : 'Create Intake Notice' }}</h3>
      <a href="{{ route('admin.intakes.index') }}" class="admin-btn admin-btn-secondary admin-btn-sm">&larr; Back</a>
    </div>
    <div class="admin-card__body">
      <form action="{{ isset($intake) ? route('admin.intakes.update', $intake) : route('admin.intakes.store') }}" method="POST">
        @csrf
        @if(isset($intake))
          @method('PUT')
        @endif

        <div class="admin-form-row">
          <div class="admin-form-group">
            <label class="admin-form-label">Title (English) <span style="color:red;">*</span></label>
            <input type="text" name="title_en" class="admin-form-control" value="{{ old('title_en', $intake->title_en ?? '') }}" required placeholder="e.g. 2026/2027 Academic Year Intake">
          </div>
          <div class="admin-form-group">
            <label class="admin-form-label">Title (Sinhala)</label>
            <input type="text" name="title_si" class="admin-form-control" value="{{ old('title_si', $intake->title_si ?? '') }}" placeholder="උදා: 2026/2027 නව සිසුන් ඇතුළත් කරගැනීම">
          </div>
        </div>

        <div class="admin-form-row">
          <div class="admin-form-group">
            <label class="admin-form-label">School Section <span style="color:red;">*</span></label>
            <select name="section" class="admin-form-control" required>
              <option value="both" {{ old('section', $intake->section ?? '') == 'both' ? 'selected' : '' }}>Both (School & Preschool)</option>
              <option value="international" {{ old('section', $intake->section ?? '') == 'international' ? 'selected' : '' }}>International School</option>
              <option value="preschool" {{ old('section', $intake->section ?? '') == 'preschool' ? 'selected' : '' }}>Preschool</option>
            </select>
          </div>
          <div class="admin-form-group">
            <label class="admin-form-label">Academic Year</label>
            <input type="text" name="academic_year" class="admin-form-control" value="{{ old('academic_year', $intake->academic_year ?? '') }}" placeholder="e.g. 2026/2027">
          </div>
        </div>

        <div class="admin-form-row">
          <div class="admin-form-group">
            <label class="admin-form-label">Eligible Grades / Ages (English)</label>
            <input type="text" name="grades_ages_en" class="admin-form-control" value="{{ old('grades_ages_en', $intake->grades_ages_en ?? '') }}" placeholder="e.g. Preschool (Ages 2.5–5) & Grades 1–9">
          </div>
          <div class="admin-form-group">
            <label class="admin-form-label">Eligible Grades / Ages (Sinhala)</label>
            <input type="text" name="grades_ages_si" class="admin-form-control" value="{{ old('grades_ages_si', $intake->grades_ages_si ?? '') }}" placeholder="උදා: වයස 2.5–5 සහ 1–9 ශ්‍රේණි">
          </div>
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label">Description (English)</label>
          <textarea name="description_en" class="admin-form-control" rows="3">{{ old('description_en', $intake->description_en ?? '') }}</textarea>
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label">Description (Sinhala)</label>
          <textarea name="description_si" class="admin-form-control" rows="3">{{ old('description_si', $intake->description_si ?? '') }}</textarea>
        </div>

        <div class="admin-form-row">
          <div class="admin-form-group">
            <label class="admin-form-label">Status <span style="color:red;">*</span></label>
            <select name="status" class="admin-form-control" required>
              <option value="open" {{ old('status', $intake->status ?? '') == 'open' ? 'selected' : '' }}>Open (Accepting Enquiries)</option>
              <option value="closed" {{ old('status', $intake->status ?? '') == 'closed' ? 'selected' : '' }}>Closed</option>
              <option value="hidden" {{ old('status', $intake->status ?? '') == 'hidden' ? 'selected' : '' }}>Hidden / Draft</option>
            </select>
          </div>
          <div class="admin-form-group">
            <label class="admin-form-label">Sort Order</label>
            <input type="number" name="sort_order" class="admin-form-control" value="{{ old('sort_order', $intake->sort_order ?? 0) }}">
          </div>
        </div>

        <div style="margin-top: 24px; display: flex; gap: 12px;">
          <button type="submit" class="admin-btn admin-btn-primary">
            {{ isset($intake) ? 'Update Intake' : 'Save & Publish Intake' }}
          </button>
          <a href="{{ route('admin.intakes.index') }}" class="admin-btn admin-btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
@endsection
