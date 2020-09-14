@extends('layouts.frontend')
@section('front')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('front')}}">Home</a></li>
                    <li class='active'>About Us</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->


    <div class="body-content">
        <div class="container">
            <div class="terms-conditions-page">
                <div class="row">
                    <div class="col-md-12 terms-conditions">
                        <h2 class="heading-title">About Us</h2>
                        <div class="">
                        {!! $about->about_us !!}
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <br>
            <br>
            <br>
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
    </div>

@stop
