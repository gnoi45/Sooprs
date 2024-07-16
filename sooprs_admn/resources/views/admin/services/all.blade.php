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

                    <div class="mb-3 mt-3 text-center">



                        <a href="{{ route('add.services') }}" type="button" class="btn btn-sm btn-primary"
                            data-bs-toggle="modal" data-bs-target="#serviceModalexample">Add service</a>

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

                                <th>Id</th>

                                <th>Name</th>

                                @can('service-edit')
                                    <th>Action</th>
                                @endcan

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($allservices as $single)
                                <tr>

                                    <td>{{ $single->id }}</td>

                                    <td id="name_{{ $single->id }}"><a
                                            href="{{ route('all.questions', $single->id) }}">{{ $single->service_name }}</a>
                                    </td>

                                    @can('service-edit')
                                        <td>



                                            <button type="button" class="btn " data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $single->id }}">

                                                <i class="icon icon-2xl  cil-pen"></i>

                                            </button>

                                            <a href="{{ route('delete.service', $single->id) }}" type="button" title="delete"
                                                class="btn btn-sm btn-danger  "
                                                onclick="return confirm('Are you sure you want to delete this ?')">

                                                Delete

                                                {{-- <i class="mdi mdi-delete"></i>            --}}

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

@foreach ($allservices as $s)
    <!-- Modal -->

    <div class="modal fade" id="exampleModal{{ $s->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit service </h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    {{-- {{ $s->id }} --}}

                    <form action="" method="post" class="submit_form" id="form-{{ $s->id }}">

                        @csrf

                        <div class="form-group mt-2 mb-2">

                            <input type="hidden" class="form-control" value="{{ $s->id }}" name="sr_id"
                                id="sr_id">

                            <input type="text" class="form-control" value="{{ $s->service_name }}"
                                name="service_name" id="service_name-{{ $s->id }}">

                        </div>

                        <label for="#ser_stt-{{ $s->id }}">Activate this service ?</label>

                        <select class="form-control mb-2" name="service_status_edit" id="ser_stt-{{ $s->id }}">

                            <option value="0">Yes</option>

                            <option value="">No</option>


                        </select>



                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <button data-id="{{ $s->id }}" type="button"
                            class="btn btn-primary submit_btn">Save</button>

                    </form>

                </div>

                <div class="modal-footer">



                </div>

            </div>

        </div>

    </div>
@endforeach



<!-- Add service Modal -->



<div class="modal fade" id="serviceModalexample" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title fs-5">Add service </h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">



                <form action="{{ route('add.services') }}" method="post">

                    @csrf

                    <div class="form-group mt-2 mb-2">



                        <input type="text" class="form-control" name="service_name_new">

                        <label for="#ser_st">Activate this service ?</label>

                        <select class="form-control" name="service_status" id="ser_st">

                            <option value="1">Yes</option>

                            <option value="0">No</option>


                        </select>

                        {{-- <input type="number" class="form-control" 

                                name="service_status" id="ser_st"> --}}

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
