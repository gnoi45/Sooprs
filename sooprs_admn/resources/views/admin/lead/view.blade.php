@extends('admin.layout.layout')







@push('style')

    <link href="{{ url('') }}/admin-assets/vendors/@coreui/icons/css/free.min.css" rel="stylesheet">

    <style>

        .multiselect {

            width: 200px;

        }



        .selectBox {

            position: relative;

        }



        .selectBox select {

            width: 100%;

            font-weight: bold;

        }



        .overSelect {

            position: absolute;

            left: 0;

            right: 0;

            top: 0;

            bottom: 0;

        }



        #checkboxes {

            display: none;

            border: 1px #dadada solid;

        }



        #checkboxes label {

            display: block;

        }



        #checkboxes label:hover {

            background-color: #1e90ff;

        }



        .lead_p span {

            font-size: 11px;

        }

    </style>

@endpush


@section('content')



    <div class="body flex-grow-1 px-3">

        <div class="container-lg">

            <div class="row justify-content-center">

                @if (Session::has('success_message'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                        <strong></strong> {{ Session::get('success_message') }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>

                @endif



                

              

                <div class="col-sm-12 col-lg-12">


                    <div class="text-center">
                        <h1>{{ $lead->project_title }}</h1>
                        <i>Created on : {{ $lead->created_at->formatLocalized('%A, %B %d, %Y') }}
                        </i>
                        <div class="d-flex justify-content-center align-items-center">
                            <p class="m-2 bg-warning p-1 rounded">Min. budget : <b>$ {{ $lead->min_budget }}</b></p>
                            <p class="m-2 bg-warning p-1 rounded">Max. budget : <b>$ {{ $lead->max_budget_amount }}</b></p>
                        </div>
                    </div>

                    <div>
                        <strong>Customer Details</strong>
                        <div class="d-flex justify-content-start align-items-center">
                            <strong>Customer email :</strong> <span>{{ $lead->email }}</span>
                        </div>
                        <div class="d-flex justify-content-start align-items-center">
                            <strong>Customer mobile :</strong> <span>{{ $lead->mobile }}</span>
                        </div>
                    </div>

                    <div>
                        <div class="d-flex">
                            <p><b>Total Bids </b>:{{ $lead->bid_count }} </p>
                            <p  style="cursor: pointer" class="ms-2 text-primary fw-medium" data-bs-toggle="modal" data-bs-target="#bidsModal">
                                See details
                            </p>
                        </div>
                          
                    </div>

                    <div class="p-1">
                        <b>Description :</b>
                        <pre>{{ $lead->description }}</pre>
                    </div>
                   
                </div>



            </div>



        </div>

    </div>







@stop



<div class="modal fade" id="bidsModal" tabindex="-1" aria-labelledby="bidsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="bidsModalLabel">Bidders</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          @if($bids !== null)
            <div class="row">
                @foreach($bids as $bid)
                    <div class=" col-md-6 mb-2 ">
                        <div class="bg-secondary-subtle p-1 text-dark rounded position-relative">
                            <b>Name</b> : {{ $bid->professional->name }} <br>
                            <b>Email</b> : {{ $bid->professional->email }} <br>
                            <b>Mobile</b> : {{ $bid->professional->mobile }} <br>
                            <b>Amount</b> : $ {{ $bid->amount }}
                            @if($bid->status == 1)
                            <i class="fa-solid fa-circle-check" title="Project Assigned to this professional" style="color: #008c61;position: absolute; top: 8px; right: 10px;"></i>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>



@push('script')




@endpush

