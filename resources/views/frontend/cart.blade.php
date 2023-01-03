@extends('layouts.frontend')

@section('title', 'Cart')

@section('content')

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        @php
            $total = 0;
        @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php
                    $total += $details['price'] * $details['quantity']; 
                @endphp
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset(($details['photo']  == '') ? 'images/no_image.png' : 'images/'.$details['photo'] ) }}" alt="..." width="90" height="60"/></div>
                            <div class="col-sm-9">
                                <h6 class="nomargin">{{$details['name']}}</h6>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ number_format($details['price'],2) }}</td>
                    <td data-th="Quantity">
                        {{--<input type="number" class="form-control text-center" value="1">--}}
                        {{ $details['quantity'] }}
                    </td>
                    <td data-th="Subtotal" class="text-center">Rp. {{ number_format($details['price'] * $details['quantity'],2) }}</td>
                    <td class="actions" data-th="">
                        <a href="/delete-item-cart/{{ $id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
        
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total : {{ $total }}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total : {{ $total }}</strong></td>
        </tr>
        </tfoot>
        <td class="hidden-xs">
            <a href="/checkout" class="btn btn-danger">Checkout <i class="fa fa-angle-right"></i> </a>
            <a href="{{ route('submitcheckout') }}" class="btn btn-danger">Finish <i class="fa fa-angle-r">
        </td>
    </table>

@endsection