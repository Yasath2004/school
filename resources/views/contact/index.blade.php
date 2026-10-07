@extends('layouts.app')

@section('title', 'Contact Us & FAQs — Chalk & Chauser')

@section('content')
  <div class="page-header">
    <div class="container reveal">
      <span class="section-eyebrow" style="color: var(--clr-accent);">Get in Touch</span>
      <h1 style="color: white; margin-bottom: 16px;">Contact &amp; Admissions Desk</h1>
      <p style="color: rgba(255,255,255,0.8); max-width: 600px;">
        Have questions regarding admissions, curriculum, or visiting our campus? Reach out to our front desk team.
      </p>
    </div>
  </div>

  <section class="section">
    <div class="container">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 48px;" class="mb-4">
        {{-- Contact details --}}
        <div class="reveal">
          <span class="section-eyebrow">Direct Contact</span>
          <h2 class="section-title">Campus Information</h2>
          <div style="display: flex; flex-direction: column; gap: 12px;" class="mt-2">
            <div class="contact-info-item">
              <div class="contact-info-item__icon">📍</div>
              <div>
                <div class="contact-info-item__label">Campus Location</div>
                <div class="contact-info-item__value">Sample Address, Colombo, Sri Lanka</div>
              </div>
            </div>
            <div class="contact-info-item">
              <div class="contact-info-item__icon">📞</div>
              <div>
                <div class="contact-info-item__label">Admissions Hotline</div>
                <div class="contact-info-item__value">+94 XX XXX XXXX</div>
              </div>
            </div>
            <div class="contact-info-item">
              <div class="contact-info-item__icon">✉</div>
              <div>
                <div class="contact-info-item__label">Email</div>
                <div class="contact-info-item__value">info@chalkchauser.lk</div>
              </div>
            </div>
            <div class="contact-info-item">
              <div class="contact-info-item__icon">🕐</div>
              <div>
                <div class="contact-info-item__label">Front Office Hours</div>
                <div class="contact-info-item__value">Monday – Friday: 7:30 AM – 4:30 PM</div>
              </div>
            </div>
          </div>
        </div>

        {{-- FAQs --}}
        <div class="reveal">
          <span class="section-eyebrow">Frequently Asked</span>
          <h2 class="section-title">Common Questions</h2>

          <div class="mt-2">
            @forelse($faqs->flatten() as $faq)
              <div class="faq-item">
                <button class="faq-item__question" type="button">
                  <span>{{ $faq->question() }}</span>
                  <span class="faq-item__icon">+</span>
                </button>
                <div class="faq-item__answer">
                  {{ $faq->answer() }}
                </div>
              </div>
            @empty
              <div class="faq-item active">
                <button class="faq-item__question" type="button">
                  <span>What are the school operating hours?</span>
                  <span class="faq-item__icon">+</span>
                </button>
                <div class="faq-item__answer">
                  Preschool runs from 8:00 AM to 12:00 PM. The International School primary & secondary operates from 7:45 AM to 2:15 PM.
                </div>
              </div>
              <div class="faq-item">
                <button class="faq-item__question" type="button">
                  <span>Is school transport provided?</span>
                  <span class="faq-item__icon">+</span>
                </button>
                <div class="faq-item__answer">
                  Yes, verified and supervised school van services operate across primary zones in Colombo and surrounding suburbs.
                </div>
              </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
