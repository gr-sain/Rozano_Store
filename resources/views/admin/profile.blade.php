@extends('admin.common.main')

@section('content')
<div class="profile-container">

    <!-- Profile Header -->
    <div class="profile-header">
        <img src="{{ asset('img/avatar-1.jpg') }}" class="profile-avatar">

        <div class="profile-basic">
            <h2>Admin</h2>
            <p>Admin@gmail.com</p>

            <span class="role-badge">Administrator</span>
        </div>

        <a href="{{ route('settings') }}" class="edit-profile-btn">
            <i class="fa-solid fa-pen"></i> Edit Profile
        </a>
    </div>

    <!-- Profile Info Cards -->
    <div class="profile-cards">

        <div class="profile-card">
            <h4>Personal Info</h4>
            <ul>
                <li><strong>Name:</strong> Admin</li>
                <li><strong>Email:</strong> Admin@gmail.com</li>
                <li><strong>Phone:</strong> +91 99507 41003</li>
                <li><strong>Joined:</strong> 12.02.98</li>
            </ul>
        </div>

        <div class="profile-card">
            <h4>Account Status</h4>
            <ul>
                <li><strong>Status:</strong> <span class="active">Active</span></li>
                <li><strong>Role:</strong> Admin</li>
            </ul>
        </div>

    </div>

</div>
@endsection
