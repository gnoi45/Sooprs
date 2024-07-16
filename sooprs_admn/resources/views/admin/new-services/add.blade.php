@extends('admin.layout.layout')

@push('style')
    <link href="{{ url('') }}/admin-assets/vendors/@coreui/icons/css/free.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

    <style>
        .hidden {
            display: none;
        }
    </style>
@endpush


@section('content')

    <div class="body flex-grow-1 px-3">

        <div id="success-message" class="d-none alert alert-success"></div>

        <div class="container-lg">

            <div class="row">

                <div class="col-sm-12 col-md-12">

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            <strong></strong> {{ Session::get('success') }}

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">

                            <strong></strong> {{ Session::get('error') }}

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>
                    @endif


                </div>

                <div class="co-md-12">
                    <h3>Add Details</h3>
                    <form action="{{ route('post.new.service') }}" method="post">

                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mt-2 mb-2">
                                    <label for="#ser_st">Category ID</label>

                                    <select class="form-control" name="cat_id" id="">
                                        <option value="0">Select Category</option>
                                        @foreach ($allServices as $item)
                                            <option value="{{ $item->id }}">{{ $item->service_name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-2 mb-2">
                                    <label for="#ser_st">Service name</label>

                                    <input type="text" class="form-control" name="service_name" id="service_name">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-2 mb-2">
                                    <label for="#ser_st">Service slug</label>

                                    <input type="text" class="form-control" name="service_slug" id="service_slug">

                                </div>
                            </div>

                            {{-- <div class="col-md-12">
                                <div class="form-group mt-2 mb-2">
                                    <label for="#ser_st">Service description</label>

                                    <textarea name="service_desc" class="form-control" id="ser_st" cols="30" rows="10"></textarea>

                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="form-group mt-2 mb-2">
                                    <label for="#ser_st">Service description</label>

                                    <textarea name="service_desc" class="full-featured-non-premium"></textarea>

                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group mt-2 mb-2">
                                    <label for="#ser_st">Service background image</label>

                                    {{-- <input type="file" class="form-control" name="service_bg_img"> --}}
                                    <input type="text" class="form-control" name="service_bg_img">


                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-2 mb-2">
                                    <label for="#ser_st">Meta Title</label>

                                    <input type="text" class="form-control" name="meta_title">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-2 mb-2">
                                    <label for="#ser_st">Meta description</label>

                                    <input type="text" class="form-control" name="meta_description">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-2 mb-2">
                                    <label for="#ser_st">Meta keywords</label>

                                    <input type="text" class="form-control" name="meta_keywords">

                                </div>
                            </div>

                            {{-- <div class="col-md-12">
                                <div class="form-group mt-3 mb-2">
                                    <label for="#services">Services under this Category on Home Page</label>
                                    <select class="selectpicker form-control" multiple data-live-search="true" id="services" name="sr_home[]" required>
                                       
                                        @foreach($allChildServices as $one)

                                        <option value="{{ $one->id }}">{{ $one->service_name }}</option>

                                       @endforeach


                                       
                                      </select>
                                </div>
                            </div> --}}

                            <div class="col-md-12">
                                <div class="form-group mt-2 mb-2">

                                    <label for="#ser_st">Activate this service ?</label>
                                    <select class="form-control" name="status" id="ser_st">
                                        <option value="1">Publish</option>
                                        <option value="0">Draft</option>
                                    </select>

                                </div>
                            </div>
                        </div>





                        <button type="submit" class="btn button-21">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop


















@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

    <script>
        document.getElementById('service_name').addEventListener('input', function() {
            var title = this.value;
            var slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
            document.getElementById('service_slug').value = slug;
        });

        $(document).ready(function() {



        $('select').selectpicker();



        });
    </script>

    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea.full-featured-non-premium',
            branding:false,
            promotion: false,
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: "30s",
            autosave_prefix: "{path}{query}-{id}-",
            autosave_restore_when_empty: false,
            autosave_retention: "2m",
            image_advtab: true,
            content_css: '//www.tiny.cloud/css/codepen.min.css',
            link_list: [{
                    title: 'My page 1',
                    value: 'http://www.tinymce.com'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.moxiecode.com'
                }
            ],
            image_list: [{
                    title: 'My page 1',
                    value: 'http://www.tinymce.com'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.moxiecode.com'
                }
            ],
            image_class_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'Some class',
                    value: 'class-name'
                }
            ],
            importcss_append: true,
            file_picker_callback: function(callback, value, meta) {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', {
                        text: 'My text'
                    });
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', {
                        alt: 'My alt text'
                    });
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', {
                        source2: 'alt.ogg',
                        poster: 'https://www.google.com/logos/google.jpg'
                    });
                }
            },
            templates: [{
                    title: 'New Table',
                    description: 'creates a new table',
                    content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
                },
                {
                    title: 'Starting my story',
                    description: 'A cure for writers block',
                    content: 'Once upon a time...'
                },
                {
                    title: 'New list with dates',
                    description: 'New List with dates',
                    content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
                }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 320,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: "mceNonEditable",
            toolbar_mode: 'sliding',
            contextmenu: "link image imagetools table",
        });
    </script>
@endpush
