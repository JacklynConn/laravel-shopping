@extends('backend.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Category</h4>
      <p >Total List<button  style="background-color: #ffffff00; outline:none;border:none;">

        <p style="color: blue">( {{$CountCategory}} )</p>

      
      </button></p>
      <!-- Striped Rows -->
      <div class="card">
        {{-- {{$CountPost}} --}}
        {{-- <h5 class="card-header">Striped rows</h5> --}}
        <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Name</th>

                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($ListCategory as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <a href="/admin/edit-category={{$item->id}}" class="btn btn-success btn-sm">Edit</a>
                        <a href="/admin/remove-category={{$item->id}}" class="btn btn-danger btn-sm">Remove</a>
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