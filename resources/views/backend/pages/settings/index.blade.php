@extends('backend.layout.master')

@push('backendCss')
    <link href="{{asset('public/backend')}}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
          rel="stylesheet" type="text/css">

@endpush

@section('contents')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Basic Info</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Basic-info</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    {{--    Form Starts--}}
    @if(!$setting)
        <form method="post" action="{{route('admin.settings.store')}}" enctype="multipart/form-data">
            @else
                <form method="post" action="{{route('admin.settings.update',$setting->id)}}"
                      enctype="multipart/form-data">
                    @method('PUT')
                    @endif
                    @csrf
                    <div class="row">
                        @if(Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                {{Session::get('error_message')}}
                            </div>
                        @endif
                        @if(Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{Session::get('success_message')}}
                            </div>
                        @endif
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title text-center">Website Basic Information</h4>

                                </div>
                                <div class="card-body p-4">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div>
                                                <div class="mb-3">
                                                    <label for="site_name" class="form-label">Website Name</label>
                                                    <input class="form-control" type="text" name="site_name"
                                                           placeholder="Enter Site Name"
                                                           id="site_name" value="{{$setting->site_name ?? ''}}" required>
                                                </div>
                                                
{{--                                                <div class="mb-3">--}}
{{--                                                    <label for="logo" class="form-label">Black Logo</label>--}}
{{--                                                    <input oninput="bLogoImgPrev.src=window.URL.createObjectURL(this.files[0])"--}}
{{--                                                           class="form-control" type="file" name="black_logo"--}}
{{--                                                           id="logo">--}}
{{--                                                    <img id="bLogoImgPrev" class="mt-1"--}}
{{--                                                         src=""--}}
{{--                                                         height="60px" width="200px" alt=""/>--}}
{{--                                                </div>--}}

                                                <div class="mb-3">
                                                    <label for="mail" class="form-label">Email</label>
                                                    <input class="form-control" type="email" name="mail"
                                                           placeholder="xyz@gmail.com"
                                                           id="mail" value="{{$setting->mail ?? ''}}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="phone_1" class="form-label">Phone 1</label>
                                                    <input class="form-control" name="phone_1" type="text"
                                                           placeholder="Enter Store Phone Number"
                                                           id="phone_1" value="{{$setting->phone_1 ?? ''}}">
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="fb_link" class="form-label">Facebook link</label>
                                                    <input class="form-control" name="fb_link" type="text"
                                                           placeholder="Enter Store Phone Number"
                                                           id="fb_link" value="{{$setting->fb_link ?? ''}}">
                                                </div>
                                                
                                                
                                                <div class="mb-3">
                                                    <label for="p_link" class="form-label">Pinterest link</label>
                                                    <input class="form-control" name="p_link" type="text"
                                                           placeholder="Enter Store Phone Number"
                                                           id="p_link" value="{{$setting->p_link ?? ''}}">
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mt-3 mt-lg-0">
{{--                                                <div class="mb-3">--}}
{{--                                                    <label for="logo" class="form-label">Light Logo</label>--}}
{{--                                                    <input oninput="wLogoImgPrev.src=window.URL.createObjectURL(this.files[0])"--}}
{{--                                                           class="form-control" type="file" name="light_logo"--}}
{{--                                                           id="logo">--}}
{{--                                                    <img id="wLogoImgPrev" class="mt-1"--}}
{{--                                                         src=""--}}
{{--                                                         height="60px" width="200px" alt=""/>--}}
{{--                                                </div>--}}
                                                <div class="mb-3">
                                                    <label for="youtube_link" class="form-label">Youtube Link</label>
                                                    <input class="form-control" name="youtube_link" type="text"
                                                           placeholder="Enter Store Phone Number"
                                                           id="youtube_link" value="{{$setting->youtube_link ?? ''}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="insta_link" class="form-label">Instagram Link</label>
                                                    <input class="form-control" name="insta_link" type="text"
                                                           placeholder="Enter Store Phone Number"
                                                           id="insta_link" value="{{$setting->insta_link ?? ''}}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="twitter_link" class="form-label">Twitter Link</label>
                                                    <input class="form-control" name="twitter_link" type="text"
                                                           placeholder="Enter Twitter Link"
                                                           id="twitter_link" value="{{$setting->twitter_link ?? ''}}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="itunes_link" class="form-label">iTunes Link</label>
                                                    <input class="form-control" name="itunes_link" type="text"
                                                           placeholder="Enter iTunes Link"
                                                           id="itunes_link" value="{{$setting->itunes_link ?? ''}}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="linkedin_link" class="form-label">LinkedIn Link</label>
                                                    <input class="form-control" name="linkedin_link" type="text"
                                                           placeholder="Enter iTunes Link"
                                                           id="linkedin_link" value="{{$setting->linkedin_link ?? ''}}">
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
                                <div class="card-header">
                                    <h4 class="card-title text-center">Meta Information</h4>

                                </div>


                                <div class="card-body p-4">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div>
                                                <div class="mb-3">
                                                    <label for="meta_title" class="form-label">Meta Title</label>
                                                    <input type="text" id="meta_title" class="form-control"
                                                              name="meta_title" value="{{$setting->meta_title ?? ''}}">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="mb-3">
                                                    <label for="meta_desc" class="form-label">Meta Description</label>
                                                    <textarea id="meta_desc" name="meta_desc"
                                                              class="form-control">{{$setting->meta_desc ?? ''}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mt-3 mt-lg-0">
                                                <div class="mb-3">
                                                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                                    <textarea id="meta_keywords" class="form-control"
                                                              name="meta_keywords">{{$setting->meta_keywords ?? ''}}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="meta_img" class="form-label">Meta Images</label>
                                                   <input type="file" class="form-control" id="meta_img" name="meta_img">
                                                    @if($setting && $setting->meta_img)
                                                        <div class="mt-2">
                                                            <img src="{{asset($setting->meta_img)}}" width="140" height="100"/>
                                                        </div>
                                                    @endif
                                                </div>


                                            </div>
                                        </div>
                                    </div>
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