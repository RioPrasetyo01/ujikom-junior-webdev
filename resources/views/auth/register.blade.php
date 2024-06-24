@extends('layouts.register')

@section('content')
    <!-- Sign in Start -->
    <section class="sign-in-page bglogin d-flex justify-content-center align-items-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="mb-4 text-center">Register</h1>
                            <p class="text-center">Please register first if you don't have an account.</p>

                            @include('layouts.dashboard.alerts.danger-alert')

                            <form class="mt-4" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Your Full Name</label>
                                    <input name="name" type="text" class="form-control mb-0" id="exampleInputEmail1"
                                        placeholder="Your Full Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputAddress2">Address</label>
                                    <input name="address" type="text" class="form-control mb-0" id="exampleInputEmail2"
                                        placeholder="Your Address">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input name="email" type="email" class="form-control mb-0" id="exampleInputEmail2"
                                        placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone Number</label>
                                    <input name="phone_number" type="text" class="form-control mb-0" id="exampleInputEmail2"
                                        placeholder="Your Phone Number">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input name="password" type="password" class="form-control mb-0"
                                        id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Password Confirmation</label>
                                    <input name="password_confirmation" type="password" class="form-control mb-0"
                                        id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="d-inline-block w-100">
                                    <button type="submit" class="btn btn-primary float-right">Sign Up</button>
                                </div>
                                <div class="sign-info">
                                    <span class="dark-color d-inline-block line-height-2">Already Have Account ? <a
                                            href="{{ route('login') }}">Log In</a></span>
                                    <ul class="iq-social-media">
                                        <li><a href="https://wa.me/085850798627"><i class="ri-whatsapp-line"></i></a></li>
                                        <li><a href="https://www.instagram.com/rioprasetyo_1"><i class="ri-instagram-line"></i></a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .bglogin {
                background-color: #37517e
            }
        </style>
    </section>
    <!-- Sign in END -->
@endsection
