@extends('admin/theme')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/admin/blogs.css'); }} ">
<style>
 .main-section {
    padding-top: 20px;
    border-radius: 10px;
}

.enquiry-detail {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.theme-line {
    height: 5px;
    width: 100%;
    background-color: #0c536c;
}

.detail-heading {
    font-size: 24px;
    color: #06394b;
    margin-bottom: 15px;
    font-weight: 700;
}

.detail-section {
    margin-bottom: 10px;
}

.detail-label {
    font-weight: 500;
}

.detail-value {
    margin-left: 10px;
    font-weight: 400;
}

.message {
    margin-top: 20px;
}

.message-label {
    font-weight: 500;
}

.message-content {
    margin-top: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}
</style>
<div class="container">
    <div class="page-heading-section">
        <div class="page-upper">
            <div>
                <div class="page-heading">
                    Enquiry
                </div>
                <div class="page-sub-heading">
                    View Enquiry in detail.
                </div>
            </div>

        </div>
        <div class="main-section">
            <div class="enquiry-detail">
                <h2 class="detail-heading">Enquiry Detail</h2>
                <div class="detail-section">
                    <span class="detail-label">Name:</span>
                    <span class="detail-value">{{ $enquiries->name }}</span>
                </div>
                <div class="detail-section">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value">{{ $enquiries->email }}</span>
                </div>
                <div class="detail-section">
                    <span class="detail-label">Contact Number:</span>
                    <span class="detail-value">{{ $enquiries->contact_number }}</span>
                </div>
                <div class="message">
                    <span class="message-label">Message:</span>
                    <div class="message-content">
                        {{ $enquiries->message }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection