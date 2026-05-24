@extends('layouts.front')

@section('content')


    <div class="crafmen-detail-banner"></div>

    <section class="customer-logos slider" style="margin-bottom:0px;">

        @if (!$image_gallery->isEmpty())
            @foreach ($image_gallery as $image)
                <div class="slide"><img src="{{ asset('uploads/business/') . '/' . $image->images }}"></div>
            @endforeach
        @else
            <div class="slide"><img src="{{ asset('front/images/craftmen/slid2.jpg') }}"></div>
            <div class="slide"><img src="{{ asset('front/images/craftmen/slid3.jpg') }}"></div>
            <div class="slide"><img src="{{ asset('front/images/craftmen/slid4.jpg') }}"></div>
            <div class="slide"><img src="{{ asset('front/images/craftmen/slid2.jpg') }}"></div>
        @endif
    </section>

    <section class="craftmen-main-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="crafmen-img">
                        <img src="{{ asset('front/images/craftmen/profile-img-01.jpg') }}">
                    </div>
                </div>
                <div class="col-sm-6 user_details">
                    <div class="bread_menu">
                        <p><a href="index.php"> Home </a> <i class="fal fa-angle-right" aria-hidden="true"></i> Carpenter &
                            Handyman </p>
                    </div>
                    <div class="user_name_details">
                        <h2 class="mb-3"> {{ $user->name }} </h2>
                        <h6 class="mb-0" style="color: #646e7b;"> Work in {{ $b_details ? $b_details->work_in : '' }}
                        </h6>
                    </div>

                    <div>
                        <ul class="craftmen-ul">
                            <li class="">
                                <div class="d-flex" style="position: relative;top: 14px;">
                                    <div class="progress blue"> <span class="progress-left"> <span
                                                class="progress-bar"></span> </span> <span class="progress-right"> <span
                                                class="progress-bar"></span> </span>
                                        <div class="progress-value">0.0</div>
                                    </div>
                                    <p class="mb-0 align-self-center ml-2"> Ratings </p>
                                </div>
                            </li>
                            <li> <a href="#"> <i class="fal fa-pencil-square-o" aria-hidden="true"></i> Write a Review
                                </a> </li>
                            <li> <a href="#" style="text-decoration: none;"> <i class="fal fa-share-alt"
                                        aria-hidden="true"></i> Share </a> </li>
                            <li> <a href="#" style="text-decoration: none;"> <i class="fal fa-heart"
                                        aria-hidden="true"></i> Save </a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 rate_details text-center align-self-center">
                    <h1 class="mb-0"> Rs. {{ $b_details ? $b_details->per_day_fee : '' }}/- </h1>
                    <p> Per Day 8 Hour </p>
                    <button class="craftmen-btn" data-toggle="modal" data-target="#exampleModalCenter"> Contact Now
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="p-0 border-bottom">
        <div class="container mt-2 py-4">
            <div class="row user_work_box">
                <div class="col-sm-3 mb-3">
                    <div class="d-flex align-self-center">
                        <div class="craftmen-icons-box">
                            <img src="{{ asset('front/images/craftmen/briefcase.png') }}" alt="">
                        </div>
                        <div class="ml-4 uer_info_boxes">
                            <h2 class="mb-0 clr-7b"> {{ $b_details ? $b_details->experience : '' }}+ </h2>
                            <p class="mb-0 clr-7b"> Work Experience </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="d-flex align-self-center">
                        <div class="craftmen-icons-box">
                            <img src="{{ asset('front/images/craftmen/users.png') }}" alt="">
                        </div>
                        <div class="ml-4 uer_info_boxes">
                            <h2 class="mb-0 clr-7b"> {{ $b_details ? $b_details->team_size : '' }}+ </h2>
                            <p class="mb-0 clr-7b"> Team Member </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="d-flex align-self-center">
                        <div class="craftmen-icons-box">
                            <img src="{{ asset('front/images/craftmen/trophy.png') }}" alt="">
                        </div>
                        <div class="ml-4 uer_info_boxes">
                            <h2 class="mb-0 clr-7b"> {{ $b_details ? $b_details->job_done : '' }}+ </h2>
                            <p class="mb-0 clr-7b"> Overall Job Done </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="d-flex align-self-center">
                        <div class="craftmen-icons-box">
                            <img src="{{ asset('front/images/craftmen/smile.png') }}" alt="">
                        </div>
                        <div class="ml-4 uer_info_boxes">
                            <h2 class="mb-0 clr-7b"> 2000+ </h2>
                            <p class="mb-0 clr-7b"> Happy Clients </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bottom-bg">
        <div class="container">
            <div class="row ">
                <div class="col-sm-7 pt-5 user_about_box">
                    <h6> About {{ $user->name }} </h6>
                    <p> {{ $user->biographical_info }}</p>

                    <h6> What I Design? </h6>
                    <div class="row mb-4">
                        @if ($skills && count($skills) > 0)
                            @foreach ($skills as $skill)
                                <div class="col-sm-4 craftmen-design-box"> <img
                                        src="{{ asset('front/images/craftmen/craftmen-icon-01.jpg') }}"> <span>
                                        {{ $skill }} </span> </div>
                            @endforeach
                        @else
                            <div class="col-sm-4 craftmen-design-box"> <img
                                    src="{{ asset('front/images/craftmen/craftmen-icon-01.jpg') }}"> <span> Dining Table
                                </span> </div>
                            <div class="col-sm-4 craftmen-design-box"> <img
                                    src="{{ asset('front/images/craftmen/craftmen-icon-01.jpg') }}"> <span> Dressing Table
                                </span> </div>
                            <div class="col-sm-4 craftmen-design-box"> <img
                                    src="{{ asset('front/images/craftmen/craftmen-icon-01.jpg') }}"> <span> Wooden Almirah
                                </span> </div>
                            <div class="col-sm-4 craftmen-design-box"> <img
                                    src="{{ asset('front/images/craftmen/craftmen-icon-01.jpg') }}"> <span> Wooden Chair
                                </span> </div>
                            <div class="col-sm-4 craftmen-design-box"> <img
                                    src="{{ asset('front/images/craftmen/craftmen-icon-01.jpg') }}"> <span> Wooden Sofa
                                    Set </span> </div>
                        @endif
                    </div>

                    <h6> Gallery </h6>
                    <div class="row mb-5">
                        @if (!$image_gallery->isEmpty())
                            @foreach ($image_gallery as $image)
                                <div class="gallery_box">
                                    <a href="{{ asset('uploads/business/') . '/' . $image->images }}" data-toggle="lightbox"
                                        data-gallery="gallery">
                                        <img src="{{ asset('uploads/business/') . '/' . $image->images }}">
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="gallery_box">
                                <a href="images/list2.png" data-toggle="lightbox" data-gallery="gallery">
                                    <img src="{{ asset('front/images/craftmen/01.jpg') }}">
                                </a>
                            </div>
                            <div class="gallery_box">
                                <a href="images/craftmen/02.jpg" data-toggle="lightbox" data-gallery="gallery">
                                    <img src="{{ asset('front/images/craftmen/02.jpg') }}">
                                </a>
                            </div>
                            <div class="gallery_box">
                                <a href="images/craftmen/03.jpg" data-toggle="lightbox" data-gallery="gallery">
                                    <img src="{{ asset('front/images/craftmen/03.jpg') }}">
                                </a>
                            </div>
                            <div class="gallery_box">
                                <a href="images/craftmen/04.jpg" data-toggle="lightbox" data-gallery="gallery">
                                    <img src="{{ asset('front/images/craftmen/04.jpg') }}">
                                </a>
                            </div>
                            <div class="gallery_box">
                                <a href="images/craftmen/04.jpg" data-toggle="lightbox" data-gallery="gallery">
                                    <img src="{{ asset('front/images/craftmen/04.jpg') }}">
                                </a>
                            </div>
                            <div class="gallery_box">
                                <a href="images/craftmen/03.jpg" data-toggle="lightbox" data-gallery="gallery">
                                    <img src="{{ asset('front/images/craftmen/03.jpg') }}">
                                </a>
                            </div>
                            <div class="gallery_box">
                                <a href="images/craftmen/02.jpg" data-toggle="lightbox" data-gallery="gallery">
                                    <img src="{{ asset('front/images/craftmen/02.jpg') }}">
                                </a>
                            </div>
                            <div class="gallery_box">
                                <a href="images/craftmen/01.jpg" data-toggle="lightbox" data-gallery="gallery">
                                    <img src="{{ asset('front/images/craftmen/01.jpg') }}">
                                </a>
                            </div>
                        @endif
                    </div>

                    <h6> Reviews(12) </h6>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card border-0 ">
                                <div class="card-body border-bottom">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{ asset('front/images/craftmen/user-img.png') }}"
                                                class="img img-rounded img-fluid" />

                                        </div>
                                        <div class="col-md-10">
                                            <p>
                                                <a class="float-left review-updated"><strong>Kathy Brown</strong> <br>
                                                    <span> June 2020 </span></a>

                                                <span class="float-right"><i class="text-warning fas fa-star"></i></span>
                                                <span class="float-right"><i class="text-warning fas fa-star"></i></span>
                                                <span class="float-right"><i class="text-warning fas fa-star"></i></span>
                                                <span class="float-right"><i class="text-warning fas fa-star"></i></span>
                                                <span class="float-right"><i class="text-warning fas fa-star"></i></span>

                                            </p>
                                            <div class="clearfix"></div>
                                            <p class="clr-000">Lorem Ipsum is simply dummy text of the pr make but also the
                                                leap into electronic typesetting, remaining essentially unchanged.</p>
                                            <p>
                                                <a class="btn-review ml-2"> <i class="fal fa-thumbs-up"
                                                        aria-hidden="true"></i> &nbsp; Helpful review &nbsp; | &nbsp;
                                                    <span> 12 </span> </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card border-0 ">
                                <div class="card-body border-bottom">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{ asset('front/images/craftmen/user-img.png') }}"
                                                class="img img-rounded img-fluid" />

                                        </div>
                                        <div class="col-md-10">
                                            <p>
                                                <a class="float-left review-updated"><strong>Kathy Brown</strong> <br>
                                                    <span> June 2020 </span></a>

                                                <span class="float-right"><i class="text-warning fas fa-star"></i></span>
                                                <span class="float-right"><i class="text-warning fas fa-star"></i></span>
                                                <span class="float-right"><i class="text-warning fas fa-star"></i></span>
                                                <span class="float-right"><i class="text-warning fas fa-star"></i></span>
                                                <span class="float-right"><i class="text-warning fas fa-star"></i></span>

                                            </p>
                                            <div class="clearfix"></div>
                                            <p class="clr-000">Lorem Ipsum is simply dummy text of the pr make but also the
                                                leap into electronic typesetting, remaining essentially unchanged.</p>
                                            <p>
                                                <a class="btn-review ml-2"> <i class="fal fa-thumbs-up"
                                                        aria-hidden="true"></i> &nbsp; Helpful review &nbsp; | &nbsp;
                                                    <span> 12 </span> </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card border-0 ">
                                <div class="card-body border-bottom">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{ asset('front/images/craftmen/user-img.png') }}"
                                                class="img img-rounded img-fluid" />

                                        </div>
                                        <div class="col-md-10">
                                            <p>
                                                <a class="float-left review-updated"><strong>Kathy Brown</strong> <br>
                                                    <span> June 2020 </span></a>
                                                <span class="float-right"><i class="text-warning fas fa-star"></i></span>
                                                <span class="float-right"><i class="text-warning fas fa-star"></i></span>
                                                <span class="float-right"><i class="text-warning fas fa-star"></i></span>
                                                <span class="float-right"><i class="text-warning fas fa-star"></i></span>
                                                <span class="float-right"><i class="text-warning fas fa-star"></i></span>

                                            </p>
                                            <div class="clearfix"></div>
                                            <p class="clr-000">Lorem Ipsum is simply dummy text of the pr make but also the
                                                leap into electronic typesetting, remaining essentially unchanged. </p>
                                            <p>
                                                <a class="btn-review ml-2"> <i class="fal fa-thumbs-up"
                                                        aria-hidden="true"></i> &nbsp; Helpful review &nbsp; | &nbsp;
                                                    <span> 12 </span> </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4 mb-5">
                        <div class="col-sm-12">
                            <nav aria-label="..." class="text-center">
                                <ul class="pagination review_pagination">
                                    <li class="page-item active">
                                        <span class="page-link rounded-circle"
                                            style="background-color: #f2f2f2;border-color: #f2f2f2;color: #000000;">
                                            1
                                            <span class="sr-only">(current)</span>
                                        </span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item">
                                        <a class="page-link rounded-circle" href="#"><i class="fal fa-angle-right"
                                                aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <form class="mb-0" method="post">
                        <div class="row py-5 justify-content-center" style="background-color: #f9f9f9;">
                            <div class="col-sm-11">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h6> Add Review </h6>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <p class="mb-1"> Your rating for this listing </p>
                                        <span class=""><i class="rating-star fas fa-star"></i></span>
                                        <span class=""><i class="rating-star fas fa-star"></i></span>
                                        <span class=""><i class="rating-star fas fa-star"></i></span>
                                        <span class=""><i class="rating-star fas fa-star"></i></span>
                                        <span class=""><i class="rating-star fas fa-star"></i></span>
                                    </div>
                                    <div class="col-sm-6 text-right mb-3">
                                        <label class="mancraft-upload-btn">
                                            <i class="fal fa-arrow-circle-up" aria-hidden="true"></i> Upload Photos
                                            <input type="file" name="file" />
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="font-16" for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control craftmen-input">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="font-16">Email</label>
                                            <input type="text" class="form-control craftmen-input" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="font-16">Review</label>
                                            <textarea class="form-control craftmen-input" rows="8"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-primary craftmen-submin-btn">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="col-sm-5 text-center">
                    <div class="craftmen-map">
                        Contact to<h6> {{ $b_details ? $b_details->company_name : '' }} </h6>
                        <div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24922.53564887752!2d-90.34924354925738!3d38.66458320413013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87df352448bd21db%3A0xdc7f2808d339de6!2sUniversity%20City%2C%20MO%2C%20USA!5e0!3m2!1sen!2sin!4v1602009655383!5m2!1sen!2sin"
                                width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <div class="creftmen-map-social-box d-flex pt-4 justify-content-center">
                            <div> <a href="#" class="creftmen-map-social-icon-01"><img
                                        src="{{ asset('front/images/craftmen/phone2.png') }}" alt=""></a> </div>
                            <div> <a href="#" class="creftmen-map-social-icon-02"><img
                                        src="{{ asset('front/images/craftmen/whatsaap.png') }}" alt=""></a>
                            </div>
                            <div class="facebook_icon"> <a href="#" class="creftmen-map-social-icon-03"><img
                                        src="{{ asset('front/images/craftmen/facebook.png') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <img src="{{ asset('front/images/craftmen/side-img-01.jpg') }}" class="w-100" />
                    </div>
                    <div class="mt-4">
                        <img src="{{ asset('front/images/craftmen/side-img-02.jpg') }}" class="w-100" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="p-0 bottom-bg border-bottom"></section> -->


    <!-- SHIVAM WORK -->
    <!-- CONTACT US MODAL START FROM HERE -->

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered contact-modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Account <br> <span
                            style="font-size: 13px;display: flex;color: #807d7d"> Personal details used by website to
                            recognize you like craftman later. </span> </h5>
                    <button type="button" class="close craftman-close-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center w-100">
                        <div class="col-sm-11">
                            <form>
                                <p> <span class="clr-red">*</span> Marked feilds are mandatory! </p>
                                <div class="row contact_form">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="font-16 clr-black" for="exampleInputEmail1">First Name <span
                                                    class="clr-red">*</span> <span></span></label>
                                            <input type="text" class="form-control craftmen-modal-input"
                                                placeholder="Enter your first name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="font-16 clr-black" for="exampleInputEmail1">Last Name <span
                                                    class="clr-red">*</span> </label>
                                            <input type="text" class="form-control craftmen-modal-input"
                                                placeholder="Enter your last name">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="font-16 clr-black" for="exampleInputEmail1">Phone Number <span
                                                class="clr-red">*</span> </label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend craftmen-input-group">
                                                <span class="input-group-text clr-black"
                                                    id="inputGroup-sizing-default">+91</span>
                                            </div>
                                            <input type="text" class="form-control craftmen-modal-input"
                                                aria-label="Default" aria-describedby="inputGroup-sizing-default"
                                                placeholder="12345 67890" style="border-left: none !important;">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="font-16 clr-black" for="exampleInputEmail1">OTP <span
                                                    class="clr-red">*</span> </label>
                                            <input type="text" class="form-control craftmen-modal-input"
                                                placeholder="0-0-0-0">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label class="font-16 clr-black" for="exampleInputEmail1"> Email Address <span
                                                    class="clr-red">*</span> </label>
                                            <input type="text" class="form-control craftmen-modal-input"
                                                placeholder="Enter your email address">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3 accept_box">
                                            <input id="checkbox1" name="checkbox" type="checkbox">
                                            <label for="checkbox1" class="mb-0 ">I Accept declare that the details
                                                furnished above </label>
                                        </div>
                                        <p> Declaration: I hereby declare that the details furnished above are true and
                                            correct to the best of my knowledge/belief and I undertake to inform you of any
                                            changes therein, immediately. </p>
                                        <p> I hereby authorize sharing of the information furnished on this form with the
                                            Handimarts Compnay. </p>
                                    </div>
                                    <div class="col-sm-12 text-right">
                                        <button class="modal-submit-btn"> Register Now </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
