@extends('admin.layout.layout')

@push('style')
<style>
    label{
        color: #f37d55;
    }
</style>
@endpush


@section('content')

    <div class="container">

        @if (Session::has('success_message'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <strong></strong> {{ Session::get('success_message') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

        @endif

        <div class="row justify-content-center">

            <div class="col-lg-10 col-md-10 col-sm-12">

                <form action="{{ route('store.services.page') }}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group mt-3 mb-2">

                        <label for="#page_title">Page Title</label>

                        <input class="form-control" type="text" id="page_title"

                            placeholder="Enter page title to be shown on banner  " name="page_title">

                    </div>



                    <div class="form-group mt-3 mb-2">

                        <label for="#heading">Heading</label>

                        <input class="form-control" type="text" id="heading"

                            placeholder="Enter 1st section heading " name="heading">

                    </div>



                    {{-- Thumbnail image  --}}
                    <div class="form-group mt-3 mb-2">

                        <label for="#banner_image">CDN link of thumbnail image</label>

                        {{-- <input class="form-control" type="file" id="thumb_image" placeholder="" name="thumb_image"> --}}
                        <input class="form-control" type="text" id="thumb_image" placeholder="" name="thumb_image">


                    </div>



                    <div class="form-group mt-3 mb-2">

                        <label for="#banner_image">CDN link of  banner image</label>

                        {{-- <input class="form-control" type="file" id="banner_image" placeholder="" name="banner_image"> --}}
                        <input class="form-control" type="text" id="banner_image" placeholder="" name="banner_image">


                    </div>



                    <div class="form-group mt-3 mb-2">

                        <label for="#contentarea">Content</label>

                        <textarea class="form-control" type="text" id="contentarea" placeholder="" name="contentarea"></textarea>

                    </div>



                    <div class="form-group mt-3 mb-2">

                        <label for="#content_image">CDN link of  content image</label>

                        {{-- <input class="form-control" type="file" id="content_image" placeholder="" name="content_image"> --}}
                        <input class="form-control" type="text" id="content_image" placeholder="" name="content_image">


                    </div>

                    {{-- Service Name as in db API  --}}
                    {{-- <div class="form-group mt-3 mb-2">

                        <label for="#service_name">Service Name</label>

                        <input class="form-control" type="text" id="service_name"

                            placeholder="Enter service name as in API" name="service_name">

                    </div> --}}

                    {{-- Service id as in db API  --}}
                    {{-- <div class="form-group mt-3 mb-2">

                        <label for="#service_id">Service Id</label>

                        <input class="form-control" type="text" id="service_id"

                            placeholder="Enter service id as in API" name="service_id">

                    </div> --}}

                    <div class="form-group mt-3 mb-2">

                        <label for="#service_category">Page Category</label>                        

                        <select class="form-control" name="service_category" id="">
                            <option value="">Select Category</option>
                            @foreach($categories as $single)
                            <option value="{{ $single->id }}">{{ $single->category }}</option>
                            @endforeach

                        </select>

                    </div>

                    {{-- ADD HERE SERVICES WITH IDS  --}}
                    <div class="form-group mt-3 mb-2">

                        <label for="#service_category">Select Service (under which this page will come*)</label>

                        {{-- <input class="form-control" type="text" id="service_category"

                            placeholder="Enter service category" name="service_category" value="{{ $pageId->service_category }}"> --}}

                            <select class="form-control" name="service_id" id="">
                                <option value="">Select Category</option>
                                @foreach($services as $single)
                                <option value="{{ $single->id }}" >{{ $single->service_name }}</option>
                                @endforeach
    
                            </select>

                    </div>


                    <div class="form-group mt-3 mb-2">

                        <label for="#meta_title">meta_title</label>

                        <input class="form-control" type="text" id="meta_title"

                            placeholder="Enter meta title here" name="meta_title">

                    </div>



                    <div class="form-group mt-3 mb-2">

                        <label for="#meta_description">meta_description</label>

                        <input class="form-control" type="text" id="meta_description"

                            placeholder="Enter meta description here" name="meta_description">

                    </div>



                    <div class="form-group mt-3 mb-2">

                        <label for="#meta_keywords">meta_keywords</label>

                        <input class="form-control" type="text" id="meta_keywords"

                            placeholder="Enter meta keywords here" name="meta_keywords">

                    </div>

                    <div class="form-group mt-3 mb-2">                       
                        <label for="#page_status">Page Status</label>

                        <select class="form-control" name="status" id="page_status">                           
                           <option value="">Select option</option>
                            <option value="0">Draft</option>
                            <option value="1">Active</option>

                        </select>

                    </div>





                    <div class="form-group mt-3 mb-2  d-flex justify-content-end">



                        <button id="save_btn" type="submit" class="btn btn-sm btn-success">Save</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@stop







@push('script')

    <script>

        tinymce.init({

            selector: 'textarea#contentarea',

            height: 600

        });

    </script>

@endpush

