@extends('layouts.frontend')
@section('front')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in col-lg-offset-3">
                        <h4 class="">Sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>

                        <form class="register-form outer-top-xs" role="form" action="{{route('login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
                            </div>
                            <div class="radio outer-xs">
                                <a href="#" class="forgot-password pull-right">Forgot your Password?</a>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>

                            <p class="text-right" style="margin-top: -20px;">Dont have an account ?<a href="{{route('register')}}">Create Here</a></p>
{{--                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button pull-right">Register</button>--}}
                        </form>


                        <div class="social-sign-in outer-top-xs">
                            <a href="{{ url('/auth/redirect/facebook') }}" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                            <a href="{{ url('/auth/redirect/google') }}" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                        </div>

                    </div>
                    <!-- Sign-in -->
                    <!-- create a new account -->

                    <!-- create a new account -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.sigin-in-->
            <br>
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">

                <!-- /.logo-slider-inner -->
            </div>
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
    </div>

@stop
