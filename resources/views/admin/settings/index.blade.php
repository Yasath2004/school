@extends('layouts.admin')

@section('title', 'Institutional Settings')
@section('page_title', 'School Information & Contacts')

@section('content')
  <div class="admin-card" style="max-width: 800px;">
    <div class="admin-card__header">
      <h3 class="admin-card__title">General Information</h3>
    </div>
    <div class="admin-card__body">
      <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf

        <div class="admin-form-group">
          <label class="admin-form-label">School Name</label>
          <input type="text" name="school_name" class="admin-form-control" value="Chalk &amp; Chauser International School">
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label">School Motto</label>
          <input type="text" name="school_motto" class="admin-form-control" value="Dedicated to Standards of Excellence">
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label">Admissions Hotline Phone</label>
          <input type="text" name="phone" class="admin-form-control" value="+94 11 234 5678">
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label">Official Contact Email</label>
          <input type="email" name="email" class="admin-form-control" value="info@chalkchauser.lk">
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label">Campus Physical Address</label>
          <textarea name="address" class="admin-form-control" rows="2">No. 124, Havelock Road, Colombo 05, Sri Lanka</textarea>
        </div>

        <div class="admin-form-group">
          <label class="admin-form-label">Office Hours</label>
          <input type="text" name="office_hours" class="admin-form-control" value="Monday – Friday: 7:30 AM – 4:30 PM">
        </div>

        <button type="submit" class="admin-btn admin-btn-primary">
          Save Settings
        </button>
      </form>
    </div>
  </div>
@endsection
