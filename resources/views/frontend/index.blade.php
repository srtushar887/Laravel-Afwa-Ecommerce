@extends('layouts.frontend')
@section('front')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">        <!-- ================================== TOP NAVIGATION ================================== -->
                <div class="side-menu animate-dropdown">
                    <div class="head"><i class="icon fa fa-bars"></i> Categories</div>
                    <nav class="yamm megamenu-horizontal">
                        <ul class="nav">
                            @foreach($top_categories as $htcats)
                            <li class="dropdown menu-item"> <a href="{{route('main.category.products',$htcats->id)}}"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{$htcats->category_name}}</a>
                                <ul class="dropdown-menu mega-menu">
                                    <li class="yamm-content">
                                        <div class="row">
                                            <?php
                                                $hmid_cats = \App\middle_category::where('top_cat_id',$htcats->id)->get();
                                            ?>
                                            @foreach($hmid_cats as $hmcat)
                                            <div class="col-sm-12 col-md-3">
                                                <ul class="links list-unstyled">
                                                    <li><a href="{{route('end.category.products',$hmcat->id)}}">{{$hmcat->category_name}}</a></li>
                                                </ul>
                                            </div>
                                                @endforeach
                                        </div>
                                        <!-- /.row -->
                                    </li>

                                    <!-- /.yamm-content -->
                                </ul>
                                <!-- /.dropdown-menu -->
                            </li>
                        @endforeach


                        </ul>
                        <!-- /.nav -->
                    </nav>
                    <!-- /.megamenu-horizontal -->
                </div>
                <!-- /.side-menu -->
                <!-- ================================== TOP NAVIGATION : END ================================== -->
                <div class="app-img outer-bottom-xs"><img alt="app" src="{{asset('assets/frontend/')}}/images/app-img.jpg" /></div>
            </div>

            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        @foreach($sliders as $slid)
                        <div class="item" style="background-image: url('{{asset($slid->image)}}');">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left">
                                    <div class="big-text fadeInDown-1"> {{$slid->title}} </div>
                                    <div class="excerpt fadeInDown-2 hidden-xs"> <span>{!! $slid->sub_title !!}</span> </div>
                                    <div class="button-holder fadeInDown-3"> <a href="{{route('all.products')}}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.item -->
                        @endforeach


                    </div>
                    <!-- /.owl-carousel -->
                </div>
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">money back</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">30 Days Money Back Guarantee</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="hidden-md col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">free shipping</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Shipping on orders over $99</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">Special Sale</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Extra $5 off on all items </h6>
                                </div>
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.info-boxes-inner -->

                </div>
            </div>

        </div>

        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">



                <!-- ============================================== HOT DEALS ============================================== -->
                <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                    <h3 class="section-title">hot deals</h3>
                    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                       @foreach($is_hot_deal_product as $hot_deal)
                        <div class="item">
                            <div class="products">
                                <div class="hot-deal-wrapper">
                                    <div class="image"> <img src="{{asset($hot_deal->main_image)}}" alt=""> </div>

                                </div>
                                <!-- /.hot-deal-wrapper -->

                                <div class="product-info text-left m-t-20">
                                    <h3 class="name"><a href="{{route('product.details',$hot_deal->id)}}">{{$hot_deal->product_name}}</a></h3>


                                    <?php

                                    $rating = \App\product_review::where('product_review_id',$hot_deal->id)->sum('quality');
                                    $rating_count = \App\product_review::where('product_review_id',$hot_deal->id)->count();
                                    $rat = ($rating * 5  ) /100;
                                    ?>
                                    @if ($rating_count > 0)
                                        @for ($i = 0; $i < $rat; $i++)
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                        @endfor
                                    @else
                                        No Review
                                    @endif



                                    <div class="product-price">
                                        <span class="price"> {{$gn->site_currency}}{{$hot_deal->product_new_price}} </span>
                                        @if (!empty($hot_deal->product_old_price))
                                            <span class="price-before-discount">{{$gn->site_currency}}{{$hot_deal->product_old_price}}</span>
                                        @endif

                                    </div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->

                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <div class="add-cart-button btn-group">
                                            <a href="{{route('product.details',$hot_deal->id)}}">

                                                <button class="btn btn-primary btn-block " type="button"><i class="fa fa-eye"></i> View Details</button>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- /.action -->
                                </div>
                                <!-- /.cart -->
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- /.sidebar-widget -->
                </div>
                <!-- ============================================== HOT DEALS: END ============================================== -->


                <!-- ============================================== NEWSLETTER ============================================== -->
                <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                    <h3 class="section-title">Newsletters</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <p>Sign Up for Our Newsletter!</p>
                        <form>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control newsemail" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                                <p class="text-danger newserror">Please Enter Your Email</p>
                            </div>
                            <button class="btn btn-primary" id="newssub">Subscribe</button>
                        </form>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== NEWSLETTER: END ============================================== -->

                <!-- ============================================== Testimonials============================================== -->
                <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                    <div id="advertisement" class="advertisement">
                       @foreach($tesimonials as $test)
                        <div class="item">
                            <div class="testimonials"><em>"</em> {!! $test->desc !!}<em>"</em></div>
                            <!-- /.container-fluid -->
                        </div>
                    @endforeach
                        <!-- /.item -->




                    </div>
                    <!-- /.owl-carousel -->
                </div>

                <!-- ============================================== Testimonials: END ============================================== -->

                <div class="home-banner"> <img src="{{asset('assets/frontend/')}}/images/banners/LHS-banner.jpg" alt="Image"> </div>
            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->



                <!-- ========================================= SECTION – HERO : END ========================================= -->

                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="{{asset('assets/frontend/')}}/images/banners/home-banner1.jpg" alt=""> </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="{{asset('assets/frontend/')}}/images/banners/home-banner2.jpg" alt=""> </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">Latest Products</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">View All</a></li>
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @foreach($latest_product as $lproduct)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a href="{{route('product.details',$lproduct->id)}}">

                                                            <img  src="{{asset($lproduct->main_image)}}" alt="">
                                                        </a> </div>
                                                    <!-- /.image -->

                                                    <div class="tag new"><span>new</span></div>
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="{{route('product.details',$lproduct->id)}}">{{$lproduct->product_name}}</a></h3>
                                                    <?php

                                                    $rating = \App\product_review::where('product_review_id',$lproduct->id)->sum('quality');
                                                    $rating_count = \App\product_review::where('product_review_id',$lproduct->id)->count();
                                                    $rat = ($rating * 5  ) /100;
                                                    ?>
                                                    @if ($rating_count > 0)
                                                        @for ($i = 0; $i < $rat; $i++)
                                                            <span class="fa fa-star checked" style="color: orange"></span>
                                                        @endfor
                                                    @else
                                                        No Review
                                                    @endif
                                                    <div class="description"></div>
                                                    <div class="product-price">
                                                        <span class="price"> {{$gn->site_currency}}{{$lproduct->product_new_price}} </span>
                                                        <span class="price-before-discount">{{$gn->site_currency}}{{$lproduct->product_old_price}}</span>
                                                        <br>
                                                        <a href="{{route('product.details',$lproduct->id)}}">

                                                            <button class="btn btn-primary btn-block " type="button"><i class="fa fa-eye"></i> View Details</button>
                                                        </a>
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>

                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">

                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                @endforeach
                                    <!-- /.item -->

                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->

                <!-- ============================================== FEATURED PRODUCTS ============================================== -->

                @foreach($top_categories as $tcats)
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">{{$tcats->category_name}}</h3>

                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        <?php
                            $cat_products = \App\product::where('top_cat_id',$tcats->id)->inRandomOrder()->limit(10)->get()
                        ?>
                        @if (count($cat_products) > 0)
                                @foreach($cat_products as $cproduct)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a href="{{route('product.details',$cproduct->id)}}">
                                                            <img  src="{{asset($cproduct->main_image)}}" alt="">
                                                        </a> </div>
                                                    <!-- /.image -->


                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="{{route('product.details',$cproduct->id)}}">{{$cproduct->product_name}}</a></h3>
                                                    <?php

                                                    $rating = \App\product_review::where('product_review_id',$cproduct->id)->sum('quality');
                                                    $rating_count = \App\product_review::where('product_review_id',$cproduct->id)->count();
                                                    $rat = ($rating * 5  ) /100;
                                                    ?>
                                                    @if ($rating_count > 0)
                                                        @for ($i = 0; $i < $rat; $i++)
                                                            <span class="fa fa-star checked" style="color: orange"></span>
                                                        @endfor
                                                    @else
                                                        No Review
                                                    @endif
                                                    <div class="description"></div>
                                                    <div class="product-price"> <span class="price"> {{$gn->site_currency}}{{$cproduct->product_new_price}} </span>
                                                        @if (!empty($cproduct->product_old_price))
                                                            <span class="price-before-discount">{{$gn->site_currency}}{{$cproduct->product_old_price}}</span>
                                                        @endif

                                                    </div>
                                                    <!-- /.product-price -->
                                                    <br>
                                                    <a href="{{route('product.details',$cproduct->id)}}">

                                                        <button class="btn btn-primary btn-block " type="button"><i class="fa fa-eye"></i> View Details</button>
                                                    </a>
                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                            @endforeach
                        @else
                            <p class=""> No Product Available</p>
                        @endif

                        <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                @endforeach
                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="{{asset('assets/frontend/')}}/images/banners/home-banner.jpg" alt=""> </div>
                                <div class="strip strip-text">
                                    <div class="strip-inner">
                                        <h2 class="text-right">New Mens Fashion<br>
                                            <span class="shopping-needs">Save up to 40% off</span></h2>
                                    </div>
                                </div>
                                <div class="new-label">
                                    <div class="text">NEW</div>
                                </div>
                                <!-- /.new-label -->
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== BEST SELLER ============================================== -->

                <!-- /.sidebar-widget -->
                <!-- ============================================== BEST SELLER : END ============================================== -->

                <!-- ============================================== BLOG SLIDER ============================================== -->
                <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                    <h3 class="section-title">latest form blog</h3>
                    <div class="blog-slider-container outer-top-xs">
                        <div class="owl-carousel blog-slider custom-carousel">
                            @foreach($latest_blog as $blog)
                                <?php

                                $date = \Carbon\Carbon::now();
                                $times = strtotime($blog->created_at)
                                ?>
                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img src="{{asset($blog->blog_image)}}" style="height: 200px;" alt=""></a> </div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">{{$blog->blog_title}}</a></h3>
                                        <span class="info">By Admin &nbsp;|&nbsp; {{date('F j, Y, g:i a',$times )}} </span>
                                        <p class="text">{!! substr($blog->blog_des,0,300) !!}......</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                        @endforeach
                            <!-- /.item -->

                        </div>
                        <!-- /.owl-carousel -->
                    </div>
                    <!-- /.blog-slider-container -->
                </section>
                <!-- /.section -->
                <!-- ============================================== BLOG SLIDER : END ============================================== -->

            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">
            <div class="logo-slider-inner">
                <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand1.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand2.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand3.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand4.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand5.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand6.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand2.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand4.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand1.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand5.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->
                </div>
                <!-- /.owl-carousel #logo-slider -->
            </div>
            <!-- /.logo-slider-inner -->

        </div>
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
@stop


@section('js')
    <script>
        $('.newserror').hide();

        $(document).ready(function (){
            $('#newssub').click(function (e){
                e.preventDefault();
               var em = $('.newsemail').val();

               if (em == ""){
                   $('.newserror').show();
               }else {
                   $('.newserror').hide();

                   $.ajax({
                       type : "POST",
                       url: "{{route('user.newslatter.save')}}",
                       data : {
                           '_token' : "{{csrf_token()}}",
                           'em' : em,

                       },
                       success:function(data){
                           swal("Newsletter Subscribe Successfull", "", "success");
                       }
                   });



               }


            });
        });

    </script>
@stop
