@extends('admin.layout.layout')







@push('style')
    <link href="{{ url('') }}/admin-assets/vendors/@coreui/icons/css/free.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">

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

                        

                    </div>
                @endif
                @if (Session::has('error_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">

                        <strong></strong> {{ Session::get('error_message') }}

                       
                    </div>
                @endif




                <div class="col-md-6 col-sm-12  mb-3">

                    <!-- Filter leads by assigned date -->

                    <div class="mt-2" id="reportrange"
                        style="background: #fff; cursor: pointer; padding: 5px 10px; border: 3px solid #0068ff; width: 100%">

                        <i class="fa fa-calendar"></i>&nbsp;

                        <span></span> <i class="fa fa-caret-down"></i>



                    </div>







                </div>



                <div class="d-flex justify-content-center">

                    <a class="btn btn-sm" href="{{ route('all.leads') }}"
                        style="text-align: center;text-decoration: none;color: white;background: green;">Gig details</a>

                </div>



                <div class="col-sm-12 col-lg-12">

                    <form action="{{ route('edit.gig.post') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $gig->gig_unique_id }}" name="gig_unique_id">
                        <div class="mb-3">
                            <label for="gigProfessional" class="form-label">Gig created by</label>
                            <input type="text" value="{{ $gig_professional->name }}" class="form-control"
                                id="gigProfessional" aria-describedby="gigProfessionalHelp" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="gigType" class="form-label">Gig status</label>
                            <select name="gig_type" id="gigType" class="form-control text-white {{ $gig->gig_type == 1 ? 'bg-success' : 'bg-info' }}">
                                <option value="1" {{ $gig->gig_type == 1 ? 'selected' : '' }} class="bg-success">  Service</option>
                                <option value="2" {{ $gig->gig_type == 2 ? 'selected' : '' }} class="bg-info"> Product</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gigTitle" class="form-label">Gig title</label>
                            <input type="text" name="gig_title" value="{{ $gig->gig_title }}" class="form-control"
                                id="gigTitle" aria-describedby="gigTitleHelp">
                        </div>
                        <div class="mb-3">
                            <label for="gigRating" class="form-label">Gig rating</label>
                            <input type="text" name="gig_rating" value="{{ $gig->gig_rating }}" class="form-control"
                                id="gigRating" aria-describedby="gigRatingHelp">
                        </div>
                        <div class="mb-3">
                            <label for="gigStatus" class="form-label">Gig status</label>
                            <select name="gig_status" id="gigStatus" class="form-control text-white {{ $gig->gig_status == 1 ? 'bg-success' : 'bg-danger' }}">
                                <option value="1" {{ $gig->gig_status == 1 ? 'selected' : '' }} class="bg-success">
                                    Active</option>
                                <option value="0" {{ $gig->gig_status == 0 ? 'selected' : '' }} class="bg-danger">
                                    In-active</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gigImage" class="form-label">Gig image</label>
                            <img src="{{ env('SITE_URL') . '/assets/files/' . $gig->gig_img }}" alt="image"
                                id="gigImage" style="width:80px;">
                        </div>
                        <div class="mb-3">
                            <label for="gig_desc" class="form-label">Gig description</label>
                            <textarea name="gig_desc" class="form-control" id="gig_desc" cols="30" rows="10">{{ $gig->gig_desc }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gig_price" class="form-label">Gig price</label>
                            <input type="text" name="gig_price" value="{{ $gig->gig_price }}" class="form-control"
                                id="gig_price">
                        </div>
                        <div class="mb-3">
                            <label for="gig_main_category" class="form-label">Gig main category</label>
                            <select class="form-select " name="gig_main_category" id="gig_main_category">
                                @foreach($main_categories as $main)
                                <option value="{{ $main->id }}" {{ $gig->gig_main_category == $main->id ? 'selected' : '' }} >{{ $main->service_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gig_sub_category" class="form-label">Gig sub category</label>
                            <select class="form-select " name="gig_sub_category" id="gig_sub_category">
                                @foreach($sub_categories as $sub)
                                <option value="{{ $sub->id }}" {{ $gig->gig_sub_category == $sub->id ? 'selected' : '' }}>{{ $sub->service_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="gig_technologies" class="form-label">Gig technologies</label>
                            <select class="form-select " name="gig_technologies[]" id="gig_technologies" multiple>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gig_tags" class="form-label">Gig tags</label>
                            <input type="text" name="gig_tags" class="form-control" value="{{$gig->gig_tags}}">
                            {{-- @foreach($tags_array as $tag)
                                <span class="rounded bg-secondary text-white pe-2 ps-2 pb-1 pt-1">{{ $tag }}</span>
                            @endforeach --}}
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>



                </div>



            </div>



        </div>

    </div>







@stop



<!-- Button trigger modal -->


@push('script')
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script>
        const gig_technologies = document.getElementById('gig_technologies');
       

        const technologies = new Choices(gig_technologies, {
            searchEnabled: true,
            removeItemButton: true
        });
        

        const gig_technologiesUrl = "{{ route('all_gig_technologies') }}";
       
        const preselectedTechnologies = "{{ $gig->gig_technologies }}".split(',');

        $.ajax({
            url: gig_technologiesUrl, // Replace with your actual route
            type: 'GET',
            data: "",
           
            success: function(data) {
                // Handle the received data and update your page accordingly
                let resp = data.main_categories;
                console.log(resp);
                if (Array.isArray(resp)) {

                    const technologyOptions = resp.map(skill => ({
                        value: skill.skill_id,
                        label: skill.skill_name,
                        selected: preselectedTechnologies.includes(skill.skill_id.toString())
                    }));

                    technologies.setChoices(technologyOptions, 'value', 'label', true);
                }

            },
            error: function(error) {
                // console.log('Error:', error);
            }
        });



        // $.ajax({
        //     url: subCategoriesUrl, // Replace with your actual route
        //     type: 'GET',
        //     data: "",
        //     // headers: {
        //     //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     // },
        //     success: function(data) {
        //         // Handle the received data and update your page accordingly
        //         let resp = data.sub_categories;
        //         console.log(resp);
        //         if (Array.isArray(resp)) {

        //             const subOptions = resp.map(city => ({
        //                 value: city.id,
        //                 label: city.service_name,
        //                 selected: city.id === {{ $gig->gig_sub_category }}
        //             }));
        //             subCategories.setChoices(subOptions, 'value', 'label', true);
        //         }

        //     },
        //     error: function(error) {
        //         // console.log('Error:', error);
        //     }
        // });
    </script>
@endpush
