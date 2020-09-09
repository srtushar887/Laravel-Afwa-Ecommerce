@extends('layouts.frontend')
@section('front')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Blog</li>
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
                        @foreach($blogs as $blog)
                            <div class="blog-post  wow fadeInUp">
                                <a href="{{route('blog.details',$blog->id)}}"><img class="img-responsive" src="{{asset($blog->blog_image)}}" style="width: 100%;height: 450px;" alt=""></a>
                                <h1><a href="{{route('blog.details',$blog->id)}}">{{$blog->blog_title}}</a></h1>
                                <span class="author">Admin</span>
                                <?php
                                $blog_comment_count = \App\blog_comment::where('blog_id',$blog->id)->count();
                                ?>
                                <span class="review">
                                @if ($blog_comment_count <= 1)
                                        {{$blog_comment_count}} Comment
                                    @else
                                        {{$blog_comment_count}} Comments
                                    @endif

                            </span>
                                <?php

                                $date = \Carbon\Carbon::now();
                                $times = strtotime($blog->created_at)
                                ?>
                                <span class="date-time">{{date('F j, Y, g:i a',$times )}}</span>
                                <p>{!! $blog->blog_des !!}</p>
                                <a href="#" class="btn btn-upper btn-primary read-more">read more</a>
                            </div>
                        @endforeach
                        <div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">
                            <div class="text-right">
                            {{$blogs->links()}}
                            <!-- /.pagination-container -->
                            </div>
                            <!-- /.text-right -->
                        </div>
                        <!-- /.filters-container -->
                    </div>
                    <div class="col-md-3 sidebar">
                        <div class="sidebar-module-container">
                            <div class="search-area outer-bottom-small">
                                <form action="{{route('search.blog')}}" method="get">
                                    @csrf
                                    <div class="control-group">
                                        <input placeholder="Type to search" name="search" value="{{$search}}" class="search-field">
                                        <a href="#" class="search-button"></a>
                                    </div>
                                </form>
                            </div>
                            <div class="home-banner outer-top-n outer-bottom-xs">
                                <img src="{{asset('assets/frontend/')}}/images/banners/LHS-banner.jpg" alt="Image">
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
                            <!-- ============================================== CATEGORY : END ============================================== -->
                            <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                                <h3 class="section-title">Similar Blog</h3>
                                <ul class="nav nav-tabs">
                                </ul>
                                <div class="tab-content" style="padding-left:0">
                                    <div class="tab-pane active m-t-20" id="popular">
                                        <div class="blog-post inner-bottom-30 " >
                                            <img class="img-responsive" src="{{asset('assets/frontend/')}}/images/blog-post/blog_big_01.jpg" alt="">
                                            <h4><a href="blog-details.html">Simple Blog Post</a></h4>
                                            <span class="review">6 Comments</span>
                                            <span class="date-time">12/06/16</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                        </div>
                                        <div class="blog-post" >
                                            <img class="img-responsive" src="{{asset('assets/frontend/')}}/images/blog-post/blog_big_02.jpg" alt="">
                                            <h4><a href="blog-details.html">Simple Blog Post</a></h4>
                                            <span class="review">6 Comments</span>
                                            <span class="date-time">23/06/16</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================== PRODUCT TAGS ============================================== -->
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <br>
            <br>
            <br>
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
    </div>
@stop
