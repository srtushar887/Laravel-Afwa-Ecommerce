@extends('layouts.frontend')
@section('front')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Shopping Cart</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="cart-romove item">Remove</th>
                                    <th class="cart-description item">Image</th>
                                    <th class="cart-product-name item">Product Name</th>
                                    <th class="cart-qty item">Quantity</th>
                                    <th class="cart-sub-total item">Subtotal</th>
                                </tr>
                                </thead>
                                <!-- /thead -->
                                <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="shopping-cart-btn">
                                       <span class="">
                                       <a href="{{route('all.products')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
{{--                                       <a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>--}}
                                       </span>
                                        </div>
                                        <!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                                $subtotal = \Gloudemans\Shoppingcart\Facades\Cart::content()->sum('price');
                                $counts = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();
                                ?>
                                @foreach($carts as $crt)
                                <tr>
                                    <td class="romove-item">
                                        <a href="#" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a> |
                                        <a href="#" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                    <td class="cart-image">
                                        <a class="entry-thumbnail" href="detail.html">
                                            <img src="{{asset($crt->options->image)}}" alt="" style="height: 100px;width: 100px;">
                                        </a>
                                    </td>
                                    <td class="cart-product-name-info">
                                        <h4 class='cart-product-description'><a href="detail.html">{{$crt->name}}</a></h4>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    (06 Reviews)
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                        <div class="cart-product-info">
                                            <span class="product-color">COLOR:<span>Blue</span></span>
                                            <br>
                                            <span class="product-color">COLOR:<span>Blue</span></span>
                                        </div>
                                    </td>
                                    <td class="cart-product-quantity">
                                        <div class="quant-input">
                                            <div class="arrows">
                                                <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                            </div>
                                            <input type="text" value="{{$crt->qty}}">
                                        </div>
                                    </td>
                                    <td class="cart-product-sub-total"><span class="cart-sub-total-price">${{$crt->subtotal()}}</span></td>
                                </tr>
                                @endforeach

                                </tbody>
                                <!-- /tbody -->
                            </table>
                            <!-- /table -->
                        </div>
                    </div>
                    <!-- /.shopping-cart-table -->
                    <div class="col-md-2 col-sm-12 estimate-ship-tax">

                    </div>
                    <!-- /.estimate-ship-tax -->
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">

                        <!-- /table -->
                    </div>
                    <!-- /.estimate-ship-tax -->
                    <div class="col-md-6 col-sm-12 cart-shopping-total" style="margin-top: -138px;">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">${{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span>
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <!-- /thead -->
                            <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <a href="{{route('checkout')}}">
                                            <button type="button" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            <!-- /tbody -->
                        </table>
                        <!-- /table -->
                    </div>
                    <!-- /.cart-shopping-total -->
                </div>
                <!-- /.shopping-cart -->
            </div>
            <!-- /.row -->
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
