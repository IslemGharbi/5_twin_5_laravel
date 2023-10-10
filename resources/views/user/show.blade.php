@extends('layouts.freelancer_layout')

@section('title', 'Home')

@section('content')

    <section class="user-profile section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
                    <div class="sidebar">
                        <!-- User Widget -->
                        <div class="widget user">
                            <!-- User Image -->
                            <div class="image d-flex justify-content-center">
                                <img src="{{ $user->profile_photo_url }}" alt="" class="">
                            </div>
                            <!-- User Name -->


                            <h5 class="text-center">{{ $user->name }}
                                @if (Auth::user())
                                    @if ($user->id === Auth::user()->id)
                                        <a href="{{ route('profile.show') }}">
                                            <i class="fa fa-pencil">Edit Profile
                                            </i>
                                        </a>
                                    @endif
                                @endif
                            </h5>
                        </div>
                        @if ($user->freelancer)
                            <!-- Dashboard Links -->
                            <div class="widget dashboard-links">
                                <div class="flex-random">
                                    <h4>Professional Skills</h4>
                                    @if (Auth::user())
                                        @if ($user->id === Auth::user()->id)
                                            <a href="{{ route('skill.create', ['id' => $user->freelancer->id]) }}">
                                                <i class="fa fa-pencil">
                                                </i>
                                            </a>
                                        @endif
                                    @endif
                                </div>
                                @foreach ($user->freelancer->skill as $skill)
                                    <p style="margin: 0">{{ $skill->name }}</p>
                                    @if ($skill->level === 'Professional')
                                        @php
                                            $star = 5;
                                            $blank = 0;
                                        @endphp
                                    @elseif ($skill->level === 'Semi-Professional')
                                        @php
                                            $star = 4;
                                            $blank = 1;
                                        @endphp
                                    @elseif ($skill->level === 'Advance')
                                        @php
                                            $star = 3;
                                            $blank = 2;
                                        @endphp
                                    @elseif ($skill->level === 'Limited')
                                        @php
                                            $star = 2;
                                            $blank = 3;
                                        @endphp
                                    @else
                                        @php
                                            $star = 1;
                                            $blank = 4;
                                        @endphp
                                    @endif
                                    <ul class="list-inline">
                                        @for ($i = 0; $i < $star; $i++)
                                            <li class="list-inline-item">
                                                <i class="fa fa-star"></i>
                                            </li>
                                        @endfor
                                        @for ($i = 0; $i < $blank; $i++)
                                            <li class="list-inline-item">
                                                <i class="fa fa-star-o"></i>
                                            </li>
                                        @endfor

                                    </ul>
                                @endforeach
                            </div>
                            <div class="widget dashboard-links">
                                <div class="flex-random">
                                    <h4>Languages</h4>
                                    @if (Auth::user())
                                        @if ($user->id === Auth::user()->id)
                                            <a href="{{ route('language.create', ['id' => $user->freelancer->id]) }}">
                                                <i class="fa fa-pencil">
                                                </i>
                                            </a>
                                        @endif
                                    @endif
                                </div>
                                @foreach ($user->freelancer->language as $language)
                                    <p style="margin: 0">{{ $language->name }}</p>
                                    @if ($language->level === 'Native')
                                        @php
                                            $star = 5;
                                            $blank = 0;
                                        @endphp
                                    @elseif ($language->level === 'Professional')
                                        @php
                                            $star = 4;
                                            $blank = 1;
                                        @endphp
                                    @elseif ($language->level === 'Advance')
                                        @php
                                            $star = 3;
                                            $blank = 2;
                                        @endphp
                                    @elseif ($language->level === 'Limited')
                                        @php
                                            $star = 2;
                                            $blank = 3;
                                        @endphp
                                    @else
                                        @php
                                            $star = 1;
                                            $blank = 4;
                                        @endphp
                                    @endif
                                    <ul class="list-inline">
                                        @for ($i = 0; $i < $star; $i++)
                                            <li class="list-inline-item">
                                                <i class="fa fa-star"></i>
                                            </li>
                                        @endfor
                                        @for ($i = 0; $i < $blank; $i++)
                                            <li class="list-inline-item">
                                                <i class="fa fa-star-o"></i>
                                            </li>
                                        @endfor

                                    </ul>
                                @endforeach
                            </div>
                            <div class="widget dashboard-links">
                                <div class="flex-random">
                                    <h4>Qualification</h4>
                                    @if (Auth::user())
                                        @if ($user->id === Auth::user()->id)
                                            <a
                                                href="{{ route('qualification.create', ['id' => $user->freelancer->id]) }}">
                                                <i class="fa fa-pencil">
                                                </i>
                                            </a>
                                        @endif
                                    @endif
                                </div>
                                @foreach ($user->freelancer->qualification as $qualification)
                                    <h6 style="margin: 0">{{ $qualification->degree }} in
                                        {{ $qualification->subject }}</h6>
                                    <p style="margin: 0">{{ $qualification->start }}
                                        @if ($qualification->end != null)
                                            - {{ $qualification->end }}
                                        @else
                                            - ongoing
                                        @endif
                                    </p>
                                    <p style="margin: 0">{{ $qualification->school }}</p>
                                    <hr>
                                @endforeach
                            </div>
                            <div class="widget dashboard-links">
                                <div class="flex-random">
                                    <h4>Employment History</h4>
                                    @if (Auth::user())
                                        @if ($user->id === Auth::user()->id)
                                            <a href="{{ route('employment.create', ['id' => $user->freelancer->id]) }}">
                                                <i class="fa fa-pencil">
                                                </i>
                                            </a>
                                        @endif
                                    @endif
                                </div>
                                @foreach ($user->freelancer->employment as $employment)
                                    <h6 style="margin: 0">{{ $employment->title }} as
                                        {{ $employment->status }}</h6>
                                    <p style="margin: 0">{{ $employment->period }}</p>
                                    <p style="margin: 0">{{ $employment->company }}</p>
                                    <hr>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
                    <!-- Edit Profile Welcome Text -->
                    <div class="widget welcome-message">
                        <h2>About Me</h2>
                        <p>Gender: {{ $user->gender }}</p>
                        <p>Date of Birth: {{ $user->dob }}</p>

                    </div>

                    @if ($user->freelancer)
                        <div class="widget welcome-message">
                            <h1>{{ $user->name }}'s Gigs</h1>
                            <br>
                            @foreach ($user->freelancer->gig as $gig)
                                @if (count($gig->option) != 0 && count($gig->thumbnail) != 0)
                                    <div class="col-sm-12 col-lg-12">
                                        <!-- product card -->
                                        <div class="product-item bg-light">
                                            <div class="card">
                                                <div class="thumb-content">
                                                    <!-- <div class="price">$200</div> -->

                                                    @php
                                                        $i = 0;
                                                    @endphp
                                                    <a href="{{ route('gig.show', ['id' => $gig->id]) }}">
                                                        @foreach ($gig->thumbnail as $thumbnail)
                                                            @if ($i == 0)

                                                                <img class="card-img-top img-fluid"
                                                                    src="{{ $thumbnail->url }}"
                                                                    alt="images/products/products-1.jpg"
                                                                    alt="Card image cap">
                                                                @php
                                                                    $i++;
                                                                @endphp
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
                                                                <i class="fa fa-folder-open-o">
                                                                    <a href="single.html">
                                                                        {{ $gig->category->name }}</a>
                                                                    / <a
                                                                        href="single.html">{{ $gig->sub_category->name }}</a>
                                                                </i>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="#"><i
                                                                        class="fa fa-calendar"></i>{{ $gig->created_at }}</a>
                                                            </li>
                                                        </ul>
                                                        <h2 class="card-text" style="text-align: center">

                                                            @foreach ($gig->option as $option)
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
                                    </div>
                                @else
                                    @if (Auth::user())
                                        @if ($user->id === Auth::user()->id)
                                            <div class="col-sm-12 col-lg-12">
                                                <!-- product card -->
                                                <div class="product-item bg-light">
                                                    <div class="card">
                                                        <div class="thumb-content">
                                                            <!-- <div class="price">$200</div> -->

                                                            @php
                                                                $i = 0;
                                                            @endphp
                                                            <a href="{{ route('gig.show', ['id' => $gig->id]) }}">
                                                                @foreach ($gig->thumbnail as $thumbnail)
                                                                    @if ($i == 0)

                                                                        <img class="card-img-top img-fluid"
                                                                            src="{{ $thumbnail->url }}"
                                                                            alt="images/products/products-1.jpg"
                                                                            alt="Card image cap">
                                                                        @php
                                                                            $i++;
                                                                        @endphp
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
                                                                        <i class="fa fa-folder-open-o">
                                                                            <a href="single.html">
                                                                                {{ $gig->category->name }}</a>
                                                                            / <a
                                                                                href="single.html">{{ $gig->sub_category->name }}</a>
                                                                        </i>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a href="#"><i
                                                                                class="fa fa-calendar"></i>{{ $gig->created_at }}</a>
                                                                    </li>
                                                                </ul>
                                                                <h2 class="card-text" style="text-align: center">

                                                                    @foreach ($gig->option as $option)
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
                                            </div>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    @else
                        @if ($user->id === Auth::user()->id)

                            <form method="POST" action="{{ route('freelancer.store') }}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button class="btn btn-primary d-block mt-2" type="submit">Join As a
                                    Freelancer</button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
