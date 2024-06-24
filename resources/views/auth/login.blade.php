@extends('layouts.auth')

<section class="sign-in-page bglogin d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mb-4 text-center">Login</h1>
                        <p class="text-center">Enter your email address and password.</p>

                        @include('layouts.dashboard.alerts.danger-alert')

                        <form class="mt-4" action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input name="email" type="email" class="form-control mb-3" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                {{-- <a href="#" class="float-right">Forgot password?</a> --}}
                                <input name="password" type="password" class="form-control mb-3" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="d-inline-block w-100">
                                <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                    <input name="remember" type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Login</button>
                            </div>
                            <div class="sign-info mt-4 text-center">
                                <span class="dark-color d-inline-block line-height-2">Don't have an account? <a href="{{ route('register') }}">Register</a></span>
                                <ul class="iq-social-media list-inline mt-3">
                                    {{-- <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=100030097365361"><i class="ri-facebook-box-line"></i></a></li> --}}
                                    <li class="list-inline-item"><a href="https://wa.me/085850798627"><i class="ri-whatsapp-line"></i></a></li>
                                    <li class="list-inline-item"><a href="https://www.instagram.com/rioprasetyo_1"><i class="ri-instagram-line"></i></a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>.bglogin{background-color:#37517e}</style>
</section>
