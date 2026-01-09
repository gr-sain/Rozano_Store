@extends('admin.common.main')

@section('header')
    <x-admin-header 
        title="Categories Management"
        button-text="Add Category"
        button-id="addCategoryBtn"
    />
@endsection

@section('content')
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">All Categories</h2>
        </div>
        <div class="category-grid">
            <div class="category-card">
                <div class="category-card-header">
                    <div>
                        <img src="{{ asset('img/category-1.jpg') }}" alt="Category" class="category-img">
                        <h3 class="category-name">Electronics</h3>
                        <p class="category-count">156 Products</p>
                    </div>
                    <div class="category-actions">
                        <button class="action-btn" onclick="editCategory(1)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                        <button class="action-btn delete-btn" onclick="deleteCategory(1)" title="Delete"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div class="category-card">
                <div class="category-card-header">
                    <div>
                        <img src="{{ asset('img/category-1.jpg') }}" alt="Category" class="category-img">
                        <h3 class="category-name">Fashion</h3>
                        <p class="category-count">89 Products</p>
                    </div>
                    <div class="category-actions">
                        <button class="action-btn" onclick="editCategory(2)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                        <button class="action-btn delete-btn" onclick="deleteCategory(2)" title="Delete"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div class="category-card">
                <div class="category-card-header">
                    <div>
                        <img src="{{ asset('img/category-1.jpg') }}" alt="Category" class="category-img">
                        <h3 class="category-name">Home & Living</h3>
                        <p class="category-count">67 Products</p>
                    </div>
                    <div class="category-actions">
                        <button class="action-btn" onclick="editCategory(3)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                        <button class="action-btn delete-btn" onclick="deleteCategory(3)" title="Delete"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div id="categoryModal" class="modal">
    <div class="modal-content modal-content-small">
        <div class="modal-header">
            <h2 class="modal-title" id="categoryModalTitle">Add Category</h2>
            <button class="modal-close" onclick="closeCategoryModal()">&times;</button>
        </div>
        <form id="categoryForm" class="form-spacing">
            <div style="margin-bottom: 1rem;">
                <label class="form-label">Category Name *</label>
                <input type="text" class="form-input" required placeholder="Enter category name">
            </div>
            <div style="margin-bottom: 1rem;">
                <label class="form-label">Category Image</label>
                <input type="file" class="form-input" accept="image/*">
            </div>
            <div style="margin-bottom: 1rem;">
                <label class="form-label">Description</label>
                <textarea class="form-textarea" rows="3" placeholder="Enter description"></textarea>
            </div>
            <div class="form-actions">
                <button type="button" class="btn-cancel" onclick="closeCategoryModal()">Cancel</button>
                <button type="submit" class="btn-submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection 