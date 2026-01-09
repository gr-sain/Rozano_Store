@extends('admin.common.main')

@section('header')
    <x-admin-header 
        title="Customers Management"
        :show-search="true"
        search-placeholder="Search customers..."
        search-id="customerSearch"
    />
@endsection

@section('content')
    <div class="stats-grid stats-grid-spacing">
        <x-stat-card
            icon="fa-users"
            color="hsl(176, 88%, 27%)"
            value="3,421"
            label="Total Customers"
        />

        <x-stat-card
            icon="fa-user-plus"
            color="hsl(34, 94%, 50%);"
            value="156"
            label="New This Month"
        />

        <x-stat-card
            icon="fa-check-circle"
            color="hsl(129, 44%, 50%)"
            value="2,890"
            label="Active Customers"
        />
    </div>

    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">All Customers</h2>
        </div>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Orders</th>
                        <th>Total Spent</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="customersTableBody">
                    <tr>
                        <td>
                            <div class="customer-info">
                                <img src="assets/img/avatar-1.jpg" alt="Customer" class="customer-avatar">
                                <div>
                                    <div class="customer-name">John Doe</div>
                                    <div class="customer-id">ID: #12345</div>
                                </div>
                            </div>
                        </td>
                        <td>john@example.com</td>
                        <td>+1 234 567 8900</td>
                        <td>12</td>
                        <td class="price-cell">$5,432.00</td>
                        <td><span class="status-badge status-completed">Active</span></td>
                        <td>
                            <button class="action-btn" onclick="viewCustomer(1)" title="View"><i class="fa-solid fa-eye"></i></button>
                            <button class="action-btn" onclick="editCustomer(1)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                            <button class="action-btn delete-btn" onclick="deleteCustomer(1)" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="customer-info">
                                <img src="assets/img/avatar-2.jpg" alt="Customer" class="customer-avatar">
                                <div>
                                    <div class="customer-name">Jane Smith</div>
                                    <div class="customer-id">ID: #12346</div>
                                </div>
                            </div>
                        </td>
                        <td>jane@example.com</td>
                        <td>+1 234 567 8901</td>
                        <td>8</td>
                        <td class="price-cell">$3,210.00</td>
                        <td><span class="status-badge status-completed">Active</span></td>
                        <td>
                            <button class="action-btn" onclick="viewCustomer(2)" title="View"><i class="fa-solid fa-eye"></i></button>
                            <button class="action-btn" onclick="editCustomer(2)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                            <button class="action-btn delete-btn" onclick="deleteCustomer(2)" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection