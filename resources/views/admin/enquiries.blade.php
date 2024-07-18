@extends('admin/theme')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/admin/blogs.css'); }} ">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<style>
  /* Modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

/* Modal content */
.modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 80%;
    max-width: 400px;
}

/* Modal close button */
.close {
    color: #aaa;
    float: right;
    font-size: 20px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #333;
    text-decoration: none;
    cursor: pointer;
}

/* Modal buttons */
.modal-btns {
    text-align: right;
    margin-top: 20px;
}

.confirmandcancelBtn {
    padding: 10px 20px;
    margin-left: 10px;
    border: none;
    border-radius: 5px;
    background-color: #0c536c; /* Theme color */
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.confirmandcancelBtn:hover {
    background-color: #06394b; /* Theme color on hover */
}


</style>
<div class="container">
    <div class="page-heading-section">
        <div class="page-upper">
            <div>
            <div class="page-heading">
                Enquiries
            </div>
            <div class="page-sub-heading">
                Got your all enquiries here.
            </div>
            </div>
         
        </div>
        <div class="main-section">
            <table>
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Name</th>
                        <th>Contact No.</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
            @foreach($enquiries as $enquiry)
            <tr id="enquiry_{{ $enquiry->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $enquiry->name }}</td>
                <td class="contact-no"><a href="tel:{{ $enquiry->contact_no }}">{{ $enquiry->contact_number }}</a></td>
                <td class="contact-no"><a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a></td>
                <td><span class="{{ $enquiry->status == 'Seen' ? 'active-status' : 'inactive-status' }}">{{ $enquiry->status }}</span></td>
                <td><button class="delete-btn-in-enquiry" onclick="window.location='/admin/enquiries/{{$enquiry->id}}'">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/></svg>
</button>   &nbsp; <button class="delete-btn delete-btn-in-enquiry" data-id="{{ $enquiry->id }}"> <svg class="delete" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                            </svg></button>
                        </td>
            </tr>
            @endforeach
        </tbody>
            </table>
        </div>
    </div>
</div>
<div id="deleteConfirmationModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Are you sure you want to delete this enquiry?</p>
        <div class="modal-btns">
            <button class="confirmandcancelBtn" id="confirmDeleteBtn">Delete</button>
            <button class="confirmandcancelBtn" id="cancelDeleteBtn">Cancel</button>
        </div>
    </div>
</div>
<script>
    // Get the modal
    var modal = document.getElementById("deleteConfirmationModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the delete button, open the modal
    var deleteButtons = document.getElementsByClassName("delete-btn");
    for (var i = 0; i < deleteButtons.length; i++) {
        deleteButtons[i].addEventListener("click", function() {
            var enquiryId = this.getAttribute("data-id");
            modal.style.display = "block";
            // Pass the enquiry ID to the confirmation modal
            document.getElementById("confirmDeleteBtn").setAttribute("data-id", enquiryId);
        });
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks on cancel button, close the modal
    document.getElementById("cancelDeleteBtn").onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks on delete button, delete the enquiry
    document.getElementById("confirmDeleteBtn").onclick = function() {
        var enquiryId = this.getAttribute("data-id");
        // Send AJAX request to delete the enquiry
        axios.delete('/enquiries/' + enquiryId)
            .then(function(response) {
                // Remove the enquiry row from the table
                var enquiryRow = document.getElementById("enquiry_" + enquiryId);
                enquiryRow.parentNode.removeChild(enquiryRow);
                // Close the modal
                modal.style.display = "none";
                // Show acknowledgement message
                alert("Enquiry deleted successfully");
            })
            .catch(function(error) {
                console.error(error);
                // Close the modal
                modal.style.display = "none";
                // Show error message
                alert("Error occurred while deleting the enquiry");
            });
    }
</script>
@endsection