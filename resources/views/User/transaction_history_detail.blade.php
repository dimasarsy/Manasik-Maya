@extends('Layout.layout')

@section('style')
    <link href="{{ URL::asset('assets/css/transactionHistoryDetail.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section id="hero" class="d-flex" style="background-color: white;">
        <div class="container">
            <p style="font-size: 12px;"><span style="color: #FBDA5B;">Histori Transaksi</span> <i class='bx bx-play'></i> Detail</p>
            <div class="row mt-5 detail-card mx-auto">
                <div class="row mt-3 px-5">
                    <div class="col img box-shadow" style="background-image: url('../../storage/image/{{ $order->schedule->image }}');">
                        <p class="text-over-image">{{ $order->schedule->user->name }}</p>
                    </div>
                </div>
                <div class="row px-5 mb-5 information-content">
                    <div class="col-8">
                        <div class="row">
                            <div class="col">
                                <h1 class="fw-bold" style="color: #87B7AB;">{{ $order->schedule->name }}</h1>
                            </div>
                        </div>
                        <div class="row mt-4 d-flex" style="color:#B5B5B5; width: 70%;">
                            <div class="col d-flex gap-3">
                                <i style="font-size: 20px;" class="icon-calendar-empty"></i>
                                <p>{{ $order->schedule->date }}</p>
                            </div>
                            <div class="col d-flex gap-3">
                                <i style="font-size: 20px;" class="icon-time"></i>
                                <p>{{ $order->schedule->starttime }} - {{ $order->schedule->endtime }}</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <h3 style="color: #373F41; font-weight: 600;">Deskripsi</h3>
                                <p>{{ $order->schedule->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 order-detail px-4">
                        <p class="order-title mt-2">Order Details</p>
                        <hr class="line">
                        <div class="row">
                            <div class="col d-flex justify-content-between">
                                <p class="text-start">Status</p>
                                <p class="text-end">:</p>
                            </div>
                            <div class="col">
                                <p style="color: #3EA58B; font-weight: 500;">{{ $order->status }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-between">
                                <p class="text-start">Date / Time</p>
                                <p class="text-end">:</p>
                            </div>
                            <div class="col">
                                <p>{{ \Carbon\Carbon::parse( $order->created_at)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y') }}, {{ \Carbon\Carbon::parse( $order->created_at)->format('h:i') }}</p>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col d-flex justify-content-between">
                                <p class="text-start">Order ID</p>
                                <p class="text-end">:</p>
                            </div>
                            <div class="col">
                                <p>{{ $order->order_id }}</p>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col d-flex justify-content-between">
                                <p class="text-start">Transaction ID</p>
                                <p class="text-end">:</p>
                            </div>
                            <div class="col">
                                <p>{{ $order->transaction_id }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-between">
                                <p class="text-start">Payment Code</p>
                                <p class="text-end">:</p>
                            </div>
                            <div class="col">
                                <p>{{ $order->payment_code }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 mb-0 text-end detail-price">
                    <p>IDR {{ $order->gross_amount }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
