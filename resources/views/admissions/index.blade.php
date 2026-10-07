@extends('layouts.app')

@section('title', 'Admissions & Inquiries — Chalk & Chauser')

@section('content')
  <div class="page-header">
    <div class="container reveal">
      <span class="section-eyebrow" style="color: var(--clr-accent);">Enrollment</span>
      <h1 style="color: white; margin-bottom: 16px;">Admissions &amp; Enquiries</h1>
      <p style="color: rgba(255,255,255,0.8); max-width: 600px;">
        Join our growing learning family. Find active intake cycles, requirements, and submit your admission enquiry directly below.
      </p>
    </div>
  </div>

  <section class="section">
    <div class="container">
      @if(session('enquiry_success'))
        <div class="alert alert-success reveal mb-4" role="alert">
          <div>
            <strong>✓ {{ __('school.admissions.success') }}</strong>
            <p style="margin-top: 4px; font-size: 0.9rem;">A confirmation notice has been registered. Our admissions secretary will get in touch shortly.</p>
          </div>
        </div>
      @endif

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 48px;">
        {{-- Left: Form --}}
        <div class="card reveal" style="padding: 32px;">
          <h3 style="margin-bottom: 8px;">{{ __('school.admissions.enquiry_title') }}</h3>
          <p style="color: var(--clr-text-light); font-size: 0.88rem; margin-bottom: 24px;">
            {{ __('school.admissions.not_application') }}
          </p>

          <form action="{{ route('admissions.submit', ['lang' => $lang]) }}" method="POST">
            @csrf
            {{-- Honeypot --}}
            <input type="text" name="honeypot" style="display:none;" tabindex="-1" autocomplete="off">

            <div class="form-group">
              <label class="form-label">{{ __('school.admissions.parent_name') }} <span class="required">*</span></label>
              <input type="text" name="parent_name" class="form-control @error('parent_name') is-invalid @enderror" value="{{ old('parent_name') }}" required placeholder="e.g. Priyantha Perera">
              @error('parent_name') <div class="form-error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
              <label class="form-label">{{ __('school.admissions.contact_number') }} <span class="required">*</span></label>
              <input type="tel" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror" value="{{ old('contact_number') }}" required placeholder="e.g. +94 77 123 4567">
              @error('contact_number') <div class="form-error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
              <label class="form-label">{{ __('school.admissions.email') }}</label>
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="parent@example.com">
              @error('email') <div class="form-error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
              <label class="form-label">{{ __('school.admissions.school_section') }} <span class="required">*</span></label>
              <select name="school_section" class="form-control form-select @error('school_section') is-invalid @enderror" required>
                <option value="international" {{ old('school_section') == 'international' ? 'selected' : '' }}>{{ __('school.admissions.international_school') }}</option>
                <option value="preschool" {{ old('school_section') == 'preschool' ? 'selected' : '' }}>{{ __('school.admissions.preschool') }}</option>
              </select>
              @error('school_section') <div class="form-error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
              <label class="form-label">{{ __('school.admissions.preferred_grade') }}</label>
              <input type="text" name="preferred_grade" class="form-control" value="{{ old('preferred_grade') }}" placeholder="e.g. Grade 1 or Nursery (Age 3)">
            </div>

            <div class="form-group">
              <label class="form-label">{{ __('school.admissions.message') }}</label>
              <textarea name="message" class="form-control" rows="4" placeholder="Any specific questions regarding schedule, curriculum, or transportation...">{{ old('message') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
              {{ __('school.admissions.submit') }} &rarr;
            </button>
          </form>
        </div>

        {{-- Right: Intakes and Steps --}}
        <div>
          <div class="reveal mb-4">
            <span class="section-eyebrow">Active Intake Notices</span>
            <h3 style="margin-bottom: 16px;">Enrollment Periods</h3>
            @forelse($intakes as $intake)
              <div class="card mb-2" style="padding: 20px; border-left: 4px solid var(--clr-primary);">
                <div style="display:flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                  <strong style="font-size: 1.05rem;">{{ $intake->title() }}</strong>
                  <span class="badge {{ $intake->status == 'open' ? 'badge-green' : 'badge-yellow' }}">
                    {{ strtoupper($intake->status) }}
                  </span>
                </div>
                <p style="font-size: 0.9rem; color: var(--clr-text-mid); margin-bottom: 8px;">
                  {{ $intake->description() }}
                </p>
                @if($intake->grades_ages_en)
                  <div style="font-size: 0.8rem; color: var(--clr-text-light);">
                    Eligible: {{ app()->getLocale() == 'si' && $intake->grades_ages_si ? $intake->grades_ages_si : $intake->grades_ages_en }}
                  </div>
                @endif
              </div>
            @empty
              <p style="color: var(--clr-text-light);">No public intake periods currently listed.</p>
            @endforelse
          </div>

          {{-- Steps --}}
          <div class="reveal mt-4">
            <span class="section-eyebrow">Application Journey</span>
            <h3 style="margin-bottom: 16px;">How It Works</h3>
            <ol style="padding-left: 20px; line-height: 2; font-size: 0.95rem; color: var(--clr-text-mid);">
              <li><strong>Submit Enquiry:</strong> Fill out the form or phone our office.</li>
              <li><strong>Campus Tour:</strong> Schedule an in-person meeting with our faculty.</li>
              <li><strong>Informal Assessment:</strong> Age-appropriate readiness interaction.</li>
              <li><strong>Formal Offer:</strong> Confirmation of placement and document verification.</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
