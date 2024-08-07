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
                    Categories
                </div>
                <div class="page-sub-heading">
                    Add your portfolio categories details from here.
                </div>
            </div>
           

            <div class="btns-in-portfolio">
                <div class="add-btn">
                    <span class="btn-for-add" id="openAddCategoryModal">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                        </svg>
                        Add New Item
                    </span>
                </div>
            </div>
        </div>
        <div class="main-section">
            <table>
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Category Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <span class="btn-for-edit" onclick="openEditCategoryModal('{{ $category->id }}', '{{ $category->name }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                </svg>
                            </span>
                            &nbsp;
                            <span class="btn-for-delete">
                                <svg class="delete" onclick="openDeleteCategoryModal('{{ $category->id }}')" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                </svg>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Category Modal -->
<div id="addCategoryModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeAddCategoryModal">&times;</span>
        <h2>Add New Category</h2>
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Add Category</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Category Modal -->
<div id="editCategoryModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeEditCategoryModal">&times;</span>
        <h2>Edit Category</h2>
        <form method="POST" action="" id="editCategoryForm">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="editName">Category Name</label>
                <input type="text" id="editName" name="name" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Update Category</button>
            </div>
        </form>
    </div>
</div>

<div id="deleteCategoryModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeDeleteCategoryModal">&times;</span>
        <h2>Confirm Delete</h2>
        <p>Are you sure you want to delete this category?</p>
        <form method="POST" action="" id="deleteCategoryForm">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <button type="submit" class="btn">Delete Category</button>
                <button type="button" class="btn" id="cancelDelete">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('openAddCategoryModal').onclick = function() {
        document.getElementById('addCategoryModal').style.display = 'block';
    }
    document.getElementById('closeAddCategoryModal').onclick = function() {
        document.getElementById('addCategoryModal').style.display = 'none';
    }

    function openEditCategoryModal(id, name) {
        document.getElementById('editCategoryModal').style.display = 'block';
        document.getElementById('editName').value = name;
        document.getElementById('editCategoryForm').action = '/admin/categories/' + id;
    }

    document.getElementById('closeEditCategoryModal').onclick = function() {
        document.getElementById('editCategoryModal').style.display = 'none';
    }

    function openDeleteCategoryModal(id) {
        document.getElementById('deleteCategoryModal').style.display = 'block';
        document.getElementById('deleteCategoryForm').action = '/admin/categories/' + id;
    }
    document.getElementById('closeDeleteCategoryModal').onclick = function() {
        document.getElementById('deleteCategoryModal').style.display = 'none';
    }
    document.getElementById('cancelDelete').onclick = function() {
        document.getElementById('deleteCategoryModal').style.display = 'none';
    }
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
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 8px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    .btn {
        background-color: #06394b;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
    }

    .btn:hover {
        background-color: #25667d;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
</style>
@endsection
