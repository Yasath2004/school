@extends('layouts.admin')

@section('title', 'Review Enquiry #' . $enquiry->id)
@section('page_title', 'Admissions Enquiry Details')

@section('content')
  <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
    <div class="admin-card">
      <div class="admin-card__header">
        <h3 class="admin-card__title">Inquiry Details (#{{ $enquiry->id }})</h3>
        <span class="badge {{ $enquiry->status == 'new' ? 'badge-yellow' : ($enquiry->status == 'contacted' ? 'badge-blue' : 'badge-gray') }}">
          {{ strtoupper($enquiry->status) }}
        </span>
      </div>
      <div class="admin-card__body">
        <div class="admin-form-row mb-2">
          <div>
            <div class="admin-form-label">Parent / Guardian Name</div>
            <div style="font-size: 1.1rem; font-weight: 600;">{{ $enquiry->parent_name }}</div>
          </div>
          <div>
            <div class="admin-form-label">Submission Date</div>
            <div>{{ $enquiry->created_at->format('M d, Y h:i A') }}</div>
          </div>
        </div>

        <div class="admin-form-row mb-2">
          <div>
            <div class="admin-form-label">Phone Number</div>
            <div><a href="tel:{{ $enquiry->contact_number }}" style="color: var(--clr-primary); font-weight: 600;">{{ $enquiry->contact_number }}</a></div>
          </div>
          <div>
            <div class="admin-form-label">Email Address</div>
            <div>{{ $enquiry->email ?: 'Not provided' }}</div>
          </div>
        </div>

        <div class="admin-form-row mb-2">
          <div>
            <div class="admin-form-label">Interested Section</div>
            <div><span class="badge badge-blue">{{ $enquiry->section_label }}</span></div>
          </div>
          <div>
            <div class="admin-form-label">Preferred Grade</div>
            <div>{{ $enquiry->preferred_grade ?: 'General Inquiry' }}</div>
          </div>
        </div>

        <div class="mb-2">
          <div class="admin-form-label">Parent's Message / Notes</div>
          <div style="background: var(--clr-bg); padding: 16px; border-radius: var(--radius-md); font-size: 0.95rem; border: 1px solid var(--clr-border);">
            {{ $enquiry->message ?: 'No additional message provided.' }}
          </div>
        </div>

        <div style="margin-top: 24px;">
          <a href="{{ route('admin.enquiries.index') }}" class="admin-btn admin-btn-secondary">&larr; Back to Enquiries</a>
        </div>
      </div>
    </div>

    {{-- Update Status & Follow-up Notes --}}
    <div class="admin-card">
      <div class="admin-card__header">
        <h3 class="admin-card__title">Internal Action</h3>
      </div>
      <div class="admin-card__body">
        <form action="{{ route('admin.enquiries.update', $enquiry) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="admin-form-group">
            <label class="admin-form-label">Follow-up Status</label>
            <select name="status" class="admin-form-control">
              <option value="new" {{ $enquiry->status == 'new' ? 'selected' : '' }}>New (Uncontacted)</option>
              <option value="contacted" {{ $enquiry->status == 'contacted' ? 'selected' : '' }}>Contacted / Scheduled</option>
              <option value="closed" {{ $enquiry->status == 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
          </div>

          <div class="admin-form-group">
            <label class="admin-form-label">Staff Follow-up Notes</label>
            <textarea name="internal_notes" class="admin-form-control" rows="5" placeholder="Record parent call details, tour appointment date, notes...">{{ $enquiry->internal_notes }}</textarea>
          </div>

          <button type="submit" class="admin-btn admin-btn-primary" style="width: 100%; justify-content: center;">
            Save Notes &amp; Status
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection
