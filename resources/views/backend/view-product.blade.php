@extends('backend.master')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <a style="position: absolute;top: 12%; font-size:30px" href="/admin/list-product">🔙</a>
        <div class="container-xxl d-flex container-p-y " style="margin-top: 40px;">
            
            <div class="col-xl-6 " style="padding-right: 40px">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>View  Product</h4>
             

                

                <h5 class="text-primary">-Created_at</h5>
                <p>&#160; &#160; {{$ViewProduct[0]->created_at}}</p>
                
                <h5 class="text-primary">-Views</h5>
                <p>&#160; &#160; {{$ViewProduct[0]->wiewer}}</p>

                <h5 class="text-primary">-Description</h5>
                <p >&#160; &#160; &#160;{{$ViewProduct[0]->description}}</p>

            </div>

            <div class="col-xl-3">
                <br><br><br>

                <img width="250" height="400" src="../../uploads/{{$ViewProduct[0]->thumbnail}}" alt="" id="show_img">
            </div>

            <div class="col-xl-3">
                <br>
                <h5 class="text-primary">-Product Name</h5>
                <p>&#160; &#160;{{$ViewProduct[0]->name}}</p>

                <h5 class="text-primary">-Color</h5>
                <p>&#160; &#160;{{$ViewProduct[0]->color}}</p>
                
                <h5 class="text-primary">-Size</h5>
                <p>&#160; &#160;{{$ViewProduct[0]->size}}</p>

                <h5 class="text-primary">-Category Name</h5>
                <p>&#160; &#160;{{$ViewProduct[0]->cate_name}}</p>

                <h5 class="text-primary">-In Stock</h5>
                <p>&#160; &#160;{{$ViewProduct[0]->qty}}</p>

                <h5 class="text-primary">-Regular Pirce</h5>
                <p>&#160; &#160;{{$ViewProduct[0]->regular_price}}</p>

                <h5 class="text-primary">-sale Pirce</h5>
                <p>&#160; &#160;{{$ViewProduct[0]->sale_price}}</p>

            </div>
            
        </div>
    </div>
@endsection