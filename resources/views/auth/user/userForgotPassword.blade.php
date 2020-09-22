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
                        <div class="panel-title">Forgot Password</div>
                    </div>
                    @include('layouts.error')

                    <div style="padding-top:30px" class="panel-body" >
                        @if (Session::has('success_f_mess'))
                            <p class="text-success text-center">{{Session::get('success_f_mess')}}</p>
                        @endif
                        @if (Session::has('alert_f_mess'))
                            <p class="text-success text-center">{{Session::get('alert_f_mess')}}</p>
                        @endif
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                        <form id="loginform" class="form-horizontal" role="form" action="{{route('forgot.password.submit')}}" method="post">
                            @csrf

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="far fa-envelope"></i></span>
                                <input id="login-username" type="text" class="form-control" name="email" placeholder="Email" required>
                            </div>




                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->

                                <div class="col-sm-12 controls">
                                    <button class="btn btn-success btn-black btn-block">Submit</button>



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
