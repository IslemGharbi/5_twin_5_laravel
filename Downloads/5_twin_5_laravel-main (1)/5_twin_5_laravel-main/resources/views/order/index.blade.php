@extends('layouts.freelancer_layout')

@section('title', 'Create')

@section('content')
    <section class="dashboard section">
        <!-- Container Start -->
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
                    <div class="sidebar">
                        <!-- User Widget -->
                        <div class="widget user-dashboard-profile">
                            <!-- User Image -->
                            <div class="profile-thumb">
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="" class="rounded-circle"
                                    style="object-fit: fill; height: 150px; width:150px;">
                            </div>
                            <!-- User Name -->
                            <h5 class="text-center">{{ Auth::user()->name }}</h5>
                            <p>Joined {{ Auth::user()->created_at->format('jS F Y') }}</p>
                            <a href="{{ route('user.show', ['id' => Auth::user()->id]) }}" class="btn btn-main-sm">View
                                Profile</a>
                        </div>
                        <!-- Dashboard Links -->
                        <div class="widget user-dashboard-menu">
                            <ul>
                                @if (Auth::user()->freelancer)
                                    <li class="active"><a href="{{ route('order.list') }}"><i
                                                class="fa fa-user"></i>My
                                            Orders
                                            (Freelancer)<span>{{ Auth::user()->freelancer->order->count() }}</span></a>
                                    </li>
                                @endif
                                <li><a href="{{ route('orders') }}"><i class="fa fa-shopping-cart"></i> My Purchases
                                        <span>{{ Auth::user()->order->count() }}</span></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                    <!-- Recently Favorited -->
                    <div class="widget dashboard-container my-adslist">
                        <h3 class="widget-header">My Ads</h3>
                        <table class="table table-responsive product-dashboard-table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Title</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach (Auth::user()->freelancer->order as $order)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td class="product-thumb">
                                            @php
                                                $j = 0;
                                            @endphp
                                            @foreach ($order->gig->thumbnail as $thumbnail)
                                                @if ($j == 0)
                                                    <img width="80px" height="auto" src="{{ $thumbnail->url }}"
                                                        alt="image description">
                                                    @php
                                                        $j++;
                                                    @endphp
                                                @endif

                                            @endforeach
                                        </td>
                                        <td class="product-details">
                                            <h3 class="title">{{ $order->gig->title }}</h3>
                                            <span class="add-id"><strong>Ordered By:</strong>
                                                <a href="{{ route('user.show', ['id' => $order->user->id]) }}">
                                                    {{ $order->user->name }}
                                                </a>
                                            </span>
                                            <span class="add-id"><strong>Cost:</strong>
                                                ${{ $order->option->price }}</span>
                                            <span><strong>Posted on:
                                                </strong><time>{{ $order->gig->created_at->format('jS F Y') }}</time>
                                            </span>
                                            <span><strong>Deadline:
                                                </strong><time>{{ $order->deadline->format('jS F Y') }}</time>
                                            </span>
                                            @if ($order->status == 'Completed')
                                                <span style="color: green"><strong>Status</strong>Completed</span>
                                            @elseif ($order->status == 'Cancelled')
                                                <span style="color: red"><strong>Status</strong>Cancelled</span>
                                            @elseif ($order->status == 'Declined')
                                                <span style="color: red"><strong>Status</strong>Declined</span>
                                            @endif
                                        </td>
                                        <td class="product-category"><span
                                                class="categories">{{ $order->gig->category->name }}</span></td>
                                        <td class="action" data-title="Action">
                                            <div class="">
                                                @if ($order->status == 'Completed')
                                                    <a href="{{ route('order.show', ['id' => $order->id]) }}">
                                                        <span style="color: green">Completed</span>
                                                    </a>
                                                @elseif ($order->status == 'Cancelled')
                                                    <a href="{{ route('order.show', ['id' => $order->id]) }}">
                                                        <span style="color: red">Cancelled</span>
                                                    </a>
                                                @elseif ($order->status == 'Declined')
                                                    <a href="{{ route('order.show', ['id' => $order->id]) }}">
                                                        <span style="color: red">Declined</span>
                                                    </a>
                                                @else
                                                    <ul class="list-inline justify-content-center">
                                                        <li class="list-inline-item">
                                                            <a data-toggle="tooltip" data-placement="top" title="view"
                                                                class="view"
                                                                href="{{ route('order.show', ['id' => $order->id]) }}">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </section>
@endsection
