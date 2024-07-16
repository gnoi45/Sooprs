@extends('admin.layout.layout')

@push('style')
    <link href="{{ url('') }}/admin-assets/vendors/@coreui/icons/css/free.min.css" rel="stylesheet">

    <style>
        .hidden {
            display: none;
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

                    <div class="mb-3 mt-3 ">

                        <a href="{{ route('add.country') }}" type="button" class="btn  btn-info text-white" >Add New</a>

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
                                <th>Name</th>
                                <th>Code</th>

                                <th>Status</th>
                                <th>Image</th>
                                @can('service-edit')
                                    <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($countries as $single)
                                <tr>

                                    {{-- <td>{{ $single->id }}</td> --}}
                                    <td >{{ $single->country_name }} </td>
                                    <td >{{ $single->country_code }} </td>

                                    <td >
                                        @if($single->status == 0)
                                            <p class="bg-warning text-white rounded-pill pt-0 ps-2 pe-2 text-center" style="font-size: 0.7rem">Draft</p>
                                        @elseif($single->status == 1)
                                            <p class="bg-success text-white rounded-pill pt-0 ps-2 pe-2 text-center" style="font-size: 0.7rem">Published</p>
                                        @endif
                                    </td>
                                    
                                    
                                    <td >
                                        @if($single->svg !== null)
                                        <img src="{{ $single->svg }}" alt="service-image" style="width:40px">
                                        @else

                                        @endif
                                    </td>
                                    
                                    @can('service-edit')
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('edit.country', ['id'=>$single->country_id]) }}" type="button" title="Edit"  class="btn btn-sm btn-success  text-white me-2"  >
                                                    Edit
                                                    {{-- <i class="mdi mdi-delete"></i>            --}}
                                                </a>
                                                <a href="{{ route('remove.country', $single->country_id) }}" type="button" title="delete"  class="btn btn-sm btn-danger text-white  "  onclick="return confirm('Are you sure you want to delete this ?')">
                                                    Delete
                                                    {{-- <i class="mdi mdi-delete"></i>            --}}
                                                </a>
                                            </div>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop




<div class="modal fade" id="serviceModalexample" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title fs-5">Add service </h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">



                {{-- <form action="{{ route('add.services') }}" method="post">

                    @csrf

                    <div class="form-group mt-2 mb-2">



                        <input type="text" class="form-control" name="service_name_new">

                        <label for="#ser_st">Activate this service ?</label>

                        <select class="form-control" name="service_status" id="ser_st">

                            <option value="1">Yes</option>

                            <option value="0">No</option>


                        </select>

                       
                    </div>



                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary ">Save</button>

                </form> --}}

            </div>



        </div>

    </div>

</div>







@push('script')
    <script>
       $(document).ready(function() {
            var orderPage = localStorage.getItem('order_page') || 0;
            $('#example').DataTable({
                // Initialize DataTable with paging and other options
                "paging": true,
                "pageLength": 10,
                "displayStart": parseInt(orderPage), // Convert page number to integer
                // Add other DataTable options as needed
            });

            // Save current page to local storage when page changes
            $('#example').on('page.dt', function() {
                var pageInfo = $('#example').DataTable().page.info();
                localStorage.setItem('order_page', pageInfo.page);
            });
        });




        let btns = Array.from(document.getElementsByClassName('submit_btn'));



        btns.forEach(btn => {

            btn.addEventListener('click', (event) => {

                event.preventDefault();

                let sr_id = btn.dataset.id;



                let service_name = $('#service_name-' + sr_id).val();

                let service_status_edit = $('#ser_stt-' + sr_id).val();


                console.log(service_name, sr_id,service_status_edit);







                // let form = new FormData();

                // form.append('service_name', service_name);

                // form.append('sr_id', sr_id);



                $.ajax({

                    url: "{{ route('edit.service') }}",

                    type: "post",



                    data: {

                        'sr_id': sr_id,

                        'service_name': service_name,
                        'service_status_edit': service_status_edit




                    },



                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    },

                    // processData: false,

                    // contentType: false,

                    success: function(data) {

                        console.log(data);

                        $('#name_' + sr_id).text(data.serv_name);

                        $('#exampleModal' + sr_id).modal('hide');



                        $('#success-message').text(data.success_message).removeClass(

                            'd-none');



                        setTimeout(function() {





                            $('#success-message').empty().addClass(

                                'd-none');



                        }, 3000);







                    }

                });



            });

        });
    </script>
@endpush
