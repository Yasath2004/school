@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page_title', 'Overview & Admissions Statistics')

@section('content')
  {{-- Stats Row --}}
  <div class="admin-stats">
    <div class="stat-card">
      <div class="stat-card__label">New Inquiries</div>
      <div class="stat-card__value">{{ $stats['new_enquiries'] }}</div>
      <div class="stat-card__change">Pending staff response</div>
    </div>
    <div class="stat-card">
      <div class="stat-card__label">Total Enquiries</div>
      <div class="stat-card__value">{{ $stats['total_enquiries'] }}</div>
      <div class="stat-card__change">All-time submissions</div>
    </div>
    <div class="stat-card">
      <div class="stat-card__label">Active Intakes</div>
      <div class="stat-card__value">{{ $stats['open_intakes'] }}</div>
      <div class="stat-card__change">Open admissions cycles</div>
    </div>
    <div class="stat-card">
      <div class="stat-card__label">Faculty Members</div>
      <div class="stat-card__value">{{ $stats['teachers'] }}</div>
      <div class="stat-card__change">Published teacher profiles</div>
    </div>
  </div>

  {{-- Recent Inquiries Table --}}
  <div class="admin-card mb-4">
    <div class="admin-card__header">
      <h3 class="admin-card__title">Recent Admissions Inquiries</h3>
      <a href="{{ route('admin.enquiries.index') }}" class="admin-btn admin-btn-secondary admin-btn-sm">View All &rarr;</a>
    </div>
    <div class="admin-card__body" style="padding: 0;">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Date</th>
            <th>Parent Name</th>
            <th>Contact</th>
            <th>Section</th>
            <th>Grade</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($recentEnquiries as $enquiry)
            <tr>
              <td>{{ $enquiry->created_at->format('M d, H:i') }}</td>
              <td><strong>{{ $enquiry->parent_name }}</strong></td>
              <td>{{ $enquiry->contact_number }}</td>
              <td><span class="badge badge-blue">{{ $enquiry->section_label }}</span></td>
              <td>{{ $enquiry->preferred_grade ?: '—' }}</td>
              <td>
                <span class="badge {{ $enquiry->status == 'new' ? 'badge-yellow' : ($enquiry->status == 'contacted' ? 'badge-blue' : 'badge-gray') }}">
                  {{ strtoupper($enquiry->status) }}
                </span>
              </td>
              <td>
                <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="admin-btn admin-btn-secondary admin-btn-sm">View</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" style="text-align: center; color: var(--clr-text-light); padding: 32px;">No inquiries submitted yet.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
