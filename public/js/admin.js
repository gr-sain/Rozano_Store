document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('adminSidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const menuToggle = document.getElementById('menuToggle');
    
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
        });
    }
    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('show');
        });
    }
    const sidebarState = localStorage.getItem('sidebarCollapsed');
    if (sidebarState === 'true') {
        sidebar.classList.add('collapsed');
    }
    document.addEventListener('click', function(e) {
        if (window.innerWidth <= 768) {
            if (!sidebar.contains(e.target) && !menuToggle.contains(e.target)) {
                sidebar.classList.remove('show');
            }
        }
    });
    const menuLinks = document.querySelectorAll('.sidebar-link');
    menuLinks.forEach(link => {
        link.addEventListener('click', function() {
            document.querySelectorAll('.sidebar-item').forEach(item => {
                item.classList.remove('active');
            });
            this.closest('.sidebar-item').classList.add('active');
        });
    });
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        setTimeout(() => {
            card.style.transition = 'all 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});
window.addEventListener('resize', function() {
    const sidebar = document.getElementById('adminSidebar');
    if (window.innerWidth > 768) {
        sidebar.classList.remove('show');
    }
});

function openModal(modalId, titleId = null, titleText = null) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('show');
        if (titleId && titleText) {
            const titleElement = document.getElementById(titleId);
            if (titleElement) {
                titleElement.textContent = titleText;
            }
        }
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('show');
    }
}


document.addEventListener('click', function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.classList.remove('show');
    }
});

document.addEventListener('click', function(event) {
    if (event.target.classList.contains('modal-close') || event.target.closest('.modal-close')) {
        const modal = event.target.closest('.modal');
        if (modal) {
            modal.classList.remove('show');
        }
    }
});

function previewNewGalleryImages(input) {
    const previewContainer = document.getElementById('newGalleryPreview');
    previewContainer.innerHTML = ''; // Clear previous previews
    
    if (input.files) {
        Array.from(input.files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgWrapper = document.createElement('div');
                imgWrapper.style.cssText = 'position: relative; display: inline-block;';
                
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.cssText = 'width: 100px; height: 100px; object-fit: cover; border: 2px solid #ddd; border-radius: 8px;';
                
                const removeBtn = document.createElement('button');
                removeBtn.innerHTML = '&times;';
                removeBtn.type = 'button';
                removeBtn.style.cssText = 'position: absolute; top: -5px; right: -5px; background: red; color: white; border: none; border-radius: 50%; width: 25px; height: 25px; cursor: pointer; font-size: 18px; line-height: 1;';
                removeBtn.onclick = function() {
                    imgWrapper.remove();
                    // Remove file from input (complex, so just hide the preview)
                };
                
                imgWrapper.appendChild(img);
                imgWrapper.appendChild(removeBtn);
                previewContainer.appendChild(imgWrapper);
            };
            reader.readAsDataURL(file);
        });
    }
}

// Preview thumbnail on change
function previewThumbnail(input, previewId, containerId) {
    const preview = document.getElementById(previewId);
    const container = document.getElementById(containerId);
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            container.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// DOMContentLoaded
document.addEventListener('DOMContentLoaded', function() {
    // Gallery images preview
    const galleryInput = document.getElementById('galleryImages');
    if (galleryInput) {
        galleryInput.addEventListener('change', function() {
            previewNewGalleryImages(this);
        });
    }

    
    // Thumbnail preview on change
    const thumbnailInput = document.getElementById('productThumbnail');
    if (thumbnailInput) {
        thumbnailInput.addEventListener('change', function() {
            previewThumbnail(this, 'thumbnailPreview', 'thumbnailPreviewContainer');
        });
    }
    
    // Hover thumbnail preview on change
    const hoverThumbnailInput = document.getElementById('productHoverThumbnail');
    if (hoverThumbnailInput) {
        hoverThumbnailInput.addEventListener('change', function() {
            previewThumbnail(this, 'hoverThumbnailPreview', 'hoverThumbnailPreviewContainer');
        });
    }
});

window.toggleProductType = function(type) {
    const isFeaturedInput = document.getElementById('is_featured_input');
    const isPopularInput = document.getElementById('is_popular_input');
    const isNewInput = document.getElementById('is_new_input');

    // Reset all
    isFeaturedInput.value = '0';
    isPopularInput.value = '0';
    isNewInput.value = '0';

    if (type === 'featured') {
        isFeaturedInput.value = '1';
    } else if (type === 'popular') {
        isPopularInput.value = '1';
    } else if (type === 'new') {
        isNewInput.value = '1';
    }
};

    // Add Product Button
const addProductBtn = document.getElementById('addProductBtn');
if (addProductBtn) {
    addProductBtn.addEventListener('click', function() {
        // Reset form for new product
        const modalTitle = document.getElementById('modalTitle');
        const formMethod = document.getElementById('formMethod');
        const productForm = document.getElementById('productForm');

        document.getElementById('type_none').checked = true;
        toggleProductType('none_type');
        
        if (modalTitle) modalTitle.textContent = 'Add New Product';
        if (formMethod) formMethod.value = 'POST';
        if (productForm) {
            productForm.action = '/admin/products';
            productForm.reset();
        }
        
        // Hide all preview containers
        document.getElementById('thumbnailPreviewContainer').style.display = 'none';
        document.getElementById('hoverThumbnailPreviewContainer').style.display = 'none';
        document.getElementById('existingGalleryContainer').style.display = 'none';
        document.getElementById('newGalleryPreview').innerHTML = '';
        
        // Reset badge fields
        document.getElementById('badge_none').checked = true;
        toggleBadgeFields('none');
        
        // Make thumbnails required
        const productThumbnail = document.getElementById('productThumbnail');
        const productHoverThumbnail = document.getElementById('productHoverThumbnail');
        if (productThumbnail) productThumbnail.setAttribute('required', 'required');
        if (productHoverThumbnail) productHoverThumbnail.setAttribute('required', 'required');
        
        openModal('productModal');
    });
}

// Select All Checkbox
const selectAll = document.getElementById('selectAll');
if (selectAll) {
    selectAll.addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.product-checkbox');
        checkboxes.forEach(cb => cb.checked = this.checked);
    });
}

// Badge selection logic
window.toggleBadgeFields = function(type) {
    const discountField = document.getElementById('discount_field');
    const isHotInput = document.getElementById('is_hot_input');
    const isSaleInput = document.getElementById('is_sale_input');
    const discountInput = document.getElementById('productDiscount');

    // Reset all
    isHotInput.value = '0';
    isSaleInput.value = '0';
    discountField.style.display = 'none';
    if (discountInput) {
        discountInput.required = false;
        discountInput.value = '';
    }

    if (type === 'hot') {
        isHotInput.value = '1';
    } else if (type === 'sale') {
        isSaleInput.value = '1';
        discountField.style.display = 'block';
        if (discountInput) discountInput.required = true;
    }
};

// Edit Product Function
window.editProduct = function(id) {
    fetch(`/admin/products/${id}/edit`)
        .then(res => {
            if (!res.ok) throw new Error('Network response was not ok');
            return res.json();
        })
        .then(product => {

            if (product.is_featured == 1 || product.is_featured === true) {
                document.getElementById('type_featured').checked = true;
                toggleProductType('featured');
            } else if (product.is_popular == 1 || product.is_popular === true) {
                document.getElementById('type_popular').checked = true;
                toggleProductType('popular');
            } else if (product.is_new == 1 || product.is_new === true) {
                document.getElementById('type_new').checked = true;
                toggleProductType('new');
            } else {
                document.getElementById('type_none').checked = true;
                toggleProductType('none_type');
            }
            
            // Update modal title
            const modalTitle = document.getElementById('modalTitle');
            if (modalTitle) modalTitle.textContent = 'Edit Product';
            
            // Update form method and action
            const formMethod = document.getElementById('formMethod');
            if (formMethod) formMethod.value = 'PUT';
            
            const productForm = document.getElementById('productForm');
            if (productForm) productForm.action = `/admin/products/${product.id}`;
            
            const productId = document.getElementById('productId');
            if (productId) productId.value = product.id;
            
            // Fill form fields
            const fields = {
                'productName': product.name,
                'productSku': product.sku,
                'productCategory': product.category_id,
                'productBrand': product.brand_id,
                'productPrice': product.price,
                'productOldPrice': product.old_price,
                'productStock': product.stock,
                'productDescription': product.description
            };
            
            Object.keys(fields).forEach(fieldId => {
                const element = document.getElementById(fieldId);
                if (element) element.value = fields[fieldId] || '';
            });
            
            // Set badge radio buttons based on product data
            if (product.is_hot == 1 || product.is_hot === true) {
                document.getElementById('badge_hot').checked = true;
                toggleBadgeFields('hot');
            } else if (product.is_sale == 1 || product.is_sale === true) {
                document.getElementById('badge_sale').checked = true;
                toggleBadgeFields('sale');
                const discountInput = document.getElementById('productDiscount');
                if (discountInput) discountInput.value = product.discount_percent || '';
            } else {
                document.getElementById('badge_none').checked = true;
                toggleBadgeFields('none');
            }
            
            // Handle main thumbnail preview
            if (product.thumbnail) {
                const preview = document.getElementById('thumbnailPreview');
                const container = document.getElementById('thumbnailPreviewContainer');
                if (preview && container) {
                    preview.src = `/storage/${product.thumbnail}`;
                    container.style.display = 'block';
                }
            }
            
            // Handle hover thumbnail preview
            if (product.hover_thumbnail) {
                const hoverPreview = document.getElementById('hoverThumbnailPreview');
                const hoverContainer = document.getElementById('hoverThumbnailPreviewContainer');
                if (hoverPreview && hoverContainer) {
                    hoverPreview.src = `/storage/${product.hover_thumbnail}`;
                    hoverContainer.style.display = 'block';
                }
            }
            
            // Handle existing gallery images
            if (product.images && product.images.length > 0) {
                const existingGalleryContainer = document.getElementById('existingGalleryContainer');
                const existingGalleryPreview = document.getElementById('existingGalleryPreview');
                
                if (existingGalleryContainer && existingGalleryPreview) {
                    existingGalleryPreview.innerHTML = '';
                    
                    product.images.forEach((image, index) => {
                        const imgWrapper = document.createElement('div');
                        imgWrapper.style.cssText = 'position: relative; display: inline-block;';
                        
                        const img = document.createElement('img');
                        img.src = `/storage/${image.image}`;
                        img.style.cssText = 'width: 100px; height: 100px; object-fit: cover; border: 2px solid #4CAF50; border-radius: 8px;';
                        img.title = 'Existing image';
                        
                        const deleteBtn = document.createElement('button');
                        deleteBtn.innerHTML = '&times;';
                        deleteBtn.type = 'button';
                        deleteBtn.style.cssText = 'position: absolute; top: -5px; right: -5px; background: red; color: white; border: none; border-radius: 50%; width: 25px; height: 25px; cursor: pointer; font-size: 18px; line-height: 1;';
                        deleteBtn.onclick = function () {
                            
                            if (confirm('Delete this image?')) {
                                const url = `/admin/products/images/${image.id}`;
                                
                                fetch(url, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                        'Accept': 'application/json',
                                        'Content-Type': 'application/json'
                                    }
                                })
                                .then(res => {
                                    console.log('Response status:', res.status); // Debug line
                                    if (!res.ok) {
                                        throw new Error(`Delete failed with status: ${res.status}`);
                                    }
                                    return res.json();
                                })
                                .then(data => {
                                    console.log('Response data:', data); // Debug line
                                    if (data.success) {
                                        imgWrapper.remove();
                                        alert('Image deleted successfully!');
                                    }
                                })
                                .catch(err => {
                                    console.error('Error:', err);
                                    alert('Failed to delete image');
                                });
                            }
                        };
                        
                        imgWrapper.appendChild(img);
                        imgWrapper.appendChild(deleteBtn);
                        existingGalleryPreview.appendChild(imgWrapper);
                    });
                    
                    existingGalleryContainer.style.display = 'block';
                }
            }
            
            // Clear new gallery preview
            document.getElementById('newGalleryPreview').innerHTML = '';
            
            // Make file uploads optional for editing
            const productThumbnail = document.getElementById('productThumbnail');
            const productHoverThumbnail = document.getElementById('productHoverThumbnail');
            if (productThumbnail) productThumbnail.removeAttribute('required');
            if (productHoverThumbnail) productHoverThumbnail.removeAttribute('required');
            
            // Open modal
            openModal('productModal');
        })
        .catch(error => {
            console.error('Error fetching product:', error);
            alert('Error loading product data: ' + error.message);
        });
};

// Close modal
window.closeModal = function() {
    closeModal('productModal');
};


window.viewOrder = function(orderId) {
    openModal('orderModal');
};

window.closeOrderModal = function() {
    closeModal('orderModal');
};

window.printInvoice = function(orderId) {
    window.print();
};

document.addEventListener('DOMContentLoaded', function() {
    const addCategoryBtn = document.getElementById('addCategoryBtn');
    if (addCategoryBtn) {
        addCategoryBtn.addEventListener('click', function () {
            openModal('categoryModal', 'categoryModalTitle', 'Add Category');

            const form = document.getElementById('categoryForm');
            form.reset();
            form.action = '/admin/categories';
            document.getElementById('formMethod').value = 'POST';
        });
    }
});

window.editCategory = function (id) {
    fetch(`/admin/categories/${id}/edit`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network error');
            }
            return response.json();
        })
        .then(data => {
            openModal('categoryModal', 'categoryModalTitle', 'Edit Category');

            const form = document.getElementById('categoryForm');

            form.action = `/admin/categories/${id}`;

            // hidden method field (PUT)
            if (!document.getElementById('formMethod')) {
                let methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.id = 'formMethod';
                methodInput.value = 'PUT';
                form.appendChild(methodInput);
            } else {
                document.getElementById('formMethod').value = 'PUT';
            }

            // fill values
            form.querySelector('[name="name"]').value = data.name;
            form.querySelector('[name="icon"]').value = data.icon;
            form.querySelector('[name="status"]').value = data.status;
        })
        .catch(error => {
            alert('Edit data load failed');
            console.error(error);
        });
};


window.closeCategoryModal = function() {
    closeModal('categoryModal');
};


document.addEventListener('DOMContentLoaded', function() {
    const addBennerBtn = document.getElementById('addBennerBtn');
    if (addBennerBtn) {
        addBennerBtn.addEventListener('click', function () {
            openModal('bennerModal', 'bennerModalTitle', 'Add Benner');

            const form = document.getElementById('bennerForm');
            form.reset();
            form.action = '/admin/benner';
            document.getElementById('formMethod').value = 'POST';
        });
    }
});

// window.editBenner = function(id) {
//     openModal('bennerModal', 'bennerModalTitle', 'Edit Benner');
// };

window.closeBennerModal = function() {
    closeModal('bennerModal');
};


document.addEventListener('DOMContentLoaded', function() {
    const addCouponBtn = document.getElementById('addCouponBtn');
    if (addCouponBtn) {
        addCouponBtn.addEventListener('click', function() {
            openModal('couponModal', 'couponModalTitle', 'Create Coupon');
            const form = document.getElementById('couponForm');
            if (form) form.reset();
        });
    }
});

window.editCoupon = function(id) {
    openModal('couponModal', 'couponModalTitle', 'Edit Coupon');
};

window.closeCouponModal = function() {
    closeModal('couponModal');
};



document.getElementById('addBrandBtn').addEventListener('click', function() {
    document.getElementById('brandModalTitle').textContent = 'Create Brand';
    document.getElementById('brandForm').action = "/admin/brands";
    document.getElementById('formMethod').value = 'POST';
    document.getElementById('brandForm').reset();
    document.getElementById('brandModal').style.display = 'flex';
});

// Edit brand function
function editBrand(id) {
    fetch(`/admin/brands/${id}/edit`)
        .then(response => response.json())
        .then(data => {
            
            document.getElementById('brandModalTitle').textContent = 'Edit Brand';
            document.getElementById('brandForm').action = `/admin/brands/${id}`;
            document.getElementById('formMethod').value = 'PUT';
            document.getElementById('brandId').value = data.id;
            document.getElementById('brandName').value = data.name;
            document.getElementById('brandIcon').value = data.icon;
            document.getElementById('brandStatus').value = data.status;
            document.getElementById('brandModal').style.display = 'flex';
        })
        .catch(error => console.error('Error:', error));
}

// Close modal
function closeBrandModal() {
    document.getElementById('brandModal').style.display = 'none';
    document.getElementById('brandForm').reset();
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('brandModal');
    if (event.target == modal) {
        closeBrandModal();
    }
}


window.toggleShippingFields = function() {
    const shippingType = document.getElementById('shippingType');
    if (!shippingType) return;
    
    const type = shippingType.value;
    const flatCostDiv = document.getElementById('flatCostDiv');
    const percentageDiv = document.getElementById('percentageDiv');
    const freeShippingNote = document.getElementById('freeShippingNote');
    const flatCost = document.getElementById('flatCost');
    const percentageValue = document.getElementById('percentageValue');
    
    if (type === 'free') {
        if (flatCostDiv) flatCostDiv.classList.add('hide');
        if (percentageDiv) percentageDiv.classList.remove('show');
        if (freeShippingNote) freeShippingNote.classList.add('show');
        if (flatCost) flatCost.removeAttribute('required');
        if (percentageValue) percentageValue.removeAttribute('required');
    } else if (type === 'flat') {
        if (flatCostDiv) flatCostDiv.classList.remove('hide');
        if (percentageDiv) percentageDiv.classList.remove('show');
        if (freeShippingNote) freeShippingNote.classList.remove('show');
        if (flatCost) flatCost.setAttribute('required', 'required');
        if (percentageValue) percentageValue.removeAttribute('required');
    } else if (type === 'percentage') {
        if (flatCostDiv) flatCostDiv.classList.add('hide');
        if (percentageDiv) percentageDiv.classList.add('show');
        if (freeShippingNote) freeShippingNote.classList.remove('show');
        if (flatCost) flatCost.removeAttribute('required');
        if (percentageValue) percentageValue.setAttribute('required', 'required');
    }
};

document.addEventListener('DOMContentLoaded', function() {
    const addShippingBtn = document.getElementById('addShippingBtn');
    if (addShippingBtn) {
        addShippingBtn.addEventListener('click', function() {
            openModal('shippingModal', 'shippingModalTitle', 'Add Shipping Method');
            const form = document.getElementById('shippingForm');
            if (form) form.reset();
        });
    }
});

window.editShipping = function(id) {
    openModal('shippingModal', 'shippingModalTitle', 'Edit Shipping Method');
};

window.closeShippingModal = function() {
    closeModal('shippingModal');
};

window.showTab = function(tabName) {
    document.querySelectorAll('.settings-content').forEach(content => {
        content.classList.remove('active');
    });
    document.querySelectorAll('.settings-tab').forEach(tab => {
        tab.classList.remove('active');
    });
    
    const targetContent = document.getElementById(tabName);
    const targetTab = event.target.closest('.settings-tab');
    
    if (targetContent) targetContent.classList.add('active');
    if (targetTab) targetTab.classList.add('active');
};

window.viewReports = function() {
    console.log('Opening reports modal...');
    const modal = document.getElementById('reportsModal');
    if (modal) {
        modal.classList.add('show');
        console.log('Modal opened successfully');
    } else {
        console.error('Modal not found!');
    }
};

window.closeReportsModal = function() {
    console.log('Closing reports modal...');
    const modal = document.getElementById('reportsModal');
    if (modal) {
        modal.classList.remove('show');
    }
};

// Modal ke bahar click pe close
window.addEventListener('click', function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.classList.remove('show');
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('profileToggle');
    const dropdown = document.getElementById('profileDropdown');

    toggle.addEventListener('click', () => {
        dropdown.style.display =
            dropdown.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', (e) => {
        if (!toggle.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.style.display = 'none';
        }
    });
});


window.editBanner = function (id) {
    fetch(`/admin/benner/${id}/edit`)
        .then(res => res.json())
        .then(data => {

            openModal('bennerModal', 'bennerModalTitle', 'Edit Benner');

            const form = document.getElementById('bennerForm');

            form.action = `/admin/benner/${id}`;
            document.getElementById('formMethod').value = 'PUT';

            form.elements['subtitle'].value = data.subtitle ?? '';
            form.elements['title'].value = data.title ?? '';
            form.elements['highlight_title'].value = data.highlight_title ?? '';
            form.elements['description'].value = data.description ?? '';
            form.elements['button_text'].value = data.button_text ?? '';
            form.elements['button_link'].value = data.button_link ?? '';

            // Important fix
            form.elements['status'].value = data.status?.toString() ?? '0';
        })
        .catch(err => {
            console.error(err);
            alert('Edit data load failed');
        });
};

