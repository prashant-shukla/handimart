@extends('layouts.front')

@section('content')
    <section class="hero-home2 pb100-xs">
        <div class="container">
            <div class="row mb60 mb0-xl">
                <div class="col-xl-7">
                    <div class="pr30 pr0-lg mb30-md position-relative">
                        <h1 class="animate-up-1 mb25 text-white">Connect with the right<br class="d-none d-xl-block">Service
                            Experts</h1>
                        <p class="text-white animate-up-2">Handimarts is Best online marketplace, you can easily connect
                            with
                            Carpenters,<br class="d-none d-lg-block"> Exporter & Manufacture and Purchase Product in Best
                            Price.
                        </p>
                        <div
                            class="advance-search-tab bgc-white p10 bdrs4-sm bdrs60 banner-btn position-relative zi1 animate-up-3 mt30">
                            <div class="row">
                                <div class="col-md-5 col-lg-6 col-xl-6">
                                    <div class="advance-search-field mb10-sm">
                                        <form class="form-search position-relative">
                                            <div class="box-search">
                                                <span class="icon far fa-magnifying-glass"></span>
                                                <input class="form-control" type="text" name="search"
                                                    placeholder="What are you looking for?">
                                                <div class="search-suggestions">
                                                    <h6 class="fz14 ml30 mt25 mb-3">Popular Search</h6>
                                                    <div class="box-suggestions">
                                                        <ul class="px-0 m-0 pb-4">
                                                            @foreach ($roles as $role)
                                                                <li>
                                                                    <div class="info-product">
                                                                        <div class="item_title">{{ $role->name }}</div>
                                                                    </div>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-xl-3">
                                    <div class="bselect-style1 bdrl1 bdrn-sm">
                                        <select class="selectpicker" data-width="100%">
                                            <option>Choose Category</option>
                                            @foreach ($roles as $role)
                                                <option id="{{ $role->id }}" data-tokens="Craftsmen">{{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-3">
                                    <div class="text-center text-xl-start">
                                        <button class="ud-btn btn-thm w-100 bdrs60" type="button">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt20 animate-up-4">
                            <div class="col-xl-9">
                                <div class="row justify-content-between">
                                    <div class="col-6 col-sm-3 funfact_one at-home2-hero">
                                        <div class="details">
                                            <ul class="ps-0 mb-0 d-flex">
                                                <li>
                                                    <div class="timer">{{ $craftsman_count }}</div>
                                                </li>
                                                <li><span>+</span></li>
                                            </ul>
                                            <p class="text-white mb-0">Carpenters</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-3 funfact_one at-home2-hero">
                                        <div class="details">
                                            <ul class="ps-0 mb-0 d-flex">
                                                <li>
                                                    <div class="timer">{{ $Designer_count}}</div>
                                                </li>
                                                <li><span>+</span></li>
                                            </ul>
                                            <p class="text-white mb-0">Designer</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-3 funfact_one at-home2-hero">
                                        <div class="details">
                                            <ul class="ps-0 mb-0 d-flex">
                                                <li>
                                                    <div class="timer">{{ $Photographer_count}}</div>
                                                </li>
                                                <li><span>+</span></li>
                                            </ul>
                                            <p class="text-white mb-0">Photographer</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-3 funfact_one at-home2-hero pe-0">
                                        <div class="details">
                                            <ul class="ps-0 mb-0 d-flex">
                                                <li>
                                                    <div class="timer">{{ $painter_count }}</div>
                                                </li>
                                                <li><span>+</span></li>
                                            </ul>
                                            <p class="text-white mb-0">Painter</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 d-none d-xl-block position-relative">
                    <img src="{{ asset('images/about/main-banner.png')}}" alt="" class="animate-up-1 main-img-home2">
                    <div class="home2-hero-content position-relative">
                        <div
                            class="iconbox-small1 d-none d-xl-flex wow fadeInRight default-box-shadow4 bounce-x animate-up-1">
                            <span class="icon flaticon-review"></span>
                            <div class="details pl20">
                                <h6 class="mb-1">Proof of quality</h6>
                                <p class="text fz13 mb-0"> Showcasing Excellence and Craftsmanship
                                </p>
                            </div>
                        </div>
                        <div
                            class="iconbox-small2 d-none d-xl-flex wow fadeInLeft default-box-shadow4 bounce-y animate-up-2">
                            <span class="icon flaticon-review"></span>
                            <div class="details pl20">
                                <h6 class="mb-1">Safe and secure</h6>
                                <p class="text fz13 mb-0">Trusted Connections and Transactions
                                </p>
                            </div>
                        </div>
                        <img src="images/about/happy-client.png" alt=""
                            class="bounce-x bdrs16 img-1 default-box-shadow4">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- talent by category -->
    <section class="pb90 pb30-md pt0">
        <div class="container">
            <div class="row align-items-center wow fadeInUp" data-wow-delay="300ms">
                <div class="col-lg-9">
                    <div class="main-title2">
                        <h2 class="title">Discover Your City's Hidden Gems</h2>
                        <p class="paragraph">Uncover exceptional local craftsmen in your city through our trusted
                            partners and
                            friends.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-start text-lg-end mb-4">
                        <a class="ud-btn btn-light-thm bdrs90" href="#">View All<i
                                class="fal fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="300ms">
                    <div class="dots_none slider-dib-sm slider-5-grid vam_nav_style owl-theme owl-carousel">
                        @foreach ($cityUser as $city)
                            <div class="item">
                                <div class="feature-style1 mb30 bdrs16">
                                    <div class="feature-img bdrs16 overflow-hidden">
                                        @if ($city->background_image)
                                            <img class="w-100"
                                                src="{{ asset('uploads/cities/' . $city->background_image) }}"
                                                alt="" style="height: 297.75px">
                                        @else
                                            <img class="w-100" src="uploads/cities/no-image.jpg" alt=""
                                                style="height: 297.75px">
                                        @endif
                                    </div>
                                    <div class="feature-content">
                                        <div class="top-area">
                                            <h6 class="title mb-1">{{ $city->users_count }} members
                                            </h6>
                                            <h4 class="text">{{ $city->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    </section>

    <!-- Highest Rated Freelancers -->
    <section class="pt0 pt0-md pb130 pb60-md">
        <div class="container">
            <div class="row align-items-center wow fadeInUp">
                <div class="col-lg-9">
                    <div class="main-title">
                        <h2 class="title">Crafting Excellence, Building Trust</h2>
                        <p class="paragraph">Discover skilled craftsmen through our listings.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-start text-lg-end mb-4">
                        <a class="ud-btn btn-light-thm bdrs90" href="page-freelancer-v1.html">All Freelancers<i
                                class="fal fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="navi_pagi_bottom_center slider-4-grid owl-carousel owl-theme">
                        @foreach ($users as $user)

                            <div class="item">
                                <div class="freelancer-style1 text-center bdr1 hover-box-shadow mb60 bdrs16">
                                    <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                                        <img class="rounded-circle mx-auto" src="{{ get_user_profile_pic($user->id) }}"
                                            alt="" width="150px" height="100px">
                                        @if (!empty($user->aadhar1) && !empty($user->aadhar2) && !empty($user->aadhar3))
                                            <span class="far fa-badge-check "></span>
                                        @endif

                                        {{-- <span class="online" style="right:-1px;"></span> --}}
                                    </div>
                                    <div class="details">
                                        <h5 class="title mb-1">{{ $user->name }}</h5>
                                        <p class="mb-0">{{ $user->public_name }}</p>
                                        <div class="review">
                                            <p><i class="fas fa-star fz10 review-color pr10"></i><span
                                                    class="dark-color">4.9</span> (595
                                                reviews)</p>
                                        </div>
                                        <hr class="opacity-100 mt20 mb15">
                                        <div class="fl-meta d-flex align-items-center justify-content-between">
                                            <a class="meta fw500 text-start">Location<br><span
                                                    class="fz14 fw400">{{ $user->address }}</span></a>

                                            @foreach ($user->businessDetails as $item)
                                                @if ($item->per_day_fee)
                                                    <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">Rs
                                                            {{ $item ? $item->per_day_fee : '0' }} /-
                                                        </span></a>
                                                @else
                                                    <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">Rs
                                                            0 /
                                                            hr</span></a>
                                                @endif

                                                <a class="meta fw500 text-start">Done<br><span
                                                        class="fz14 fw400">{{ $item ? $item->job_done : '0' }}</span></a>
                                            @endforeach
                                        </div>
                                        <div class="d-grid mt15">
                                            @if ($user->role_id == 2)
                                                <a href="{{ url('craftman_detail', $user->id) }}"
                                                    class="ud-btn btn-light-thm bdrs90">View
                                                    Profile<i class="fal fa-arrow-right-long"></i></a>
                                            @endif
                                            @if ($user->role_id == 3)
                                                <a href="{{ url('manufacture_exporter_detail', $user->id) }}"
                                                    class="ud-btn btn-light-thm bdrs90">View
                                                    Profile<i class="fal fa-arrow-right-long"></i></a>
                                            @endif
                                            @if ($user->role_id == 4)
                                                <a href="{{ url('manufacture_exporter_detail', $user->id) }}"
                                                    class="ud-btn btn-light-thm bdrs90">View
                                                    Profile<i class="fal fa-arrow-right-long"></i></a>
                                            @endif
                                            @if ($user->role_id == 5)
                                                <a href="{{ url('designer_detail', $user->id) }}"
                                                    class="ud-btn btn-light-thm bdrs90">View
                                                    Profile<i class="fal fa-arrow-right-long"></i></a>
                                            @endif
                                            @if ($user->role_id == 6)
                                                <a href="{{ url('painter_detail', $user->id) }}"
                                                    class="ud-btn btn-light-thm bdrs90">View
                                                    Profile<i class="fal fa-arrow-right-long"></i></a>
                                            @endif
                                            @if ($user->role_id == 8)
                                                <a href="{{ url('photographer_detail', $user->id) }}"
                                                    class="ud-btn btn-light-thm bdrs90">View
                                                    Profile<i class="fal fa-arrow-right-long"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <section class="cta-banner-about2 mx-auto maxw1700 position-relative pt60-lg pb60-lg">
        <img class="cta-about2-img bdrs4 d-none d-xl-block" src="{{ asset('images/about/about-9.jpg')}}" alt="">
        <div class="container">
            <div class="row">
                <div class="col-md-11 wow fadeInUp" data-wow-delay="200ms">
                    <div class="main-title">
                        <h2 class="title text-capitalize">Discovering the Process: How It Works</h2>
                        <p class="text">Simple Steps, Stunning Results: Here's How It Works</p>
                    </div>
                </div>
            </div>
            <div class="row wow fadeInDown" data-wow-delay="400ms">
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="iconbox-style9 default-box-shadow1 bgc-white p40 bdrs12 position-relative mb30">
                        <span class="icon fz40 flaticon-cv"></span>
                        <h4 class="iconbox-title mt20">Search Recruitment</h4>
                        <p class="text mb-0">Explore our platform to find a list of craftsmen and their services. You
                            can search
                            based on your preferences and needs.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="iconbox-style9 default-box-shadow1 bgc-white p40 bdrs12 position-relative mb30">
                        <span class="icon fz40 flaticon-web-design"></span>
                        <h4 class="iconbox-title mt20">Explore Details</h4>
                        <p class="text mb-0">Take your time to go through the profiles of different craftsmen. Look for
                            details
                            about their skills, experience, and specialization.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="iconbox-style9 default-box-shadow1 bgc-white p40 bdrs12 position-relative mb30">
                        <span class="icon fz40 flaticon-secure"></span>
                        <h4 class="iconbox-title mt20">Book, Reach, or Call</h4>
                        <p class="text mb-0">You can either directly reach out to them through messaging, or call them
                            to
                            discuss your project through the handimart </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Testimonials -->
    <section class="our-testimonial pt0-lg pb0-lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto wow fadeInUp" data-wow-delay="300ms">
                    <div class="main-title text-center">
                        <h2>Testimonials</h2>
                        <p class="paragraph">Interdum et malesuada fames ac ante ipsum</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 m-auto wow fadeInUp" data-wow-delay="500ms">
                    <div class="testimonial-style2">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-1st" role="tabpanel" aria-labelledby="pills-1st-tab">
                                <div class="testi-content text-md-center">
                                    <span class="icon fas fa-quote-left"></span>
                                    <h4 class="testi-text">"Our family was traveling via bullet train between cities in
                                        Japan with our
                                        luggage - the location for this hotel made that so easy. Agoda price was
                                        fantastic. "</h4>
                                    <h6 class="name">Ali Tufan</h6>
                                    <p class="design">Product Manager, Apple Inc</p>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="pills-2nd" role="tabpanel"
                                aria-labelledby="pills-2nd-tab">
                                <div class="testi-content text-md-center">
                                    <span class="icon fas fa-quote-left"></span>
                                    <h4 class="testi-text">"Our family was traveling via bullet train between cities in
                                        Japan with our
                                        luggage - the location for this hotel made that so easy. Agoda price was
                                        fantastic. "</h4>
                                    <h6 class="name">Ali Tufan</h6>
                                    <p class="design">Product Manager, Apple Inc</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-3rd" role="tabpanel" aria-labelledby="pills-3rd-tab">
                                <div class="testi-content text-md-center">
                                    <span class="icon fas fa-quote-left"></span>
                                    <h4 class="testi-text">"Our family was traveling via bullet train between cities in
                                        Japan with our
                                        luggage - the location for this hotel made that so easy. Agoda price was
                                        fantastic. "</h4>
                                    <h6 class="name">Ali Tufan</h6>
                                    <p class="design">Product Manager, Apple Inc</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-4th" role="tabpanel" aria-labelledby="pills-4th-tab">
                                <div class="testi-content text-md-center">
                                    <span class="icon fas fa-quote-left"></span>
                                    <h4 class="testi-text">"Our family was traveling via bullet train between cities in
                                        Japan with our
                                        luggage - the location for this hotel made that so easy. Agoda price was
                                        fantastic. "</h4>
                                    <h6 class="name">Ali Tufan</h6>
                                    <p class="design">Product Manager, Apple Inc</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-5th" role="tabpanel" aria-labelledby="pills-5th-tab">
                                <div class="testi-content text-md-center">
                                    <span class="icon fas fa-quote-left"></span>
                                    <h4 class="testi-text">"Our family was traveling via bullet train between cities in
                                        Japan with our
                                        luggage - the location for this hotel made that so easy. Agoda price was
                                        fantastic. "</h4>
                                    <h6 class="name">Ali Tufan</h6>
                                    <p class="design">Product Manager, Apple Inc</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-list position-relative">
                            <ul class="nav nav-pills justify-content-md-center" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link ps-0" id="pills-1st-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-1st" type="button" role="tab"
                                        aria-controls="pills-1st" aria-selected="true"><img
                                            src="{{ asset('images/testimonials/testi-1.png')}}" alt=""></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-2nd-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-2nd" type="button" role="tab"
                                        aria-controls="pills-2nd" aria-selected="false"><img
                                            src="{{ asset('images/testimonials/testi-2.png')}}" alt=""></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-3rd-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-3rd" type="button" role="tab"
                                        aria-controls="pills-3rd" aria-selected="false"><img
                                            src="{{ asset('images/testimonials/testi-3.png')}}" alt=""></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-4th-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-4th" type="button" role="tab"
                                        aria-controls="pills-4th" aria-selected="false"><img
                                            src="{{ asset('images/testimonials/testi-4.png')}}" alt=""></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link pe-0" id="pills-5th-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-5th" type="button" role="tab"
                                        aria-controls="pills-5th" aria-selected="false"><img
                                            src="{{ asset('images/testimonials/testi-5.png')}}" alt=""></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our CTA -->
    <section class="our-cta bgc-thm4 maxw1400 mx-auto pt80 pb90 pt60-md pb60-md mt0-lg bdrs16">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-7 col-xl-5 wow fadeInLeft">
                    <div class="cta-style3 pl80 pl0-lg">
                        <h2 class="cta-title">Join our journey. <br>Be a part for free today.</h2>
                        <p class="paragraph">Join us on this exciting journey to bring your projects to life.</p>
                        <div class="d-sm-flex align-items-center mt30">
                            <a href="page-project-v1.html" class="ud-btn btn-dark bdrs60 me-sm-3">Become A Member<i
                                    class="fal fa-arrow-right-long"></i></a>
                            <!-- <a href="page-freelancer-v1.html" class="ud-btn btn-transparent double-border bdrs60">Get the job done<i class="fal fa-arrow-right-long"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-xl-4 position-relative wow zoomIn">
                    <div class="cta-img me-4">
                        <img class="w-100" src="{{ asset('images/about/about-6.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Blog -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="00ms">
                    <div class="main-title">
                        <h2 class="title">Our Blog</h2>
                        <p class="paragraph">Aliquam lacinia diam quis lacus euismod</p>
                    </div>
                </div>
            </div>
            <div class="row wow fadeInUp" data-wow-delay="300ms">
                <div class="col-sm-6 col-xl-3">
                    <div class="blog-style1">
                        <div class="blog-img"><img class="w-100" src="{{ asset('images/blog/blog-1.jpg')}}" alt=""></div>
                        <div class="blog-content">
                            <a class="date" href="#">December 2, 2022</a>
                            <h4 class="title mt-1"><a href="page-blog-single.html">Start an online business and work
                                    from home</a>
                            </h4>
                            <p class="text mb-0">A complete guide to starting a small business online</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="blog-style1">
                        <div class="blog-img"><img class="w-100" src="{{ asset('images/blog/blog-2.jpg')}}" alt=""></div>
                        <div class="blog-content">
                            <a class="date" href="#">December 2, 2022</a>
                            <h4 class="title mt-1"><a href="page-blog-single.html">Front becomes an official Instagram
                                    Marketing
                                    Partner</a></h4>
                            <p class="text mb-0">A complete guide to starting a small business online</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="blog-style1">
                        <div class="blog-img"><img class="w-100" src="{{ asset('images/blog/blog-3.jpg')}}" alt=""></div>
                        <div class="blog-content">
                            <a class="date" href="#">December 2, 2022</a>
                            <h4 class="title mt-1"><a href="page-blog-single.html">Engendering a culture of
                                    professional
                                    development</a></h4>
                            <p class="text mb-0">A complete guide to starting a small business online</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="blog-style1">
                        <div class="blog-img"><img class="w-100" src="{{ asset('images/blog/blog-4.jpg')}}" alt=""></div>
                        <div class="blog-content">
                            <a class="date" href="#">December 2, 2022</a>
                            <h4 class="title mt-1"><a href="page-blog-single.html">Increasing engagement with
                                    Instagram</a></h4>
                            <p class="text mb-0">A complete guide to starting a small business online</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
