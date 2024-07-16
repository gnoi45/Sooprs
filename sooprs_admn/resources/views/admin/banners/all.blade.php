@extends('admin.layout.layout')







@push('style')
    <link href="{{ url('') }}/admin-assets/vendors/@coreui/icons/css/free.min.css" rel="stylesheet">



    <style>
        .hidden {

            display: none;

        }


        

        /* CSS */
        .button-85 {
        padding: 0.6em 2em;
        border: none;
        outline: none;
        color: rgb(255, 255, 255);
        background: #111;
        cursor: pointer;
        position: relative;
        z-index: 0;
        border-radius: 10px;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        text-decoration: none;
        }

        .button-85:before {
        content: "";
        background: linear-gradient(
            45deg,
            #ff0000,
            #ff7300,
            #fffb00,
            #48ff00,
            #00ffd5,
            #002bff,
            #7a00ff,
            #ff00c8,
            #ff0000
        );
        position: absolute;
        top: -2px;
        left: -2px;
        background-size: 400%;
        z-index: -1;
        filter: blur(5px);
        -webkit-filter: blur(5px);
        width: calc(100% + 4px);
        height: calc(100% + 4px);
        animation: glowing-button-85 20s linear infinite;
        transition: opacity 0.3s ease-in-out;
        border-radius: 10px;
        }

        @keyframes glowing-button-85 {
        0% {
            background-position: 0 0;
        }
        50% {
            background-position: 400% 0;
        }
        100% {
            background-position: 0 0;
        }
        }

        .button-85:after {
        z-index: -1;
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background: #222;
        left: 0;
        top: 0;
        border-radius: 10px;
        }
    </style>
@endpush











@section('content')

    <div class="body flex-grow-1 px-3">

        <div id="success-message" class="d-none alert alert-success"></div>

        <div class="container-lg">

            <div class="row">

                <div class="col-sm-12 col-lg-12">

                    {{-- @can('add-questions') --}}

                    <div class="mb-3 mt-3 text-end">



                        <a href="{{ route('add.services') }}" type="button" class="button-85"
                            data-bs-toggle="modal" data-bs-target="#serviceModalexample">ADD BANNER</a>
                            {{-- <button class="button-85" role="button">Button 85</button> --}}
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

                                {{-- <th>Id</th> --}}

                                <th>Banner</th>

                                @can('service-edit')
                                    <th>Action</th>
                                @endcan

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($banners as $single)
                            <tr>

                                {{-- <td>{{ $single->id }}</td> --}}

                                <td>
                                    <img src="{{ $single->image }}" alt="banner" style="width:150px;    border-radius: 10px;">
                                </td>
                               
                                @can('service-edit')
                                    <td>



                                        

                                        <a href="{{ route('delete.banner', $single->id) }}" type="button" title="delete"
                                            class="btn btn-sm btn-danger  "
                                            onclick="return confirm('Are you sure you want to delete this ?')">

                                            <i class="fa-solid fa-trash-can text-white"></i>

                                           

                                        </a>

                                    </td>
                                @endcan

                            </tr>
                        @endforeach

                        </tbody>

                        {{-- <tfoot>

                            <tr>

                                <th>Name</th>



                            </tr>

                        </tfoot> --}}

                    </table>

                </div>



            </div>



        </div>

    </div>







@stop





<!-- Edit service Modal -->



<!-- Add banner Modal -->
<div class="modal fade" id="serviceModalexample" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title fs-5">Add banner </h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">



                <form action="{{ route('add.banner') }}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group mt-2 mb-2">



                        <input type="file" class="form-control" name="image" placeholder="Choose banner">

                        

                    </div>



                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary ">Save</button>

                </form>

            </div>



        </div>

    </div>

</div>









@push('script')
    <script>
        $(document).ready(function() {

            $('#example').DataTable({

                // ordering: false,

            });

        });



    </script>
@endpush
