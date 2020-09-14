@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Order ID</label>
                                <input type="text" class="form-control" value="{{$order->user_order_id}}" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Total Amount</label>
                                <input type="text" class="form-control" value="${{$order->total_amount}}" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Order Status</label>
                                <select class="form-control" readonly="">
                                    <option value="0">select any</option>
                                    <option value="0">Pending</option>
                                    <option value="0">Approved</option>
                                    <option value="0">Delivered</option>
                                    <option value="0">Rejected</option>
                                </select>
                            </div>
                        </div>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>



    <div class="row">
        <!-- end col -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Deatils</h4>


                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Color (if have)</th>
                                <th>Product Size (if have)</th>
                                <th>Product Qty</th>
                                <th>Product Price</th>
                                <th>Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                                $user_order_details = \App\user_order_detail::where('order_id',$order->id)->get();
                            ?>
                            @foreach($user_order_details as $order_details)
                                <?php
                                    $product = \App\product::where('id',$order_details->product_id)->first();
                                    $color = \App\color::where('id',$order_details->color_id)->first();
                                    $size = \App\size::where('id',$order_details->size_id)->first();
                                ?>
                                <tr>
                                    <th scope="row"><img src="{{asset($product->main_image)}}" style="height: 50px;width: 50px;"></th>
                                    <td>{{$product->product_name}}</td>
                                    <td>
                                        @if ($color)
                                            {{$color->color_name}}
                                        @else
                                            No Color
                                        @endif
                                    </td>
                                    <td>
                                        @if ($size)
                                            {{$size->size_name}}
                                        @else
                                            No Size
                                        @endif
                                    </td>
                                    <td>${{$product->product_new_price}}</td>
                                    <td>{{$order_details->qty}}</td>
                                    <?php
                                        $total = $product->product_new_price * $order_details->qty;
                                    ?>
                                    <td>${{$total}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- end card-body-->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->
    </div>

@stop
