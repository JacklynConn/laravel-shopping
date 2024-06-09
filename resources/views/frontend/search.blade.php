@extends('frontend.master')

@section('main-content')

<main class="shop">

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{-- message --}}
                    {{-- @if(Session::has('message'))
                        <p style="color: rgb(34, 223, 34);  position: fixed;left: 45%;top:30%;">{{Session::get('message')}}</p>
                        @endif --}}
                     {{-- message --}}

                    <div class="row">
                        {{-- <p>{{$total}}</p> --}}
                        @foreach ($Products as $ProductsItem )
                       
                        {{-- @if ($SearchValue==$ProductsItem->name) --}}
                        <div class="col-3">
                            <figure>
                                <div class="thumbnail">
                                    @if ($ProductsItem->regular_price > $ProductsItem->sale_price  )
                                    @php
                                        $status    = 'Discount';
                                        $dNone     = 'd-none';
                                        $DisStatus = ''
                                    @endphp
                                    @elseif ($ProductsItem->qty == 0)
                                    @php
                                         $status    = 'Out of Stock';
                                        $dNone     = 'd-none';
                                        $DisStatus = '';
                                    @endphp
                                        @else
                                        @php
                                        $status    = ' New Arrival';
                                        $dNone     = '';
                                        $DisStatus = 'd-none';
                                    @endphp
                                    @endif
                                    <div class="status">{{$status}}</div>
                                    <a href="/product-detail/{{$ProductsItem->id}}">
                                        <img height="456px" src="../uploads/{{$ProductsItem->thumbnail}}" alt="">
                                    </a>
                                </div>
                                <div class="detail">
                                    <div class="price-list">
                                        <div class="price {{$dNone}}">US {{$ProductsItem->sale_price}}</div>

                                        <div class="regular-price {{$DisStatus}}"><strike> US {{$ProductsItem->regular_price}}</strike></div>

                                        <div class="sale-price {{$DisStatus}}">US {{$ProductsItem->sale_price}}</div>
                                    </div>
                                    <h5 class="title">{{$ProductsItem->name}}</h5>
                                </div>
                            </figure>
                        </div>
                        {{-- @else{
                            <p class="text-danger">Search not found</p>
                        }
                        @endif --}}
                       
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection
