@php
    $address = json_decode($order->order_address);
    $shipping = json_decode($order->shpping_method);
    $coupon = json_decode($order->coupon);
@endphp

@extends('frontend.dashboard.layouts.master')

@section('title')
    {{ $settings->site_name }} || Product
@endsection

@section('content')
    <!--=============================
        DASHBOARD START
      ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Order Details</h3>
                        <h5><strong style="font-weight: bold; border: 1px solid green; padding: 5px; border-radius: 5px; display: inline-block;">Order id: #{{ $order->invocie_id }}</strong></h5>

                        <div class="wsus__dashboard_profile">

                            <!--============================
                            INVOICE PAGE START
                        ==============================-->
                            <section id="" class="invoice-print">
                                <div class="">
                                    <div class="wsus__invoice_area">
                                        <div class="wsus__invoice_header">
                                            <div class="wsus__invoice_content">
                                                <div class="row">
                                                    <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                                        <div class="wsus__invoice_single">
                                                            <h5>Billing Information</h5>
                                                            <h6>{{ $address->name }}</h6>
                                                            <p>{{ $address->email }}</p>
                                                            <p>{{ $address->phone }}</p>
                                                            <p>{{ $address->address }}, {{ $address->city }},
                                                                {{ $address->state }}, {{ $address->zip }}</p>
                                                            <p>{{ $address->country }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                                        <div class="wsus__invoice_single text-md-center">
                                                            <h5>shipping information</h5>
                                                            <h6>{{ $address->name }}</h6>
                                                            <p>{{ $address->email }}</p>
                                                            <p>{{ $address->phone }}</p>
                                                            <p>{{ $address->address }}, {{ $address->city }},
                                                                {{ $address->state }}, {{ $address->zip }}</p>
                                                            <p>{{ $address->country }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-4">
                                                        <div class="wsus__invoice_single text-md-end">
                                                            <h5>Order id: #{{ $order->invocie_id }}</h5>
                                                            <h6 class="btn btn-warning">Order status:
                                                                {{ config('order_status.order_status_admin')[$order->order_status]['status'] }}
                                                            </h6>
                                                            <p>Payment Method: {{ $order->payment_method }}</p>
                                                            @if($order->payment_status == 0)
                                                            <p class="btn btn-warning">Payment Status: Pending</p>
                                                            @else
                                                            <p class="btn btn-warning">Payment Status: Completed</p>
                                                            @endif
                                                            <p>Transaction id: {{ $order->transaction->transaction_id }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wsus__invoice_description">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th class="name">
                                                                product
                                                            </th>
                                                            <th class="amount">
                                                                Vendor
                                                            </th>

                                                            <th class="amount">
                                                                amount
                                                            </th>

                                                            <th class="quentity">
                                                                quentity
                                                            </th>
                                                            <th class="total">
                                                                total
                                                            </th>
                                                        </tr>
                                                        @foreach ($order->orderProducts as $product)
                                                                @php
                                                                    $variants = json_decode($product->variants);
                                                                @endphp
                                                                <tr>
                                                                    <td class="name">
                                                                        <p>{{ $product->product_name }}</p>
                                                                        @foreach ($variants as $key => $item)
                                                                            <span>{{ $key }} :
                                                                                {{ $item->name }}(
                                                                                {{ $settings->currency_icon }}{{ $item->price }}
                                                                                )</span>
                                                                        @endforeach
                                                                    </td>
                                                                    <td class="amount">
                                                                        {{ $product->vendor->shop_name }}
                                                                    </td>
                                                                    <td class="amount">
                                                                        {{ $settings->currency_icon }}
                                                                        {{ $product->unit_price }}
                                                                    </td>

                                                                    <td class="quentity">
                                                                        {{ $product->qty }}
                                                                    </td>
                                                                    <td class="total">
                                                                        {{ $settings->currency_icon }}
                                                                        {{ $product->unit_price * $product->qty }}
                                                                    </td>
                                                                </tr>

                                                        @endforeach

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wsus__invoice_footer">

                                            <p><span>Sub Total:</span> {{ @$settings->currency_icon }} {{@$order->sub_total}}</p>
                                            <p><span>Shipping Fee(+):</span>{{ @$settings->currency_icon }} {{@$shipping->cost}} </p>
                                            <p><span>Coupon(-):</span>{{ @$settings->currency_icon }} {{@$coupon->discount ? $coupon->discount : 0}}</p>
                                            <p><span>Total Amount :</span>{{ @$settings->currency_icon }} {{@$order->amount}}</p>


                                        </div>

{{--                                        <div class="col-md-4">--}}
{{--                                            <form action="{{ route('user.orders.status', $order->id) }}">--}}
{{--                                                <div class="form-group mt-5">--}}
{{--                                                    <label for="" class="mb-2">Please choose received if you received the product : </label>--}}
{{--                                                    <select name="status" id="" class="form-control">--}}
{{--                                                        @foreach (config('order_status.order_status_user') as $key => $status)--}}
{{--                                                            <option>Please choose received if you received the product</option>--}}
{{--                                                            <option {{ $key === $order->order_status ? 'selected' : '' }}--}}
{{--                                                                    value="{{ $key }}">{{ $status['status'] }}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                    <button class="btn btn-primary mt-3" type="submit">Save</button>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </section>
                            <!--============================
                            INVOICE PAGE END
                        ==============================-->

                        <div class="col">
                            <div class="mt-2 float-end">
                                <button class="btn btn-warning print_invoice">print</button>
                            </div>
                        </div>

                            <li>
                                <button type="button" style="border: 1px solid gray;
                                        padding: 7px 11px;
                                        margin-left: 7px;
                                        border-radius: 100%; background-color: #0088cc" class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="far fa-comment-alt text-light"></i>
                                </button>

                            </li>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="message_modal">
                            @csrf
                            <div class="form-group">
                                <label for="">Message</label>
                                <textarea name="message" class="form-control mt-2 message-box"></textarea>
                                <input type="hidden" name="receiver_id" value="{{ $product->vendor->user_id }}">
                            </div>

                            <button type="submit" class="btn add_cart mt-4 send-button">Send</button>

                        </form>

                    </div>

                </div>
            </div>
        </div>




    </section>


    <!--=============================
        DASHBOARD START
      ==============================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.message_modal').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    method: 'POST',
                    url: '{{ route("user.send-message") }}',
                    data: formData,
                    beforeSend: function() {
                        let html = `<span class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"></span> Sending..`

                        $('.send-button').html(html);
                        $('.send-button').prop('disabled', true);


                    },
                    success: function(response) {
                        $('.message-box').val('');
                        $('.modal-body').append(`<div class="alert alert-success mt-2"><a href="{{ route('user.messages.index') }}" class="text-primary">Click here</a> for go to messenger.</div>`)
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        toastr.error(xhr.responseJSON.message);
                        $('.send-button').html('Send');
                        $('.send-button').prop('disabled', false);
                    },
                    complete: function() {
                        $('.send-button').html('Send');
                        $('.send-button').prop('disabled', false);
                    }
                })
            })
            $('.print_invoice').on('click', function() {
                let printBody = $('.invoice-print');
                let originalContents = $('body').html();

                $('body').html(printBody.html());

                window.print();

                $('body').html(originalContents);

            })
        })

    </script>
@endpush
