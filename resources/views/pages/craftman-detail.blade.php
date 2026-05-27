@extends('layouts.front')

@section('content')

    {{-- <section class="categories_list_section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="listings_category_nav_list_menu">
                        <ul class="mb0 d-flex ps-0">
                            <li><a href="#">All Categories</a></li>
                            <li><a href="#">Graphics & Design</a></li>
                            <li><a class="active" href="#">Digital Marketing</a></li>
                            <li><a href="#">Writing & Translation</a></li>
                            <li><a href="#">Video & Animation</a></li>
                            <li><a href="#">Music & Audio</a></li>
                            <li><a href="#">Programming & Tech</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Trending</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Breadcumb Sections -->
    <section class="breadcumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-lg-10">
                    <div class="breadcumb-style1 mb10-xs">
                        <div class="breadcumb-list">
                            <a href="{{ url('/') }}">Home</a>
                            <a href="#">Services</a>
                            <a href="#">Craftman Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-2">
                    <div class="d-flex align-items-center justify-content-sm-end">
                        <div class="share-save-widget d-flex align-items-center">
                            <span class="icon flaticon-share dark-color fz12 mr10"></span>
                            <div class="h6 mb-0">Share</div>
                        </div>
                        {{-- <div class="share-save-widget d-flex align-items-center ml15">
                            <span class="icon flaticon-like dark-color fz12 mr10"></span>
                            <div class="h6 mb-0">Save</div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcumb Sections -->
    <section class="breadcumb-section pt-0">
        <div
            class="cta-service-v1 freelancer-single-style mx-auto maxw1700 pt120 pt60-sm pb120 pb60-sm bdrs16 position-relative overflow-hidden d-flex align-items-center mx20-lg px30-lg">
            <img class="left-top-img wow zoomIn" src="images/vector-img/left-top.png" alt="">
            <img class="right-bottom-img wow zoomIn" src="images/vector-img/right-bottom.png" alt="">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-xl-7">
                        <div class="position-relative">
                            {{-- <h2>I will design website UI UX in adobe xd or figma</h2> --}}
                            <div class="list-meta d-sm-flex align-items-center mt30">
                                <a class="position-relative freelancer-single-style" href="#">
                                    <span class="online"></span>
                                    <img class="rounded-circle  wa-sm mb15-sm" src="{{ get_user_profile_pic($user->id) }}"
                                        alt="Freelancer Photo" width="150px" height="150px">
                                </a>
                                <div class="ml20 ml0-xs">
                                    <h3 class="title mb-1">
                                        {{ $user->first_name ?? $user->username }}
                                        {{ $user->last_name ?? $user->username }}
                                    </h3>
                                    
                                    <p class="mb-0">{{ $user->public_name }}</p>
                                    <p class="mb-0 dark-color fz15 fw500 list-inline-item mb5-sm"><i
                                            class="fas fa-star vam fz15 review-color me-2"></i> 4.82 94 reviews</p>
                                    <p class="mb-0 dark-color fz15 fw500 list-inline-item ml15 mb5-sm ml0-xs"><i
                                            class="flaticon-place vam fz20 me-2"></i> {{ optional($user->cities)->name ?? '-' }}, {{ optional($user->states)->name ?? '-' }}</p>
                                    <p class="mb-0 dark-color fz15 fw500 list-inline-item ml15 mb5-sm ml0-xs"><i
                                            class="flaticon-30-days vam fz20 me-2"></i>Member since {{$user->created_at}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Details -->
    <section class="pt10 pb90 pb30-md">
        <div class="container">
            <div class="row wow fadeInUp">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-sm-6 col-xl-3">
                            <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                                <div class="icon flex-shrink-0"><span class="flaticon-target"></span></div>
                                <div class="details">
                                    <h5 class="title">Work Experience</h5>
                                    <p class="mb-0 text">{{ $b_details ? $b_details->experience : '0' }}+</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                                <div class="icon flex-shrink-0"><span class="flaticon-goal"></span></div>
                                <div class="details">
                                    <h5 class="title">Team Member</h5>
                                    <p class="mb-0 text">{{ $b_details ? $b_details->team_size : '0' }}+</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                                <div class="icon flex-shrink-0"><span class="flaticon-fifteen"></span></div>
                                <div class="details">
                                    <h5 class="title">Overall Job Done</h5>
                                    <p class="mb-0 text">{{ $b_details ? $b_details->job_done : 0 }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                                <div class="icon flex-shrink-0"><span class="flaticon-file-1"></span></div>
                                <div class="details">
                                    <h5 class="title">Happy Clients</h5>
                                    <p class="mb-0 text">{{ $b_details ? '0' : '0' }}+</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-about">
                        <h4>Description</h4>
                        <p class="text mb30">{{ $user->biographical_info }}</p>

                        <hr class="opacity-100 mb60 mt60">
                        {{-- <h4 class="mb30">Education</h4> --}}
                        {{-- <div class="educational-quality">
                            <div class="m-circle text-thm">M</div>
                            <div class="wrapper mb40">
                                <span class="tag">2012 - 2014</span>
                                <h5 class="mt15">Bachlors in Fine Arts</h5>
                                <h6 class="text-thm">Modern College</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum
                                    et malesuada fames ac ante ipsum primis in faucibus.</p>
                            </div>
                            <div class="m-circle before-none text-thm">M</div>
                            <div class="wrapper mb60">
                                <span class="tag">2008 - 2012</span>
                                <h5 class="mt15">Computer Science</h5>
                                <h6 class="text-thm">Harvartd University</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum
                                    et malesuada fames ac ante ipsum primis in faucibus.</p>
                            </div>
                        </div> --}}
                        {{-- <hr class="opacity-100 mb60"> --}}
                        {{-- <h4 class="mb30">Work & Experience</h4> --}}
                        {{-- <div class="educational-quality">
                            <div class="m-circle text-thm">M</div>
                            <div class="wrapper mb40">
                                <span class="tag">2012 - 2014</span>
                                <h5 class="mt15">UX Designer</h5>
                                <h6 class="text-thm">Dropbox</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum
                                    et malesuada fames ac ante ipsum primis in faucibus.</p>
                            </div>
                            <div class="m-circle before-none text-thm">M</div>
                            <div class="wrapper mb60">
                                <span class="tag">2008 - 2012</span>
                                <h5 class="mt15">Art Director</h5>
                                <h6 class="text-thm">amazon</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum
                                    et malesuada fames ac ante ipsum primis in faucibus.</p>
                            </div>
                        </div> --}}
                        {{-- <hr class="opacity-100 mb60">
                        <h4 class="mb30">Awards adn Certificates</h4>
                        <div class="educational-quality ps-0">
                            <div class="wrapper mb40">
                                <span class="tag">2012 - 2014</span>
                                <h5 class="mt15">UI UX Design</h5>
                                <h6 class="text-thm">Udemy</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum
                                    et malesuada fames ac ante ipsum <br class="d-none d-lg-block"> primis in faucibus.</p>
                            </div>
                            <div class="wrapper mb60">
                                <span class="tag">2008 - 2012</span>
                                <h5 class="mt15">App Design</h5>
                                <h6 class="text-thm">Google</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum
                                    et malesuada fames ac ante ipsum <br class="d-none d-lg-block"> primis in faucibus.</p>
                            </div>
                        </div> --}}
                        {{-- <hr class="opacity-100 mb60">
                        <h4 class="mb30">Featured Services</h4>
                        <div class="row mb35">
                            <div class="col-sm-6 col-xl-4">
                                <div class="listing-style1">
                                    <div class="list-thumb">
                                        <img class="w-100" src="images/listings/g-1.jpg" alt="">
                                        <a href="#" class="listing-fav fz12"><span class="far fa-heart"></span></a>
                                    </div>
                                    <div class="list-content">
                                        <p class="list-text body-color fz14 mb-1">Web & App Design</p>
                                        <h6 class="list-title"><a href="page-services-single.html">I will design modern
                                                websites in figma or adobe xd</a></h6>
                                        <div class="review-meta d-flex align-items-center">
                                            <i class="fas fa-star fz10 review-color me-2"></i>
                                            <p class="mb-0 body-color fz14"><span class="dark-color me-2">4.82</span>94
                                                reviews</p>
                                        </div>
                                        <hr class="my-2">
                                        <div class="list-meta mt15">
                                            <div class="budget">
                                                <p class="mb-0 body-color">Starting at<span
                                                        class="fz17 fw500 dark-color ms-1">$983</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="listing-style1">
                                    <div class="list-thumb">
                                        <div
                                            class="listing-thumbIn-slider position-relative navi_pagi_bottom_center slider-1-grid owl-carousel owl-theme">
                                            <div class="item">
                                                <img class="w-100" src="images/listings/g-2.jpg" alt="">
                                                <a href="#" class="listing-fav fz12"><span
                                                        class="far fa-heart"></span></a>
                                            </div>
                                            <div class="item">
                                                <img class="w-100" src="images/listings/g-3.jpg" alt="">
                                                <a href="#" class="listing-fav fz12"><span
                                                        class="far fa-heart"></span></a>
                                            </div>
                                            <div class="item">
                                                <img class="w-100" src="images/listings/g-4.jpg" alt="">
                                                <a href="#" class="listing-fav fz12"><span
                                                        class="far fa-heart"></span></a>
                                            </div>
                                            <div class="item">
                                                <img class="w-100" src="images/listings/g-5.jpg" alt="">
                                                <a href="#" class="listing-fav fz12"><span
                                                        class="far fa-heart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-content">
                                        <p class="list-text body-color fz14 mb-1">Art & Illustration</p>
                                        <h6 class="list-title"><a href="page-services-single.html">I will create modern
                                                flat design illustration</a></h6>
                                        <div class="review-meta d-flex align-items-center">
                                            <i class="fas fa-star fz10 review-color me-2"></i>
                                            <p class="mb-0 body-color fz14"><span class="dark-color me-2">4.82</span>94
                                                reviews</p>
                                        </div>
                                        <hr class="my-2">
                                        <div class="list-meta mt15">
                                            <div class="budget">
                                                <p class="mb-0 body-color">Starting at<span
                                                        class="fz17 fw500 dark-color ms-1">$983</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="listing-style1">
                                    <div class="list-thumb">
                                        <img class="w-100" src="images/listings/g-3.jpg" alt="">
                                        <a href="#" class="listing-fav fz12"><span class="far fa-heart"></span></a>
                                    </div>
                                    <div class="list-content">
                                        <p class="list-text body-color fz14 mb-1">Design & Creative</p>
                                        <h6 class="list-title line-clamp2"><a href="page-services-single.html">I will
                                                build a fully responsive design in HTML,CSS, bootstrap, and javascript</a>
                                        </h6>
                                        <div class="review-meta d-flex align-items-center">
                                            <i class="fas fa-star fz10 review-color me-2"></i>
                                            <p class="mb-0 body-color fz14"><span class="dark-color me-2">4.82</span>94
                                                reviews</p>
                                        </div>
                                        <hr class="my-2">
                                        <div class="list-meta mt15">
                                            <div class="budget">
                                                <p class="mb-0 body-color">Starting at<span
                                                        class="fz17 fw500 dark-color ms-1">$983</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        @if (!empty($image_gallery))
                            <div
                                class="employee-single-slider vam_nav_style slider-1-grid owl-carousel owl-theme mt55 mb60">

                                @foreach ($image_gallery as $image_gallery)
                                    <div class="item">
                                        <div class="thumb"><img
                                                src="{{ asset('uploads/business/' . $image_gallery->images) }}"
                                                alt="" class="w-100 bdrs4" height="553.77px">
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @endif

                        <hr class="opacity-100 mb60">
                        <div class="product_single_content mb60">
                            <div class="mbp_pagination_comments">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="total_review mb30">
                                            <h4>80 Reviews</h4>
                                        </div>
                                        <div class="d-md-flex align-items-center mb30">
                                            <div class="total-review-box d-flex align-items-center text-center mb30-sm">
                                                <div class="wrapper mx-auto">
                                                    <div class="t-review mb15">4.96</div>
                                                    <h5>Exceptional</h5>
                                                    <p class="text mb-0">3,014 reviews</p>
                                                </div>
                                            </div>
                                            <div class="wrapper ml60 ml0-sm">
                                                <div class="review-list d-flex align-items-center mb10">
                                                    <div class="list-number">5 Star</div>
                                                    <div class="progress">
                                                        <div class="progress-bar" style="width: 90%;" role="progressbar"
                                                            aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <div class="value text-end">58</div>
                                                </div>
                                                <div class="review-list d-flex align-items-center mb10">
                                                    <div class="list-number">4 Star</div>
                                                    <div class="progress">
                                                        <div class="progress-bar w-75" role="progressbar"
                                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <div class="value text-end">20</div>
                                                </div>
                                                <div class="review-list d-flex align-items-center mb10">
                                                    <div class="list-number">3 Star</div>
                                                    <div class="progress">
                                                        <div class="progress-bar w-50" role="progressbar"
                                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <div class="value text-end">15</div>
                                                </div>
                                                <div class="review-list d-flex align-items-center mb10">
                                                    <div class="list-number">2 Star</div>
                                                    <div class="progress">
                                                        <div class="progress-bar" style="width: 30%;" role="progressbar"
                                                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <div class="value text-end">2</div>
                                                </div>
                                                <div class="review-list d-flex align-items-center mb10">
                                                    <div class="list-number">1 Star</div>
                                                    <div class="progress">
                                                        <div class="progress-bar" style="width: 20%;" role="progressbar"
                                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <div class="value text-end">1</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if ($user->comments)
                                        @foreach ($user->comments as $comment)
                                            <div class="col-md-12">
                                                <div
                                                    class="mbp_first position-relative d-flex align-items-center justify-content-start mb30-sm">
                                                    {{-- <img src="{{ asset('images/blog/comments-2.png') }}" class="mr-3"
                                                        alt="comments-2.png"> --}}
                                                    <p
                                                        style="background: #1f4b3f;
                                                    border-radius: 50%;
                                                    padding: 16px;
                                                    text-align: center;
                                                    color: white;width: 52px">

                                                        {{ \Str::ucfirst(\Str::substr($comment->senderName, 0, 1)) }}

                                                    </p>
                                                    <div class="ml20">
                                                        <h6 class="mt-0 mb-0">{{ $comment->senderName }}</h6>
                                                        <div><span class="fz14">
                                                                {{ \Carbon\Carbon::parse($comment->created_at)->isoFormat('Do  MMM  YYYY') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text mt20 mb20">{{ $comment->description }}</p>
                                                <div class="review_cansel_btns d-flex">
                                                    <a href="#"><i class="fas fa-thumbs-up"></i>Helpful</a>
                                                    <a href="#"><i class="fas fa-thumbs-down"></i>Not helpful</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="col-md-12">
                                        <div class="position-relative bdrb1 pb50">
                                            <a href="#" class="ud-btn btn-light-thm mt-2">See More<i
                                                    class="fal fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bsp_reveiw_wrt">
                            <h6 class="fz17">Add a Review</h6>
                            <p class="text">Your email address will not be published. Required fields are marked *</p>
                            <h6>Your rating of this product</h6>
                            <div class="d-flex">
                                <i class="fas fa-star review-color"></i>
                                <i class="far fa-star review-color ms-2"></i>
                                <i class="far fa-star review-color ms-2"></i>
                                <i class="far fa-star review-color ms-2"></i>
                                <i class="far fa-star review-color ms-2"></i>
                            </div>
                            <form class="comments_form mt30 mb30-md" action="{{ route('front/comment') }}"
                                method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="fw500 fz16 ff-heading dark-color mb-2">Comment</label>
                                            <textarea class="pt15" name="description" rows="6"
                                                placeholder="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb20">
                                            <label class="fw500 ff-heading dark-color mb-2">Name</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Ali Tufan">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb20">
                                            <label class="fw500 ff-heading dark-color mb-2">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="creativelayers088">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <div
                                            class="checkbox-style1 d-block d-sm-flex align-items-center justify-content-between mb20">
                                            <label class="custom_checkbox fz15 ff-heading">Save my name, email, and website
                                                in this browser for the next time I comment.
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div> --}}
                                        <button type="submit" class="ud-btn btn-thm">Send<i
                                                class="fal fa-arrow-right-long"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-sidebar ms-lg-auto">
                        <div class="price-widget pt25 widget-mt-minus bdrs8">
                            <h3 class="widget-title text-center">Rs. {{ $b_details ? $b_details->per_day_fee : '0' }}/-
                                <small class="fz15 fw500 text-center d-block">per day 8 hour</small>
                            </h3>
                            <div class="d-grid">
                                @if (!Auth::check())
                                    <a href="{{ route('login') }}" class="ud-btn btn-thm">Contact Me<i
                                            class="fal fa-arrow-right-long"></i></a>
                                @else
                                    <a href="#" class="ud-btn btn-thm">Contact Me<i
                                            class="fal fa-arrow-right-long"></i></a>
                                    <div class="category-list mt20">
                                        <a class="d-flex align-items-center justify-content-between bdrb1 pb-2"
                                            href="#">
                                            <span class="text"><i
                                                    class="fa-solid fa-phone text-thm2 pe-2 vam"></i>Contact</span>
                                            <span class="">{{ $user->phone }}</span>
                                        </a>


                                    </div>
                                @endif
                            </div>
                            <div class="category-list mt20">
                                <a class="d-flex align-items-center justify-content-between bdrb1 pb-2" href="#">
                                    <span class="text"><i class="flaticon-place text-thm2 pe-2 vam"></i>Location</span>
                                    <span class="">{{ optional($user->cities)->name ?? '-' }}, {{ optional($user->states)->name ?? '-' }}</span>
                                </a>


                            </div>
                            <div class="category-list mt20">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114487.44785192888!2d72.94814244210292!3d26.270335882906835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39418c4eaa06ccb9%3A0x8114ea5b0ae1abb8!2sJodhpur%2C%20Rajasthan!5e0!3m2!1sen!2sin!4v1693893751676!5m2!1sen!2sin"
                                    width="500" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="sidebar-widget mb30 pb20 bdrs8">
                            <h4 class="widget-title">My Skills</h4>
                            <div class="tag-list mt30">
                                @foreach ($skills as $item)
                                    @if (!empty($item))
                                        <a href="#">{{ $item }}</a>
                                    @endif
                                @endforeach

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <a class="scrollToHome" href="#"><i class="fas fa-angle-up"></i></a>
@endsection
