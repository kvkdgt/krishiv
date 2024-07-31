@extends('secondaryTheme')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/client/portfolio.css'); }} ">
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CZ03HCNN7R"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-CZ03HCNN7R');
</script>
<title>Portfolio | Krishiv Technologies</title>
<div class="portfolio">
    <div class="heading-title">
        Our
        <span class="text-highlight"> Work</span>
    </div>
    <div class="sub-heading-title">
        Projects that we are proud to be a part.
    </div>
    <div class="filters">
        <?php
        $WithoutFilter;
        if ($activeCategory == 'All') {
            $WithoutFilter = 'category category-activated';
        } else {
            $WithoutFilter = 'category';
        }
        ?>
        <a style="text-decoration:none" href="{{route('portfolio')}}"> <span class="{{$WithoutFilter}}">All</span></a>
        @foreach ($categories as $category)
        <?php
        $classNameOfcategories;
        if ($activeCategory == $category->name) {
            $classNameOfcategories = 'category category-activated';
        } else {
            $classNameOfcategories = 'category';
        }
        ?>
        <a style="text-decoration:none" href="{{route('portfolio.by_category',$category->name)}}"> <span class="{{$classNameOfcategories}}">{{ $category->name }}</span></a>

        @endforeach


    </div>

    <div class="card-group">
        <!-- <div class="card">
            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/1400/09af14105210713.5f74106402aa5.jpg" alt="Image 1">
            <div class="card-content">
                <h3>Shringar</h3>
                <p>E-commerce Website</p>
            </div>
        </div>

        <div class="card">
            <img src="https://cdn.dribbble.com/userupload/9823628/file/original-3f59e5a6ef05efc56ec09fedd03f2d80.png" alt="Image 2">
            <div class="card-content">
                <h3>Taxi Booking App</h3>
                <p>Mobile App</p>
            </div>
        </div>

        <div class="card">
            <img src="https://img.freepik.com/premium-vector/food-delivery-app-ui-design_47987-1539.jpg" alt="Image 3">
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
        </div> -->

        @if($portfolios->isEmpty())
       <div class="no-data">
        <img src="{{ URL::asset('imgs/no-data.svg'); }}" alt="" class="no-data-img">
       </div>
       <div class="no-data-text">
        No data available.
       </div>
        @else
        @foreach ($portfolios as $portfolio)
        <div class="card">
            <img src="{{asset('thumbnails/' . $portfolio->thumbnail)}}" alt="Image 4">
            <div class="card-content">
                <h3>{{$portfolio->name}}</h3>
                <p>{{$portfolio->category->name}}</p>
            </div>
        </div>
        @endforeach
        @endif
        <!-- Add more cards here -->
    </div>

</div>
@endsection