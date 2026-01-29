@extends('admin.common.main')

@section('header')
    <x-admin-header 
        title="Brands Management"
        button-text="Create Brand"
        button-id="addBrandBtn"
    />
@endsection

@section('content')
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">All Brands</h2>
        </div>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Brand Id</th>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($brands as $brand)
                        <tr>
                            <td><strong class="coupon-code">{{ $brand->id }}</strong></td>
                            <td>{{ $brand->name }}</td>
                            <td><i class="{{ $brand->icon }}"></i></td>
                            <td>
                                <span class="status-badge {{ $brand->status ? 'status-completed' : 'status-pending' }}">
                                    {{ $brand->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <button class="action-btn" onclick="editBrand({{ $brand->id }})" title="Edit">
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                                <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this brand?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete-btn" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center;">No brands found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Brand Modal -->
    <div id="brandModal" class="modal">
        <div class="modal-content modal-content-small">
            <div class="modal-header">
                <h2 class="modal-title" id="brandModalTitle">Create Brand</h2>
                <button class="modal-close" onclick="closeBrandModal()">&times;</button>
            </div>
            <form action="{{ route('brands.store') }}" method="POST" id="brandForm" class="form-spacing">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <input type="hidden" name="brand_id" id="brandId">

                <div>
                    <label class="form-label">Brand Name *</label>
                    <input type="text" name="name" id="brandName" class="form-input" required placeholder="Brand name">
                </div>

                <div>
                    <label class="form-label">FontAwesome Icon *</label>
                    <input type="text" name="icon" id="brandIcon" class="form-input" required placeholder="fa-solid fa-shirt">
                </div>

                <div>
                    <label class="form-label">Status</label>
                    <select name="status" id="brandStatus" class="form-input" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="button" class="modal-close btn-cancel" onclick="closeBrandModal()">Cancel</button>
                    <button type="submit" class="btn-submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection