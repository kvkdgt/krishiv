@extends('admin/theme')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/admin/dashboard.css'); }} ">
<div class="container">
    <div class="card card-up">
        <h2 class="label">Total Enquiries</h2>
        <div class="count">{{ $totalEnquiriesCount }}</div>
    </div>

    <div class="card card-up">
        <h2 class="label">Pending Enquiries</h2>
        <div class="count">{{ $pendingEnquiriesCount }}</div>
    </div>
    <div class="card card-up">
        <h2 class="label">Seen Enquiries</h2>
        <div class="count">{{ $seenEnquiriesCount }}</div>
    </div>
    <div class="card card-up">
        <h2 class="label">Today's Enquiries</h2>
        <div class="count">{{ $todayEnquiriesCount }}</div>
    </div>

    <!-- Repeat similar HTML structure for more cards -->

</div>
<div class="container">
    <div class="card card-up-green card-up">
        <h2 class="label">Today's Visitor</h2>
        <div class="count">1234</div>
        <div class="icon">▲</div>
    </div>

    <div class="card card-up-green card-up">
        <h2 class="label">Weekly Visitor</h2>
        <div class="count">5678</div>
        <div class="icon-red">▼</div>
    </div>
    <div class="card card-up-green card-up">
        <h2 class="label">Monthly Visitor</h2>
        <div class="count">5678</div>
        <div class="icon">▲</div>
    </div>
    <div class="card card-up-green card-up">
        <h2 class="label">Total Visitor</h2>
        <div class="count">5678</div>
        <div class="icon-red">▼</div>
    </div>

    <!-- Repeat similar HTML structure for more cards -->

</div>
<div class="container2">
    <div class="left-section">
        <b class="heading-style">Top 5 Trending Blogs</b>
    <table>
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Blog Title</th>
                <th>Views</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Introduction to HTML</td>
                <td>1000</td>
            </tr>
            <tr>
                <td>2</td>
                <td>CSS Styling Techniques</td>
                <td>800</td>
            </tr>
            <tr>
                <td>3</td>
                <td>JavaScript Fundamentals</td>
                <td>1200</td>
            </tr>
            <tr>
                <td>4</td>
                <td>CSS Styling Techniques</td>
                <td>800</td>
            </tr>
            <tr>
                <td>5</td>
                <td>JavaScript Fundamentals</td>
                <td>1200</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
    </div>
    <div class="right-section">
    <b class="heading-style">Store & Blogs</b>
    <div class="card2">
        <div>
        <h2 class="label label2">Store Items</h2>
        <div class="count count2">61</div>
        </div>
        <div>
        <h2 class="label label2">Active Items</h2>
        <div class="count count2">31</div>
        </div>
        <div>
        <h2 class="label label2">Inactive Items</h2>
        <div class="count count2">30</div>
        </div>
    </div>
    <div class="card2">
        <div>
        <h2 class="label label2">Total Blogs</h2>
        <div class="count count2">40</div>
        </div>
        <div>
        <h2 class="label label2">Active Blogs</h2>
        <div class="count count2">35</div>
        </div>
        <div>
        <h2 class="label label2">Inactive Blogs</h2>
        <div class="count count2">5</div>
        </div>
    </div>
    </div>
</div>


@endsection