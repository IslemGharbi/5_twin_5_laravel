

@extends('layouts.freelancer_layout')

@section('title', 'Create')

<!-- Mirrored from kofejob.dreamguystech.com/template/blog-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Oct 2023 00:26:41 GMT -->




<style>
    .frame {
      background-color: #5672f9; /* Set the background color to blue */
      padding: 20px;
      text-align: left;
      border-radius: 10px;
      display: inline-block;
      cursor: pointer;
      animation: bounce 2s infinite; /* Add a continuous bounce animation */
    }

    h3#animated-text {
      font-style: italic;
      font-size: 2em;
      display: inline;
      color: white
    }

    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
      }
      40% {
        transform: translateY(-10px);
      }
      60% {
        transform: translateY(-5px);
      }
    }
  </style>
  <style>
    @keyframes bounce-left-right {
        0%, 100% {
            transform: translateX(0);
        }
        50% {
            transform: translateX(-10px); /* Adjust this value for the desired bounce distance */
        }
    }

    .bounce-left-right {
        animation: bounce-left-right 1s infinite alternate;
        color: #5672f9;
    }
</style>
@section('content')
<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="css/style.css">

<div class="container">
    <div class="frame">

        <!-- Title text -->
        <h3 id="animated-text" data-toggle="modal" data-target="#addNotesModal">press to ADD notes </h3>
      </div>

</div>
</div>


<!-- Add Notes Modal with Blue Style -->
<!-- Add Notes Modal with Labels in Blue -->
<div class="modal fade" id="addNotesModal" tabindex="-1" role="dialog" aria-labelledby="addNotesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title bounce-left-right" id="addNotesModalLabel" style="color: #5672f9">Add Notes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #5672f9">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add Notes Form -->
                <form method="POST" action="{{ route('notes.store') }}" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label for="picture" style="color: #5672f9;">Picture</label>
                        <input type="file" class="form-control" name="picture" id="picture">
                    </div>
                    <div class="form-group">
                        <label for="subject" style="color: #5672f9;">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter the subject" required>
                    </div>
                    <div class="form-group">
                        <label for="details" style="color: #5672f9;">Details</label>
                        <textarea class="form-control" name="details" id="details" rows="4" placeholder="Enter the details"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="deadline" style="color: #5672f9;">Deadline</label>
                        <input type="date" class="form-control" name="deadline" id="deadline">
                    </div>
                    <button type="submit" class="btn btn-light" style="color: #5672f9;">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>







<div class="content">
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-12">
<div class="row blog-grid-row">
<div class="col-md-6 col-sm-12"> 
   @csrf
        @foreach($notes as $note)
    <div class="blog grid-blog">
        
            <div class="blog-image">
                <img class="img-fluid" src="assets/img/blog/blog-01.jpg" alt="Post Image">
            </div>
            <div class="blog-content">
                <ul class="entry-meta meta-item">
                    <li>
                        <div class="post-author">
                            <img src="assets/img/img-02.jpg" alt="Post Author">
                            <span>{{ $note->deadline }}</span>
                        </div>
                    </li>
                    <li><i class="far fa-clock"></i> {{ $note->created_at }}</li>
                </ul>
                <h3 class="blog-title">{{ $note->subject }}</h3>
                <p class="mb-0">{{ $note->details }}</p>
            </div>
        
    </div>
    @endforeach
    
    
    
    
    
    
    
    

</div>



</div>

{{-- <div class="row">
<div class="col-md-12">
<ul class="paginations list-pagination">
<li class="page-item"><a href="#">Previous</a></li>
<li class="page-item"><a href="#" class="active">1</a></li>
<li class="page-item"><a href="#">Next</a></li>
</ul>
</div>
</div> --}}

</div>

<div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">

<div class=" pro-post widget-box post-widget">
<h4 class="pro-title">Latest Notes</h4>
<div class="pro-content pt-0">
<ul class="latest-posts">
<li>
<div class="post-thumb">
<a href="blog-details.html">
<img class="img-fluid" src="assets/img/blog/blog-thumb-03.jpg" alt>
</a>
</div>
<div class="post-info">
<h4>
<a href="blog-details.html">Kofejob - How to get job through online?</a>
</h4>
<a href="#" class="posts-date"><i class="far fa-calendar-alt"></i> 2 May 2021</a>
</div>
</li>
<li>
<div class="post-thumb">
<a href="blog-details.html">
<img class="img-fluid" src="assets/img/blog/blog-thumb-02.jpg" alt>
</a>
</div>
<div class="post-info">
<h4>
<a href="blog-details.html">People who completed NAND technology got job 90% </a>
</h4>
<a href="#" class="posts-date"><i class="far fa-calendar-alt"></i> 3 May 2021</a>
</div>
</li>
<li>
<div class="post-thumb">
<a href="blog-details.html">
<img class="img-fluid" src="assets/img/blog/blog-thumb-01.jpg" alt>
</a>
</div>
<div class="post-info">
<h4>
<a href="blog-details.html">There are many variations of passages</a>
</h4>
<a href="#" class="posts-date"><i class="far fa-calendar-alt"></i> 4 May 2021</a>
</div>
</li>
</ul>
</div>
</div>


<div class=" pro-post widget-box category-widget">
<h4 class="pro-title">project</h4>
<div class="pro-content">
<ul class="category-link">
<li><a href="#">Web Development</a></li>
<li><a href="#">IT Consultancy</a></li>
<li><a href="#">Email Marketing</a></li>
<li><a href="#">Business Consulting</a></li>
<li><a href="#">Apps Development</a></li>
<li><a href="#">SEO Optimizations</a></li>
</ul>
</div>
</div>




</div>

</div>
</div>
</div>




</div>


<script src="assets/js/jquery-3.6.1.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

<script src="assets/js/script.js"></script>


@endsection