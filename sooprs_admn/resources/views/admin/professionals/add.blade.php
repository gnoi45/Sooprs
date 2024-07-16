@extends('admin.layout.layout')







@push('style')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">



<style>

   

</style>

@endpush













@section('content')



<div class="container">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                @if (\Session::has('success')) 

            <div class="alert alert-success"> 

                <ul> 

                    <li>{!! \Session::get('success') !!} </li>

                </ul> 

            </div> 

        @endif

        @if (\Session::has('error')) 

            <div class="alert alert-error"> 

                <ul> 

                    <li>{!! \Session::get('error') !!} </li>

                </ul> 

            </div> 

        @endif

                <div class="card-body">



                    <h3>Enter professional details</h3>

                    <form action="{{ route('store.professional') }}" method="post" enctype="multipart/form-data">



                        @csrf

                        <input type="hidden" name="status" value="1">
                        <input type="hidden" name="is_verified" value="1">


                        <div class="form-group mt-3 mb-2">

                            <label for="#name">Name</label>

                            <input class="form-control" type="text" id="name" name="name" value="" required>

                        </div>

        

        

        

                        <div class="form-group mt-3 mb-2">

                            <label for="#email">Email</label>

                            <input class="form-control" type="text" id="email" name="email" value="" required>

                        </div> 

        

                        <div class="form-group mt-3 mb-2">

                            <label for="#mobile">Mobile</label>

                            <input class="form-control" type="number" id="mobile"  name="mobile" value="" required>

                        </div>

        

        

        

                        <div class="form-group mt-3 mb-2">

                            <label for="#services">Services</label>

                            <select class="selectpicker form-control" multiple data-live-search="true" id="services" name="services[]" required>



                                @foreach($allServices as $one)

                                <option value="{{ $one->id }}">{{ $one->service_name }}</option>

                                @endforeach

                                

                              </select>

                        </div>

        

        

        

                        <div class="form-group mt-3 mb-2">

                            <label for="#organisation">Organisation</label>

                            <input class="form-control" type="text" id="organisation"  name="organisation" value="">

                        </div>



                        <div class="form-group mt-3 mb-2">

                            <label for="#password">Password</label>

                            <input class="form-control" type="password"  id="password"  name="password" value="" required autocomplete="off">

                        </div>

        

                        {{-- <div class="form-group mt-3 mb-2">                       

                            <label for="#page_status"> Status</label>

                            <select class="form-control" name="status" id="page_status">                           

                               <option value="">Select option</option>

                                <option value="0">Draft</option>

                                <option value="1">Active</option>

                            </select>

                        </div> --}}

        

        

                        <div class="form-group mt-3 mb-2  d-flex justify-content-end">

                            <button id="save_btn" type="submit" class="btn button-21">Save</button>

                        </div>

        

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>



@endsection





@push('script')

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript">



    $(document).ready(function() {



        $('select').selectpicker();



    });



</script>

@endpush

