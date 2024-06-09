@extends('frontend.master')

@section('main-content')
\
<main class="shop">

    <section>
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <div class="row">
                        @foreach ($listProducts as $listProductsItem )
                        <div class="col-4">
                            <figure>
                                <div class="thumbnail">
                                   @if ($listProductsItem->regular_price > $listProductsItem->sale_price &&  $listProductsItem->sale_price > 0 && $listProductsItem->qty > 0 )
                                   @php
                                       $status    = 'Discount';
                                       $dNone     = 'd-none';
                                       $DisStatus = ''
                                   @endphp

                                @elseif ($listProductsItem->qty == 0 &&  $listProductsItem->sale_price > 0)
                                   @php
                                        $status    = 'Out of Stock';
                                       $dNone     = 'd-none';
                                       $DisStatus = '';
                                   @endphp

                                   @elseif ($listProductsItem->qty == 0)
                                   @php
                                        $status    = 'Out of Stock';
                                       $dNone     = '';
                                       $DisStatus = 'd-none';
                                   @endphp
                                       @else
                                       @php
                                       $createAt  = $listProductsItem->created_at;
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
                                    <a href="/product-detail/{{$listProductsItem->id}}">
                                        <img height="456px" src="../uploads/{{$listProductsItem->thumbnail}}" alt="">
                                    </a>
                                </div>
                                <div class="detail">
                                    <div class="price-list">
                                        <div class="price {{$dNone}}">US {{$listProductsItem->regular_price}}</div>

                                        <div class="regular-price {{$DisStatus}}"><strike> US {{$listProductsItem->regular_price}}</strike></div>

                                        <div class="sale-price {{$DisStatus}}">US {{$listProductsItem->sale_price}}</div>
                                    </div>
                                    <h5 class="title">{{$listProductsItem->name}}</h5>
                                </div>
                            </figure>
                        </div>
                        @endforeach
                        
                        <div class="col-12">
                            <ul class="pagination">

                                @for ($i= 1 ; $i<= $TotalPage ; $i++)
                                <li>
                                    <a class="btn bg-{{$currentPage==$i ? 'primary' : ''}} text-{{$currentPage==$i ? 'white ' : ''}} " href="/shop?page={{$i}}">{{$i}}</a>
                                </li>
                                @endfor
                               
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-3 filter">
                    <h4 class="title">Category</h4>
                    <ul>
                        <li>
                            <a href="/shop">ALL</a>
                        </li>
                        @foreach ($ListCategory as $ListCategoryItem )
                        <li>
                            <a href="/shop?cate={{$ListCategoryItem->name}}">{{$ListCategoryItem->name}}</a>
                        </li>
                        @endforeach
                        
                        {{--
                        <li>
                         <a href="">Shirts</a>
                        </li>
                        <li>
                            <a href="">Polo Shirts</a>
                        </li>
                        <li>
                            <a href="">Linen</a>
                        </li>
                        <li>
                            <a href="">T-Shirts</a>
                        </li>
                        <li>
                            <a href="">Jackets</a>
                        </li>
                        <li>
                            <a href="">Hoodies & Sweatshirts</a>
                        </li>
                        <li>
                            <a href="">Cardigans</a>
                        </li>
                        <li>
                            <a href="">Trousers</a>
                        </li>
                        <li>
                            <a href="">Jeans</a>
                        </li> 
                          --}}
                           
                    </ul>

                    <h4 class="title mt-4">Price</h4>
                    <div class="block-price mt-4">
                        <a href="/shop?price=High">High</a>
                        <a href="/shop?price=Low">Low</a>
                    </div>

                    <h4 class="title mt-4">Promotion</h4>
                    <div class="block-price mt-4">
                        <a href="/shop?promotion=true">Discount Product</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection
