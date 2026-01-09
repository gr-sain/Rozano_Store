<aside class="admin-sidebar" id="adminSidebar">
    <div class="sidebar-header">
        <a href="index.html" class="sidebar-logo">
            <img src="{{ asset('img/logo.svg') }}" alt="Logo" class="sidebar-logo-img">
            <span class="sidebar-logo-text">Admin Panel</span>
        </a>
        <button class="sidebar-toggle" id="sidebarToggle"><i class="fa-solid fa-bars"></i></button>
    </div>
    <nav class="sidebar-nav">
        <ul class="sidebar-menu">
            <li class="sidebar-item"><a href="{{ route('home') }}" class="sidebar-link"><i class="fa-solid fa-chart-line"></i><span>Dashboard</span></a></li>
            <li class="sidebar-item"><a href="{{ route('products') }}" class="sidebar-link"><i class="fa-solid fa-box"></i><span>Products</span></a></li>
            <li class="sidebar-item"><a href="{{ route('orders') }}" class="sidebar-link"><i class="fa-solid fa-shopping-cart"></i><span>Orders</span></a></li>
            <li class="sidebar-item"><a href="{{ route('customer') }}" class="sidebar-link"><i class="fa-solid fa-users"></i><span>Customers</span></a></li>
            <li class="sidebar-item"><a href="{{ route('categories') }}" class="sidebar-link"><i class="fa-solid fa-tags"></i><span>Categories</span></a></li>
            <li class="sidebar-item"><a href="{{ route('reviews') }}" class="sidebar-link"><i class="fa-solid fa-star"></i><span>Reviews</span></a></li>
            <li class="sidebar-item"><a href="{{ route('coupons') }}" class="sidebar-link"><i class="fa-solid fa-ticket"></i><span>Coupons</span></a></li>
            <li class="sidebar-item"><a href="{{ route('shippings') }}" class="sidebar-link"><i class="fa-solid fa-truck"></i><span>Shipping</span></a></li>
            <li class="sidebar-item"><a href="{{ route('settings') }}" class="sidebar-link"><i class="fa-solid fa-gear"></i><span>Settings</span></a></li>
        </ul>
    </nav>
    <div class="sidebar-footer">
        <a href="index.html" class="sidebar-link"><i class="fa-solid fa-arrow-left"></i><span>Back to Website</span></a>
        <a href="#" class="sidebar-link logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
    </div>
</aside>