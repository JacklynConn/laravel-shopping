@extends('backend.master')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y pt-0">
        <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light"></span>Add News</h4>
        <div class="col-xl-12">
            {{-- file input --}}
            <form action="/admin/add-news-submit" method="post" enctype="multipart/form-data">
                @csrf

             
                
                <div class="card">
        
                    @if (Session::has('message'))
                    <p style="color: rgb(34, 223, 34);">{{Session::get('message')}}</p>                    
                    @endif
                    <div class="card-body row">
                        <div class="mb-3 col-6">
                            <label for="formFile" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="" placeholder="Enter Title">

                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label text-danger" >Recommend images size 200 x 90</label>
                                <input type="file" class="form-control " name="thumbnail" id=""  >
                                
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