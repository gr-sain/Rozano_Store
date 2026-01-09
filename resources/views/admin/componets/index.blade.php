@extends('admin.common.main')

@section('header')
    <x-admin-header 
        title="Dashboard"
        :show-search="true"
        search-placeholder="Search..."
        search-id="adminSearch"
        :show-profile="true"
    />
@endsection
@section('content')
    <div class="admin-content">
        <!-- Stats Cards -->
        <div class="stats-grid">
            <x-stat-card
                icon="fa-dollar-sign"
                color="hsl(176, 88%, 27%)"
                value="$45,231"
                label="Total Revenue"
                change="12.5%"
                changeType="positive"
            />

            <x-stat-card
                icon="fa-shopping-cart"
                color="hsl(34, 94%, 50%)"
                value="1,234"
                label="Total Orders"
                change="8.2%"
                changeType="positive"
            />

            <x-stat-card
                icon="fa-box"
                color="hsl(129, 44%, 50%)"
                value="856"
                label="Total Products"
                change="2.1%"
                changeType="negative"
            />

            <x-stat-card
                icon="fa-users"
                color="hsl(0, 0%, 40%)"
                value="3,421"
                label="Total Customers"
                change="15.3%"
                changeType="positive"
            />
        </div>

        <!-- Charts and Tables Section -->
        <div class="content-grid">
            <!-- Recent Orders -->
            <div class="content-card">
                <div class="card-header">
                    <h2 class="card-title">Recent Orders</h2>
                    <a href="{{ route('orders') }}" class="card-link">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#12345</td>
                                <td>John Doe</td>
                                <td>iPhone 14 Pro</td>
                                <td>$999.00</td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                                <td>2024-01-15</td>
                                <td>
                                    <button class="action-btn"><i class="fa-solid fa-eye"></i></button>
                                    <button class="action-btn"><i class="fa-solid fa-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#12344</td>
                                <td>Jane Smith</td>
                                <td>Samsung Galaxy S23</td>
                                <td>$899.00</td>
                                <td><span class="status-badge status-completed">Completed</span></td>
                                <td>2024-01-14</td>
                                <td>
                                    <button class="action-btn"><i class="fa-solid fa-eye"></i></button>
                                    <button class="action-btn"><i class="fa-solid fa-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#12343</td>
                                <td>Mike Johnson</td>
                                <td>MacBook Pro</td>
                                <td>$2,499.00</td>
                                <td><span class="status-badge status-processing">Processing</span></td>
                                <td>2024-01-14</td>
                                <td>
                                    <button class="action-btn"><i class="fa-solid fa-eye"></i></button>
                                    <button class="action-btn"><i class="fa-solid fa-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#12342</td>
                                <td>Sarah Williams</td>
                                <td>AirPods Pro</td>
                                <td>$249.00</td>
                                <td><span class="status-badge status-completed">Completed</span></td>
                                <td>2024-01-13</td>
                                <td>
                                    <button class="action-btn"><i class="fa-solid fa-eye"></i></button>
                                    <button class="action-btn"><i class="fa-solid fa-edit"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#12341</td>
                                <td>David Brown</td>
                                <td>iPad Air</td>
                                <td>$599.00</td>
                                <td><span class="status-badge status-cancelled">Cancelled</span></td>
                                <td>2024-01-12</td>
                                <td>
                                    <button class="action-btn"><i class="fa-solid fa-eye"></i></button>
                                    <button class="action-btn"><i class="fa-solid fa-edit"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Top Products -->
            <div class="content-card">
                <div class="card-header">
                    <h2 class="card-title">Top Products</h2>
                    <a href="{{ route('products') }}" class="card-link">View All</a>
                </div>
                <div class="products-list">
                    <div class="product-item">
                        <img src="{{ asset('img/product-1-1.jpg') }}" alt="Product" class="product-img">
                        <div class="product-info">
                            <h4 class="product-name">iPhone 14 Pro</h4>
                            <p class="product-sales">234 sales</p>
                        </div>
                        <div class="product-stats">
                            <span class="product-price">$999.00</span>
                            <span class="product-stock">In Stock</span>
                        </div>
                    </div>
                    <div class="product-item">
                        <img src="{{ asset('img/product-1-1.jpg') }}" alt="Product" class="product-img">
                        <div class="product-info">
                            <h4 class="product-name">Samsung Galaxy S23</h4>
                            <p class="product-sales">189 sales</p>
                        </div>
                        <div class="product-stats">
                            <span class="product-price">$899.00</span>
                            <span class="product-stock">In Stock</span>
                        </div>
                    </div>
                    <div class="product-item">
                        <img src="{{ asset('img/product-1-1.jpg') }}" alt="Product" class="product-img">
                        <div class="product-info">
                            <h4 class="product-name">MacBook Pro</h4>
                            <p class="product-sales">156 sales</p>
                        </div>
                        <div class="product-stats">
                            <span class="product-price">$2,499.00</span>
                            <span class="product-stock low">Low Stock</span>
                        </div>
                    </div>
                    <div class="product-item">
                        <img src="{{ asset('img/product-1-1.jpg') }}" alt="Product" class="product-img">
                        <div class="product-info">
                            <h4 class="product-name">AirPods Pro</h4>
                            <p class="product-sales">312 sales</p>
                        </div>
                        <div class="product-stats">
                            <span class="product-price">$249.00</span>
                            <span class="product-stock">In Stock</span>
                        </div>
                    </div>
                    <div class="product-item">
                        <img src="{{ asset('img/product-1-1.jpg') }}" alt="Product" class="product-img">
                        <div class="product-info">
                            <h4 class="product-name">iPad Air</h4>
                            <p class="product-sales">278 sales</p>
                        </div>
                        <div class="product-stats">
                            <span class="product-price">$599.00</span>
                            <span class="product-stock">In Stock</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <div class="content-card">
                <div class="card-header">
                    <h2 class="card-title">Quick Actions</h2>
                </div>
                <div class="actions-grid">
                    <a href="{{ route('products') }}" class="action-card">
                        <i class="fa-solid fa-plus"></i>
                        <span>Add Product</span>
                    </a>
                    <a href="{{ route('categories') }}" class="action-card">
                        <i class="fa-solid fa-tag"></i>
                        <span>Add Category</span>
                    </a>
                    <a href="{{ route('coupons') }}" class="action-card">
                        <i class="fa-solid fa-ticket"></i>
                        <span>Create Coupon</span>
                    </a>
                    <a href="#" class="action-card" onclick="event.preventDefault(); viewReports();">
                        <i class="fa-solid fa-chart-bar"></i>
                        <span>View Reports</span>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div id="reportsModal" class="modal">
        <div class="modal-content modal-content-large">
            <div class="modal-header">
                <h2 class="modal-title">Sales Reports</h2>
                <button class="modal-close" onclick="closeReportsModal()">&times;</button>
            </div>
            <div class="form-spacing">
                <div class="stats-grid stats-grid-spacing">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: hsl(176, 88%, 27%);">
                            <i class="fa-solid fa-dollar-sign"></i>
                        </div>
                        <div class="stat-info">
                            <h3 class="stat-value">$125,430</h3>
                            <p class="stat-label">Total Sales</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background: hsl(34, 94%, 50%);">
                            <i class="fa-solid fa-shopping-cart"></i>
                        </div>
                        <div class="stat-info">
                            <h3 class="stat-value">1,234</h3>
                            <p class="stat-label">Total Orders</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background: hsl(129, 44%, 50%);">
                            <i class="fa-solid fa-box"></i>
                        </div>
                        <div class="stat-info">
                            <h3 class="stat-value">856</h3>
                            <p class="stat-label">Products Sold</p>
                        </div>
                    </div>
                </div>
                
                <div class="content-card">
                    <div class="card-header">
                        <h3 class="card-title">Top Selling Products</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Sales</th>
                                    <th>Revenue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>iPhone 14 Pro</td>
                                    <td>234</td>
                                    <td class="price-cell">$233,766</td>
                                </tr>
                                <tr>
                                    <td>Samsung Galaxy S23</td>
                                    <td>189</td>
                                    <td class="price-cell">$169,911</td>
                                </tr>
                                <tr>
                                    <td>MacBook Pro</td>
                                    <td>156</td>
                                    <td class="price-cell">$389,844</td>
                                </tr>
                                <tr>
                                    <td>AirPods Pro</td>
                                    <td>312</td>
                                    <td class="price-cell">$77,688</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="content-card content-spacing">
                    <div class="card-header">
                        <h3 class="card-title">Sales by Category</h3>
                    </div>
                    <div class="category-item">
                        <div class="category-item-row">
                            <span class="category-item-name">Electronics</span>
                            <span class="price-cell">$89,432</span>
                        </div>
                        <div class="category-item-row">
                            <span class="category-item-name">Fashion</span>
                            <span class="price-cell">$23,456</span>
                        </div>
                        <div class="category-item-row">
                            <span class="category-item-name">Home & Living</span>
                            <span class="price-cell">$12,542</span>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button class="btn-cancel" onclick="exportReports('pdf')">
                        <i class="fa-solid fa-file-pdf"></i> Export PDF
                    </button>
                    <button class="btn-submit" onclick="exportReports('excel')">
                        <i class="fa-solid fa-file-excel"></i> Export Excel
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
