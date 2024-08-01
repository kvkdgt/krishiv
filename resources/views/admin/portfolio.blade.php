@extends('admin/theme')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/admin/blogs.css'); }} ">

<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="page-heading-section">
        <div class="page-upper">
            <div>
                <div class="page-heading">
                    Portfolio
                </div>
                <div class="page-sub-heading">
                    Add your portfolio details from here.
                </div>
            </div>
            <div class="btns-in-portfolio">
                <div class="add-btn">
                    <span class="btn-for-add" id="openAddCategoryModal"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                        </svg> Add New Item</span>
                </div>
                <div class="add-btn">
                    <a style="text-decoration:none" href="{{ route('admin/portfolio/categories') }}"> <span class="btn-for-add">Categories</span> </a>
                </div>
            </div>
        </div>
        <div class="main-section">
            <table>
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($portfolios as $portfolio)

                    <tr>
                        <td>2</td>
                        <td>{{$portfolio->name}}</td>
                        <td>{{$portfolio->category->name}}</td>
                        <td><span class="{{ $portfolio->status == 'Active' ? 'active-status' : 'inactive-status' }}">{{ $portfolio->status }}</span></td>
                        <td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" onclick="openEditModal({{ $portfolio->id }})"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                            </svg>
                            &nbsp; <svg class="delete"  onclick="openDeleteCategoryModal('{{ $portfolio->id }}')" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                            </svg>
                        </td>
                    </tr>


                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="addCategoryModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeAddCategoryModal">&times;</span>
        <h2>Add New Product</h2>
        <form method="POST" action="{{ route('admin.portfolio.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <label for="name">Product Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter product name" required>
                </div>
                <div class="form-group col">
                    <label for="category_id">Product Category</label>
                    <select name="category_id" class="form-control" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="" disabled selected>Select status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="form-group col">
                    <label for="description">Product Description</label>
                    <textarea id="description" name="description" placeholder="Enter product description" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="images">Technologies Used</label>
                <input type="text" id="technologies_used" name="technologies_used" placeholder="Enter multiple technologies used, using comma seprator(,)." required>
                <div id="imagesPreview" class="preview"></div>
            </div>
            <div class="form-group">
                <label for="thumbnail">Product Thumbnail</label>
                <div class="custom-file-upload">
                    <input type="file" id="thumbnail" name="thumbnail" accept="image/*" required>
                    <label for="thumbnail">Upload Thumbnail</label>
                </div>
                <div id="thumbnailPreview" class="preview"></div>
            </div>
            <div class="form-group">
                <label for="images">Product Images</label>
                <div class="custom-file-upload">
                    <input type="file" id="images" name="images[]" multiple accept="image/*">
                    <label for="images">Upload Images</label>
                </div>
                <div id="imagesPreview" class="preview"></div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Add To Portfolio</button>
            </div>
        </form>
    </div>
</div>

<div id="editPortfolioModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeEditPortfolioModal">&times;</span>
        <h2>Edit Product</h2>
        <form method="POST" action="{{ route('admin.portfolio.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" id="editId" name="id">
            <div class="form-row">
                <div class="form-group col">
                    <label for="editName">Product Name</label>
                    <input type="text" id="editName" name="name" placeholder="Enter product name" required>
                </div>
                <div class="form-group col">
                    <label for="editCategory_id">Product Category</label>
                    <select name="category_id" id="editCategory_id" class="form-control" required>
                        <option value="" disabled>Select a category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="editStatus">Status</label>
                    <select id="editStatus" name="status" required>
                        <option value="" disabled>Select status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="form-group col">
                    <label for="editDescription">Product Description</label>
                    <textarea id="editDescription" name="description" placeholder="Enter product description" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="images">Technologies Used</label>
                <input type="text" id="edit_technologies_used" name="technologies_used" placeholder="Enter multiple technologies used, using comma seprator(,)." required>
                <div id="imagesPreview" class="preview"></div>
            </div>
            <div class="form-group">
                <label for="editThumbnail">Product Thumbnail</label>
                <div class="custom-file-upload">
                    <input type="file" id="editThumbnail" name="thumbnail" accept="image/*">
                    <label for="editThumbnail">Upload Thumbnail</label>
                </div>
                <div id="editThumbnailPreview" class="preview"></div>
            </div>
            <div class="form-group">
                <label for="editImages">Product Images</label>
                <div class="custom-file-upload">
                    <input type="file" id="editImages" name="images[]" multiple accept="image/*">
                    <label for="editImages">Upload Images</label>
                </div>
                <div id="editImagesPreviewFromDB" class="preview"></div>

                <div id="editImagesPreview" class="preview"></div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Update Portfolio</button>
            </div>
        </form>
    </div>
</div>

<div id="deleteCategoryModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeDeleteCategoryModal">&times;</span>
        <h2>Confirm Delete</h2>
        <p>Are you sure you want to delete this item from portfolio?</p>
        <form method="POST" action="" id="deleteCategoryForm">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <button type="submit" class="btn">Delete</button>
                <button type="button" class="btn" id="cancelDelete">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>

function openDeleteCategoryModal(id) {
        document.getElementById('deleteCategoryModal').style.display = 'block';
        document.getElementById('deleteCategoryForm').action = '/admin/portfolio/' + id;
    }
    document.getElementById('closeDeleteCategoryModal').onclick = function() {
        document.getElementById('deleteCategoryModal').style.display = 'none';
    }
    document.getElementById('cancelDelete').onclick = function() {
        document.getElementById('deleteCategoryModal').style.display = 'none';
    }
    function openEditModal(id) {
        // Fetch existing data using AJAX (replace with your endpoint)
        fetch(`/admin/portfolio/${id}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('editId').value = data.id;
                document.getElementById('editName').value = data.name;
                document.getElementById('editCategory_id').value = data.category_id;
                document.getElementById('editStatus').value = data.status;
                document.getElementById('editDescription').value = data.description;
                document.getElementById('edit_technologies_used').value = data.technologies_used;

                

                // Set preview images if needed
                document.getElementById('editThumbnailPreview').innerHTML = data.thumbnail ? `<img src="${data.thumbnail}" alt="Thumbnail Preview">` : '';
                document.getElementById('editImagesPreviewFromDB').innerHTML = data.images.map(img => `<img src="${img}" alt="Image Preview">`).join('');

                document.getElementById('editPortfolioModal').style.display = 'block';
            });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const thumbnailInput = document.getElementById('editThumbnail');
        const thumbnailPreview = document.getElementById('editThumbnailPreview');
        const imagesInput = document.getElementById('editImages');
        const imagesPreview = document.getElementById('editImagesPreview');

        thumbnailInput.addEventListener('change', () => {
            const file = thumbnailInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    thumbnailPreview.innerHTML = `<img src="${e.target.result}" alt="Thumbnail Preview">`;
                };
                reader.readAsDataURL(file);
            }
        });

        imagesInput.addEventListener('change', () => {
            imagesPreview.innerHTML = '';
            for (const file of imagesInput.files) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    imagesPreview.innerHTML += `<img src="${e.target.result}" alt="Image Preview">`;
                };
                reader.readAsDataURL(file);
            }
        });
    });

    document.getElementById('closeEditPortfolioModal').onclick = function() {
        document.getElementById('editPortfolioModal').style.display = 'none';
    }

    document.getElementById('openAddCategoryModal').onclick = function() {
        document.getElementById('addCategoryModal').style.display = 'block';
    }
    document.getElementById('closeAddCategoryModal').onclick = function() {
        document.getElementById('addCategoryModal').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', () => {
        const thumbnailInput = document.getElementById('thumbnail');
        const thumbnailPreview = document.getElementById('thumbnailPreview');
        const imagesInput = document.getElementById('images');
        const imagesPreview = document.getElementById('imagesPreview');

        thumbnailInput.addEventListener('change', () => {
            const file = thumbnailInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    thumbnailPreview.innerHTML = `<img src="${e.target.result}" alt="Thumbnail Preview">`;
                };
                reader.readAsDataURL(file);
            }
        });

        imagesInput.addEventListener('change', () => {
            imagesPreview.innerHTML = '';
            for (const file of imagesInput.files) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    imagesPreview.innerHTML += `<img src="${e.target.result}" alt="Image Preview">`;
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
<style>
     .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        position: relative;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
        display: flex;
        align-items: center;
    }

    .alert-success .close {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #155724;
        cursor: pointer;
        font-size: 20px;
    }

    .alert-success .icon {
        margin-right: 10px;
        font-size: 20px;
    }
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow: auto;
    }

    .modal-content {
        background-color: #fff;
        margin: 5% auto;
        padding: 20px;
        border-radius: 12px;
        width: 90%;
        max-width: 900px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.3s ease-out;
    }

    .close {
        color: #555;
        font-size: 28px;
        font-weight: bold;
        float: right;
        cursor: pointer;
        transition: color 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #000;
    }

    h2 {
        margin-top: 0;
        font-size: 24px;
        font-weight: 700;
        color: #333;
    }

    .form-row {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-group {
        flex: 1;
        position: relative;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        color: #555;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #06394b;
        outline: none;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .custom-file-upload {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 96%;
        border: 2px dashed #06394b;
        border-radius: 8px;
        background-color: #f0f8ff;
        cursor: pointer;
        padding: 12px;
        text-align: center;
        color: #06394b;
        font-weight: 600;
        transition: background-color 0.3s, border-color 0.3s;
        margin-bottom: 10px;
    }

    .custom-file-upload input[type="file"] {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .custom-file-upload label {
        display: block;
        font-size: 16px;
        color: #06394b;
        margin: 0;
        cursor: pointer;
    }

    .custom-file-upload:hover {
        background-color: #e6f7ff;
        border-color: #0056b3;
        color: #0056b3;
    }

    .preview {
        margin-top: 10px;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .preview img {
        width: 100px;
        /* Fixed width for previews */
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #ddd;
        padding: 2px;
    }

    .btn {
        background-color: #06394b;
        color: #ffffff;
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn:hover {
        background-color: #0056b3;
        transform: scale(1.02);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

@endsection