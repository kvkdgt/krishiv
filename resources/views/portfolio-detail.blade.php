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
<title>{{$portfolio->name}} by Krishiv Technologies</title>
<div class="portfolio">


    <div class="portfolio-detail">
        <div class="left-thumbnail-section">
            <div class="thumbnail-img">
                <img src="{{asset('thumbnails/' . $portfolio->thumbnail)}}" alt="">
            </div>
        </div>
        <div class="right-portfolio-details-section">
            <div class="product-details">
                <div class="name-and-category">
                    <h2>{{$portfolio->name}}</h2>
                    <h5>{{$portfolio->category->name}}</h5>
                </div>
                <p>{{$portfolio->description}}</p>
                <div class="technologies-used">
                    <?php  $technologies = explode(',',$portfolio->technologies_used) ?>
                    @foreach ($technologies as $technology)
                    <span class="category">{{ $technology }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</div>

<div class="portfolio-images">
    <div class="heading-title">
        Screenshots of
        <span class="text-highlight"> {{$portfolio->name}} </span>
    </div>
    <div class="portfolio-images-data">
        @if($portfolio->images == '')
       
        <div class="no-data-text">
            No Screenshots available.
        </div>@else
        @foreach(explode(',',$portfolio->images) as $portfolioImage)
        <?php $imageData = asset('images/' . $portfolioImage) ?>
        <img src="{{$imageData}}" alt="" onclick="expandImage('{{$imageData}}')">
        @endforeach
        @endif
    </div>
</div>

<div id="imageModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="expandedImg">
    <div id="caption"></div>
</div>
<script>
    function expandImage(imgSrc) {
    var modal = document.getElementById("imageModal");
    var modalImg = document.getElementById("expandedImg");
    modal.style.display = "block";
    modalImg.src = imgSrc;
}

function closeModal() {
    var modal = document.getElementById("imageModal");
    modal.style.display = "none";
}

</script>
<style>
    .portfolio-img {
    cursor: pointer;
    transition: 0.3s;
}

.portfolio-img:hover {
    opacity: 0.7;
}

/* The Modal (background) */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 60px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.9);
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption { 
    animation-name: zoom;
    animation-duration: 0.6s;
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

</style>
@endsection