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

                    <div>

                        <b>Edit Details</b>

                    </div>

                    <form action="{{ route('posteditProfessional') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="id" value="{{ $prof->id }}">

                        <div class="form-group mt-3 mb-2">

                            <label for="#name">Name</label>

                            <input class="form-control" type="text" id="name" name="name" value="{{ $prof->name }}" required>

                        </div>

                        <div class="form-group mt-3 mb-2">

                            <label for="#organisation">Is verified</label>

                            <select class="form-control" name="is_verified" id="">
                                <option class="bg-danger" value="0" {{ $prof->is_verified == 0 ? 'selected' : ''}}>Not verified</option>
                                <option class="bg-success" value="1" {{ $prof->is_verified == 1 ? 'selected' : ''}}>Verified</option>

                            </select>

                        </div>
                        <div class="form-group mt-3 mb-2">

                            <label for="#organisation">Is KYC verified</label>

                            <select class="form-control" name="is_kyc_verified" id="">
                                <option class="bg-danger" value="0" {{ $prof->is_kyc_verified == 0 ? 'selected' : ''}}>Not verified</option>
                                <option class="bg-success" value="1" {{ $prof->is_kyc_verified == 1 ? 'selected' : ''}}>Verified</option>

                            </select>

                        </div>

                        <div class="form-group mt-3 mb-2">

                            <label for="#email">Email</label>

                            <input class="form-control" type="text" id="email" name="email" value="{{ $prof->email }}" required autocomplete="off">

                        </div>

                        <div class="form-group mt-3 mb-2">

                            <label for="#mobile">Mobile</label>

                            <input class="form-control" type="text" id="mobile"  name="mobile" value="{{ $prof->mobile }}" required>

                        </div>

                        <div class="form-group mt-3 mb-2">

                            <label for="#services">Services</label>

                            <select class="selectpicker form-control" multiple data-live-search="true" id="services" name="services[]" >

                                @foreach($allServices as $one)

                                <option value="{{ $one->id }}"

                                    @if(in_array($one->id,$servicesArr))

                                    selected

                                    @endif

                                    >

                                    {{ $one->service_name }}</option>

                                @endforeach

                    

                              </select>

                        </div>
                        <div class="form-group mt-3 mb-2">

                            <label for="#skills">Skills</label>

                            <select class="selectpicker form-control" multiple data-live-search="true" id="skills" name="skills[]" >

                                @foreach($allSkills as $one)

                                <option value="{{ $one->skill_id }}"

                                    @if(in_array($one->skill_id,$skillsArr))

                                    selected

                                    @endif

                                    >

                                    {{ $one->skill_name }}</option>

                                @endforeach

                    

                              </select>

                        </div>

                        <div class="form-group mt-3 mb-2">

                            <label for="#organisation">Organisation</label>

                            <input class="form-control" type="text" id="organisation"  name="organisation" value="{{ $prof->organisation }}">

                        </div>

                        <div class="form-group mt-3 mb-2">

                            <label for="#organisation">Wallet(credits)</label>

                            <input class="form-control" type="number" id="wallet"  name="wallet" value="{{ $prof->wallet }}">

                        </div>
                        <div class="form-group mt-3 mb-2">

                            <label for="#organisation">Listing About</label>

                            <textarea class="form-control" name="listing_about" id="listing_about" cols="30" rows="5">{{ $prof->listing_about }}</textarea>

                        </div>
                        <div class="form-group mt-3 mb-2">

                            <label for="#bio">Bio</label>

                            <textarea class="form-control" name="bio" id="bio" cols="30" rows="5">{{ $prof->bio }}</textarea>

                        </div>

                        {{-- <div class="form-group mt-3 mb-2">

                            <label for="#page_status"> Status</label>

                            <select class="form-control" name="status" id="page_status">

                               <option value="{{ $prof->name }}">Select option</option>

                                <option value="0">Draft</option>

                                <option value="1">Active</option>

                            </select>

                        </div> --}}

                        {{-- <div class="form-group mt-3 mb-2">

                            <label for="#password">Password</label>

                            <input class="form-control" type="password"  id="password"  name="password" value="" autocomplete="off">

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



