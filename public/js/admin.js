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

document.addEventListener('DOMContentLoaded', function() {
    const addProductBtn = document.getElementById('addProductBtn');
    if (addProductBtn) {
        addProductBtn.addEventListener('click', function() {
            openModal('productModal', 'modalTitle', 'Add New Product');
            const form = document.getElementById('productForm');
            if (form) form.reset();
        });
    }

    const selectAll = document.getElementById('selectAll');
    if (selectAll) {
        selectAll.addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.product-checkbox');
            checkboxes.forEach(cb => cb.checked = this.checked);
        });
    }
});

window.editProduct = function(id) {
    openModal('productModal', 'modalTitle', 'Edit Product');
};

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
        addCategoryBtn.addEventListener('click', function() {
            openModal('categoryModal', 'categoryModalTitle', 'Add Category');
            const form = document.getElementById('categoryForm');
            if (form) form.reset();
        });
    }
});

window.editCategory = function(id) {
    openModal('categoryModal', 'categoryModalTitle', 'Edit Category');
};

window.closeCategoryModal = function() {
    closeModal('categoryModal');
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