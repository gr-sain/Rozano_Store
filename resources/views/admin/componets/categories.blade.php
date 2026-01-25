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
            @foreach ($categories as $category)
                <div class="category-card">
                    <div class="category-card-header">

                        <div>

                            <div class="category__icon"><i class="{{ $category->icon }}"></i></div>
                            <h3 class="category-name">{{ $category->name }}</h3>
                            {{-- <p class="category-count">156 Products</p> --}}
                            {{-- Title --}}
                            <span class="{{ $category->status ? 'text-success' : 'text-danger' }}">
                                {{ $category->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>

                        {{-- Actions --}}
                        <div class="category-actions">

                            {{-- Edit --}}
                            <button 
                                class="action-btn"
                                onclick="editCategory({{ $category->id }})"
                                title="Edit"
                            >
                                <i class="fa-solid fa-edit"></i>
                            </button>


                            {{-- Delete --}}
                            <form 
                                action="{{ route('categories.destroy', $category->id) }}" 
                                method="POST"
                                style="display:inline;"
                            >
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit"
                                    class="action-btn delete-btn"
                                    onclick="return confirm('Are you sure?')"
                                    title="Delete"
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


<div id="categoryModal" class="modal">
    <div class="modal-content modal-content-small">
        <div class="modal-header">
            <h2 class="modal-title" id="categoryModalTitle">Add Category</h2>
            <button class="modal-close" onclick="closeCategoryModal()">&times;</button>
        </div>
        <form id="categoryForm" class="form-spacing" action="{{ route('categories.store') }}" method="POST">
            @csrf

            <input type="hidden" name="_method" id="formMethod" value="POST">
            <div style="margin-bottom: 1rem;">
                <label class="form-label">Category Name *</label>
                <input type="text" name="name" class="form-input" required placeholder="Enter category name">
            </div>

            <div style="margin-bottom: 1rem;">
                <label class="form-label">FontAwesome Icon</label>
                <input type="text" name="icon" class="form-input" name="icon" placeholder="fa-solid fa-shirt">
            </div>
            <div style="margin-bottom: 1rem;">
                <label class="form-label">Status</label>
                <select name="status" class="form-input">
                    <option value="1" class="form-input">Active</option>
                    <option value="0" class="form-input">Inactive</option>
                </select>
            </div>
            <div class="form-actions">
                <button type="button" class="btn-cancel" onclick="closeCategoryModal()">Cancel</button>
                <button type="submit" class="btn-submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection 