@extends('layouts.freelancer_layout')

@section('title', 'Home')

@section('content')

    <section id="content" class="container">
        <!-- Begin .page-heading -->
        <div class="page-heading">
            <div class="media clearfix">
                <div class="media-left pr30">
                    <a href="#">
                        <img class="media-object mw150"
                            src="{{ asset('storage/' . $freelancer->user->profile_photo_path) }}" alt="..."
                            class="rounded-circle" width="200" height="200">
                    </a>
                </div>
                <div class="media-body va-m">
                    <h2 class="media-heading">{{ $freelancer->user->name }}
                        <small> - Profile</small>
                    </h2>
                    <p class="lead">
                        <span class="panel-icon">
                            <i class="fa fa-star"></i>
                        </span>
                        <span class="panel-title"> {{ $freelancer->rating }} </span>
                    </p>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-icon">
                            <i class="fa fa-star"></i>
                        </span>
                        <span class="panel-title"> Languages</span>
                    </div>
                    <div class="panel-body pn">
                        <ul>
                            @foreach ($freelancer->language as $language)
                                <li>{{ $language->name }} - {{ $language->level }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-icon">
                            <i class="fa fa-trophy"></i>
                        </span>
                        <span class="panel-title"> My Skills</span>
                    </div>
                    <div class="panel-body pb5">
                        <ul>
                            @foreach ($freelancer->skill as $skill)
                                <li>{{ $skill->name }} - {{ $skill->level }}</li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-icon">
                            <i class="fa fa-pencil"></i>
                        </span>
                        <span class="panel-title">Work Experience</span>
                    </div>
                    <div class="panel-body pb5">
                        @foreach ($freelancer->employment as $employment)

                            <h4>{{ $employment->title }}</h4>
                            <p class="text-muted"> {{ $employment->company }}
                                <br> {{ $employment->status }}, {{ $employment->period }}
                            </p>

                            <hr class="short br-lighter">
                        @endforeach

                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-icon">
                            <i class="fa fa-pencil"></i>
                        </span>
                        <span class="panel-title">Educational Qualification</span>
                    </div>
                    <div class="panel-body pb5">
                        @foreach ($freelancer->qualification as $qualification)

                            <h4>{{ $qualification->degree }}, {{ $qualification->subject }}</h4>
                            <p class="text-muted"> {{ $qualification->school }}
                                <br> {{ $qualification->start }}- {{ $qualification->end }}
                            </p>

                            <hr class="short br-lighter">
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-8">

                <div class="tab-block">
                    <div class="tab-content p30" style="height:auto;">
                        @foreach ($freelancer->gig as $gig)
                            <h3>
                                <a href="{{ route('gig.show', ['id' => $gig->id]) }}">
                                    {{ $gig->title }}
                                </a>
                            </h3>
                            <p>
                                {{ $gig->description }}
                            </p>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
