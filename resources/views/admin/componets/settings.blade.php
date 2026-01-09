@extends('admin.common.main')

@section('header')
    <x-admin-header 
        title="Settings"
    />
@endsection

@section('content')
    <div style="display: grid; grid-template-columns: 250px 1fr; gap: 2rem;">
        <!-- Settings Menu -->
        <div class="content-card" style="height: fit-content;">
            <ul class="settings-tabs">
                <li><a href="#general" class="settings-tab active" onclick="showTab('general')">General</a></li>
                <li><a href="#payment" class="settings-tab" onclick="showTab('payment')">Payment</a></li>
                <li><a href="#email" class="settings-tab" onclick="showTab('email')">Email</a></li>
                <li><a href="#notifications" class="settings-tab" onclick="showTab('notifications')">Notifications</a></li>
                <li><a href="#security" class="settings-tab" onclick="showTab('security')">Security</a></li>
            </ul>
        </div>

        <!-- Settings Content -->
        <div>
            <!-- General Settings -->
            <div id="general" class="settings-content active">
                <div class="content-card">
                    <div class="card-header">
                        <h2 class="card-title">General Settings</h2>
                    </div>
                    <form class="form-spacing">
                        <div style="margin-bottom: 1.5rem;">
                            <label class="form-label">Store Name *</label>
                            <input type="text" class="form-input" value="Exclusive Store" required>
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label class="form-label">Store Email *</label>
                            <input type="email" class="form-input" value="admin@exclusive.com" required>
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label class="form-label">Store Phone *</label>
                            <input type="tel" class="form-input" value="+1 234 567 8900" required>
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label class="form-label">Store Address</label>
                            <textarea class="form-textarea" rows="3">123 Main Street, New York, NY 10001</textarea>
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label class="form-label">Store Logo</label>
                            <input type="file" class="form-input" accept="image/*">
                        </div>
                        <button type="submit" class="btn-submit">Save Changes</button>
                    </form>
                </div>
            </div>

            <!-- Payment Settings -->
            <div id="payment" class="settings-content">
                <div class="content-card">
                    <div class="card-header">
                        <h2 class="card-title">Payment Settings</h2>
                    </div>
                    <form class="form-spacing">
                        <div style="margin-bottom: 1.5rem;">
                            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                <input type="checkbox" checked>
                                <span>Enable PayPal</span>
                            </label>
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label class="form-label">PayPal Client ID</label>
                            <input type="text" class="form-input" placeholder="Enter PayPal Client ID">
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                <input type="checkbox" checked>
                                <span>Enable Stripe</span>
                            </label>
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label class="form-label">Stripe Publishable Key</label>
                            <input type="text" class="form-input" placeholder="Enter Stripe Key">
                        </div>
                        <button type="submit" class="btn-submit">Save Changes</button>
                    </form>
                </div>
            </div>

            <!-- Email Settings -->
            <div id="email" class="settings-content">
                <div class="content-card">
                    <div class="card-header">
                        <h2 class="card-title">Email Settings</h2>
                    </div>
                    <form class="form-spacing">
                        <div style="margin-bottom: 1.5rem;">
                            <label class="form-label">SMTP Host</label>
                            <input type="text" class="form-input" value="smtp.gmail.com">
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label class="form-label">SMTP Port</label>
                            <input type="number" class="form-input" value="587">
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label class="form-label">SMTP Username</label>
                            <input type="text" class="form-input" placeholder="Enter email">
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label class="form-label">SMTP Password</label>
                            <input type="password" class="form-input" placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn-submit">Save Changes</button>
                    </form>
                </div>
            </div>

            <!-- Notifications Settings -->
            <div id="notifications" class="settings-content">
                <div class="content-card">
                    <div class="card-header">
                        <h2 class="card-title">Notification Settings</h2>
                    </div>
                    <form class="form-spacing">
                        <div style="margin-bottom: 1rem;">
                            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                <input type="checkbox" checked>
                                <span>Email notifications for new orders</span>
                            </label>
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                <input type="checkbox" checked>
                                <span>Email notifications for low stock</span>
                            </label>
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                <input type="checkbox">
                                <span>Email notifications for new reviews</span>
                            </label>
                        </div>
                        <button type="submit" class="btn-submit">Save Changes</button>
                    </form>
                </div>
            </div>

            <!-- Security Settings -->
            <div id="security" class="settings-content">
                <div class="content-card">
                    <div class="card-header">
                        <h2 class="card-title">Security Settings</h2>
                    </div>
                    <form class="form-spacing">
                        <div style="margin-bottom: 1.5rem;">
                            <label class="form-label">Current Password</label>
                            <input type="password" class="form-input" required>
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-input" required>
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" class="form-input" required>
                        </div>
                        <button type="submit" class="btn-submit">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection