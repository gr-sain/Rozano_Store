@extends('admin.common.main')

@section('header')
    <x-admin-header 
        title="Products Management"
        :show-search="true"
        search-placeholder="Search products..."
        search-id="productSearch"
        button-text="Add Product"
        button-id="addProductBtn"
    />
@endsection
@section('content')
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">All Products</h2>
            <div class="filter-group">
                <select class="admin-select">
                    <option>All Categories</option>
                    <option>Electronics</option>
                    <option>Fashion</option>
                    <option>Home & Living</option>
                </select>
                <select class="admin-select">
                    <option>All Status</option>
                    <option>In Stock</option>
                    <option>Out of Stock</option>
                </select>
            </div>
        </div>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="selectAll">
                        </th>
                        <th>Product</th>
                        <th>SKU</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="productsTableBody">
                    <tr>
                        <td><input type="checkbox" class="product-checkbox"></td>
                        <td>
                            <div class="product-item-wrapper">
                                <img src="{{ asset('img/product-2-1.jpg') }}" alt="Product" class="product-item-img">
                                <div>
                                    <div class="product-item-name">iPhone 14 Pro</div>
                                    <div class="product-item-desc">Latest Apple smartphone</div>
                                </div>
                            </div>
                        </td>
                        <td>IPH14P-001</td>
                        <td>Electronics</td>
                        <td class="price-cell">$999.00</td>
                        <td>45</td>
                        <td><span class="status-badge status-completed">In Stock</span></td>
                        <td>
                            <button class="action-btn" onclick="editProduct(1)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                            <button class="action-btn delete-btn" onclick="deleteProduct(1)" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="product-checkbox"></td>
                        <td>
                            <div class="product-item-wrapper">
                                <img src="{{ asset('img/product-2-1.jpg') }}" alt="Product" class="product-item-img">
                                <div>
                                    <div class="product-item-name">Samsung Galaxy S23</div>
                                    <div class="product-item-desc">Premium Android device</div>
                                </div>
                            </div>
                        </td>
                        <td>SAM23-001</td>
                        <td>Electronics</td>
                        <td class="price-cell">$899.00</td>
                        <td>32</td>
                        <td><span class="status-badge status-completed">In Stock</span></td>
                        <td>
                            <button class="action-btn" onclick="editProduct(2)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                            <button class="action-btn delete-btn" onclick="deleteProduct(2)" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="product-checkbox"></td>
                        <td>
                            <div class="product-item-wrapper">
                                <img src="{{ asset('img/product-2-1.jpg') }}" alt="Product" class="product-item-img">
                                <div>
                                    <div class="product-item-name">MacBook Pro</div>
                                    <div class="product-item-desc">Professional laptop</div>
                                </div>
                            </div>
                        </td>
                        <td>MBP-001</td>
                        <td>Electronics</td>
                        <td class="price-cell">$2,499.00</td>
                        <td>8</td>
                        <td><span class="status-badge status-pending">Low Stock</span></td>
                        <td>
                            <button class="action-btn" onclick="editProduct(3)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                            <button class="action-btn delete-btn" onclick="deleteProduct(3)" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="product-checkbox"></td>
                        <td>
                            <div class="product-item-wrapper">
                                <img src="{{ asset('img/product-2-1.jpg') }}" alt="Product" class="product-item-img">
                                <div>
                                    <div class="product-item-name">AirPods Pro</div>
                                    <div class="product-item-desc">Wireless earbuds</div>
                                </div>
                            </div>
                        </td>
                        <td>APP-001</td>
                        <td>Electronics</td>
                        <td class="price-cell">$249.00</td>
                        <td>0</td>
                        <td><span class="status-badge status-cancelled">Out of Stock</span></td>
                        <td>
                            <button class="action-btn" onclick="editProduct(4)" title="Edit"><i class="fa-solid fa-edit"></i></button>
                            <button class="action-btn delete-btn" onclick="deleteProduct(4)" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-footer">
            <div>
                <button class="action-btn delete-btn" onclick="bulkDelete()">
                    <i class="fa-solid fa-trash"></i> Delete Selected
                </button>
            </div>
            <div class="pagination-group">
                <button class="action-btn">Previous</button>
                <span>Page 1 of 5</span>
                <button class="action-btn">Next</button>
            </div>
        </div>
    </div>


    <div id="productModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modalTitle">Add New Product</h2>
                <button class="modal-close" onclick="closeModal()">&times;</button>
            </div>
            <form id="productForm">
                <div class="form-grid-2">
                    <div>
                        <label class="form-label">Product Name *</label>
                        <input type="text" class="form-input" required placeholder="Enter product name">
                    </div>
                    <div>
                        <label class="form-label">SKU *</label>
                        <input type="text" class="form-input" required placeholder="Enter SKU">
                    </div>
                </div>
                <div class="form-grid-2">
                    <div>
                        <label class="form-label">Category *</label>
                        <select class="form-input" required>
                            <option value="">Select Category</option>
                            <option>Electronics</option>
                            <option>Fashion</option>
                            <option>Home & Living</option>
                            <option>Sports</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Brand</label>
                        <input type="text" class="form-input" placeholder="Enter brand name">
                    </div>
                </div>
                <div class="form-grid-3">
                    <div>
                        <label class="form-label">Price *</label>
                        <input type="number" class="form-input" required placeholder="0.00" step="0.01">
                    </div>
                    <div>
                        <label class="form-label">Stock Quantity *</label>
                        <input type="number" class="form-input" required placeholder="0">
                    </div>
                    <div>
                        <label class="form-label">Status</label>
                        <select class="form-input">
                            <option>In Stock</option>
                            <option>Out of Stock</option>
                            <option>Low Stock</option>
                        </select>
                    </div>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label class="form-label">Description *</label>
                    <textarea class="form-textarea" rows="4" required placeholder="Enter product description"></textarea>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label class="form-label">Product Images</label>
                    <input type="file" class="form-input" multiple accept="image/*">
                    <div class="form-help-text">You can upload multiple images</div>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="btn-submit">Save Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection