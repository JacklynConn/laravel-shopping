@extends('backend.master')
@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y pt-0">
        <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light"></span>Add Product</h4>
        <div class="col-xl-12">
            {{-- file input --}}
            <form action="/admin/add-product-submit" method="post" enctype="multipart/form-data">
                @csrf

             
                
                <div class="card">
        
                    @if (Session::has('message'))
                    <p style="color: rgb(34, 223, 34);">{{Session::get('message')}}</p>                    
                    @endif
                    <div class="card-body row">
                        <div class="mb-3 col-6">
                            <label for="formFile" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="" placeholder="Enter name product">

                            {{--  --}}
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Quantity</label>
                                <input type="number" name="qty" class="form-control" placeholder="Enter numbers">
                            </div>
                            {{--  --}}
                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">Regular Price</label>
                                <input type="number" name="regular_price" class="form-control" placeholder="Enter numbers" id="">
                            </div>
                            {{--  --}}
                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">Sale Price</label>
                                <input type="number" name="sale_price" class="form-control"placeholder="Enter numbers"  id="">
                            </div>
                            {{--  --}}
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Category</label>
                              
                                <select name="category" class="form-control" >
                                    @foreach ($ListCategory as $item)

                                    <option value="{{$item->id}}">
                                        {{$item->name }}
                                       </option>
                                @endforeach
                                </select>
                               
                                
                            </div>

                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label text-danger" >Recommend images size 200 x 90</label>
                                <input type="file" class="form-control " name="thumbnail" id=""  >
                                
                            </div>

                            
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Available Size</label>
                                <select name="size[]" class="form-control color" multiple="multiple">
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                            </div>

                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Available Color</label>
                                <select name="color[]" class="form-control color" multiple="multiple">
                                    <option value="Red">Red</option>
                                    <option value="Black">Black</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Grey">Grey</option>
                                    <option value="Yellow">Yellow</option>
                                </select>
                            </div>

                            <div class="mb-3 col-12">
                                <label for="formFile" class="form-label">Description</label>
                                <textarea name="description" class="form-control" placeholder="Message..." cols="30" rows="10"></textarea>
                            </div>

                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Add Post">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection