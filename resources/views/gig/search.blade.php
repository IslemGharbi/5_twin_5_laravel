@extends('layouts.freelancer_layout')

@section('title', 'Home')

@section('content')
    <section class="page-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <form action="{{ route('gig.search') }}" method="get">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <input type="text" class="form-control my-2 my-lg-0" name="data" id="inputtext4"
                                        placeholder="What are you looking for" autocomplete="off">
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-primary">Search Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-result bg-gray">
                        @if ($result->count() == 0)
                            <h2>No Data Available</h2>
                        @else
                            <h2>Results For "{{ $searchValue }}"</h2>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-grid-list">
                        <div class="row mt-30">
                            @if ($result)
                                @foreach ($result as $result)
                                    <div class="col-sm-12 col-lg-4 col-md-6">
                                        <!-- product card -->
                                        <div class="product-item bg-light">
                                            <div class="card">
                                                <div class="thumb-content">
                                                    <!-- <div class="price">$200</div> -->
                                                    <a href="{{ route('gig.show', ['id' => $result->id]) }}">
                                                        @foreach ($result->thumbnail as $thumbnail)
                                                            @if ($loop->first)
                                                                <img class="card-img-top img-fluid"
                                                                    src="{{ $thumbnail->url }}"
                                                                    alt="images/products/products-1.jpg"
                                                                    alt="Card image cap">
                                                            @endif

                                                        @endforeach
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <h4 class="card-title"><a
                                                            href="{{ route('gig.show', ['id' => $result->id]) }}">{{ $result->title }}</a>
                                                    </h4>
                                                    <ul class="list-inline product-meta">
                                                        <li class="list-inline-item">
                                                            <a href="single.html"><i
                                                                    class="fa fa-folder-open-o"></i>{{ $result->category->name }}</a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#"><i
                                                                    class="fa fa-calendar"></i>{{ $result->created_at }}</a>
                                                        </li>
                                                    </ul>
                                                    <h2 class="card-text" style="text-align: center">
                                                        @foreach ($result->option as $option)
                                                            @if ($loop->first)
                                                                ${{ $option->price }}
                                                            @elseif ($loop->last)
                                                                - ${{ $option->price }}
                                                            @endif

                                                        @endforeach
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
