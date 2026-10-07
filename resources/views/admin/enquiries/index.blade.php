@extends('layouts.admin')

@section('title', 'Admissions Inquiries')
@section('page_title', 'Admissions Inquiries Management')

@section('content')
  <div class="admin-card">
    <div class="admin-card__header">
      <h3 class="admin-card__title">All Enquiries ({{ $newCount }} Pending Review)</h3>
    </div>
    <div class="admin-card__body" style="padding: 0;">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Date</th>
            <th>Parent Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Section</th>
            <th>Grade</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($enquiries as $enquiry)
            <tr>
              <td>{{ $enquiry->created_at->format('M d, Y') }}</td>
              <td><strong>{{ $enquiry->parent_name }}</strong></td>
              <td><a href="tel:{{ $enquiry->contact_number }}">{{ $enquiry->contact_number }}</a></td>
              <td>{{ $enquiry->email ?: '—' }}</td>
              <td><span class="badge badge-blue">{{ $enquiry->section_label }}</span></td>
              <td>{{ $enquiry->preferred_grade ?: '—' }}</td>
              <td>
                <span class="badge {{ $enquiry->status == 'new' ? 'badge-yellow' : ($enquiry->status == 'contacted' ? 'badge-blue' : 'badge-gray') }}">
                  {{ strtoupper($enquiry->status) }}
                </span>
              </td>
              <td>
                <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="admin-btn admin-btn-secondary admin-btn-sm">Review</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="8" style="text-align: center; color: var(--clr-text-light); padding: 32px;">No admissions inquiries found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  <div style="margin-top: 16px;">
    {{ $enquiries->links() }}
  </div>
@endsection
