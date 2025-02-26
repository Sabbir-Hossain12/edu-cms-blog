@extends('backend.layout.master')

@push('backendCss')
    {{--    <meta name="csrf_token" content="{{ csrf_token() }}" />--}}

    <link href="{{asset('backend')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
          rel="stylesheet" type="text/css">
    <link href="{{asset('backend')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
          rel="stylesheet" type="text/css">

@endpush

@section('contents')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Academic Categories</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Academic Categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- Table Starts--}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Academic Categories List</h4>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAdminModal">
                                Add News
                            </button>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0  nowrap w-100 dataTable no-footer dtr-inline" id="adminTable">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

    {{--    Table Ends--}}

    {{--    Create Categories Modal--}}
    <div class="modal fade" id="createAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Academics Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="form" id="createAdmin">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="col-form-label">Category Title *</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Category Thumbnail (2048 × 1366 px) *</label>
                            <input type="file" class="form-control" id="thumbnail_img" name="thumbnail_img" required>
                        </div>
                        <div class="mb-3">
                            <label for="main_img" class="col-form-label">Main Image</label>
                            <input type="file" class="form-control" id="main_img" name="main_img">
                        </div>
                        
                        <div class="mb-3">
                            <label for="short_desc" class="col-form-label">Short Description *</label>
                            <textarea type="text" class="form-control" name="short_desc" id="short_desc" required></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="long_desc" class="col-form-label">Long Description</label>
                            <textarea type="text" class="form-control" name="long_desc" id="long_desc"></textarea>
                        </div>
                        

                        <div class="mb-3">
                            <label for="link" class="col-form-label">Link</label>
                            <input type="text" class="form-control" id="link" name="link" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="status" class="col-form-label">Status</label>
                            <select name="status" id="status" class="form-control d-block">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--    Edit Categories Modal--}}
    <div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit News</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="form2" id="editAdmin">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="etitle" class="col-form-label">Title *</label>
                            <input type="text" class="form-control" id="etitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="ethumbnail_img" class="col-form-label">Category Thumbnail (2048 × 1366 px) *</label>
                            <input type="file" class="form-control" id="ethumbnail_img" name="thumbnail_img">
                            <div id="thumbnailPreview">

                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="emain_img" class="col-form-label">Main Image</label>
                            <input type="file" class="form-control" id="emain_img" name="main_img">
                            <div id="mainImgPreview">

                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="eshort_desc" class="col-form-label">Short Description *</label>
                            <textarea type="text" class="form-control" name="short_desc" id="eshort_desc" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="elong_desc" class="col-form-label">Long Description *</label>
                            <textarea type="text" class="form-control" name="long_desc" id="elong_desc"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="link" class="col-form-label">Video Link</label>
                            <input type="text" class="form-control" id="elink" name="link" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="estatus" class="col-form-label">Status</label>
                            <select name="status" id="estatus" class="form-control d-block">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        
                        <input id="id" type="number" hidden>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('backendJs')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('backend')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js')}}"></script>
    <script>

        $(document).ready(function () {
            //  CKEditor on Create
            let jReq;
            ClassicEditor
                .create(document.querySelector('#long_desc'),{

                    ckfinder:
                        {
                            {{--uploadUrl: "{{route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}",--}}
                        }


                })
                .then(newEditor => {
                    jReq = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });

            //  CKEditor on Create
            let jReq2;
            ClassicEditor
                .create(document.querySelector('#elong_desc'),{

                    ckfinder:
                        {
                            {{--uploadUrl: "{{route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}",--}}
                        }


                })
                .then(newEditor => {
                    jReq2 = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });



            var token = $("input[name='_token']").val();

            //Show Data through Datatable 
            let adminTable = $('#adminTable').DataTable({
                order: [
                    [0, 'asc']
                ],
                processing: true,
                serverSide: true,
                {{--ajax: "{{url('/admin/data')}}",--}}
                ajax: "{{route('admin.academic-categories.index')}}",
                // pageLength: 30,

                columns: [
                    {
                        data: 'id',


                    },
                    {
                        data: 'thumbnail_img',
                        render: function (data) {
                            return '<img class="img-thumbnail" src="{{asset('')}}' + data + '" width="100px" height="100px"/>';
                        }

                    },
                    {
                        data: 'title',

                    },
                   
                    {
                        data: 'status',
                        name: 'Status',
                        orderable: false,
                        searchable: false,
                    },

                    {
                        data: 'action',
                        name: 'Actions',
                        orderable: false,
                        searchable: false
                    },

                ]
            });


            // Create Admin
            $('#createAdmin').submit(function (e) {
                e.preventDefault();

                let long_desc= jReq.getData();
                let formData = new FormData(this);
                formData.append('long_desc', long_desc);
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.academic-categories.store') }}",
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        if (res.message === 'success') {
                            $('#createAdminModal').modal('hide');
                            $('#createAdmin')[0].reset();
                            adminTable.ajax.reload()
                            swal.fire({
                                title: "Success",
                                text: "Academics Category Added !",
                                icon: "success"
                            })


                        }
                    },
                    error: function (err) {
                        console.error('Error:', err);
                        swal.fire({
                            title: "Failed",
                            text: "Something Went Wrong !",
                            icon: "error"
                        })
                        // Optionally, handle error behavior like showing an error message
                    }
                });
            });

            // Read Admin Data
            $(document).on('click', '.editButton', function () {
                let id = $(this).data('id');
                $('#id').val(id);

                $.ajax(
                    {
                        type: "GET",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('admin/academic-categories') }}/" + id + "/edit",
                        data: {
                            id: id
                        },

                        processData: false,  // Prevent jQuery from processing the data
                        contentType: false,  // Prevent jQuery from setting contentType
                        success: function (res) {
                            
                            $('#etitle').val(res.data.title);
                            $('#eshort_desc').val(res.data.short_desc);

                            jReq2.setData(res.data.long_desc);
                            // $('#elong_desc').val(res.data.long_desc);
                            $('#elink').val(res.data.link);
                            $('#ecategory_name').val(res.data.category_name);
                            $('#estatus').val(res.data.status);
                            
                            $('#thumbnailPreview').empty();
                            $('#thumbnailPreview').append('<img src="{{asset('')}}' + res.data.thumbnail_img + '" width="100px" height="100px"/>');
                           
                            $('#mainImgPreview').empty();
                            $('#mainImgPreview').append('<img src="{{asset('')}}' + res.data.main_img + '" width="100px" height="100px"/>');
                            
                            $('#videoThumbnailPreview').empty();
                            $('#videoThumbnailPreview').append('<img src="{{asset('')}}' + res.data.video_thumbnail_img + '" width="100px" height="100px"/>');
                           
                          
                        },
                        error: function (err) {
                            console.log('failed')
                        }
                    }
                )
            })

            // Edit Admin Data
            $('#editAdmin').submit(function (e) {
                e.preventDefault();
                let id = $('#id').val();
                
                let long_desc=jReq2.getData(); 
                let formData = new FormData(this);
                formData.append('long_desc',long_desc);

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/academic-categories') }}/" + id,
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        if (res.message === 'success') {
                            $('#editAdminModal').modal('hide');
                            $('#editAdmin')[0].reset();
                            adminTable.ajax.reload()
                            swal.fire({
                                title: "Success",
                                text: "Academics Category Edited !",
                                icon: "success"
                            })


                        }
                    },
                    error: function (err) {
                        console.error('Error:', err);
                        swal.fire({
                            title: "Failed",
                            text: "Something Went Wrong !",
                            icon: "error"
                        })
                        // Optionally, handle error behavior like showing an error message
                    }
                });
            });


            // Delete Admin
            $(document).on('click', '#deleteAdminBtn', function () {
                let id = $(this).data('id');

                swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this !",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                })
                    .then((result) => {
                        if (result.isConfirmed) {


                            $.ajax({
                                type: 'DELETE',

                                url: "{{ url('admin/academic-categories') }}/" + id,
                                data: {
                                    '_token': token
                                },
                                success: function (res) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "News has been deleted.",
                                        icon: "success"
                                    });

                                    adminTable.ajax.reload();
                                },
                                error: function (err) {
                                    console.log('error')
                                }
                            })


                        } else {
                            swal.fire('Your Data is Safe');
                        }

                    })


            })

            // Change Admin Status
            $(document).on('click', '#adminStatus', function () {
                let id = $(this).data('id');
                let status = $(this).data('status')
                console.log(id + status)
                $.ajax(
                    {
                        type: 'post',
                        url: "{{route('admin.academic-categories.status')}}",
                        data: {
                            '_token': token,
                            id: id,
                            status: status

                        },
                        success: function (res) {
                            adminTable.ajax.reload();

                            if (res.status == 1) {

                                swal.fire(
                                    {
                                        title: 'Status Changed to Active',
                                        icon: 'success'
                                    })
                            } else {
                                swal.fire(
                                    {
                                        title: 'Status Changed to Inactive',
                                        icon: 'success'
                                    })

                            }
                        },
                        error: function (err) {
                            console.log(err)
                        }
                    }
                )
            })
        });
    </script>

@endpush