@extends('layouts.auth')

@section('content')
    <!-- Sign in Start -->
    <section class="sign-in-page bg-white">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-sm-6 align-self-center">
                    <div class="sign-in-from">
                        <h1 class="mb-0">Sign Up</h1>
                        <p>Enter your email address and password to access admin panel.</p>

                        @include('layouts.dashboard.alerts.danger-alert')
                        <form class="mt-4" action="{{ route('register') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Your Full Name</label>
                                <input name="name" type="text" class="form-control mb-0" id="exampleInputEmail1"
                                    placeholder="Your Full Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2">Email address</label>
                                <input name="email" type="email" class="form-control mb-0" id="exampleInputEmail2"
                                    placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="password" type="password" class="form-control mb-0" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input name="password_confirmation" type="password" class="form-control mb-0"
                                    id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="d-inline-block w-100">
                                <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">I accept <a href="#">Terms
                                            and Conditions</a></label>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Sign Up</button>
                            </div>
                            <div class="sign-info">
                                <span class="dark-color d-inline-block line-height-2">Already Have Account ? <a
                                        href="{{ route('login') }}">Log In</a></span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 text-center">
                    <div class="sign-in-detail text-white" style="background: url(images/login/6.jpg) no-repeat 0 0; background-size: cover;">
                        <a class="sign-in-logo mb-5" href="#"><h4 class="mb-1 text-white">INTERNET OF THINGS</h4></a>
                        <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                            <div class="item">
                                <img src="images/login/9.png" class="img-fluid mb-4" alt="logo">

                                <marquee direction="left" behavior="scroll" scrollamount="5">
                                    <p>The Internet of Things (IoT) has revolutionized the way we interact with technology, enabling seamless connectivity and data exchange between physical devices and the digital world. From smart homes and cities to industrial automation and healthcare, IoT applications are diverse and impactful. In agriculture, IoT sensors monitor soil conditions and weather patterns to optimize crop yield and resource usage. In healthcare, wearable devices track vital signs and provide real-time health monitoring for patients. Smart grids and energy management systems leverage IoT to improve efficiency and sustainability in power distribution. Across industries, IoT is driving innovation, efficiency, and new opportunities for businesses and consumers alike.</p>
                                </marquee>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sign in END -->
@endsection
