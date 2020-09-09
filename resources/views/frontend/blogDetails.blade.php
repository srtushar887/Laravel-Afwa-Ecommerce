@extends('layouts.frontend')
@section('front')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Blog Details</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>


    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">
                        <div class="blog-post wow fadeInUp">
                            <img class="img-responsive" src="{{asset($blogs->blog_image)}}" style="height: 400px;width: 100%" alt="">
                            <h1>{!! $blogs->blog_title !!}</h1>
                            <span class="author">Admin</span>
                            <span class="review">7 Comments</span>
                            <?php

                            $date = \Carbon\Carbon::now();
                            $times = strtotime($blogs->created_at)
                            ?>
                            <span class="date-time">{{date('F j, Y, g:i a',$times )}}</span>
                            <p>{!! $blogs->blog_des !!}</p>
                        </div>
                        <div class="blog-post-author-details wow fadeInUp">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="https://images-na.ssl-images-amazon.com/images/I/51e6kpkyuIL._AC_SX466_.jpg" alt="Responsive image" class="img-circle img-responsive">
                                </div>
                                <div class="col-md-10">
                                    <h4>John Doe</h4>
                                    <span class="author-job">Web Designer</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                </div>
                            </div>
                        </div>

                        <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Leave A Comment</h4>
                                </div>
                                <div class="col-md-4">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
                                            <textarea class="form-control unicase-form-control" id="exampleInputComments" ></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12 outer-bottom-small m-t-20">
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit Comment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 sidebar">
                        <div class="sidebar-module-container">
                            <div class="search-area outer-bottom-small">
                                <form>
                                    <div class="control-group">
                                        <input placeholder="Type to search" class="search-field">
                                        <a href="#" class="search-button"></a>
                                    </div>
                                </form>
                            </div>
                            <div class="home-banner outer-top-n outer-bottom-xs">
                                <img src="assets/images/banners/LHS-banner.jpg" alt="Image">
                            </div>
                            <!-- ==============================================CATEGORY============================================== -->
                            <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                                <h3 class="section-title">Category</h3>
                                <div class="sidebar-widget-body m-t-10">
                                    <div class="accordion">
                                        @foreach($blog_categories as $bcts)
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed">
                                                        {{$bcts->category_name}}
                                                    </a>
                                                </div>
                                                <!-- /.accordion-heading -->
                                                <!-- /.accordion-body -->
                                            </div>
                                        @endforeach

                                    </div>
                                    <!-- /.accordion -->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                            <!-- /.sidebar-widget -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
