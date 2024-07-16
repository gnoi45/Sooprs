@extends('admin.layout.layout')







@push('style')
<style>
    label{
        color: #f37d55;
    }
</style>
@endpush











@section('content')

    <div class="container">



        @if (Session::has('success_message'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <strong></strong> {{ Session::get('success_message') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

        @endif

        <div class="row justify-content-center">

            <div class="col-lg-11 col-md-11 col-sm-12 p-2 m-2 bg-white">

                <form action="{{ route('store.pageCategory') }}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group mt-3 mb-2">

                        <label for="#page_title">Category</label>

                        <input class="form-control" type="text" id="category"

                            placeholder="Enter page category " name="category">

                    </div>



                    <div class="form-group mt-3 mb-2  d-flex justify-content-end">



                        <button id="save_btn" type="submit" class="btn btn-sm btn-success text-white">Save</button>

                    </div>

                </form>

            </div>

            <div class="col-md-12 p-2 m-2 bg-white">
                <table id="example" class="table table-striped" style="width:100%">

                    <thead>

                        <tr>

                            <th>Category</th>

                            <th>slug</th>                           

                            <th>Action</th>

                            {{-- <th>Status</th> --}}


                        </tr>

                    </thead>

                    <tbody id="data-wrapper">

                        @foreach ($categories as $single)
                        <tr>

                            <td>{{ $single->category }}</td>

                            <td>{{ $single->slug }}</td>

                            {{-- <td>
                                @if($single->status == 0)
                                <p class="text-warning fw-2">Draft</p> 
                                @else
                                <p class="text-success fw-2">Active</p> 
                                @endif
                            </td> --}}


                           

                            <td>

                                
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop_{{ $single->id }}">
                                   Edit 
                                  </button>
                                <a href="{{ route('delete.category', $single->id) }}" type="button" title="delete"
                                    class="btn btn-sm btn-danger text-white "
                                    onclick="return confirm('Are you sure you want to delete this category ?')">

                                    Delete

                                </a>

                            </td>

                            {{-- @endcan --}}

                        </tr>
                        @endforeach

                    </tbody>





                </table>
            </div>

        </div>

    </div>

@stop


{{-- Edit category modal  --}}
@foreach($categories as $single)
<div class="modal fade" id="staticBackdrop_{{ $single->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit category</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('edit.pageCategory') }}" method="post" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="id" value="{{ $single->id }}">
                    <div class="form-group mt-3 mb-2">
                        <label for="#page_title">Category</label>
                        <input class="form-control" type="text" id="category"  placeholder="Enter page category " name="category">
                    </div>


                    <div class="form-group mt-3 mb-2  d-flex justify-content-end">
                        <button id="save_btn" type="submit" class="btn btn-sm btn-success">Save</button>
                    </div>

                </form>
            </div>
           
        </div>
    </div>
</div>
@endforeach


@push('script')
<script>
    $(document).ready(function () {

        $('#example').DataTable();

    });
</script>
@endpush

