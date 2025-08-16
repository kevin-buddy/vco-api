@extends('layouts.app')

@section('judul', 'Search')

{{-- @section('header')
    @include('includes.header_user')
@endsection --}}

@section('content')
    <div class="detail-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="notification-inner">
                        <div class="contact-hd notification-hd">
                            <h2>Cart</h2>
                            <hr><br>
                        </div>
                        <div class="detail-demo">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Menu</th>
                                        <th>Harga Menu</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->jumlah }}</td>
                                            <td>{{ $item->subtotal }}</td>
                                        </tr>
                                    @empty
                                        <h3>Masih belum memiliki cart</h3>
                                    @endforelse
                                </tbody>
                            </table>
                            <a class="btn btn-success notika-btn-success" href="{{ url("/menu/checkout") }}">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

