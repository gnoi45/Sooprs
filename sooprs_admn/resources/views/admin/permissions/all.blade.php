@extends('admin.layout.layout')



@push('style')
    <link href="{{ url('') }}/admin-assets/vendors/@coreui/icons/css/free.min.css" rel="stylesheet">

    <style>
        
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

                        <a href="{{ route('add.permission') }}" type="button" class="btn btn-sm btn-primary"
                            data-bs-toggle="modal" data-bs-target="#permissionModalexample">Add permission</a>
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
                                
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allPerm as $single)
                                <tr>
                                    
                                    <td id="name_{{ $single->id }}">{{ $single->name }}</td>
                                    {{-- @can('service-edit') --}}
                                    <td>
                                           
                                        <button type="button" class="btn " data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $single->id }}">
                                            <i class="icon icon-2xl  cil-pen"></i>
                                        </button>
                                        <a href="{{ route('delete.permission', $single->id) }}" type="button"
                                            title="delete" class="btn btn-sm btn-danger  " onclick="return confirm('Are you sure you want to delete this ?')">
                                            Delete
                                            {{-- <i class="mdi mdi-delete"></i>            --}}
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



@stop


<!-- Edit service Modal -->
@foreach ($allPerm as $p)
    
    <div class="modal fade" id="exampleModal{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit permission name</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form action="" method="post" class="submit_form" id="form-{{ $p->id }}">
                        @csrf
                        <div class="form-group mt-2 mb-2">
                            <input type="hidden" class="form-control" value="{{ $p->id }}" name="perm_id"
                                id="perm_id">
                            <input type="text" class="form-control" value="{{ $p->name }}"
                                name="perm_name" id="perm_name-{{ $p->id }}">
                        </div>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button data-id="{{ $p->id }}" type="button"
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

    <div class="modal fade" id="permissionModalexample" tabindex="-1" 
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" >Add permission </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   
                    <form action="{{ route('add.permission') }}" method="post"  >
                        @csrf
                        <div class="form-group mt-2 mb-2">
                            
                            <input type="text" class="form-control" 
                                name="perm_name_new" >
                            {{-- <label for="#perm_st">Type 1 to activate or 0 to de-activate this service</label> --}}
                            <input type="hidden" class="form-control" 
                                name="perm_guard"  value="web">
                        </div>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button  type="submit"
                            class="btn btn-primary ">Save</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>



@push('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });



        let btns = Array.from(document.getElementsByClassName('submit_btn'));

        btns.forEach(btn => {
            btn.addEventListener('click', (event) => {
                event.preventDefault();
                let p_id = btn.dataset.id;

                let perm_name = $('#perm_name-' + p_id).val();
                console.log(perm_name, p_id);



                // let form = new FormData();
                // form.append('perm_name', perm_name);
                // form.append('p_id', p_id);

                $.ajax({
                    url: "{{ route('edit.permission') }}",
                    type: "post",

                    data: {
                        'p_id': p_id,
                        'perm_name': perm_name

                    },

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // processData: false,
                    // contentType: false,
                    success: function(data) {
                        console.log(data);
                        $('#name_' + p_id).text(data.reqpermname);
                        $('#exampleModal' + p_id).modal('hide');

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
