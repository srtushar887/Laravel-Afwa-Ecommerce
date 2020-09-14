@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <h4><b>ADMIN</b></h4>
                        </div>
                        <div class="float-right">
                            <h4 class="m-0 d-print-none">Invoice</h4>
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-6">
                            <h6 class="font-weight-bold">TO:</h6>

                            <address class="line-h-24">
                                <b>Stella Worgan</b><br>
                                3443 Ridge Road<br>
                                Hutchinson, KS 67501<br>
                                <abbr title="Phone">P:</abbr> 620-802-9649
                            </address>
                        </div><!-- end col -->
                        <div class="col-6">
                            <div class="mt-3 float-right">
                                <p class="mb-2"><strong>Order Date: </strong> Jan 17, 2016</p>
                                <p class="mb-2"><strong>Order Status: </strong> <span class="badge badge-soft-success">Paid</span></p>
                                <p class="m-b-10"><strong>Order ID: </strong> #{{$order->user_order_id}}</p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table mt-4">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Unit Cost</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $user_order_details = \App\user_order_detail::where('order_id',$order->id)->get();
                                    $i = 1;
                                    ?>
                                    @foreach($user_order_details as $order_details)
                                        <?php
                                        $product = \App\product::where('id',$order_details->product_id)->first();
                                        $color = \App\color::where('id',$order_details->color_id)->first();
                                        $size = \App\size::where('id',$order_details->size_id)->first();
                                        $brand = \App\brand::where('id',$product->brand_id)->first();
                                        ?>
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>
                                                <b>{{$product->product_name}}</b>
                                                <br>
                                                @if ($color)
                                                    Color :  {{$color->color_name}}
                                                @endif
                                                <br>
                                                @if ($size)
                                                    Size :   {{$size->size_name}}
                                                @endif
                                                <br>
                                                @if ($brand)
                                                    Brand :   {{$brand->brand_name}}
                                                @endif

                                            </td>
                                            <td>{{$order_details->qty}}</td>
                                            <td>${{$product->product_new_price}}</td>
                                            <?php
                                            $total = $product->product_new_price * $order_details->qty;
                                            ?>
                                            <td class="text-right">${{$total}}</td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="clearfix pt-5">
                                <h6 class="text-muted">Notes:</h6>

                                <small>
                                    All accounts are to be paid within 7 days from receipt of
                                    invoice. To be paid by cheque or credit card or direct payment
                                    online. If account is not paid within 7 days the credits details
                                    supplied as confirmation of work undertaken will be charged the
                                    agreed quoted fee noted above.
                                </small>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="float-right">
                                <p><b>Sub-total:</b> $4120.00</p>
                                <h3>$4635.00 USD</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="d-print-none my-4">
                        <div class="text-right">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@stop
