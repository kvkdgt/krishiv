@extends('secondaryTheme')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/client/portfolio.css'); }} ">

<div class="portfolio">
    <div class="heading-title">
        Our
        <span class="text-highlight"> Work</span>
    </div>
    <div class="sub-heading-title">
        Projects that we are proud to be a part.
    </div>
    <div class="filters">
        <span class="category category-activated">All</span>
        <span class="category">E-commerce Website</span>
        <span class="category">Mobile App</span>
       


    </div>

    <div class="card-group">
        <div class="card">
            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/1400/09af14105210713.5f74106402aa5.jpg" alt="Image 1">
            <div class="card-content">
                <h3>Shringar</h3>
                <p>E-commerce Website</p>
            </div>
        </div>

        <div class="card">
            <img src="https://assets.materialup.com/uploads/16aad3c4-34a2-4ff1-8617-7c9c0cf7fefd/preview.jpg" alt="Image 2">
            <div class="card-content">
                <h3>Taxi Booking App</h3>
                <p>Mobile App</p>
            </div>
        </div>

        <div class="card">
            <img src="https://api.tino.design/wp-content/uploads/2022/12/4-1024x768.jpg" alt="Image 3">
            <div class="card-content">
                <h3>Food Delivery App</h3>
                <p>Mobile App</p>
            </div>
        </div>

        <div class="card">
            <img src="https://s3-alpha.figma.com/hub/file/776034343/98c9e957-d37c-48d7-aa9d-98c82125197f-cover.png" alt="Image 4">
            <div class="card-content">
                <h3>Travel Buddy</h3>
                <p>Mobile App</p>
            </div>
        </div>

        <div class="card">
            <img src="https://s3-alpha.figma.com/hub/file/776034343/98c9e957-d37c-48d7-aa9d-98c82125197f-cover.png" alt="Image 4">
            <div class="card-content">
                <h3>Travel Buddy</h3>
                <p>Mobile App</p>
            </div>
        </div>
        <div class="card">
            <img src="https://s3-alpha.figma.com/hub/file/776034343/98c9e957-d37c-48d7-aa9d-98c82125197f-cover.png" alt="Image 4">
            <div class="card-content">
                <h3>Travel Buddy</h3>
                <p>Mobile App</p>
            </div>
        </div>
        <!-- Add more cards here -->
    </div>

</div>
@endsection