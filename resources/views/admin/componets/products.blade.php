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
                    @foreach ($products as $product)
                        <tr>
                        <td><input type="checkbox" class="product-checkbox" value="{{ $product->id }}"></td>
                        <td>
                            <div class="product-item-wrapper">
                                <img src="{{ asset('storage/product/'. $product->thumbnail) }}" alt="{{ $product->name }}" class="product-item-img">
                                <div>
                                    <div class="product-item-name">{{ $product->name }}</div>
                                    <div class="product-item-desc">{{ Str::limit($product->description, 30) }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $product->sku ?? 'N/A' }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td class="price-cell">{{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->stock ?? 0 }}</td>
                        <td>
                            @if ($product->stock > 20)
                                <span class="status-badge status-completed">In Stock</span>
                            @elseif ($product->stock > 0)
                                <span class="status-badge status-pending">Low Stock</span>
                            @else
                                <span class="status-badge status-cancelled">Out of Stock</span>
                            @endif
                        </td>
                        <td>
                            <button class="action-btn" onclick="editProduct({{ $product->id }})" title="Edit">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete-btn" title="Delete">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
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
            <form id="productForm" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <input type="hidden" name="product_id" id="productId">
                <div class="form-grid-2">
                    <div>
                        <label class="form-label">Product Name *</label>
                        <input type="text" name="name" id="productName" class="form-input" required placeholder="Enter product name">
                    </div>
                    <div>
                        <label class="form-label">SKU *</label>
                        <input type="text" name="sku" id="productSku" class="form-input" required placeholder="Enter SKU">
                    </div>
                </div>

                <div class="form-grid-2">
                    <div>
                        <label class="form-label">Category *</label>
                        <select name="category_id" id="productCategory" class="form-input" required>
                            <option value="">Select Category</option>
                            @foreach($category as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="form-label">Brand *</label>
                        <select name="brand_id" id="productBrand" class="form-input" required>
                            <option value="">Select Brand</option>
                            @foreach($brand as $br)
                                <option value="{{ $br->id }}">{{ $br->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-grid-3">
                    <div>
                        <label class="form-label">Price *</label>
                        <input type="number" name="price" id="productPrice" class="form-input" required placeholder="0.00" step="0.01">
                    </div>
                    <div>
                        <label class="form-label">Old Price</label>
                        <input type="number" name="old_price" id="productOldPrice" class="form-input" placeholder="0.00" step="0.01">
                    </div>
                    <div>
                        <label class="form-label">Stock Quantity *</label>
                        <input type="number" name="stock" id="productStock" class="form-input" required placeholder="0">
                    </div>
                </div>

                <div style="margin-bottom: 1rem;">
                    <label class="form-label">Description *</label>
                    <textarea name="description" id="productDescription" class="form-textarea" rows="4" required placeholder="Enter product description"></textarea>
                </div>

                {{-- Badge Selection - Only one at a time --}}
                <div style="margin-bottom: 1.5rem; padding: 1rem; background: #f8f9fa; border-radius: 8px;">
                    <label class="form-label" style="margin-bottom: 0.5rem; display: block;">Product Badge (Select One)</label>
                    
                    <div style="display: flex; gap: 2rem;">
                        <div class="form-check">
                            <input type="radio" name="badge_type" value="hot" class="form-check-input" id="badge_hot" onclick="toggleBadgeFields('hot')">
                            <label class="form-check-label" for="badge_hot">
                                🔥 Hot Product
                            </label>
                        </div>

                        <div class="form-check">
                            <input type="radio" name="badge_type" value="sale" class="form-check-input" id="badge_sale" onclick="toggleBadgeFields('sale')">
                            <label class="form-check-label" for="badge_sale">
                                🏷️ On Sale
                            </label>
                        </div>

                        <div class="form-check">
                            <input type="radio" name="badge_type" value="none" class="form-check-input" id="badge_none" onclick="toggleBadgeFields('none')" checked>
                            <label class="form-check-label" for="badge_none">
                                ❌ No Badge
                            </label>
                        </div>
                    </div>

                    {{-- Hidden inputs for backend --}}
                    <input type="hidden" name="is_hot" id="is_hot_input" value="0">
                    <input type="hidden" name="is_sale" id="is_sale_input" value="0">

                    {{-- Discount field - only shows when "On Sale" is selected --}}
                    <div id="discount_field" style="margin-top: 1rem; display: none;">
                        <label class="form-label">Discount Percentage *</label>
                        <input type="number" name="discount_percent" id="productDiscount" class="form-input" placeholder="e.g., 20" min="0" max="100">
                        <small style="color: #666;">Enter discount percentage (0-100)</small>
                    </div>
                </div>


                <div style="margin-bottom: 1.5rem; padding: 1rem; background: #f8f9fa; border-radius: 8px;">
                    <label class="form-label" style="margin-bottom: 0.5rem; display: block;">Product Type (Select One)</label>
                    
                    <div style="display: flex; gap: 2rem;">
                        <div class="form-check">
                            <input type="radio" name="product_type" value="featured" class="form-check-input" id="type_featured" onclick="toggleProductType('featured')">
                            <label class="form-check-label" for="type_featured">
                                ⭐ Featured
                            </label>
                        </div>

                        <div class="form-check">
                            <input type="radio" name="product_type" value="popular" class="form-check-input" id="type_popular" onclick="toggleProductType('popular')">
                            <label class="form-check-label" for="type_popular">
                                🔥 Popular
                            </label>
                        </div>

                        <div class="form-check">
                            <input type="radio" name="product_type" value="new" class="form-check-input" id="type_new" onclick="toggleProductType('new')">
                            <label class="form-check-label" for="type_new">
                                ✨ New Added
                            </label>
                        </div>

                        <div class="form-check">
                            <input type="radio" name="product_type" value="none_type" class="form-check-input" id="type_none" onclick="toggleProductType('none_type')" checked>
                            <label class="form-check-label" for="type_none">
                                ❌ Regular
                            </label>
                        </div>
                    </div>

                    {{-- Hidden inputs for backend --}}
                    <input type="hidden" name="is_featured" id="is_featured_input" value="0">
                    <input type="hidden" name="is_popular" id="is_popular_input" value="0">
                    <input type="hidden" name="is_new" id="is_new_input" value="0">
                </div>

                <div style="margin-bottom: 1rem;">
                    <label class="form-label">Main Thumbnail *</label>
                    <input type="file" name="thumbnail" id="productThumbnail" class="form-input" accept="image/*" required>
                    <div id="thumbnailPreviewContainer" style="margin-top: 10px; display: none;">
                        <img id="thumbnailPreview" style="max-width: 150px; border: 2px solid #ddd; border-radius: 8px; padding: 5px;">
                        <p style="font-size: 12px; color: #666; margin-top: 5px;">Current Thumbnail</p>
                    </div>
                </div>

                <div style="margin-bottom: 1rem;">
                    <label class="form-label">Hover Thumbnail *</label>
                    <input type="file" name="hover_thumbnail" id="productHoverThumbnail" class="form-input" accept="image/*" required>
                    <div id="hoverThumbnailPreviewContainer" style="margin-top: 10px; display: none;">
                        <img id="hoverThumbnailPreview" style="max-width: 150px; border: 2px solid #ddd; border-radius: 8px; padding: 5px;">
                        <p style="font-size: 12px; color: #666; margin-top: 5px;">Current Hover Thumbnail</p>
                    </div>
                </div>
                
                <div style="margin-bottom: 1rem;">
                    <label class="form-label">Gallery Images</label>
                    <input type="file" name="images[]" id="galleryImages" class="form-input" accept="image/*" multiple>
                    
                    <div id="existingGalleryContainer" style="margin-top: 15px; display: none;">
                        <p style="font-weight: 600; margin-bottom: 10px;">Existing Gallery Images:</p>
                        <div id="existingGalleryPreview" style="display: flex; flex-wrap: wrap; gap: 10px;"></div>
                    </div>

                    <div id="newGalleryPreview" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 15px;"></div>
                </div>
                <div class="form-actions">
                    <button type="button" class="modal-close btn-cancel" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="btn-submit">Save Product</button>
                </div>
            </form>
        </div>
    </div>
    @endsection