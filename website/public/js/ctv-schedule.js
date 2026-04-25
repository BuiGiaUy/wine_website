/**
 * CTV Schedule — Interactive Logic
 *
 * Manages week navigation, slot toggling, API integration,
 * and dynamic stat computation based on user level.
 */
(function () {
  'use strict';

  // ── Config from page data attributes ────────────────────
  const page     = document.querySelector('.ctv-page');
  const LEVEL    = page.dataset.level;            // 'NEW' or 'SENIOR'
  const CSRF     = page.dataset.csrf;
  const TOTAL    = 21;                             // 7 days × 3 slots

  const DAYS_MAP = {
    Mon: 'Thứ 2', Tue: 'Thứ 3', Wed: 'Thứ 4',
    Thu: 'Thứ 5', Fri: 'Thứ 6', Sat: 'Thứ 7', Sun: 'Chủ nhật'
  };
  const SLOT_META = {
    Morning:   { vi: 'Sáng',  time: '08:00–12:00', icon: '☀️' },
    Afternoon: { vi: 'Chiều', time: '13:00–17:00', icon: '🌤️' },
    Evening:   { vi: 'Tối',   time: '18:00–22:00', icon: '🌙' }
  };
  const DAY_KEYS  = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
  const SLOT_KEYS = ['Morning', 'Afternoon', 'Evening'];

  // ── State ───────────────────────────────────────────────
  let currentYear, currentWeek;
  let selectedSlots = new Set();
  let isFinalized   = false;
  let isBusy        = false;       // loading flag

  // ── DOM refs ────────────────────────────────────────────
  const $grid      = document.getElementById('ctv-grid');
  const $weekLabel = document.getElementById('ctv-week-label');
  const $weekRange = document.getElementById('ctv-week-range');
  const $statFree  = document.getElementById('stat-free');
  const $statBusy  = document.getElementById('stat-busy');
  const $toast     = document.getElementById('ctv-toast');
  const $loading   = document.getElementById('ctv-loading');
  const $btnSave   = document.getElementById('btn-save');
  const $btnCopy   = document.getElementById('btn-copy');

  // ── Helpers ─────────────────────────────────────────────
  function weekKey() { return `${currentYear}-${String(currentWeek).padStart(2, '0')}`; }

  function getISOWeekRange(y, w) {
    const simple = new Date(y, 0, 1 + (w - 1) * 7);
    const dow = simple.getDay();
    const start = new Date(simple);
    start.setDate(simple.getDate() - ((dow + 6) % 7));
    const end = new Date(start);
    end.setDate(start.getDate() + 6);
    const fmt = d => `${d.getDate().toString().padStart(2,'0')}/${(d.getMonth()+1).toString().padStart(2,'0')}`;
    return `${fmt(start)} – ${fmt(end)}`;
  }

  function getCurrentISOWeek() {
    const now = new Date();
    const d = new Date(Date.UTC(now.getFullYear(), now.getMonth(), now.getDate()));
    d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay() || 7));
    const yearStart = new Date(Date.UTC(d.getUTCFullYear(), 0, 1));
    const weekNo = Math.ceil((((d - yearStart) / 86400000) + 1) / 7);
    return { year: d.getUTCFullYear(), week: weekNo };
  }

  function showToast(msg, type = 'success') {
    $toast.textContent = msg;
    $toast.className = `ctv-toast ctv-toast--${type} ctv-toast--show`;
    clearTimeout($toast._t);
    $toast._t = setTimeout(() => { $toast.classList.remove('ctv-toast--show'); }, 2800);
  }

  function setLoading(v) {
    isBusy = v;
    $loading.classList.toggle('ctv-loading--active', v);
    $btnSave.disabled = v;
    $btnCopy.disabled = v;
  }

  // ── Stats Update ────────────────────────────────────────
  function updateStats() {
    const count = selectedSlots.size;
    let freeH, busyH;
    if (LEVEL === 'SENIOR') {
      busyH = count;
      freeH = TOTAL - count;
    } else {
      freeH = count;
      busyH = TOTAL - count;
    }
    $statFree.textContent = freeH;
    $statBusy.textContent = busyH;
  }

  // ── Render Grid ─────────────────────────────────────────
  function renderGrid() {
    $grid.innerHTML = '';
    const selClass = LEVEL === 'SENIOR' ? 'ctv-slot--busy' : 'ctv-slot--free';

    DAY_KEYS.forEach(day => {
      const dayEl = document.createElement('div');
      dayEl.className = 'ctv-day';

      // Header
      const header = document.createElement('div');
      header.className = 'ctv-day__header';

      const dayLabel = document.createElement('span');
      dayLabel.textContent = DAYS_MAP[day];

      const toggleBtn = document.createElement('button');
      toggleBtn.className = 'ctv-day__toggle';
      toggleBtn.textContent = 'Chọn cả ngày';
      toggleBtn.addEventListener('click', () => {
        const daySlots = SLOT_KEYS.map(s => `${day}_${s}`);
        const allSelected = daySlots.every(s => selectedSlots.has(s));
        daySlots.forEach(s => { allSelected ? selectedSlots.delete(s) : selectedSlots.add(s); });
        renderGrid();
        updateStats();
      });

      header.appendChild(dayLabel);
      header.appendChild(toggleBtn);
      dayEl.appendChild(header);

      // Slots
      const slotsRow = document.createElement('div');
      slotsRow.className = 'ctv-day__slots';

      SLOT_KEYS.forEach(slot => {
        const key = `${day}_${slot}`;
        const meta = SLOT_META[slot];
        const isSelected = selectedSlots.has(key);

        const btn = document.createElement('div');
        btn.className = 'ctv-slot' + (isSelected ? ` ${selClass}` : '');
        btn.dataset.slot = key;
        btn.innerHTML = `
          <div class="ctv-slot__icon">${meta.icon}</div>
          <div class="ctv-slot__name">${meta.vi}</div>
          <div class="ctv-slot__time">${meta.time}</div>
        `;

        btn.addEventListener('click', () => {
          if (isBusy) return;
          selectedSlots.has(key) ? selectedSlots.delete(key) : selectedSlots.add(key);
          renderGrid();
          updateStats();
        });

        slotsRow.appendChild(btn);
      });

      dayEl.appendChild(slotsRow);
      $grid.appendChild(dayEl);
    });
  }

  // ── Week Navigation ─────────────────────────────────────
  function updateWeekDisplay() {
    $weekLabel.textContent = `Tuần ${currentWeek}, ${currentYear}`;
    $weekRange.textContent = getISOWeekRange(currentYear, currentWeek);
  }

  function changeWeek(delta) {
    currentWeek += delta;
    if (currentWeek < 1) { currentYear--; currentWeek = 52; }
    if (currentWeek > 52) { currentYear++; currentWeek = 1; }
    updateWeekDisplay();
    fetchSchedule();
  }

  document.getElementById('week-prev').addEventListener('click', () => changeWeek(-1));
  document.getElementById('week-next').addEventListener('click', () => changeWeek(1));

  // ── API: Fetch Schedule ─────────────────────────────────
  async function fetchSchedule() {
    setLoading(true);
    selectedSlots.clear();
    try {
      const res = await fetch(`/api/ctv/schedule/me?week_key=${weekKey()}`, {
        headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': CSRF }
      });
      if (res.ok) {
        const json = await res.json();
        if (json.success && json.data.slots) {
          json.data.slots.forEach(s => selectedSlots.add(s));
          isFinalized = json.data.is_finalized || false;
        }
      }
    } catch (e) {
      console.warn('Fetch schedule error:', e);
    }
    renderGrid();
    updateStats();
    setLoading(false);
  }

  // ── API: Save Schedule ──────────────────────────────────
  $btnSave.addEventListener('click', async () => {
    if (isBusy) return;
    setLoading(true);
    try {
      const res = await fetch('/api/ctv/schedule/save', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': CSRF
        },
        body: JSON.stringify({
          week_key: weekKey(),
          slots: Array.from(selectedSlots)
        })
      });
      const json = await res.json();
      if (json.success) {
        showToast('✅ Đã lưu lịch thành công!', 'success');
      } else {
        showToast('❌ ' + (json.message || 'Lỗi khi lưu'), 'error');
      }
    } catch (e) {
      showToast('❌ Lỗi kết nối server', 'error');
    }
    setLoading(false);
  });

  // ── API: Copy Previous ──────────────────────────────────
  $btnCopy.addEventListener('click', async () => {
    if (isBusy) return;
    setLoading(true);
    try {
      const res = await fetch('/api/ctv/schedule/copy-previous', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': CSRF
        },
        body: JSON.stringify({ week_key: weekKey() })
      });
      const json = await res.json();
      if (json.success) {
        showToast('📋 Đã sao chép từ tuần trước!', 'info');
        await fetchSchedule();
      } else {
        showToast('⚠️ ' + (json.message || 'Không tìm thấy tuần trước'), 'error');
      }
    } catch (e) {
      showToast('❌ Lỗi kết nối server', 'error');
    }
    setLoading(false);
  });

  // ── Drag to Select ──────────────────────────────────────
  let isDragging = false;
  let dragMode = null;   // 'add' or 'remove'

  $grid.addEventListener('pointerdown', e => {
    const slot = e.target.closest('.ctv-slot');
    if (!slot || isBusy) return;
    isDragging = true;
    const key = slot.dataset.slot;
    dragMode = selectedSlots.has(key) ? 'remove' : 'add';
    e.preventDefault();
  });

  $grid.addEventListener('pointermove', e => {
    if (!isDragging) return;
    const el = document.elementFromPoint(e.clientX, e.clientY);
    const slot = el ? el.closest('.ctv-slot') : null;
    if (!slot) return;
    const key = slot.dataset.slot;
    if (dragMode === 'add') selectedSlots.add(key);
    else selectedSlots.delete(key);
    renderGrid();
    updateStats();
  });

  document.addEventListener('pointerup', () => { isDragging = false; });

  // ── Init ────────────────────────────────────────────────
  const now = getCurrentISOWeek();
  currentYear = now.year;
  currentWeek = now.week;
  updateWeekDisplay();
  fetchSchedule();
})();
