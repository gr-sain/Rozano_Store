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
            <li class="sidebar-item {{ adminRoute('admin.home') }}"><a href="{{ route('admin.home') }}" class="sidebar-link"><i class="fa-solid fa-chart-line"></i><span>Dashboard</span></a></li>
            <li class="sidebar-item {{ adminRoute('admin.banner') }}"><a href="{{ route('benner.index') }}" class="sidebar-link"><i class="fa-solid fa-apple-whole"></i><span>Banner</span></a></li>
            <li class="sidebar-item {{ adminRoute('admin.products') }}"><a href="{{ route('products.index') }}" class="sidebar-link"><i class="fa-solid fa-box"></i><span>Products</span></a></li>
            <li class="sidebar-item {{ adminRoute('admin.orders') }}"><a href="{{ route('admin.orders') }}" class="sidebar-link"><i class="fa-solid fa-shopping-cart"></i><span>Orders</span></a></li>
            <li class="sidebar-item {{ adminRoute('admin.customers') }}"><a href="{{ route('admin.customers') }}" class="sidebar-link"><i class="fa-solid fa-users"></i><span>Customers</span></a></li>
            <li class="sidebar-item {{ adminRoute('admin.categories') }}"><a href="{{ route('categories.index') }}" class="sidebar-link"><i class="fa-solid fa-tags"></i><span>Categories</span></a></li>
            <li class="sidebar-item {{ adminRoute('admin.brands') }}"><a href="{{ route('brands.index') }}" class="sidebar-link"><i class="fa-brands fa-bandcamp"></i><span>Brands</span></a></li>
            <li class="sidebar-item {{ adminRoute('admin.reviews') }}"><a href="{{ route('admin.reviews') }}" class="sidebar-link"><i class="fa-solid fa-star"></i><span>Reviews</span></a></li>
            <li class="sidebar-item {{ adminRoute('admin.coupons') }}"><a href="{{ route('admin.coupons') }}" class="sidebar-link"><i class="fa-solid fa-ticket"></i><span>Coupons</span></a></li>
            <li class="sidebar-item {{ adminRoute('admin.shippings') }}"><a href="{{ route('admin.shippings') }}" class="sidebar-link"><i class="fa-solid fa-truck"></i><span>Shipping</span></a></li>
            <li class="sidebar-item {{ adminRoute('admin.settings') }}"><a href="{{ route('admin.settings') }}" class="sidebar-link"><i class="fa-solid fa-gear"></i><span>Settings</span></a></li>
        </ul>
    </nav>
    <div class="sidebar-footer">
        <a href="index.html" class="sidebar-link"><i class="fa-solid fa-arrow-left"></i><span>Back to Website</span></a>
        <a href="#" class="sidebar-link logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
    </div>
</aside>