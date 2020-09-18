<div class="category-product">
    @if (count($products) > 0)


    @foreach($products as $pro)
        <div class="category-product-inner wow fadeInUp">
            <div class="products">
                <div class="product-list product">
                    <div class="row product-list-row">
                        <div class="col col-sm-4 col-lg-4">
                            <div class="product-image">
                                <div class="image"> <img src="{{asset($pro->main_image)}}" alt=""> </div>
                            </div>
                            <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-8 col-lg-8">
                            <div class="product-info">
                                <h3 class="name"><a href="{{route('product.details',$pro->id)}}">{{$pro->product_name}}</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="product-price">
                                    <span class="price"> {{$gn->site_currency}}{{$pro->product_new_price}} </span>
                                    @if (!empty($pro->product_old_price))
                                        <span class="price-before-discount">{{$gn->site_currency}}{{$pro->product_old_price}}</span> </div>
                            @endif

                            <!-- /.product-price -->
                                <div class="description m-t-10">{!! $pro->sort_des !!}</div>
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">

                                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-eye"></i> </button>

                                                <button class="btn btn-primary cart-btn" type="button"><a href="{{route('product.details',$pro->id)}}" style="color: white">View Details</a></button>

                                            </li>


                                        </ul>
                                    </div>
                                    <!-- /.action -->
                                </div>
                                <!-- /.cart -->
                            </div>
                            <!-- /.product-info -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.product-list-row -->

                </div>
                <!-- /.product-list -->
            </div>
            <!-- /.products -->
        </div>
    @endforeach
    @else
        <h4 class="text-center">Sorry! No Offer Available Now.</h4>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    @endif


</div>

<div class="clearfix filters-container">
{{$products->links()}}
<!-- /.text-right -->
</div>


