@extends('layouts.app_designers')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        <h4 class="mb-3">Business Settings</h4>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-2">Image Gallery</h6>
                    @if (count($result) < 16)
                        <p class="text-muted cborder-bottom">Change image gallery details related to your account
                        </p>
                        <hr class="mt-2">
                        <form action="{{ url('dashboard/designers/business-profile/image_submit/' . $id) }}"
                            enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                <label class="color-theme">Upload (Allow Multiple) <a href="javascript:void(0)"
                                        class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                @error('photos')
                                    <div style="padding: .5em!important;margin-bottom: .5em!important;"
                                        class="alert alert-danger col-lg-6" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <!--  <p class="meta-date-time">(Image Size should be 400*500)</p> -->
                                <label class="custom-file-container__custom-file">
                                    <input required="" name='photos[]' type="file"
                                        class="custom-file-container__custom-file__custom-file-input" multiple>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label>Short Description</label>
                                <textarea class="form-control" name="description" id="description" rows="4"
                                    placeholder="Enter description here..."></textarea>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-primary submit theme-btn">Add Images</button>
                            </div>
                        </form>
                    @else
                        <!--   <p class="text-muted cborder-bottom"></p><hr class="mt-2"> -->
                        <div class="alert alert-info" role="alert">
                            You can add not more than 16 files.
                        </div>
                    @endif
                </div> <!-- end card-body -->
            </div>
        </div> <!-- end col-->
    </div>


    @if (count($result) > 0)
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title mb-2">Images</h6>
                        <div class="row">
                            @foreach ($result as $images)
                                <div class="col-lg-6 col-xl-3 pt-0 pl-0 pr-0 mb-4">
                                    <!-- Simple card -->
                                    <div class="container mb-4 mb-xl-0">
                                        <img src="{{ url('uploads/business/' . $images->images) }}" style="height: 200px"
                                            class="image card-img-top" alt="...">
                                        <div class="middle">
                                            <div class="text">
                                                <a href="javascript:;" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit Description"
                                                    class="updateDescription" data-image_id="{{ $images->id }}"
                                                    data-id="{{ $id }}">
                                                    <i data-feather="edit" class="icon-info"></i>
                                                </a>

                                                <a href="{{ url('dashboard/designers/business-profile/image_delete/' . $id . '/' . $images->id) }}"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Delete Image">
                                                    <i data-feather="x-circle" class="icon-danger"></i>
                                                </a>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="container mb-4 mb-xl-0 mt-2">
                                        <p class="text-muted"> {{ $images->description }} </p>

                                    </div>
                                </div><!-- end col -->
                            @endforeach
                        </div>
                        <!-- end row -->
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
    @endif

    <div class="modal fade" id="editImageDescriptionModal" tabindex="-1" role="dialog"
        aria-labelledby="editImageDescriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editImageDescriptionModalLabel">Edit Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="form-group">
                            <input type="hidden" class="form-control" id="image_id" name="image_id">
                            <label for="image_description" class="control-label">Description:</label>
                            <textarea class="form-control" id="image_description" name="image_description" rows="6"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary theme-btn-secondary"
                        data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary theme-btn" id="updateImageDescriptionNow">Update
                        Now</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var root_path = "{{ URL::to('dashboard/designers') }}";
        var csrf_token = "{{ csrf_token() }}";
    </script>
@endsection
