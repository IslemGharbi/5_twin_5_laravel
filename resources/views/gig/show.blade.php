@extends('layouts.freelancer_layout')

@section('title', 'Home')

@section('content')

    <section class="section bg-gray">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <!-- Left sidebar -->
                <div class="col-md-8">
                    <div class="product-details">
                        <h1 class="product-title">{{ $gig->title }}</h1>
                        <div class="product-meta">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-user-o"></i> By <a
                                        href="{{ route('user.show', ['id' => $gig->freelancer->user->id]) }}">{{ $gig->freelancer->user->name }}</a>
                                </li>
                                <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a
                                        href="#">{{ $gig->category->name }} </a>/ <a href="#">
                                        {{ $gig->sub_category->name }}</a></li>
                                <li class="list-inline-item"><i
                                        class="fa fa-calendar"></i>{{ $gig->created_at->format('jS F Y') }}</li>
                            </ul>
                        </div>

                        <!-- product slider -->
                        <div class="product-slider">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($gig->thumbnail as $thumbnail)
                                <div class="product-slider-item my-4" data-image="{{ $thumbnail->url }}">
                                    <img class="img-fluid w-100 sizefit" src="{{ $thumbnail->url }}" alt="product-img">
                                </div>
                                @php
                                    $i++;
                                @endphp
                                @if ($loop->last)
                                    @while ($i < 5)
                                        @php
                                            $i++;
                                        @endphp
                                        <div class="product-slider-item my-4" data-image="{{ $thumbnail->url }}">
                                            <img class="img-fluid w-100 sizefit" src="{{ $thumbnail->url }}"
                                                alt="product-img">
                                        </div>
                                    @endwhile
                                @endif
                            @endforeach
                        </div>
                        <!-- product slider -->

                        <div class="content mt-5 pt-5">
                            <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                        role="tab" aria-controls="pills-home" aria-selected="true">Product Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                        href="#pills-profile" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">Purchase</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                        href="#pills-contact" role="tab" aria-controls="pills-contact"
                                        aria-selected="false">Reviews</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <h3 class="tab-title">Gig Description</h3>
                                    <p>{!! $gig->description !!}</p>
                                    <br>
                                    <hr>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="row">
                                        @foreach ($gig->option as $option)
                                            <div class="col-md-12" style="margin-bottom: 10px">
                                                <div class="package-content bg-light border text-center p-5 my-2 my-lg-0">
                                                    <div class="package-content-heading border-bottom">
                                                        <h2>{{ $option->name }}</h2>
                                                        <h4 class="py-3"> <span>${{ $option->price }}</span>
                                                        </h4>
                                                    </div>

                                                    <p>{!! $option->description !!}</p>
                                                    @php
                                                        $h = 0;
                                                    @endphp

                                                    @if (Auth::user())
                                                        @if (Auth::user()->id != $option->gig->freelancer_id)

                                                            @foreach ($option->order as $order)
                                                                @if ($order->user_id === Auth::user()->id && $order->status != 'Cancelled' && $order->status != 'Completed')
                                                                    @php
                                                                        $h = 1;
                                                                    @endphp
                                                                    <a href="{{ route('order.show', ['id' => $order->id]) }}"
                                                                        class="btn btn-warning">Show Order</a>
                                                                @endif
                                                            @endforeach
                                                            @if ($h == 0)
                                                                <a href="{{ route('checkout.new', ['id' => $option->id, 'amount' => $option->price]) }}"
                                                                    class="btn btn-primary">Buy Now</a>
                                                            @endif
                                                        @endif
                                                    @else
                                                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <h3 class="tab-title">Product Review</h3>
                                    <div class="product-review">
                                        @foreach ($gig->comment as $comment)
                                            <div class="media">
                                                <!-- Avater -->
                                                <img alt="{{ url('images/user/user-thumb.jpg') }}"
                                                    src="{{ $comment->user->profile_photo_url }}">
                                                <div class="media-body">
                                                    <div class="name">
                                                        <h5>{{ $comment->user->name }}</h5>
                                                    </div>
                                                    <div class="date">
                                                        <p>{{ $comment->created_at }}</p>
                                                    </div>
                                                    <div class="review-comment">
                                                        <p>
                                                            {{ $comment->text }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="review-submission">
                                            <h3 class="tab-title">Submit your review</h3>
                                            <!-- Rate -->
                                            @if (Auth::user())
                                                <div class="review-submit">
                                                    <form action="{{ route('comment.store') }}" class="row"
                                                        method="POST">
                                                        @csrf
                                                        <div class="col-lg-12">
                                                            <input type="hidden" name="user_id" id="name"
                                                                class="form-control" placeholder="Name"
                                                                value="{{ Auth::user()->id }}">
                                                            <input type="hidden" name="gig_id" id="name"
                                                                class="form-control" placeholder="Name"
                                                                value="{{ $gig->id }}">
                                                            <strong>{{ Auth::user()->name }}</strong>
                                                        </div>
                                                        <div class="col-12">
                                                            <textarea name="text" id="review" rows="10"
                                                                class="form-control" placeholder="Message"></textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-main">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>


                                            @else

                                                <p><a href="">Login To Comment</a></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget price text-center">
                            <h4>Seller</h4>
                        </div>
                        <!-- User Profile widget -->
                        <div class="widget user text-center">
                            <img class="rounded-circle img-fluid mb-5 px-5"
                                src="{{ $gig->freelancer->user->profile_photo_url }}" alt="">
                            <h4><a
                                    href="{{ route('user.show', ['id' => $gig->freelancer->user->id]) }}">{{ $gig->freelancer->user->name }}</a>
                            </h4>
                            <p class="member-time">Member Since {{ $gig->freelancer->created_at }}</p>
                            <ul class="list-inline mt-20">
                                <li class="list-inline-item"><a
                                        href="{{ route('user.show', ['id' => $gig->freelancer->user->id]) }}"
                                        class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">See all
                                        gigs</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Map Widget -->

                        <!-- Rate Widget -->
                        <div class="widget rate">
                            <!-- Heading -->
                            <h5 class="widget-header text-center">What would you rate
                                <br>
                                this product
                            </h5>
                            <!-- Rate -->
                            <div class="starrr"></div>
                        </div>
                        <!-- Safety tips widget -->
                        <div class="widget disclaimer">
                            <h5 class="widget-header">Safety Tips</h5>
                            <ul>
                                <li>Meet seller at a public place</li>
                                <li>Check the item before you buy</li>
                                <li>Pay only after collecting the item</li>
                                <li>Pay only after collecting the item</li>
                            </ul>
                        </div>
                        <!-- Coupon Widget -->
                        <div class="widget coupon text-center">
                            <!-- Coupon description -->
                            @if (Auth::user())
                                @if (Auth::user()->freelancer)
                                    <p>Wanna add a gig too? Add your own gig Now!
                                    </p>
                                    <!-- Submii button -->
                                    <a href="{{ route('gig.create.view') }}" class="btn btn-transparent-white">Add
                                        Gig</a>
                                @else
                                    <p>Wanna be a seller too? Join as a Freelancer Now!
                                    </p>
                                    <!-- Submii button -->
                                    <form method="POST" action="{{ route('freelancer.store') }}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <button class="btn btn-success" type="submit">Join As a
                                            Freelancer</button>
                                    </form>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-transparent-white">Login</a>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- Container End -->
    </section>


@endsection












{{-- <div>
    <p>Title : {{ $gig->title }}</p>
    <p>Freelancer : {{ $gig->freelancer->user->name }}</p>
    <p>Description : {{ $gig->description }}</p>
    <p>Category : {{ $gig->category->name }}</p>
    <p>Sub Category : {{ $gig->sub_category->name }}</p>


    <br>
    <p>Option: </p>
    @foreach ($gig->option as $option)
        <p>
            Title: {{ $option->name }}
        </p>
        <p>
            Description: {{ $option->description }}
        </p>
        <p>
            Deadline: {{ $option->deadline }}
        </p>
        <p>
            Price: {{ $option->price }}
        </p>
        <p>
        <form action="{{ route('order.store') }} " method="POST">
            @csrf
            <input type="hidden" name="status" value="ordered">
            <input type="hidden" name="gig_id" value="{{ $gig->id }}">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="freelancer_id" value="{{ $gig->freelancer->id }}">
            <input type="hidden" name="option_id" value="{{ $option->id }}">
            <input type="submit" value="Purchase">
        </form>
        <br>
        <h2>Orders</h2>
        @foreach ($option->order as $order)
            <p>User: {{ $order->user->name }}</p>
            <p>Freelancer: {{ $order->freelancer->user->name }}</p>
            <p>Status: {{ $order->status }}</p>
            <p>Deadline: {{ $order->option->deadline }}</p>
            <br>
            <form action="{{ route('comment.store') }} " method="POST">
                @csrf
                <p>Comment</p><br>
                <textarea name="text" id="text" cols="30" rows="10"></textarea>
                <input type="hidden" name="author" value="Random">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="freelancer_id" value="{{ $order->freelancer->id }}">
                <input type="hidden" name="order_id" value="{{ $order->id }}"><br>
                <input type="submit" value="Comment">
            </form>
            @foreach ($order->comment as $comment)
                <p>Name:{{ $comment->user->name }}</p>
                <p>Comment:{{ $comment->text }}</p>
                <br><br>
            @endforeach
        @endforeach
    @endforeach

    <br>
</div> --}}
