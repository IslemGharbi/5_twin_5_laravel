@extends('layouts.freelancer_layout')

@section('title', 'Home')

@section('content')
    <section class="page-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <form action="{{ route('category.search') }}" method="get">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <select class="form-control wide" name="data" id="inputtext4">
                                        <option selected="true" disabled="disabled">Select category</option>
                                        @foreach ($sub_category as $sub_category)
                                            <option value="{{ $sub_category->id }}">
                                                {{ $sub_category->name }}({{ $sub_category->category->name }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-primary" style="padding-bottom:10px;">Search
                                        Now</button>
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
                        @if ($result)
                            @foreach ($result as $results)
                                <h2>Results For "{{ $results->sub_category->name }}"</h2>
                            @break
                        @endforeach
                        @endif
                        @if ($result->count() == 0)
                            <h2>No Data Available</h2>
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
                    <img class="card-img-top img-fluid" src="{{ $thumbnail->url }}" alt="images/products/products-1.jpg" alt="Card image cap">
                @endif
            @endforeach
        </a>
        <div class="buttons">
            <a href="{{ route('gig.edit', ['id' => $result->id]) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('gig.delete', ['id' => $result->id]) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <h4 class="card-title">
            <a href="{{ route('gig.show', ['id' => $result->id]) }}">{{ $result->title }}</a>
        </h4>
        <ul class="list-inline product-meta">
            <li class="list-inline-item">
                <a href="single.html"><i class="fa fa-folder-open-o"></i>{{ $result->category->name }}</a>
            </li>
            <li class="list-inline-item">
                <a href="#"><i class="fa fa-calendar"></i>{{ $result->created_at }}</a>
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
