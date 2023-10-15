@extends('layouts.freelancer_layout')

@section('title', 'Create')

@section('content')
    <section class="page-title">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <!-- Title text -->
                    <h3>About Us</h3>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="https://i.ibb.co/vJvQ8v6/New-Project.png" class="img-fluid w-100 rounded" alt="">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pt-lg-0">
                    <div class="about-content">
                        <h3 class="font-weight-bold">About</h3>
                        <p>Post a project or contest </p>
                        <ul>
                            <li>

                                1. Simply post a project or contest for what you need done and receive competitive bids from
                                freelancers within minutes.
                            </li>
                            <li>

                                2. Choose the perfect freelancer
                                Browse freelancer profiles. Chat in real-time. Compare proposals and select the best one.
                                Award
                                your
                                project and your freelancer starts work.
                            </li>
                            <li>

                                3. Pay when you’re satisfied
                                Pay securely using our Milestone Payment system. Release payments when it has been completed
                                and
                                you're 100% satisfied.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="container">
            <div class="row" style="justify-content: center">
                <div class="col-lg-12">
                    <div class="heading text-center text-capitalize font-weight-bold py-5">
                        <h2>our team</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card my-3 my-lg-0">
                        <img class="card-img-top"
                            src="https://i.ibb.co/t3V67fx/266971736-2085595124928595-2215979393464589232-n.jpg"
                            class="img-fluid w-100" alt="Card image cap">
                        <div class="card-body bg-gray text-center">
                            <h5 class="card-title">
                                <a href="https://github.com/shishirregmi">
                                    Shishir Regmi
                                </a>
                            </h5>
                            <p class="card-text">CSIT</p>
                            <p class="card-text">NCCS College</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card my-3 my-lg-0">
                        <img class="card-img-top"
                            src="https://i.ibb.co/JCpYfhW/131411220-1814675362023179-7579069010231975560-n.jpg"
                            class="img-fluid w-100" alt="Card image cap">
                        <div class="card-body bg-gray text-center">
                            <h5 class="card-title">
                                <a href="https://github.com/BroshaN10">
                                    Roshan Basnet
                                </a>
                            </h5>
                            <p class="card-text">CSIT</p>
                            <p class="card-text">NCCS College</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card my-3 my-lg-0">
                        <img class="card-img-top"
                            src="https://i.ibb.co/jLjSfh4/152238923-3939461576117467-8639141180848212686-n.jpg"
                            class="img-fluid w-100" alt="Card image cap">
                        <div class="card-body bg-gray text-center">
                            <h5 class="card-title">
                                <a href="https://github.com/anupam-gautam">
                                    Anupam Gautam
                                </a>
                            </h5>
                            <p class="card-text">CSIT</p>
                            <p class="card-text">NCCS College</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-sm-6">
                <div class="card my-3 my-lg-0">
                    <img class="card-img-top" src="images/team/team4.jpg" class="img-fluid w-100" alt="Card image cap">
                    <div class="card-body bg-gray text-center">
                        <h5 class="card-title">John Doe</h5>
                        <p class="card-text">Founder / CEO</p>
                    </div>
                </div>
            </div> --}}
            </div>
        </div>
    </section>

    <section class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
                    <div class="counter-content text-center bg-light py-4 rounded">
                        <i class="fa fa-smile-o d-block"></i>
                        <span class="counter my-2 d-block" data-count="{{ $user->count() }}">0</span>
                        <h5>Users</h5>
                        </script>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
                    <div class="counter-content text-center bg-light py-4 rounded">
                        <i class="fa fa-user-o d-block"></i>
                        <span class="counter my-2 d-block" data-count="{{ $freelancer->count() }}">0</span>
                        <h5>Freelancers</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
                    <div class="counter-content text-center bg-light py-4 rounded">
                        <i class="fa fa-bookmark-o d-block"></i>
                        <span class="counter my-2 d-block" data-count="{{ $gig->count() }}">0</span>
                        <h5>Gigs</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
                    <div class="counter-content text-center bg-light py-4 rounded">
                        <i class="fa fa-briefcase d-block"></i>
                        <span class="counter my-2 d-block" data-count="{{ $order->count() }}">0</span>
                        <h5>Total Transactions</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
