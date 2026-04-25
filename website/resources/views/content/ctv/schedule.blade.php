<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Đăng ký lịch tuần — CTV</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- CTV Schedule Styles --}}
    <link rel="stylesheet" href="{{ asset('css/ctv-schedule.css') }}">
</head>
<body>

<div class="ctv-page" data-level="{{ $profile->level }}" data-csrf="{{ csrf_token() }}">

    {{-- ── Sticky Header ──────────────────────────── --}}
    <header class="ctv-header">
        <h1 class="ctv-header__title">📅 Đăng ký lịch tuần</h1>
        <div class="ctv-header__user">
            {{ $user->name }} · <strong>{{ $profile->level === 'SENIOR' ? 'CTV Senior' : 'CTV Mới' }}</strong>
        </div>
    </header>

    {{-- ── Deadline Banner ────────────────────────── --}}
    <div class="ctv-banner ctv-banner--warn">
        ⏳ Hạn chót: 23:59 Thứ 7 hàng tuần
    </div>

    {{-- ── Instruction Banner ─────────────────────── --}}
    @if($profile->level === 'NEW')
        <div class="ctv-banner ctv-banner--info-new">
            🟢 Chọn các mốc thời gian bạn <strong>RẢNH</strong>
        </div>
    @else
        <div class="ctv-banner ctv-banner--info-senior">
            🔴 Chọn các mốc thời gian bạn <strong>BẬN</strong>
        </div>
    @endif

    {{-- ── Week Navigator ─────────────────────────── --}}
    <div class="ctv-week-nav">
        <button class="ctv-week-nav__btn" id="week-prev">‹</button>
        <span class="ctv-week-nav__label" id="ctv-week-label">—</span>
        <button class="ctv-week-nav__btn" id="week-next">›</button>
    </div>
    <div class="ctv-week-nav__sub" id="ctv-week-range">—</div>

    {{-- ── Stats Chips ────────────────────────────── --}}
    <div class="ctv-stats">
        <div class="ctv-stat-chip">
            <div class="ctv-stat-chip__val" id="stat-free">0</div>
            <div class="ctv-stat-chip__lbl">Ca rảnh</div>
        </div>
        <div class="ctv-stat-chip">
            <div class="ctv-stat-chip__val ctv-stat-chip__val--busy" id="stat-busy">0</div>
            <div class="ctv-stat-chip__lbl">Ca bận</div>
        </div>
    </div>

    {{-- ── Calendar Grid (rendered by JS) ─────────── --}}
    <div class="ctv-grid" id="ctv-grid"></div>

    {{-- ── Floating Bottom Bar ────────────────────── --}}
    <div class="ctv-bottom">
        <button class="ctv-btn ctv-btn--outline" id="btn-copy" title="Sao chép tuần trước">
            📋 Sao chép
        </button>
        <button class="ctv-btn ctv-btn--primary" id="btn-save">
            💾 Lưu lịch tuần này
        </button>
    </div>

    {{-- ── Toast ──────────────────────────────────── --}}
    <div class="ctv-toast" id="ctv-toast"></div>

    {{-- ── Loading Overlay ────────────────────────── --}}
    <div class="ctv-loading" id="ctv-loading">
        <div class="ctv-spinner"></div>
    </div>
</div>

{{-- CTV Schedule Script --}}
<script src="{{ asset('js/ctv-schedule.js') }}"></script>
</body>
</html>
