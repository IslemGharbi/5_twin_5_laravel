<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light navigation">
                    <a class="navbar-brand" href="{{ route('gig.list') }}">
                        <img src="{{ url('images/logo.png') }}" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto main-nav ">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('gig.list') }}">Home</a>
                            </li>

                            @if (Auth::user())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('orders') }}">Your Orders</a>
                                </li>

                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Freelancing <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <!-- Dropdown list -->
                                    <div class="dropdown-menu">
                                        @if (!Auth::user()->freelancer)

                                            <form method="POST" action="{{ route('freelancer.store') }}">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                <button class="dropdown-item" type="submit">Join As a
                                                    Freelancer</button>
                                            </form>
                                        @else
                                            <a class="dropdown-item" href="{{ route('gig.create.view') }}">Add
                                                Gigs</a>
                                            <a class="dropdown-item" href="{{ route('order.list') }}">View
                                                Orders</a>
                                        @endif
                                    </div>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto mt-10">
                            <li class="nav-item">
                                @if (!Auth::user())
                                    <a class="nav-link login-button" href="{{ route('login') }}">Login</a>
                                @else
                                    <a class="nav-link login-button"
                                        href="{{ route('user.show', ['id' => Auth::user()->id]) }}">{{ Auth::user()->name }}</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if (Auth::user())
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="nav-link text-white add-button" type="submit"><i
                                                class="fa fa-sign-out"></i> Logout</button>
                                    </form>
                                @else
                                    <a class="nav-link login-button" href="{{ route('register') }}">Register</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
