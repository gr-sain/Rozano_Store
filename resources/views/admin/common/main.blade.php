@include('admin.common.head')

<div class="admin-wrapper">
    @include('admin.common.sidebar')
    
    <div class="admin-main">
        @yield('header')
        {{-- @include('admin.common.header') --}}
        
        <div class="admin-content">
            @yield('content')
        </div>
        
        @include('admin.common.footer')
    </div>
</div>