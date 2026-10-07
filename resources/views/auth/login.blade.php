<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Portal Login — Chalk & Chauser</title>
  <link rel="icon" type="image/jpeg" href="/images/logo.jpg">
  <link rel="stylesheet" href="/css/school.css">
  <link rel="stylesheet" href="/css/admin.css">
</head>
<body style="background: var(--clr-bg); display: flex; align-items: center; justify-content: center; min-height: 100vh; padding: 24px;">

  <div style="background: white; border: 1px solid var(--clr-border); border-radius: var(--radius-lg); padding: 40px; width: 100%; max-width: 440px; box-shadow: var(--shadow-lg);">
    <div style="text-align: center; margin-bottom: 32px;">
      <img src="/images/logo.jpg" alt="Logo" style="width: 72px; height: 72px; margin: 0 auto 16px; border-radius: 50%;">
      <h2 style="font-size: 1.5rem; margin-bottom: 6px;">Staff Administration</h2>
      <p style="font-size: 0.85rem; color: var(--clr-text-light);">Chalk &amp; Chauser International School</p>
    </div>

    @if($errors->any())
      <div style="background: #fee2e2; border: 1px solid #fecaca; color: #991b1b; padding: 12px; border-radius: var(--radius-md); font-size: 0.85rem; margin-bottom: 20px;">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="form-group">
        <label class="form-label">Email Address</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus placeholder="admin@chalkchauser.lk">
      </div>

      <div class="form-group">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required placeholder="••••••••">
      </div>

      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; font-size: 0.85rem;">
        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
          <input type="checkbox" name="remember"> Remember session
        </label>
      </div>

      <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
        Sign In to Dashboard &rarr;
      </button>

      <div style="margin-top: 24px; text-align: center;">
        <a href="{{ route('home', ['lang' => 'en']) }}" style="font-size: 0.85rem; color: var(--clr-text-light); text-decoration: underline;">
          &larr; Return to School Website
        </a>
      </div>
    </form>
  </div>

</body>
</html>
