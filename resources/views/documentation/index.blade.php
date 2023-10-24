<!DOCTYPE html>
@extends('layouts.freelancer_layout')

@section('title', 'Create')

<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="css/style.css">
@include('documentation.create')
@section('content')
<div class="content">
    
<div class="container">
<div class="row">
<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#addNotesModal">
        <i class="fas fa-edit"></i> add
    </button>
<div class="col-md-12 col-lg-8 col-xl-9">

<div class="row">
    @foreach($documentation as $documentation)
<div class="col-md-6 col-lg-12 col-xl-6">
<div class="freelance-widget widget-author">
<div class="freelance-content">
<a data-bs-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
<div class="author-heading">
<div class="profile-img">
<a href="#">
<img src="assets/img/company/img-2.png" alt="author">
</a>
</div>
<div class="profile-name">
<div class="author-location">{{ $documentation->title }} <i class="fas fa-check-circle text-success verified"></i></div>
</div>
<div class="freelance-info">
<h3><a href="#">{{ $documentation->title }}</a></h3>
<div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted 1 min ago</div>
</div>
<div class="freelance-tags">
<a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
<a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
<a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
</div>
</div>
<div class="counter-stats">
<ul>
<li>
<h3 class="counter-value">date time</h3>
<h5>{{ $documentation->created_at }}</h5>
</li>
<li>
<h3 class="counter-value">doc</h3>
<a href="{{ asset('/storage/'.$documentation->file) }}" target="_blank">Click on me</a>
</li>
<li>
<h3 class="counter-value"><span class="jobtype">job</span></h3>
<h5>job</h5>
</li>
</ul>
</div>
</div>
<div class="cart-hover">
<a href="{{ asset('/storage/'.$documentation->file) }}" class="btn-cart" tabindex="-1">see the doc</a>
</div>
</div>
</div>
@endforeach

</div>


</div>
</div>




</div>
<script src="assets/js/jquery-3.6.1.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/range.js"></script>

<script src="assets/js/profile-settings.js"></script>
<script src="assets/js/script.js"></script>





@endsection

