@extends('frontend.master')

@section('main-content')

<main class="home">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="main-title">
                        NEW PRODUCTS
                    </h3>
                </div>
            </div>
            <div class="row">
                @foreach ($NewProducts as $NewProductItem)
                <div class="col-3">
                    <figure>
                        <div class="thumbnail">
                             @if ($NewProductItem->regular_price > $NewProductItem->sale_price &&  $NewProductItem->sale_price > 0 && $NewProductItem->qty > 0)
                                   @php
                                       $status    = 'Discount';
                                       $dNone     = 'd-none';
                                       $DisStatus = ''
                                   @endphp

                                   @elseif ($NewProductItem->qty == 0  &&  $NewProductItem->sale_price > 0)
                                    @php
                                         $status    = 'Out of Stock';
                                        $dNone     = 'd-none';
                                        $DisStatus = '';
                                    @endphp

                                   @elseif ($NewProductItem->qty == 0)
                                   @php
                                        $status    = 'Out of Stock';
                                       $dNone     = '';
                                       $DisStatus = 'd-none';
                                   @endphp
                                    

                                       @else
                                       @php
                                       $createAt  = $NewProductItem->created_at;
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

                            <div class="status {{$status==''? 'd-none': 'status'}}">{{$status}}</div>

                            <a href="/product-detail/{{$NewProductItem->id}}">
                                <img height="457px" src="../uploads/{{$NewProductItem->thumbnail}}" alt="khor">
                            </a>
                        </div>
                        <div class="detail">
                            <div class="price-list">
                                <div class="price {{$dNone}}">US {{$NewProductItem->regular_price}}</div>

                                <div class="regular-price {{$DisStatus}}"><strike> US {{$NewProductItem->regular_price}}</strike></div>

                                <div class="sale-price {{$DisStatus}}">US {{$NewProductItem->sale_price}}</div>
                            </div>
                            <h5 class="title">{{$NewProductItem->name}}</h5>
                        </div>
                    </figure>
                </div>
                @endforeach
             

            </div>
        </div>
    </section>
                {{-- promotion --}}
    <section>
        <div class="container">
            <div class="row">
              
                <div class="col-12">
                    <h3 class="main-title">
                        PROMOTION PRODUCTS
                    </h3>
                </div>
            </div>
            <div class="row">
                @foreach ($PromotionProduct as $PromotionProductItem )
                <div class="col-3">
                    <figure>
                        <div class="thumbnail">
                            @if ($PromotionProductItem->regular_price > $PromotionProductItem->sale_price &&  $PromotionProductItem->sale_price > 0  && $PromotionProductItem->qty > 0)
                            @php
                                $status    = 'Discount';
                                $dNone     = 'd-none';
                                $DisStatus = ''
                            @endphp
                             @elseif ($PromotionProductItem->qty == 0 && $PromotionProductItem->sale_price > 0)
                             @php
                                  $status    = 'Out of Stock';
                                 $dNone     = 'd-none';
                                 $DisStatus = '';
                             @endphp
                            @elseif ($PromotionProductItem->qty == 0)
                            @php
                                 $status    = 'Out of Stock';
                                $dNone     = '';
                                $DisStatus = 'd-none';
                            @endphp
                                @else
                                @php
                                $createAt  = $PromotionProductItem->created_at;
                                $validityDate = date('d-m-Y H:i:s' , strtotime($createAt . '+ 1 days'));
                                $currentdate = date('d-m-Y H:i:s');//create

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
                            <div class="status {{$status==''? 'd-none': 'status'}}">{{$status}}</div>
                            
                            <a href="/product-detail/{{$PromotionProductItem->id}}">
                                <img src="../uploads/{{$PromotionProductItem->thumbnail}}" alt="" height="457px">
                            </a>
                        </div>
                        <div class="detail">
                            <div class="price-list">
                                <div class="price {{$dNone}}">US {{$PromotionProductItem->regular_price}}</div>

                                <div class="regular-price {{$DisStatus}}"><strike> US {{$PromotionProductItem->regular_price}}</strike></div>

                                <div class="sale-price {{$DisStatus}}">US {{$PromotionProductItem->sale_price}}</div>
                            </div>
                            <h5 class="title">{{$PromotionProductItem->name}}</h5>
                        </div>
                    </figure>
                </div>
                @endforeach

               

  
            </div>
        </div>
    </section>
    {{-- popular --}}
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="main-title">
                        POPULAR PRODUCTS
                    </h3>
                </div>
            </div>
            <div class="row">
                @foreach ($PopularProduct as $PopularProductItem )
                <div class="col-3">
                    <figure>
                        <div class="thumbnail">
                            @if ($PopularProductItem->regular_price > $PopularProductItem->sale_price &&  $PopularProductItem->sale_price > 0 && $PopularProductItem->qty > 0)
                            @php
                                $status    = 'Discount';
                                $dNone     = 'd-none';
                                $DisStatus = ''
                            @endphp
                            @elseif ($PopularProductItem->qty == 0 && $PopularProductItem->sale_price > 0)
                            @php
                                 $status    = 'Out of Stock';
                                $dNone     = 'd-none';
                                $DisStatus = '';
                            @endphp

                              @elseif ($PopularProductItem->qty == 0 )
                            @php
                                 $status    = 'Out of Stock';
                                $dNone     = '';
                                $DisStatus = 'd-none';
                            @endphp
                                @else
                                @php
                                $createAt  = $PopularProductItem->created_at;
                                $validityDate = date('d-m-Y H:i:s' , strtotime($createAt . '+ 1 days'));
                                $currentdate = date('d-m-Y H:i:s');//create

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
                            <div class="status {{$status==''? 'd-none': 'status'}}">{{$status}}</div>
                            <a href="/product-detail/{{$PopularProductItem->id}}">
                                <img height="457px" src="../uploads/{{$PopularProductItem->thumbnail}}" alt="khor">
                            </a>
                        </div>
                        <div class="detail">
                            <div class="price-list">
                                <div class="price {{$dNone}}">US {{$PopularProductItem->regular_price}}</div>

                                <div class="regular-price {{$DisStatus}}"><strike> US {{$PopularProductItem->regular_price}}</strike></div>

                                <div class="sale-price {{$DisStatus}}">US {{$PopularProductItem->sale_price}}</div>
                            </div>
                            <h5 class="title">{{$PopularProductItem->name}}</h5>
                        </div>
                    </figure>
                </div>
                @endforeach
            
            </div>
        </div>
    </section>

</main>

@endsection
