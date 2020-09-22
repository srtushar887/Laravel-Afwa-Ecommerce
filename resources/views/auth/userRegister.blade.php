@extends('layouts.frontend')
@section('front')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('front')}}">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>

    <div class="body-content" style="margin-top: -40px;">
        <div class="container">
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign Up</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="{{route('forgot.password')}}">Forgot password?</a></div>
                    </div>

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                        <form id="loginform" class="form-horizontal" role="form" action="{{route('register')}}" method="post">
                            @csrf

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                <input id="login-username" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="far fa-envelope"></i></span>
                                <input id="login-username" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                                <input id="login-username" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" placeholder="Phone Number" required>
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                                <input id="login-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>


                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->

                                <div class="col-sm-12 controls">
                                    <button class="btn btn-success btn-black btn-block">Register</button>
                                    <br>
                                    <br>
                                    <div class="col-md-6">
                                        <a id="btn-fblogin" href="{{ url('/auth/redirect/facebook') }}"><button class="btn btn-primary btn-block"><i class="fab fa-facebook-square"></i> Login with Facebook</button></a>
                                    </div>  <div class="col-md-6">
                                        <a id="btn-fblogin" href="{{ url('/auth/redirect/google') }}"><button class="btn btn-primary btn-block"><i class="fab fa-google-plus-square"></i> Login with Google</button></a>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12 control">
                                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                        Already have an account!
                                        <a href="{{route('login')}}">
                                            Sign In Here
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>



                    </div>
                </div>
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
