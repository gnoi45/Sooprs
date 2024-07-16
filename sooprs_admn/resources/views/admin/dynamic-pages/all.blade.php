@extends('admin.layout.layout')







@push('style')
@endpush











@section('content')
<div class="body flex-grow-1 px-3">

    <div class="container-lg">

        <div class="row">

            <div class="col-sm-12 col-lg-12">

                {{-- @can('add-answers') --}}

                <div class="mb-3 mt-3 text-center">



                    <a href="{{ route('services.page') }}" type="button" class="btn btn-sm text-white" style="    background-color: #0068ff;"><i
                            class="icon icon-2xl cil-plus"></i> Add Page</a>

                </div>

                {{-- @endcan --}}

                @if (Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">

                    <strong></strong> {{ Session::get('success_message') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
                @endif





                <table id="example" class="table table-striped" style="width:100%">

                    <thead>

                        <tr>

                            <th>Heading</th>

                            <th>slug</th>

                            {{-- <th>content</th> --}}



                            {{-- <th>Meta Title</th>

                            <th>Meta Description</th>

                            <th>Meta Keywords</th> --}}



                            <!-- <th>Banner Image</th> -->

                            <!-- <th>Content Imager</th> -->

                            <th>Category</th>


                            {{-- @can('answers-edit') --}}

                            <th>Action</th>

                            {{-- @endcan --}}


                            <th>Status</th>





                        </tr>

                    </thead>

                    <tbody id="data-wrapper">

                        @foreach ($allPages as $single)
                        <tr>

                            <td>{{ $single->heading }}</td>

                            <td>{{ $single->slug }}</td>



                            {{-- <td>{!! $single->content !!}</td> --}}



                            {{-- <td>{{ $single->meta_title }}</td>

                            <td>{{ $single->meta_description }}</td>



                            <td>{!! $single->meta_keywords !!}</td> --}}



                            <!-- <td>

                                        <img style="max-width: 100px;max-height: 57px;"
                                            src="{{ env('APP_URL') . '/storage/pages/' . $single->banner_image }}"
                                            alt="">

                                    </td> -->



                            <!-- <td>

                                        <img style="max-width: 100px;max-height: 57px;"
                                            src="{{ env('APP_URL') . '/storage/pages/' . $single->content_image }}"
                                            alt="">

                                    </td> -->


                            <td>{{ $single->cat_name }}</td>

                            <td>
                                @if($single->status == 0)
                                <p class="text-warning fw-2">Draft</p> 
                                @else
                                <p class="text-success fw-2">Active</p> 
                                @endif
                            </td>


                            {{-- @can('answers-edit') --}}

                            <td>



                                <a href="{{ route('edit.page', $single->id) }}" type="button" title="Edit"
                                    class="btn btn-sm btn-warning  ">

                                    Edit



                                </a>

                                <a href="{{ route('delete.page', $single->id) }}" type="button" title="delete"
                                    class="btn btn-sm btn-danger  "
                                    onclick="return confirm('Are you sure you want to delete this ?')">

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

</div>
@endsection











@push('script')
<script>
    $(document).ready(function () {

        $('#example').DataTable();

    });
</script>
@endpush