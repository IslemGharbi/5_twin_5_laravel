

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



@include('notes.create')




<div class="content">
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-12">
<div class="row blog-grid-row">
<div class="col-md-6 col-sm-12"> 
   @csrf
        @foreach($notes as $note)
    <div class="blog grid-blog">
      @foreach($note->pictures as $picture)
            <div class="blog-image">
                <img class="img-fluid" src="{{ $picture->url }}" alt="Post Image">
            </div><br>
            @endforeach
            
           

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
    <!-- Update button -->
    <div class="d-flex justify-content-between align-items-center">
      <button class="btn btn-sm btn-danger" onclick="deleteNote({{ $note->id }})">
          <i class="fas fa-trash"></i> Delete
      </button>
      <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editNotesModal">
          <i class="fas fa-edit"></i> Update
      </button>
  </div>
              @include('notes.edit')
              
            
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
  @foreach($notes as $note)
<ul class="latest-posts">
  

<li>
<div class="post-thumb">
<a href="blog-details.html">
 <img class="img-fluid" src="{{ $picture->url }}" alt="Post Image"></a>
</div>
<div class="post-info">
<h4>
<a href="blog-details.html">{{ $note->details }}</a>
</h4>
<a href="#" class="posts-date"><i class="far fa-calendar-alt"></i>{{ $note->created_at }}</a>
</div>
</li>

</ul>
@endforeach
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
<script>
  function deleteNote(noteId) {
      if (confirm('Are you sure you want to delete this note?')) {
          // Send an AJAX request to delete the note
          fetch(`/notes/${noteId}`, {
              method: 'DELETE',
              headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}',
                  'Content-Type': 'application/json'
              }
          })
          .then(response => {
              if (response.ok) {
                  // Note deleted successfully, you can also remove it from the UI
                  // For example: document.getElementById(`note-${noteId}`).remove();
              } else {
                  // Handle errors if needed
              }
          })
          .catch(error => {
              console.error('Error:', error);
          });
      }
  }
</script>