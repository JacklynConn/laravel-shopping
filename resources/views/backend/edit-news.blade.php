@extends('backend.master')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y pt-0">
        <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light"></span>Edit News</h4>
        <div class="col-xl-12">
            {{-- file input --}}
            <form action="/admin/edit-news-submit" method="post" enctype="multipart/form-data">
                @csrf

             
                
                <div class="card">
        
                    {{-- @if (Session::has('message'))
                    <p style="color: rgb(34, 223, 34);">{{Session::get('message')}}</p>                    
                    @endif --}}
                    <div class="card-body row">
                        <input type="hidden" value="{{$editNews[0]->id}}" name="id" id="">
                        <div class="mb-3 col-6">
                            <label for="formFile" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="" placeholder="Enter Title"  value="{{$editNews[0]->title}}">

                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label text-danger" >Recommend images size 200 x 90</label>
                                @if (!empty($editNews[0]->thumbnail))
                                <img width="200" height="90" src="../uploads/{{$editNews[0]->thumbnail}}" alt="" id="show_img">
                                @else
                                <p>No image found</p>
                                @endif
                               
                                <input accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip" 
                                type="file" class="form-control " name="thumbnail" id="image" value="../uploads/{{$editNews[0]->thumbnail}})" >
                                
                            </div>
 
                            <div class="mb-3 col-12">
                                <label for="formFile" class="form-label">Description</label>
                                <textarea name="description" class="form-control" placeholder="Message..." cols="30" rows="10">{{$editNews[0]->description}}</textarea>
                            </div>

                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Update news">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script>
    $(document).ready(function(){
            // alert("jjje");
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#show_img').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
    
        })
    
</script>

@endsection