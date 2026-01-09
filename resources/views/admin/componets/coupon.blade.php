@extends('admin.common.main')

@section('header')
    <x-admin-header 
        title="Coupons  Management"
        button-text="Create Coupon"
        button-id="addCouponBtn"
    />
@endsection

@section('content')
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">All Coupons</h2>
        </div>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Coupon Code</th>
                        <th>Type</th>
                        <th>Discount</th>
                        <th>Usage Limit</th>
                        <th>Used</th>
                        <th>Valid From</th>
                        <th>Valid To</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong class="coupon-code">SUMMER50</strong></td>
                        <td>Percentage</td>
                        <td>50%</td>
                        <td>100</td>
                        <td>45</td>
                        <td>2024-01-01</td>
                        <td>2024-12-31</td>
                        <td><span class="status-badge status-completed">Active</span></td>
                        <td>
                            <button class="action-btn" onclick="editCoupon(1)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                            <button class="action-btn delete-btn" onclick="deleteCoupon(1)" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong class="coupon-code">WELCOME10</strong></td>
                        <td>Fixed</td>
                        <td>$10.00</td>
                        <td>500</td>
                        <td>234</td>
                        <td>2024-01-01</td>
                        <td>2024-06-30</td>
                        <td><span class="status-badge status-completed">Active</span></td>
                        <td>
                            <button class="action-btn" onclick="editCoupon(2)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                            <button class="action-btn delete-btn" onclick="deleteCoupon(2)" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div id="couponModal" class="modal">
        <div class="modal-content modal-content-small">
            <div class="modal-header">
                <h2 class="modal-title" id="couponModalTitle">Create Coupon</h2>
                <button class="modal-close" onclick="closeCouponModal()">&times;</button>
            </div>
            <form id="couponForm" class="form-spacing">
                <div class="form-grid-2">
                    <div>
                        <label class="form-label">Coupon Code *</label>
                        <input type="text" class="form-input" required placeholder="SUMMER50">
                    </div>
                    <div>
                        <label class="form-label">Discount Type *</label>
                        <select class="form-input" required>
                            <option>Percentage</option>
                            <option>Fixed Amount</option>
                        </select>
                    </div>
                </div>
                <div class="form-grid-2">
                    <div>
                        <label class="form-label">Discount Value *</label>
                        <input type="number" class="form-input" required placeholder="50">
                    </div>
                    <div>
                        <label class="form-label">Usage Limit</label>
                        <input type="number" class="form-input" placeholder="100">
                    </div>
                </div>
                <div class="form-grid-2">
                    <div>
                        <label class="form-label">Valid From *</label>
                        <input type="date" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Valid To *</label>
                        <input type="date" class="form-input" required>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-cancel" onclick="closeCouponModal()">Cancel</button>
                    <button type="submit" class="btn-submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection