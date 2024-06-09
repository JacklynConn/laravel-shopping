@extends('backend.master')
@section('content')

{{-- content  wrapper --}}
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Add Category</h4>
        <div class="col-xl-12">

            <form action="/admin/add-category-submit" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    @if (Session::has('message'))
                    <p style="color:green" class=" text-center">{{Session::get('message')}}</p>
                        
                    @endif
                        
                   
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Name</label>
                            <input class="form-control" type="text" name="name" />
                        </div>

                        
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Add Post">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection