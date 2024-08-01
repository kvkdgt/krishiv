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
        @if($portfolios->isEmpty())
       <div class="no-data">
        <img src="{{ URL::asset('imgs/no-data.svg'); }}" alt="" class="no-data-img">
       </div>
       <div class="no-data-text">
        No data available.
       </div>
        @else
        @foreach ($portfolios as $portfolio)
        <?php $path = route('portfolio.detail',$portfolio->name) ?>
        <div class="card" onclick="window.location.href='{{$path}}'">
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