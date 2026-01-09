<header class="admin-header">
    <div class="admin-header-left">
        <button class="menu-toggle" id="menuToggle">
            <i class="fa-solid fa-bars"></i>
        </button>
        <h1 class="admin-title">{{ $title ?? 'Dashboard' }}</h1>
    </div>

    <div class="admin-header-right">
        @if($showSearch ?? false)
        <div class="admin-search">
            <input type="text"
                   placeholder="{{ $searchPlaceholder ?? 'Search...' }}"
                   class="admin-search-input"
                   id="{{ $searchId ?? '' }}">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        @endif

        {{-- Button for other pages (Products, Orders, etc) --}}
        @if($buttonText ?? false)
        <button class="btn-add-product" id="{{ $buttonId ?? '' }}">
            <i class="fa-solid fa-plus"></i> {{ $buttonText }}
        </button>
        @endif

        {{-- Profile & Notifications - Only on Dashboard (index) --}}
        @if($showProfile ?? true)
            <div class="admin-profile-wrapper">
                <div class="admin-profile" id="profileToggle">
                    <img src="{{ asset('img/avatar-1.jpg') }}" alt="Admin" class="admin-avatar">
                    <span class="admin-name">{{ auth()->user()->name ?? 'Admin User' }}</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>

                <div class="profile-dropdown" id="profileDropdown">
                    <a href="{{ route('profile') }}">
                        <i class="fa-solid fa-user"></i> My Profile
                    </a>

                    <a href="#">
                        <i class="fa-solid fa-lock"></i> Change Password
                    </a>

                    <form action="" method="POST">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        @endif

    </div>
</header>