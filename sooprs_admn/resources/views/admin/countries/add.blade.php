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

                <div class="col-sm-12 col-md-12">

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            <strong></strong> {{ Session::get('success') }}

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">

                            <strong></strong> {{ Session::get('error') }}

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>
                    @endif

                    
                </div>

                <div class="co-md-12">
                    <h3>Add Details</h3>
                    <form action="{{ route("post.country") }}" method="post" enctype="multipart/form-data">

                        @csrf
    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mt-2 mb-2">
                                    <label for="#ser_st">Country name</label>

                                    <input type="text" class="form-control" name="country_name">
                                
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-2 mb-2">
                                    <label for="#ser_st">Country Code</label>

                                    <input type="text" class="form-control" name="country_code">
                                
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-2 mb-2">
                                    <label for="#ser_st">SVG</label>

                                    <input type="file" class="form-control" name="svg">
                                
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group mt-2 mb-2">
                                    <label for="#ser_st">Dial Code</label>

                                    <input type="text" class="form-control" name="dial_code">
                                
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group mt-2 mb-2">
                                
                                    <label for="#ser_st">Activate this country ?</label>
                                    <select class="form-control" name="status" id="ser_st">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                
                                </div>
                            </div>
                        </div>
    
    
    
                       
    
                        <button type="submit" class="btn btn-primary ">Save</button>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop








                

            







@push('script')
    
@endpush
