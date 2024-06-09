@extends('backend.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>News</h4>
      <p >Total List<button  style="background-color: #ffffff00; outline:none;border:none;">

        {{-- <p style="color: blue">( {{$CountCategory}} )</p> --}}

      
      </button></p>
      <!-- Striped Rows -->
      <div class="card">
        {{-- {{$CountPost}} --}}
        {{-- <h5 class="card-header">Striped rows</h5> --}}
        <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Viewer</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($listNews as $listNewsitem)
                <tr>
                    <td><p>{{$listNewsitem->title}}</p></td>
                    <td><img width="70px" height="90px" src="../uploads/{{$listNewsitem->thumbnail}}" alt=""></td>
                    <td><p>{{$listNewsitem->viewer}}</p></td>
                    <td ><p style="width: 140px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;">{{$listNewsitem->description}}</p></td>
                    
                    <td><p>{{$listNewsitem->created_at}}</p></td>
                    <td>
                        <a href="/admin/edit-news={{$listNewsitem->id}}" class="btn btn-success btn-sm">Edit</a>
                        <a href="/admin/remove-news={{$listNewsitem->id}}" class="btn btn-danger btn-sm">Remove</a>
                    </td>
                </tr>
                @endforeach
            

            </tbody>
          </table>
        </div>
      </div>
      <!--/ Striped Rows -->
      <hr class="my-5" />
    </div>
    <!-- / Content -->
  </div>
</div>

@endsection