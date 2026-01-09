@extends('admin.common.main')

@section('header')
    <x-admin-header 
        title="Orders Managementt"
        :show-search="true"
        search-placeholder="Search orders..."
        search-id="orderSearch"
    />
@endsection

@section('content')
    <div class="stats-grid stats-grid-spacing">

        <x-stat-card
            icon="fa-shopping-cart"
            color="hsl(176, 88%, 27%)"
            value="156"
            label="Total Orders"
        />

        <x-stat-card
            icon="fa-clock"
            color="hsl(34, 94%, 50%)"
            value="23"
            label="Pending Orders"
        />

        <x-stat-card
            icon="fa-truck"
            color="hsl(129, 44%, 50%)"
            value="45"
            label="Shipped Orders"
        />

        <x-stat-card
            icon="fa-check-circle"
            color="hsl(0, 0%, 40%)"
            value="88"
            label="Completed Orders"
        />

    </div>


    <!-- Orders Table -->
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">All Orders</h2>
            <div class="filter-group">
                <select class="admin-select" id="statusFilter">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                </select>
                <select class="admin-select">
                    <option>Last 7 days</option>
                    <option>Last 30 days</option>
                    <option>Last 3 months</option>
                    <option>All time</option>
                </select>
            </div>
        </div>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Products</th>
                        <th>Amount</th>
                        <th>Payment</th>
                        <th>Shipping Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="ordersTableBody">
                    <tr>
                        <td><strong>#12345</strong></td>
                        <td>
                            <div>
                                <div class="customer-name-cell">John Doe</div>
                                <div class="customer-email-cell">john@example.com</div>
                            </div>
                        </td>
                        <td>
                            <div class="order-item-wrapper">
                                <img src="{{ asset('img/product-2-1.jpg') }}" alt="Product" class="order-item-img">
                                <span>iPhone 14 Pro x1</span>
                            </div>
                        </td>
                        <td class="price-cell">$999.00</td>
                        <td><span class="status-badge status-completed">Paid</span></td>
                        <td>
                            <select class="status-select" data-order="12345" onchange="updateShippingStatus(this, '12345')">
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="shipped" selected>Shipped</option>
                                <option value="delivered">Delivered</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </td>
                        <td>2024-01-15</td>
                        <td>
                            <button class="action-btn" onclick="viewOrder('12345')" title="View"><i class="fa-solid fa-eye"></i></button>
                            <button class="action-btn" onclick="printInvoice('12345')" title="Print"><i class="fa-solid fa-print"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#12344</strong></td>
                        <td>
                            <div>
                                <div class="customer-name-cell">Jane Smith</div>
                                <div class="customer-email-cell">jane@example.com</div>
                            </div>
                        </td>
                        <td>
                            <div class="order-item-wrapper">
                                <img src="{{ asset('img/product-2-1.jpg') }}" alt="Product" class="order-item-img">
                                <span>Samsung Galaxy S23 x1</span>
                            </div>
                        </td>
                        <td class="price-cell">$899.00</td>
                        <td><span class="status-badge status-completed">Paid</span></td>
                        <td>
                            <select class="status-select" data-order="12344" onchange="updateShippingStatus(this, '12344')">
                                <option value="pending">Pending</option>
                                <option value="processing" selected>Processing</option>
                                <option value="shipped">Shipped</option>
                                <option value="delivered">Delivered</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </td>
                        <td>2024-01-14</td>
                        <td>
                            <button class="action-btn" onclick="viewOrder('12344')" title="View"><i class="fa-solid fa-eye"></i></button>
                            <button class="action-btn" onclick="printInvoice('12344')" title="Print"><i class="fa-solid fa-print"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#12343</strong></td>
                        <td>
                            <div>
                                <div class="customer-name-cell">Mike Johnson</div>
                                <div class="customer-email-cell">mike@example.com</div>
                            </div>
                        </td>
                        <td>
                            <div class="order-item-wrapper">
                                <img src="{{ asset('img/product-2-1.jpg') }}" alt="Product" class="order-item-img">
                                <span>MacBook Pro x1</span>
                            </div>
                        </td>
                        <td class="price-cell">$2,499.00</td>
                        <td><span class="status-badge status-pending">Pending</span></td>
                        <td>
                            <select class="status-select" data-order="12343" onchange="updateShippingStatus(this, '12343')">
                                <option value="pending" selected>Pending</option>
                                <option value="processing">Processing</option>
                                <option value="shipped">Shipped</option>
                                <option value="delivered">Delivered</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </td>
                        <td>2024-01-14</td>
                        <td>
                            <button class="action-btn" onclick="viewOrder('12343')" title="View"><i class="fa-solid fa-eye"></i></button>
                            <button class="action-btn" onclick="printInvoice('12343')" title="Print"><i class="fa-solid fa-print"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#12342</strong></td>
                        <td>
                            <div>
                                <div style="font-weight: 600; color: var(--title-color);">Sarah Williams</div>
                                <div style="font-size: 0.8rem; color: var(--text-color-light);">sarah@example.com</div>
                            </div>
                        </td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <img src="{{ asset('img/product-2-1.jpg') }}" alt="Product" style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px;">
                                <span>AirPods Pro x2</span>
                            </div>
                        </td>
                        <td style="font-weight: 600; color: var(--first-color);">$498.00</td>
                        <td><span class="status-badge status-completed">Paid</span></td>
                        <td>
                            <select class="status-select" data-order="12342" onchange="updateShippingStatus(this, '12342')">
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="shipped">Shipped</option>
                                <option value="delivered" selected>Delivered</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </td>
                        <td>2024-01-13</td>
                        <td>
                            <button class="action-btn" onclick="viewOrder('12342')" title="View"><i class="fa-solid fa-eye"></i></button>
                            <button class="action-btn" onclick="printInvoice('12342')" title="Print"><i class="fa-solid fa-print"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


        <div id="orderModal" class="modal">
        <div class="modal-content modal-content-large">
            <div class="modal-header">
                <h2 class="modal-title">Order Details #<span id="orderId"></span></h2>
                <button class="modal-close" onclick="closeOrderModal()">&times;</button>
            </div>
            <div id="orderDetailsContent">
                <!-- Order details will be loaded here -->
            </div>
        </div>
    </div>
@endsection