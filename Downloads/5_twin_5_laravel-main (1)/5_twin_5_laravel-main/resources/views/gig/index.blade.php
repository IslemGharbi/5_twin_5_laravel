@extends('layouts.freelancer_layout')

@section('title', 'Home')

@section('content')
    <section class="hero-area bg-1 text-center overly">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Header Contetnt -->
                    <div class="content-block">
                        <h1>Market For Anything. </h1>
                        <p>Be your own boss by joining as a freelancer<br> or make your work easy by hiring thousands of
                            freelancers available here</p>


                    </div>
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-12 align-content-center">
                                    <form action="{{ route('gig.searchresult') }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <input type="text" class="form-control my-2 my-lg-1" id="inputtext4"
                                                    placeholder="What are you looking for" name="data" autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-2 align-self-center">
                                                <button type="submit" class="btn btn-primary">Search Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>

    <!--===================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            =            Client Slider            =
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ====================================-->


    <!--===========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            =            Popular deals section            =
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ============================================-->

    <section class="popular-deals section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Featured Gigs</h2>
                        <p>Browse through best of the best gigs available in OPPORTUNIT<span style="color: blue">Y</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- offer 01 -->
                <div class="col-lg-12">
                    <div class="trending-ads-slide">

                        @foreach ($gig as $gig)
                            @if (count($gig->option) != 0 && count($gig->thumbnail) != 0)
                                <div class="col-sm-12 col-lg-6">
                                    <!-- product card -->
                                    <div class="product-item bg-light">
                                        <div class="card">
                                            <div class="thumb-content">

                                                <!-- <div class="price">$200</div> -->
                                                <a href="{{ route('gig.show', ['id' => $gig->id]) }}">

                                                    @foreach ($gig->thumbnail as $thumbnail)
                                                        @if ($loop->first)
                                                            <img class="card-img-top img-fluid"
                                                                src="{{ $thumbnail->url }}"
                                                                alt="images/products/products-1.jpg"
                                                                style="height: 250px; width:fit-content"
                                                                alt="Card image cap">
                                                        @endif

                                                    @endforeach
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div>

                                                    <h4 class="card-title"><a
                                                            href="{{ route('gig.show', ['id' => $gig->id]) }}">{{ $gig->title }}</a>
                                                    </h4>
                                                    <ul class="list-inline product-meta">
                                                        <li class="list-inline-item">
                                                            <a href="single.html"><i
                                                                    class="fa fa-folder-open-o"></i>{{ $gig->category->name }}</a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#"><i
                                                                    class="fa fa-calendar"></i>{{ $gig->created_at }}</a>
                                                        </li>
                                                        <br><br>
                                                        <h2 class="card-text" style="text-align: center">

                                                            @foreach ($gig->option as $option)
                                                                @if ($loop->first)
                                                                    ${{ $option->price }}
                                                                @elseif ($loop->last)
                                                                    - ${{ $option->price }}
                                                                @endif

                                                            @endforeach
                                                        </h2>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </section>



    <!--==========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            =            All Category Section            =
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ===========================================-->

    <section class=" section">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section title -->
                    <div class="section-title">
                        <h2>All Categories</h2>
                        <p>Browse through all the categories available in OPPORTUNIT<span style="color: blue">Y</span></p>
                    </div>
                    <div class="row">
                        @foreach ($category as $category)
                            <!-- Category list -->
                            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                                <div class="category-block">
                                    <div class="header">
                                        <i class="fa fa-info icon-bg-2"></i>
                                        <h4>{{ $category->name }}</h4>
                                    </div>
                                    <ul class="category-list">
                                        @foreach ($category->sub_category as $sub)
                                            <form action="{{ route('category.searchresult') }}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{ $sub->id }}" name="data">
                                                <li>
                                                    <button type="submit" name="your_name" value="your_value"
                                                        class="btn-link">
                                                        {{ $sub->name }} <span>{{ $sub->count() }}</span>
                                                    </button>
                                                </li>
                                            </form>
                                        @endforeach
                                    </ul>
                                </div>
                            </div> <!-- /Category List -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>

    <style>
        .btn-link,
        .btn-link:hover {
            border: none;
            outline: none;
            background: none;
            cursor: pointer;
            color: #7b7b80;
            padding: 0;
            font-family: inherit;
            font-size: inherit;
            text-decoration: none;
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

    </style>
@endsection
