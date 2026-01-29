@extends('admin.common.main')

@section('header')
    <x-admin-header 
        title="Benner"
        button-text="Add Benner"
        button-id="addBennerBtn"
    />
@endsection

@section('content')
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">Benner</h2>
        </div>
        <div class="category-grid">
            <div class="category-card-header">
                <div class="category-grid">

                    @foreach ($banners as $banner)
                        <div class="category-card">
                            <div class="category-card-header">

                                <div>
                                    {{-- Banner Image --}}
                                    <img 
                                        src="{{ asset('storage/'.$banner->image) }}" 
                                        alt="Banner Image" 
                                        class="category-img"
                                    >

                                    {{-- Title --}}
                                    <h3 class="category-name">
                                        {{ $banner->title }}
                                    </h3>

                                    {{-- Subtitle --}}
                                    <p class="category-count">
                                        {{ $banner->subtitle }}
                                    </p>

                                    {{-- Status --}}
                                    <span class="{{ $banner->status ? 'text-success' : 'text-danger' }}">
                                        {{ $banner->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>

                                {{-- Actions --}}
                                <div class="category-actions">

                                    {{-- Edit --}}
                                    <button 
                                        class="action-btn"
                                        onclick="editBanner({{ $banner->id }})"
                                        title="Edit"
                                    >
                                        <i class="fa-solid fa-edit"></i>
                                    </button>

                                    {{-- Delete --}}
                                    <form 
                                        action="{{ route('benner.destroy', $banner->id) }}" 
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
        </div>
    </div>


<div id="bennerModal" class="modal">
    <div class="modal-content modal-content-small">
        <div class="modal-header">
            <h2 class="modal-title" id="bennerModalTitle">Add Benner</h2>
            <button class="modal-close" onclick="closeBennerModal()">&times;</button>
        </div>
        <form id="bennerForm" class="form-spacing" method="POST" action="{{ route('benner.store') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="_method" id="formMethod" value="POST">
            <div style="margin-bottom: 1rem;">
                <label class="form-label">Subtitle *</label>
                <input type="text" name="subtitle" class="form-input" required placeholder="Subtitle Benner">
            </div>

            <div style="margin-bottom: 1rem;">
                <label class="form-label">Title *</label>
                <input type="text" name="title" class="form-input" required placeholder="title Benner">
            </div>

            <div style="margin-bottom: 1rem;">
                <label class="form-label">Hightlight *</label>
                <input type="text" name="highlight_title" class="form-input" required placeholder="Highlight title">
            </div>

            <div style="margin-bottom: 1rem;">
                <label class="form-label">Decsription *</label>
                <input type="text" name="description" class="form-input" required placeholder="Description">
            </div>

            <div style="margin-bottom: 1rem;">
                <label class="form-label">Btn Text *</label>
                <input type="text" name="button_text" class="form-input" required placeholder="Btn Text">
            </div>

            <div style="margin-bottom: 1rem;">
                <label class="form-label">Link *</label>
                <input type="text" name="button_link" class="form-input" required placeholder="link type">
            </div>

            <div style="margin-bottom: 1rem;">
                <label class="form-label">Benner Image</label>
                <input type="file" name="image" class="form-input" accept="image/*">
            </div>
            <div style="margin-bottom: 1rem;">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control form-input">
                    <option value="">Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">Unactive</option>
                </select>
            </div>
            <div class="form-actions">
                <button type="button" class="modal-close btn-cancel" onclick="closeBennerModal()">Cancel</button>
                <button type="submit" class="btn-submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection 