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



                {{-- <form action="{{ route('date-filter') }}" method="post">

                    @csrf --}}

                <div class="col-md-6 col-sm-12  mb-3">

                    <!-- Filter leads by assigned date -->

                    <div class="mt-2" id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 3px solid #0068ff; width: 100%">

                        <i class="fa fa-calendar"></i>&nbsp;

                        <span></span> <i class="fa fa-caret-down"></i>



                    </div>





                    {{-- <input type="date" class="form-control" name="start_date">

                        <input type="date" class="form-control" name="end_date">

                        <button class="btn btn-primary" type="submit" id="date_submit_bnt">GET</button> --}}

                </div>

                {{-- </form> --}}

                <div class="d-flex justify-content-center">

                    <a class="btn btn-sm" href="{{ route('all.leads') }}"

                        style="text-align: center;text-decoration: none;color: white;background: green;">Show All Leads</a>

                </div>



                <div class="col-sm-12 col-lg-12">



                    <table id="example" class="table table-striped" style="width:100%">

                        <thead>

                            <tr>

                                <th>Lead Id</th>

                                <th>Customer Detail</th>
                                <th>Project Title</th>

                                <th>Descirption</th>

                                <th>Budget</th>

                                <!-- <th>Select type</th> -->

                                <!-- <th>Type</th> -->


                                <th>Service Name</th>
                                <th>Created At</th> 

                                <th>Action</th>


                                {{-- <th>Pincode</th>

                                <th>Language</th> --}}

                                <!-- @can('assign-button')

                                    <th>Assign. Staff</th>

                                @endcan

                                <th>Assigned Staff</th> -->

                                <!-- <th>Status</th>

                                <th>Query</th> -->

                            </tr>

                        </thead>

                        <tbody id="exampleId">

                            @foreach ($all as $single)

                                <tr>

                                    <td>{{ $single->id }}</td>

                                    <td><small>{{ $single->email }}</small><br><small>{{$single->mobile}}</small></td>
                                    <td>{{ $single->project_title }}</td>

                                    <td>{{ $single->description }}</td>

                                    <td>${{ $single->min_budget }} - {{ $single->max_budget_amount }}</td>


                                    <td>{{ $single->service_name }}</td>

                                    

                                    {{-- <td>

                                        <form class="leadtypeform" action="{{ route('lead.type') }}" method="post">

                                            @csrf

                                            <input type="hidden" value="{{ $single->id }}" name="lead_id">

                                            <select class="leadtypeselect" data-id="{{ $single->id }}" id="lead_type"

                                                name="lead_type" on>

                                                <option value="">Select type</option>

                                                <option value="0">New</option>

                                                <option value="1">Assigned</option>

                                                <option value="2">Quoted</option>

                                                <option value="3">Project received</option>

                                                <option value="4">Cancelled</option>

                                            </select>

                                        </form>

                                    </td> --}}

                                    {{-- <td>

                                        

                                        @if ($single->type == 0)

                                            NEW

                                        @elseif($single->type == 1)

                                            Assigned

                                        @elseif($single->type == 2)

                                            Quoted

                                        @elseif($single->type == 3)

                                            Project received

                                        @elseif($single->type == 4)

                                            Cancelled

                                        @endif





                                    </td> --}}



                                    {{--<td class="lead_p">

                                        <p class="mb-0" style="font-size:17px;"><strong>{{ $single->name }}</strong></p>

                                        <span>{{ $single->email }}</span><br>

                                        <span>{{ $single->mobile }}</span><br>

                                        <span>{{ $single->city }}</span>,

                                        <span>{{ $single->pincode }}</span><br>

                                        <span>{{ $single->client_remarks }}</span>

                                    </td>--}}

                                    <td>{{ $single->created_at->formatLocalized('%A, %B %d, %Y') }}</td>

                                    {{-- <td>{{ $single->mobile }}</td>

                                    <td>{{ $single->city }}</td>

                                    <td>{{ $single->pincode }}</td>

                                    <td>{{ $single->client_remarks }}</td> --}}

                                   {{-- @can('assign-button')

                                        <td>

                                            @if (empty($single->assigned_staff))

                                                <button id="assignBtn" type="button" class="btn btn-sm btn-primary"

                                                    data-bs-toggle="modal" data-bs-target="#exampleModal{{ $single->id }}">

                                                    Assign

                                                </button>

                                            @else

                                                {{ $single->assigned_staff_name }}

                                            @endif

                                        </td>

                                    @endcan --}}

                                    {{--<td>{{ $single->assigned_staff_name }}</td>--}}

                                   {{-- <td>

                                       

                                       
                                        @if (count($single->statusArr) > 0)

                                            <button id="all_status_btn" type="button" class="btn btn-sm " data-id=""

                                                data-bs-toggle="modal" data-bs-target="#allStatusModal{{ $single->id }}"

                                                title="See all activities">

                                                <i class="icon icon-2xl cil-spreadsheet"></i>

                                            </button>

                                        @endif



                                    </td>



                                    <td>

                                        <button id="queryBtn" type="button" class="btn btn-sm btn-warning"

                                            data-id="{{ $single->id }}" data-bs-toggle="modal"

                                            data-bs-target="#Modal{{ $single->id }}">

                                            View

                                        </button>

                                    </td>--}}

                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-sm btn-success text-white"><a class="text-white link-underline link-underline-opacity-0" href="{{ route('view_lead_page',['lead_id'=>$single->id]) }}">View</a></button>
                                            
                                            <a href="{{ route('delete.lead', $single->id) }}" type="button" title="delete" class="btn btn-sm btn-danger text-white ms-1"  onclick="return confirm('Are you sure you want to delete this ?')">
                                                Delete
                                            </a>
                                        </div>
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>



                    </table>

                </div>



            </div>



        </div>

    </div>







@stop



<!-- Button trigger modal -->















@push('script')

    <script>

        $(document).ready(function() {

            $('#example').DataTable({

                "order": [[ 0, "desc" ]],

            });

        });



        $(document).ready(function() {

            $('#examplequery').DataTable({

                "order": [[ 0, "desc" ]],

            });

        });



        var expanded = false;



        function showCheckboxes() {

            var checkboxes = document.getElementById("checkboxes");

            if (!expanded) {

                checkboxes.style.display = "block";

                expanded = true;

            } else {

                checkboxes.style.display = "none";

                expanded = false;

            }

        }

    </script>



    <script>
        $(function() {
            $('input[name="status_date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function(start, end, label) {
                var years = moment().diff(start, 'years');
                // alert("You are " + years + " years old!");
            });
        });
    </script>
    <script type="text/javascript">

        $(function() {
            var start = moment().subtract(29, 'days');
            var end = moment();
            console.log(start,end);
            function cb(start, end) {
                $('#reportrange span').html(start.format('M/D/YYYY')+ '-' +end.format('M/D/YYYY'));
            }
            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,'month').endOf('month')]
                }

            }, cb);

            cb(start, end);
            // console.log("date"+start, end);

            $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
                let spantext = $("#reportrange").children("span").text();
                // console.log(spantext);
                $.ajax({
                    url: "{{ route('date-filter') }}",
                    type: "post",
                    data: {
                        spantext: spantext
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        // let json_data = JSON.parse(data, true);           
                        $("#exampleId").empty();

                        $.each(data.allLeads, function(key, value) {
                            console.log(value.id);
                            // $.each(value.statusArr, function(x, y) {
                                // $('#exampleId').append(
                                //     "<tr>\
                                //     <td>" + value.id + "</td>\
                                //     <td class='lead_p'>\<p class='mb-0' style='font-size:17px;'>\<strong>" +
                                //     value.name + "</strong>\</p>\<span>" +
                                //     value.name + "</span><br><span>" + value
                                //     .email + "</span><br><span>" + value
                                //     .mobile + "</span><br><span>" + value
                                //     .city + "</span><br><span>" + value
                                //     .pincode + "</span><br><span>" + value
                                //     .client_remarks + "</span><br></td>\
                                //     <td>" + y.status +
                                //     "<button id='status_btn' type='button' class='btn btn-sm ' data-id=" +
                                //     value.id +
                                //     " data-bs-toggle='modal'  data-bs-target='#statusModal" +
                                //     value.id +
                                //     "' title='Write status'>\<i class='icon icon-2xl  cil-pen'></i>\</button>\<button id='all_status_btn' type='button' class='btn btn-sm ' data-id=''  data-bs-toggle='modal' data-bs-target='#allStatusModal" +
                                //     value.id +
                                //     "'  title='See all activities'>\<i class='icon icon-2xl cil-spreadsheet'></i>\</button>\</td>\
                                //     <td><button id='queryBtn' type='button' class='btn btn-sm btn-warning' data-id='" +
                                //     value.id +
                                //     "' data-bs-toggle='modal'  data-bs-target='#Modal" +
                                //     value.id + "'> View  </button> </td>\
                                //     </tr>"
                                // );
                                $('#exampleId').append(
                                    "<tr>\
                                    <td>" + value.id + "</td>\
                                    <td class='lead_p'>\<p class='mb-0' style='font-size:17px;'>\<strong>" +
                                    value.name + "</strong>\</p>\<span>" +
                                    value.name + "</span><br><span>" + value
                                    .email + "</span><br><span>" + value
                                    .mobile + "</span><br><span>" + value
                                    .city + "</span><br><span>" + value
                                    .pincode + "</span><br><span>" + value
                                    .client_remarks + "</span><br></td>\
                                    <td>" + value.description + "</td>\
                                    <td>" + value.min_budget + "</td>\
                                    <td>" + value.service_name + "</td>\
                                    <td>" + value.created_at + "</td>\
                                    <td><button class='btn btn-sm btn-success text-white'><a class='text-white link-underline link-underline-opacity-0' href='{{ route('view_lead_page',['lead_id'=>"+ value.id +"]) }}''>View</a></button></td>\
                                    </tr>"
                                );
                            // });
                        });
                    }
                });
            });
        });
    </script>





    <script>

        $(".leadtypeselect").change(function() {

            // Get the form that corresponds to the selected dropdown

            var myForm = $(this).closest(".leadtypeform");



            // Submit the form

            myForm.submit();

        });

    </script>



    {{-- <script>

    function leadTypeFunction() {

        var typevalue = document.getElementById("lead_type").value;

        var url = "{{ route('my-ajax-function') }}";

        

        // Send an AJAX request to the server

        $.ajax({

            url: url,

            type: 'POST',

            data: {typevalue: typevalue},

            success: function(response) {

                console.log(response);

            },

            error: function(xhr, status, error) {

                console.error(xhr.responseText);

            }

        });

    }

</script> --}}

@endpush

