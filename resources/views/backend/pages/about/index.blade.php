@extends('backend.layout.master')

@push('backendCss')
    <link href="{{asset('public/backend')}}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
          rel="stylesheet" type="text/css">

@endpush

@section('contents')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">About Section</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">About Section</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    {{--    Form Starts--}}
    @if(!$about)
        <form method="post" action="{{route('admin.abouts.store')}}" enctype="multipart/form-data">
            @else
                <form method="post" action="{{route('admin.abouts.update',$about->id)}}"
                      enctype="multipart/form-data">
                    @method('PUT')
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title text-center">About Section</h4>

                                </div>
                                <div class="card-body p-4">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div>
                                                <div class="mb-3">
                                                    <label for="about_title" class="form-label">Title *</label>
                                                    <input class="form-control" type="text" name="about_title"
                                                           placeholder="Enter Site Name"
                                                           id="about_title" value="{{$about->about_title ?? ''}}"
                                                           required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="short_desc1" class="form-label">Short Description 1</label>
                                                    <textarea id="short_desc1" name="short_desc1"
                                                              class="form-control">{{$about->short_desc1 ?? ''}}</textarea>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="short_desc2" class="form-label">Short Description 2</label>
                                                    <textarea id="short_desc2" name="short_desc2"
                                                              class="form-control">{{$about->short_desc2 ?? ''}}</textarea>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="learnmore_desc" class="form-label">Learn More Description</label>
                                                    <textarea id="learnmore_desc" name="learnmore_desc"
                                                              class="form-control">{{$about->learnmore_desc ?? ''}}</textarea>
                                                </div>

                                                
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mt-3 mt-lg-0">
                                            
                                                <div class="mb-3">
                                                    <label for="btn_text" class="form-label">Button Text</label>
                                                    <input class="form-control" name="btn_text" type="text"
                                                           id="btn_text" value="{{$about->btn_text ?? ''}}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="btn_link" class="form-label">Button Link</label>
                                                    <input class="form-control" name="btn_link" type="text"
                                                           id="btn_link" value="{{$about->btn_link ?? ''}}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="about_image1" class="form-label">About Image 1 (2048 × 753 px)</label>
                                                    <input class="form-control" name="about_image1" type="file"
                                                           id="about_image1" >
                                                    @if($about && $about->about_image1) 
                                                        <div class="mb-2">
                                                            <img src="{{asset($about->about_image1)}}" alt="" width="100" height="100">
                                                        </div>
                                                    @endif
                                                </div> 
                                                <div class="mb-3">
                                                    <label for="about_image2" class="form-label">About Image 2 (2048 × 753 px)</label>
                                                    <input class="form-control" name="about_image2" type="file"
                                                           id="about_image2" >
                                                    @if($about && $about->about_image2)
                                                        <div class="mb-2">
                                                            <img src="{{asset($about->about_image2)}}" alt="" width="100" height="100">
                                                        </div>
                                                    @endif
                                                </div>
                                                
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="text-center mt-4 d-grid">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- end col -->
                    </div>

                </form>

        @endsection

        @push('backendJs')


        @endpush