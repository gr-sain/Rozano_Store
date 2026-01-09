@extends('admin.common.main')

@section('header')
    <x-admin-header  
        title="Shipping Management"
        button-text="Add Shipping Method"
        button-id="addShippingBtn"
    />
@endsection

@section('content')
    <div class="stats-grid stats-grid-spacing">
        <x-stat-card
            icon="fa-truck"
            color="hsl(176, 88%, 27%)"
            value="45"
            label="Shipped Orders"
        />

        <x-stat-card
            icon="fa-clock"
            color="hsl(34, 94%, 50%)"
            value="12"
            label="In Transit"
        />

        <x-stat-card
            icon="fa-check-circle"
            color="hsl(129, 44%, 50%)"
            value="88"
            label="Delivered"
        />
    </div>

    <!-- Shipping Methods -->
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">Shipping Methods</h2>
        </div>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Method Name</th>
                        <th>Type</th>
                        <th>Cost</th>
                        <th>Delivery Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Free Shipping</strong></td>
                        <td><span class="status-badge shipping-type-badge shipping-type-free">Free</span></td>
                        <td>$0.00</td>
                        <td>5-7 Business Days</td>
                        <td><span class="status-badge status-completed">Active</span></td>
                        <td>
                            <button class="action-btn" onclick="editShipping(1)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                            <button class="action-btn delete-btn" onclick="deleteShipping(1)" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Standard Shipping</strong></td>
                        <td><span class="status-badge" style="background: rgba(0, 123, 255, 0.1); color: #007bff;">Flat Rate</span></td>
                        <td>$10.00</td>
                        <td>5-7 Business Days</td>
                        <td><span class="status-badge status-completed">Active</span></td>
                        <td>
                            <button class="action-btn" onclick="editShipping(2)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                            <button class="action-btn" onclick="deleteShipping(2)" title="Delete" style="color: #ff6b6b;"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Express Shipping</strong></td>
                        <td><span class="status-badge" style="background: rgba(0, 123, 255, 0.1); color: #007bff;">Flat Rate</span></td>
                        <td>$25.00</td>
                        <td>2-3 Business Days</td>
                        <td><span class="status-badge status-completed">Active</span></td>
                        <td>
                            <button class="action-btn" onclick="editShipping(3)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                            <button class="action-btn" onclick="deleteShipping(3)" title="Delete" style="color: #ff6b6b;"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Percentage Based</strong></td>
                        <td><span class="status-badge shipping-type-badge shipping-type-percentage">Percentage</span></td>
                        <td>5% of Order</td>
                        <td>3-5 Business Days</td>
                        <td><span class="status-badge status-completed">Active</span></td>
                        <td>
                            <button class="action-btn" onclick="editShipping(4)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                            <button class="action-btn" onclick="deleteShipping(4)" title="Delete" style="color: #ff6b6b;"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Shipping Zones -->
    <div class="content-card content-spacing">
        <div class="card-header">
            <h2 class="card-title">Shipping Zones</h2>
        </div>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Zone Name</th>
                        <th>Countries</th>
                        <th>Shipping Methods</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Domestic</strong></td>
                        <td>United States</td>
                        <td>Standard, Express, Overnight</td>
                        <td>
                            <button class="action-btn" onclick="editZone(1)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                            <button class="action-btn" onclick="deleteZone(1)" title="Delete" style="color: #ff6b6b;"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>International</strong></td>
                        <td>All Countries</td>
                        <td>Standard International</td>
                        <td>
                            <button class="action-btn" onclick="editZone(2)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                            <button class="action-btn delete-btn" onclick="deleteZone(2)" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div id="shippingModal" class="modal">
        <div class="modal-content modal-content-small">
            <div class="modal-header">
                <h2 class="modal-title" id="shippingModalTitle">Add Shipping Method</h2>
                <button class="modal-close" onclick="closeShippingModal()">&times;</button>
            </div>
            <form id="shippingForm" class="form-spacing">
                <div style="margin-bottom: 1rem;">
                    <label class="form-label">Method Name *</label>
                    <input type="text" id="methodName" class="form-input" required placeholder="Standard Shipping">
                </div>
                <div style="margin-bottom: 1rem;">
                    <label class="form-label">Shipping Type *</label>
                    <select id="shippingType" class="form-input" required onchange="toggleShippingFields()">
                        <option value="free">Free Shipping</option>
                        <option value="flat">Flat Rate</option>
                        <option value="percentage">Percentage</option>
                    </select>
                </div>
                <div id="costField" class="form-grid-2">
                    <div id="flatCostDiv">
                        <label class="form-label">Flat Rate Cost *</label>
                        <div style="position: relative;">
                            <span style="position: absolute; left: 0.75rem; top: 50%; transform: translateY(-50%); color: var(--text-color-light);">$</span>
                            <input type="number" id="flatCost" class="form-input" placeholder="10.00" step="0.01" style="padding-left: 2rem;">
                        </div>
                    </div>
                    <div id="percentageDiv" class="percentage-field">
                        <label class="form-label">Percentage *</label>
                        <div style="position: relative;">
                            <input type="number" id="percentageValue" class="form-input" placeholder="5" step="0.1" min="0" max="100" style="padding-right: 2.5rem;">
                            <span style="position: absolute; right: 0.75rem; top: 50%; transform: translateY(-50%); color: var(--text-color-light);">%</span>
                        </div>
                    </div>
                    <div>
                        <label class="form-label">Delivery Time</label>
                        <input type="text" id="deliveryTime" class="form-input" placeholder="5-7 Business Days">
                    </div>
                </div>
                <div id="freeShippingNote" class="free-shipping-note">
                    <i class="fa-solid fa-info-circle"></i> Free shipping will be applied with $0.00 cost.
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                        <input type="checkbox" id="isActive" checked>
                        <span>Active</span>
                    </label>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-cancel" onclick="closeShippingModal()">Cancel</button>
                    <button type="submit" class="btn-submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection