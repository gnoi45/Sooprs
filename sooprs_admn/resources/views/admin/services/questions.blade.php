@extends('admin.layout.layout')







@push('style')

@endpush











@section('content')

    <div class="body flex-grow-1 px-3">

        <div class="container-lg">

            <div class="row">

                <div class="col-sm-12 col-lg-12">

                    @can('add-questions')

                        <div class="mb-3 mt-3 text-center">

                           
                            <a href="{{ route('add.questions') }}" type="button" class="btn btn-sm btn-primary"

                                data-bs-toggle="modal" data-bs-target="#questionModal">Add question</a>

                        </div>

                    @endcan

                    @if (Session::has('success_message'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            <strong></strong> {{ Session::get('success_message') }}

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>

                    @endif



                    {{-- <div class="row mt-3 mb-4">

                        <div class="col-lg-5 col-md-5 col-sm-12">

                            <select class="form-control" name="services-question-filter" id="services-question-filter"

                                onchange="filterques()">

                                <option value="">Select service</option>

                                @foreach ($allServ as $serv)

                                    <option value="{{ $serv->id }}">{{ $serv->service_name }}</option>

                                @endforeach

                            </select>

                        </div>

                    </div> --}}







                    <table id="example" class="table table-striped" style="width:100%">

                        <thead>

                            <tr>

                                <th>Id</th>

                                <th>Question</th>

                                <th>Serv. name</th>

                                <th>Is first</th>

                                @can('questions-edit')

                                    <th>Action</th>

                                @endcan

                            </tr>

                        </thead>

                        <tbody id="ques_table_body">

                            @foreach ($allquestions as $single)

                                <tr>

                                    <td>{{ $single->ques_id }}</td>

                                    <td><a href="{{ route('all.answers',[$single->ques_id, $service_id] ) }}">{{ $single->question_title }}</a></td>

                                    <td>{{ $single->serviceName }}</td>

                                    <td>{{ $single->is_first_question }}</td>

                                    @can('questions-edit')

                                        <td>

                                            <button type="button" title="Edit" class="btn btn-sm btn-success"

                                                data-bs-toggle="modal"

                                                data-bs-target="#editquestionModal_{{ $single->ques_id }}">

                                                Edit

                                            </button>

                                            <a href="{{ route('delete.question', $single->ques_id) }}" type="button"

                                                title="delete" class="btn btn-sm btn-danger  "

                                                onclick="return confirm('Are you sure you want to delete this ?')">

                                                Delete

                                                

                                            </a>



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

@endsection



<!-- question Modal -->

<div class="modal fade" id="questionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title fs-5" id="exampleModalLabel">Add your question</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <form action="{{ route('add.questions') }}" method="post">

                    @csrf

                    <div class="mb-3">





                        {{-- <select class="form-control" name="services-question-filter" id="services-question-filter"

                                onchange="filterques()">

                                <option value="">Select service</option>

                                @foreach ($allServ as $serv)

                                    <option value="{{ $serv->id }}">{{ $serv->service_name }}</option>

                                @endforeach

                            </select> --}}





                        {{-- <label for="#servselect">Question connected to service :</label> --}}



                        {{-- <select class="form-select mt-2 mb-2" aria-label="Default select example" name="services"

                            id="servselect" >

                            <option selected value="">Open this select menu</option>

                            @foreach ($allServ as $ser)

                                <option value="{{ $ser->id }}">{{ $ser->service_name }}</option>

                            @endforeach

                        </select> --}}


                        <input type="hidden" class="form-control mt-2 mb-2" 

                         name="services" value="{{ $service_id }}">








                        <input type="text" class="form-control mt-2 mb-2" id="exampleInputEmail1"

                            aria-describedby="emailHelp" name="question">







                        <div class="mb-3 form-check">

                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_first">

                            <label class="form-check-label" for="exampleCheck1">Is first question</label>

                        </div>



                    </div>





                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>

            {{-- <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          <button type="button" class="btn btn-primary">Save changes</button>

        </div> --}}

        </div>

    </div>

</div>



<!-- edit question Modal -->

@foreach ($allquestions as $q)

    <div class="modal fade" id="editquestionModal_{{ $q->ques_id }}" tabindex="-1"

        aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit your question</h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <form action="{{ route('edit.question') }}" method="post">

                        @csrf

                        <div class="mb-3">



                            <input type="hidden" class="form-control mt-2 mb-2" id="exampleInputEmail1"

                                aria-describedby="emailHelp" name="question_id" value="{{ $q->ques_id }}">



                            <input type="text" class="form-control mt-2 mb-2" id="exampleInputEmail1"

                                aria-describedby="emailHelp" name="question_title" value="{{ $q->question_title }}">



                            {{-- <select class="form-select mt-2 mb-2" aria-label="Default select example"

                                name="services">

                                <option selected value="">Open this select menu</option>

                                @foreach ($allServ as $ser)

                                    <option value="{{ $ser->id }}">{{ $ser->service_name }}</option>

                                @endforeach

                            </select> --}}



                            <div class="mb-3 form-check">

                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_first">

                                <label class="form-check-label" for="exampleCheck1">Is first question</label>

                            </div>



                        </div>





                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>

                </div>

                {{-- <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          <button type="button" class="btn btn-primary">Save changes</button>

        </div> --}}

            </div>

        </div>

    </div>

@endforeach





@push('script')

    <script>

        $(document).ready(function() {

            $('#example').DataTable({

                // ordering: false,

            });

        });

    </script>



    <script>

        function filterques() {





            let selectedvalue = $("#servselect").val();

            console.log(selectedvalue);

            $.ajax({

                url: "/ques-filter" + '/' + selectedvalue,

                type: "get",

                data: "",

                success: function(data) {

                    console.log(data);



                    $.each(data, function(key, value){

                        $("#ques_table_body").empty();

                        $("#ques_table_body").append("<tr>\

                                    <td>" + value.ques_id + "</td>\

                                    <td>"+ value.question_title +"</td>\

                                    <td>" + value.service_id +"</td>\

                                    <td>" + value.is_first_question + "</td>\

                                    <td>\<button type='button' title='Edit' class='btn btn-sm btn-success' data-bs-toggle='modal' data-bs-target='#editquestionModal_" +value.ques_id +"'>Edit</button>\

                                        <a href='{{ route('delete.question',"+value.ques_id+") }}' type='button' title='delete' class='btn btn-sm btn-danger' onclick='return confirm('Are you sure you want to delete this ?')'>Delete </a>\</td>\

                                    </tr>"

                                    );

                    });

                    

                }



            });



        }

    </script>

@endpush

