@extends('admin.common.main')

@section('header')
    <x-admin-header 
        title="Reviews Managementt"
        :show-search="true"
        search-placeholder="Search reviews..."
        search-id="reviewSearch"
    />
@endsection

@section('content')
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">All Reviews</h2>
            <select class="admin-select">
                <option>All Ratings</option>
                <option>5 Stars</option>
                <option>4 Stars</option>
                <option>3 Stars</option>
                <option>2 Stars</option>
                <option>1 Star</option>
            </select>
        </div>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="product-item-wrapper">
                                <img src="{{ asset('img/product-2-1.jpg') }}" alt="Product" class="product-item-img">
                                <span class="product-item-name">iPhone 14 Pro</span>
                            </div>
                        </td>
                        <td>John Doe</td>
                        <td>
                            <div style="color: #ffc107;">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </td>
                        <td style="max-width: 300px;">Excellent product! Very satisfied with the purchase.</td>
                        <td>2024-01-15</td>
                        <td><span class="status-badge status-completed">Approved</span></td>
                        <td>
                            <button class="action-btn" onclick="approveReview(1)" title="Approve"><i class="fa-solid fa-check"></i></button>
                            <button class="action-btn delete-btn" onclick="rejectReview(1)" title="Reject"><i class="fa-solid fa-times"></i></button>
                            <button class="action-btn delete-btn" onclick="deleteReview(1)" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="product-item-wrapper">
                                <img src="{{ asset('img/product-1-1.jpg') }}" alt="Product" class="product-item-img">
                                <span class="product-item-name">Samsung Galaxy S23</span>
                            </div>
                        </td>
                        <td>Jane Smith</td>
                        <td>
                            <div style="color: #ffc107;">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                        </td>
                        <td style="max-width: 300px;">Good phone but battery could be better.</td>
                        <td>2024-01-14</td>
                        <td><span class="status-badge status-pending">Pending</span></td>
                        <td>
                            <button class="action-btn" onclick="approveReview(2)" title="Approve"><i class="fa-solid fa-check"></i></button>
                            <button class="action-btn delete-btn" onclick="rejectReview(2)" title="Reject"><i class="fa-solid fa-times"></i></button>
                            <button class="action-btn delete-btn" onclick="deleteReview(2)" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection