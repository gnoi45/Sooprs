@extends('admin.layout.layout')







@push('style')

@endpush











@section('content')

    <div class="body flex-grow-1 px-3">

        <div class="container-lg">

            <div class="row">

                <div class="col-sm-12 col-lg-12">

                    @can('add-answers')

                        <div class="mb-3 mt-3 text-center">


                            <a href="{{ route('add.answers',) }}" type="button" class="btn btn-sm btn-primary"

                                data-bs-toggle="modal" data-bs-target="#answerModal">Add Answers</a>

                        </div>

                    @endcan

                    @if (Session::has('success_message'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            <strong></strong> {{ Session::get('success_message') }}

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>

                    @endif



                    {{-- <div id="data-wrapper">

                      

                    </div> --}}



                    {{-- <div class="auto-load text-center">

                        <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"

                            x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

                            <path fill="#000"

                                d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

                                <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"

                                    from="0 50 50" to="360 50 50" repeatCount="indefinite" />

                            </path>

                        </svg>

                    </div> --}}

                    <table id="example" class="table table-striped" style="width:100%">

                        <thead>

                            <tr>

                                <th>Ans. id</th>

                                <th>Ans. txt</th>

                                

                                {{-- <th>Q. id txt</th> --}}



                                

                                <th>Nxt. conn. q. Id txt</th>

                                @can('answers-edit')

                                    <th>Action</th>

                                @endcan







                            </tr>

                        </thead>

                        <tbody id="data-wrapper">

                            @foreach ($allanswers as $single)

                                <tr>

                                    <td>{{ $single->answer_id }}</td>

                                    <td>{{ $single->answer_text }}</td>

                                  

                                    {{-- <td>{{ $single->quesconn }}</td> --}}

                                   

                                    <td>{{ $single->connques }}</td>

                                    @can('answers-edit')

                                        <td>



                                            <button type="button" title="Edit" class="btn btn-sm btn-success"

                                                data-bs-toggle="modal"

                                                data-bs-target="#editanswerModal_{{ $single->answer_id }}">

                                                Edit

                                            </button>

                                            <a href="{{ route('delete.answer', $single->answer_id) }}" type="button"

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



<!-- answer Modal -->

<div class="modal fade" id="answerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title fs-5" id="exampleModalLabel">Add your answer</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <form action="{{ route('add.answers') }}" method="post">

                    @csrf

                    <div class="mb-3">


                        <input type="hidden" class="form-control mt-2 mb-2" id="connected_q"  name="conn_question" value="{{ $question_id }}">
                        

                        {{-- <select class="form-select mt-2 mb-2" aria-label="Default select example" id="connected_q"

                            name="conn_question">

                            <label for="#connected_q">Connected question</label>

                            @foreach ($allquestions as $que)

                                <option value="{{ $que->ques_id }}">{{ $que->question_title }}</option>

                            @endforeach

                        </select> --}}



                        <input type="text" class="form-control mt-2 mb-2" id="exampleInputEmail1"

                            aria-describedby="emailHelp" name="answer" placeholder="Type your answer here">

                        





                        {{-- <label for="#next_connected_q">Next question connected to this answer</label>

                        <input type="text" class="form-control mt-2 mb-2" id="next_connected_q"

                            aria-describedby="emailHelp" name="next_question_conn" placeholder="Type your next question here"> --}}



                        <select class="form-select mt-2 mb-2" aria-label="Default select example" id="next_connected_q"

                            name="next_question_conn">
                            <option value="">Set next connected question</option>

                            @foreach ($allquestions as $que)

                                

                                <option value="{{ $que->ques_id }}">{{ $que->question_title }}</option>

                            @endforeach

                        </select>



                        {{-- <div class="mb-3 form-check">

                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_first">

                            <label class="form-check-label" for="exampleCheck1">Is first question</label>

                        </div> --}}



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





<!-- Edit answer Modal -->

@foreach ($allanswers as $s)

    <div class="modal fade" id="editanswerModal_{{ $s->answer_id }}" tabindex="-1" aria-labelledby="exampleModalLabel"

        aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit your answer</h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">
                   
                    <form action="{{ route('edit.answer') }}" method="post">

                        @csrf

                        <div class="mb-3">



                            <input type="hidden" class="form-control mt-2 mb-2" id="exampleInputEmail1"

                                name="answer_id" value="{{ $s->answer_id }}">







                            <input type="text" class="form-control mt-2 mb-2" id="exampleInputanswertext"

                               name="answer_text" value="{{ $s->answer_text }}">





                            {{-- <label for="#connected_q">Connected question</label>

                            <select class="form-select mt-2 mb-2" aria-label="Default select example" id="connected_q"

                                name="conn_question">



                                @foreach ($allquestions as $que)

                                    <option value="{{ $que->ques_id }}">{{ $que->question_title }}</option>

                                @endforeach

                            </select> --}}







                            <label for="#next_connected_qu">Next question connected to this answer</label>

                            <select class="form-select mt-2 mb-2" aria-label="Default select example"

                                id="next_connected_qu" name="next_question_conn_edit">


                                <option value="">Choose question</option>
                                @foreach ($allquestions as $que)
                                    @if($que->ques_id == $s->connected_ques_id)
                                    <option value="{{ $que->ques_id }}" selected>{{ $que->question_title }}</option>                                        
                                    @else
                                    <option value="{{ $que->ques_id }}" >{{ $que->question_title }}</option>                                        
                                        
                                    @endif
                                @endforeach

                            </select>



                            {{-- <div class="mb-3 form-check">

                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_first">

                            <label class="form-check-label" for="exampleCheck1">Is first question</label>

                        </div> --}}



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

                ordering: false,

            });

        });

    </script>





    {{-- <script>

        let ENDPOINT = "{{ url('/') }}";

        let page = 1;

        loadMoreAnswers(page);

        $(window).scroll(function(){

            if( $(window).scrollTop() + $(window).height() >= $(document).height() ){

                page++;

                loadMoreAnswers(page);

            }

        })



        function loadMoreAnswers() {

            $.ajax({

                url: ENDPOINT +"/answers?page=" + page,

                type:"get",

                datatype: "html",

                beforesend: fucntion(){

                    $(".auto-load").show();

                },

                success: fucntion(data){

                    if(data.length == 0){

                        $(".auto-load").html("We have no more data left to display.");

                    }

                    $(".auto-load").hide();

                    $("#data-wrapper").append(data)

                }

            })

        }

    </script> --}}

@endpush

