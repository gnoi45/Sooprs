@extends('admin.layout.layout')







@push('style')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

<style>

    .bootstrap-select{

        border: 1px solid #0000003d;

    }

</style>

@endpush











@section('content')



<div class="body flex-grow-1 px-3">

    <div class="container-lg">

      <div class="row">

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

        

        <div class="col-sm-12 col-lg-12">

            <div class="card">

                <div class="card-body">

                    <div class="mb-5 ">

                        <h3>User KYC details</h3>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <strong>Name :</strong>
                        </div>
                        <div class="col-md-6">
                            {{$kyc->name}}
                        </div>

                        <div class="col-md-6">
                            <strong>ID Number :</strong>
                        </div>
                        <div class="col-md-6">
                            {{$kyc->id_number}}
                        </div>

                        <div class="col-md-6">
                            <strong>Front Image :</strong>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ $kyc->front_image }}" class="fancybox" data-fancybox="gallery1"><img src="{{ $kyc->front_image }}" alt="" style="    max-width: 100px;"></a>
                        </div>

                        <div class="col-md-6">
                            <strong>Back Image :</strong>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ $kyc->back_image }}" class="fancybox" data-fancybox="gallery1"><img src="{{ $kyc->back_image }}" alt="" style="    max-width: 100px;"></a>
                        </div>
                    </div>

                    <form action="{{ route('saveKycStatus') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="slug" value="{{ $kyc->user_id }}">

                        
                        <select class="form-control" name="is_kyc_verified" id="">
                            <option value="1" {{$kyc->is_kyc_verified == 1 ? 'selected' : ''}}>Verified</option>
                            <option value="0" {{$kyc->is_kyc_verified == 0 ? 'selected' : ''}}>Not verified</option>
                        </select>

                        <div class="form-group mt-3 mb-2  d-flex justify-content-start">

                            <button id="save_btn" type="submit" class="btn button-21">Save</button>

                        </div>

                    </form>

                </div>

            </div>



            

        </div>

        

      </div>

      

    </div>

</div>





    

@stop





@push('script')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>







<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript">



    $(document).ready(function() {



        $('select').selectpicker();



    });



</script>





@endpush



