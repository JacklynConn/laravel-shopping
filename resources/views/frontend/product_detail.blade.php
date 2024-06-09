@extends('frontend.master')

@section('main-content')

<main class="product-detail">

    <section class="review">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    
                    <div class="thumbnail">
                        @if ($productDetail[0]->regular_price > $productDetail[0]->sale_price &&  $productDetail[0]->sale_price > 0 && $productDetail[0]->qty > 0 )
                        @php
                            $status    = 'Discount';
                            $dNone     = 'd-none';
                            $DisStatus = ''
                        @endphp

                     @elseif ($productDetail[0]->qty == 0 &&  $productDetail[0]->sale_price > 0)
                        @php
                             $status    = 'Out of Stock';
                            $dNone     = 'd-none';
                            $DisStatus = '';
                        @endphp

                        @elseif ($productDetail[0]->qty == 0)
                        @php
                             $status    = 'Out of Stock';
                            $dNone     = '';
                            $DisStatus = 'd-none';
                        @endphp
                            @else
                            @php
                            $createAt  = $productDetail[0]->created_at;
                            $validityDate = date('d-m-Y H:i:s' , strtotime($createAt . '+ 1 days'));
                            $currentdate = date('d-m-Y H:i:s');
                            //create

                             if($currentdate <= $validityDate){
                                 $status    = ' New Arrival';
                                 $dNone     = '';
                                 $DisStatus = 'd-none';
                             }else {
                                 $status    = '';
                                 $dNone     = '';
                                 $DisStatus = 'd-none';
                             }

                           
                        @endphp
                        @endif
                        
                        <div  class="status {{$status==''? 'd-none': 'status'}}">{{$status }}</div>
                       
                        <img src="../uploads/{{$productDetail[0]->thumbnail}}" alt="khor" width="500px">
                    </div>
                </div>
                <div class="col-7">
                    <div class="detail">
                        <div class="price-list">
                            <div class="price {{$dNone}}">US {{$productDetail[0]->regular_price}}</div>

                            <div class="regular-price {{$DisStatus}}"><strike> US {{$productDetail[0]->regular_price}}</strike></div>

                            <div class="sale-price {{$DisStatus}}">US {{$productDetail[0]->sale_price}}</div>
                        </div>
                        <h5 class="title">Plain T-shirt</h5>
                        <div class="group-size">
                            <span class="title">Color Available</span>
                            <div class="group">
                                {{$productDetail[0]->color	}}
                            </div>
                        </div>
                        <div class="group-size">
                            <span class="title">Size Available</span>
                            <div class="group">
                                {{$productDetail[0]->size	}}
                            </div>
                        </div>

                        <div class="group-size">
                            <span class="title">In Stock:    {{$productDetail[0]->qty}}
                            </div></span>
                            {{-- <div class="description">
                                
                             
                        </div> --}}

                        <div class="group-size">
                            <span class="title">Description</span>
                            <div class="description">
                                
                                {{$productDetail[0]->description}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="main-title">
                        RELATED PRODUCTS
                    </h3>
                </div>
            </div>
            <div class="row">
                @foreach ($Relateproduct as $RelateproductItem )
                <div class="col-3">
                    <figure>
                        <div class="thumbnail">
                            @if ($RelateproductItem->regular_price > $RelateproductItem->sale_price &&  $RelateproductItem->sale_price > 0 && $RelateproductItem->qty > 0 )
                            @php
                                $status    = 'Discount';
                                $dNone     = 'd-none';
                                $DisStatus = ''
                            @endphp

                         @elseif ($RelateproductItem->qty == 0 &&  $RelateproductItem->sale_price > 0)
                            @php
                                 $status    = 'Out of Stock';
                                $dNone     = 'd-none';
                                $DisStatus = '';
                            @endphp

                            @elseif ($RelateproductItem->qty == 0)
                            @php
                                 $status    = 'Out of Stock';
                                $dNone     = '';
                                $DisStatus = 'd-none';
                            @endphp
                                @else
                                @php
                                $createAt  = $RelateproductItem->created_at;
                                $validityDate = date('d-m-Y H:i:s' , strtotime($createAt . '+ 1 days'));
                                $currentdate = date('d-m-Y H:i:s');
                                //create

                                 if($currentdate <= $validityDate){
                                     $status    = ' New Arrival';
                                     $dNone     = '';
                                     $DisStatus = 'd-none';
                                 }else {
                                     $status    = '';
                                     $dNone     = '';
                                     $DisStatus = 'd-none';
                                 }

                               
                            @endphp
                            @endif
                            
                            <div  class="status {{$status==''? 'd-none': 'status'}}">{{$status }}</div>
                            <a href="/product-detail/{{$RelateproductItem->id}}">
                                <img src="../uploads/{{$RelateproductItem->thumbnail}}" alt="khor" height="457px">
                            </a>
                        </div>
                        <div class="detail">
                            <div class="price-list">
                                <div class="price {{$dNone}}">US {{$RelateproductItem->regular_price}}</div>

                                <div class="regular-price {{$DisStatus}}"><strike> US {{$RelateproductItem->regular_price}}</strike></div>

                                <div class="sale-price {{$DisStatus}}">US {{$RelateproductItem->sale_price}}</div>
                            </div>
                            <h5 class="title">{{$RelateproductItem->name}}</h5>
                        </div>
                    </figure>
                </div>
                @endforeach
               
            </div>
        </div>
    </section>

</main>

@endsection
