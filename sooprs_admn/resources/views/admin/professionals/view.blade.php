@extends('admin.layout.layout')

@push('style')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">



    <style>

        .service_name {
            background-color: darkturquoise;
            color: white;
            padding: 2px 10px;
            border-radius: 20px;

        }

    </style>

@endpush











@section('content')



    <div class="body flex-grow-1 px-3">

        <div class="container-lg">

            <div class="row">





                <div class="col-sm-12 col-lg-12">

                    <nav>

                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Profile </button>

                            <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab"  data-bs-target="#nav-skills" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" >Skills</button>

                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"  type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Services</button>

                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Resume</button>

                            <button class="nav-link" id="nav-portfolio-tab" data-bs-toggle="tab" data-bs-target="#nav-portfolio" type="button" role="tab" aria-controls="nav-portfolio" aria-selected="false">Portfolio</button>

                            <button class="nav-link" id="nav-academic-tab" data-bs-toggle="tab" data-bs-target="#nav-academic" type="button" role="tab" aria-controls="nav-academic" aria-selected="false">Academic</button>

                            <button class="nav-link" id="nav-academic-tab" data-bs-toggle="tab" data-bs-target="#nav-exp" type="button" role="tab" aria-controls="nav-academic" aria-selected="false">Experience</button>



                        </div>

                    </nav>

                    <div class="tab-content mt-3" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"

                            tabindex="0">



                            <div class="card">

                                <div class="card-body">

                                    <div class="row justify-content-center">

                                        <div class="col-lg-6">

                                            <div class="row">

                                                <div class="col-lg-4 ">

                                                    <div class="d-flex align-items-center justify-content-center">

                                                        <img src="{{ $prof->image }}" alt="profile-pic" style="width: 150px;    border-radius: 50%;">

                                                    </div>

                                                </div>

                                                <div class="col-lg-8 d-flex align-items-center justify-content-center">

                                                    <div>

                                                        <p><b>Name: </b>{{ $prof->name }}</p>

                                                        <i class="text-success"><b>slug: </b>{{ $prof->slug }}</i>

                                                        <p class="mt-3"><b>Email: </b>{{ $prof->email }}</p>

                                                        <p><b>Mobile: </b>{{ $prof->mobile }}</p>

                                                        <p><b>Organisation: </b>{{ $prof->organisation }}</p>

                                                        <p><b>Short Bio: </b>{!! $prof->bio !!}</p>

                                                        <p><b>About: </b>{!! $prof->listing_about !!}</p>

                                                        <p><b>Wallet: </b>{!! $prof->wallet !!} Credits</p>

                                                    </div>

                                                </div>

                                                

                                            </div>

                                        </div>

                                        <div class="col-lg-6">
                                          
                                            

                                        </div>

                                    </div>

                                </div>

                            </div>



                        </div>

                        <div class="tab-pane fade" id="nav-skills" role="tabpanel" aria-labelledby="nav-profile-tab"

                            tabindex="0">

                            <div class="row">

                                

                                   
                                        
                                    @if($prof->skills !== null)                                       
                                        @foreach($skillsArr as $skill)
                                        <div class="col-md-2" style="    width: auto;">
                                            <span class="service_name">{{ $skill }}</span>
                                        </div>
                                        @endforeach
                                    @else
                                        <p>No Skills Added By Professional</p>
                                    @endif

                                  




                            </div>

                        </div>

                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"

                            tabindex="0">

                            <div class="row">

                                <div class="col-lg-12">

                                    <p><b>Resume: </b>

                                        <embed  

                                            src="{{$prof->resume}}"

                                            type="application/pdf"

                                            frameBorder="0"

                                            scrolling="auto"

                                            height="450px"

                                            width="100%"

                                        >

                                  </p>



                                </div>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"

                            tabindex="0">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div>

                                        @foreach($servicesArr as $service)

                                        <span class="service_name">{{ $service }}</span>

                                        @endforeach

                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">



                        </div> --}}

                        <div class="tab-pane fade" id="nav-portfolio" role="tabpanel" aria-labelledby="nav-portfolio-tab" tabindex="0">
                            @if(!$portfolios->isEmpty())
                            <div class="row">
                            @foreach($portfolios as $each)
                            <div class="col-sm-12 col-md-4">
                            <div class="card">

                                <div class="card-body">

                                    <p><b>Title: <br></b>{{ $each->title }}</p>

                                    <p><b>Description: <br></b>{{ $each->description }}</p>
                                    
                                    @if ($each->link !== null)
                                    <a href="{{$each->link}}" targe="_blank">{{$each->link}}</a></p>
                                    @endif
                                    @foreach($each->p__images as $one)

                                    <img src="{{ $one }}" alt="portfolio-pic" style=" width:100%; height:auto; max-height:200px;">

                                    @endforeach

                                </div>

                            </div>
                            </div>
                            @endforeach
                           </div>
                           @else
                           <p>Profession has not added portfolio added !!</p>
                           @endif
       
                        </div>

                        <div class="tab-pane fade" id="nav-exp" role="tabpanel" aria-labelledby="nav-academic-tab" tabindex="0">
                            
                            @if(!$exps->isEmpty())
                            <div class="row">
                            @foreach($exps as $each)
                            <div class="col-sm-12 col-md-4">
                            <div class="card">
                                <div class="card-body">
                            <p><b>Organisation: <br></b>{{ $each->organization }}</p>

                            <p><b>From: <br></b>{{ $each->from_date }}</p>

                            <p><b>To: <br></b>{{ $each->to_date == '0000-00-00' ? 'Till Now' : $each->to }}</p>

                            <p><b>Designation: <br></b> {{$each->designation }}</p>
                                </div>
                            </div>
                            </div>
                            @endforeach
                            </div>
                            @else
                            <p>Professional did not add experience yet !!</p>
                            @endif
                        </div>


                        <div class="tab-pane fade" id="nav-academic" role="tabpanel" aria-labelledby="nav-academic-tab" tabindex="0">
                            
                            @if(!$academics->isEmpty())
                            
                            <div class="row">
                            @foreach($academics as $each)
                            <div class="col-sm-12 col-md-4">
                            <div class="card">
                                <div class="card-body">
                            <p><b>Course: <br></b>{{ $each->course }}</p>
                            <p><b>Institute: <br></b>{{ $each->institute }}</p>
                            
                            @if($each->university != null)
                            <p><b>University/Board: <br></b>{{ $each->university }}</p>
                            @endif

                            <p><b>Year: <br></b>{{ $each->years}}</p>

                            <p><b>Percentage/CGPA: <br></b> {{$each->percentage }}</p>
                                </div>
                            </div>
                            </div>
                            @endforeach
                            </div>
                            @else

                            <p>Professional did not add experience yet !!</p>

                            @endif
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

