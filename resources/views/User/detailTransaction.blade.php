@extends('Layout.layout')

@section('style')

@endsection

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col text-center">
            <h1>Your Transaction at {{ $transactionDate }}</h1>
        </div>
        <div class="row my-5 justify-content-center text-center">
            <div class="col-md-8 ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Keyboard Image</th>
                            <th scope="col">Keyboard Name</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total = 0;
                        @endphp
                        @foreach ($detailTransaction as $d)
                        @php
                        $total+= $d->quantity * $d->keyboards->price;
                        @endphp
                        <tr style="vertical-align: middle ">
                            <td class="py-5">
                                <img src="{{ Storage::url("/image"."/".$d->keyboards->image) }}" width="80%">
                            </td>
                            <td>{{ $d->keyboards->name }}</td>
                            <td>{{ $d->quantity * $d->keyboards->price}}</td>
                            <td>{{ $d->quantity }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-end fw-bold"> Total Price:
                    ${{ $total }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection