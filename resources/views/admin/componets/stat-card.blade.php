<div class="stat-card">
    <div class="stat-icon" style="background: {{ $color }};">
        <i class="fa-solid {{ $icon }}"></i>
    </div>

    <div class="stat-info">
        <h3 class="stat-value">{{ $value }}</h3>
        <p class="stat-label">{{ $label }}</p>

        @if($change)
            <span class="stat-change {{ $changeType }}">
                <i class="fa-solid {{ $changeType == 'positive' ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                {{ $change }}
            </span>
        @endif
    </div>
</div>
