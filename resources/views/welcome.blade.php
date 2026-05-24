{{-- @extends('layouts.front')

@section('content')
    <div class="main_banner">

        <!-- Banner Content -->
        <div class="banner_content ">

            <h1 class="text-center">Connect with the right<br>
                Service Experts
            </h1>
            <p class="text-center">Handimarts is Best online marketplace, you can easily connect with Carpenters, Exporter &
                <br>Manufacture and Purchase Product in Best Price.
            </p>
            <div class="search_box">
                <form>
                    <div class="row">
                        <div class="col-xl-3 col-12 col-md-3 city_serch">
                            <div class="city_serch_inner">
                                <img src="{{ asset('public/front/images/send.png') }}" alt="send" class="float-left">

                                <div class="selectBox select_city select_city_box">
                                    <div class="selectBoxTop">
                                        <span class="selected"></span>
                                        <span class="selectArrow"></span>
                                    </div>
                                    <div class="selectOptions">
                                        <span class="selectOption" value="Option 1">Jodhpur</span>
                                        <span class="selectOption" value="Option 2">Jaipur</span>
                                        <span class="selectOption" value="Option 3">Udaipur</span>
                                        <span class="selectOption" value="Option 4">Ajmer</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </div>
                        <div class="col-xl-6 col-12 col-md-6 category_search">

                            <div class="selectBox select_cat">
                                <div class="selectBoxTop2">
                                    <span class="selected2"></span>
                                    <span class="selectArrow"></span>
                                </div>
                                <div class="selectOptions2">
                                    <span class="selectOption2" value="Option 1">Search for anything, anywhere in
                                        Jodhpur</span>
                                    <span class="selectOption2" value="Option 2">Jaipur</span>
                                    <span class="selectOption2" value="Option 3">Udaipur</span>
                                    <span class="selectOption2" value="Option 4">Ajmer</span>
                                </div>
                                <div class="map_icons">
                                    <i class="fal fa-map-marker-alt"></i>
                                    <i class="fal fa-location"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-12 col-md-3 pr-0 pl-0">
                            <button class="web_btn float-right">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <p class="text-center  bottom-from info_search">E.g. Carpenter, Rajesh, Narayan Art & Craft, 445521</p>
        </div>

    </div>
    <!-- Explore box -->
    <section class="explore_box">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-6 col-md-3 explore_box_space">
                    <div class="common_box text-center">
                        <img src="{{ asset('public/front/images/carpenters-icon.png') }}" alt="carpenters-icon">
                        <h3>2,500 Carpenters</h3>
                        <p>Handimarts is Best online marketplace, you can easily connect.</p>
                        <a href="" title="Explore Now">Explore Now</a>
                    </div>
                </div>
                <div class="col-xl-3 col-6 col-md-3 explore_box_space2">
                    <div class="common_box text-center">
                        <img src="{{ asset('public/front/images/manufacture-icon.png') }}" alt="manufacture-icon">
                        <h3>2500 Manufacture</h3>
                        <p>Handimarts is Best online marketplace, you can easily connect.</p>
                        <a href="" title="Explore Now">Explore Now</a>
                    </div>
                </div>
                <div class="col-xl-3 col-6 col-md-3 explore_box_space">
                    <div class="common_box text-center">
                        <img src="{{ asset('public/front/images/Exporter-icon.png') }}" alt="Exporter-icon.png">
                        <h3>2,000 Exporter </h3>
                        <p>Handimarts is Best online marketplace, you can easily connect.</p>
                        <a href="" title="Explore Now">Explore Now</a>
                    </div>
                </div>
                <div class="col-xl-3 col-6 col-md-3 explore_box_space2">
                    <div class="common_box text-center">
                        <img src="{{ asset('public/front/images/pcroduct-icon.png') }}" alt="pcroduct-icon">
                        <h3>10,000 Products</h3>
                        <p>Handimarts is Best online marketplace, you can easily connect.</p>
                        <a href="" title="Explore Now">Explore Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- explore city -->
    <section class="explore_city">
        <div class="container">
            <div class="row">
                <div class="col-xl-12  text-center">
                    <h4 class="main_heading">Explore Your City Listings</h4>
                    <p class="content">Explore some of the best business from around the world from our partners and friends
                    </p>
                </div>
            </div>
            <div class="row down_panel">
                <div class="col-xl-4 col-md-4 col-12 city_block">
                    <a href="">
                        <div class="inner_block zoom">
                            <img src="{{ asset('public/front/images/jodhpur-city-img.jpg') }}" alt="jodhpur-city"
                                class="img-fluid alignleft size-medium wp-image-7000">
                            <div class="city_content text-center">
                                <h5 class="text-capitalize">Jodhpur</h5>
                                <p>500 Carpenters, 200 Manufactures & Exporters</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-12 col-md-4">
                    <a href="">
                        <div class="inner_block zoom">
                            <img src="{{ asset('public/front/images/udaipur-city-img.jpg') }}" alt="udaipur-city"
                                class="img-fluid alignleft size-medium wp-image-7000">
                            <div class="city_content text-center">
                                <h5 class="text-capitalize">Udaipur</h5>
                                <p>500 Carpenters, 200 Manufactures & Exporters</p>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="inner_block inner_block2 zoom">
                            <img src="{{ asset('public/front/images/ajmer-city.jpg') }}" alt="ajmer-city"
                                class="img-fluid alignleft size-medium wp-image-7000">
                            <div class="city_content text-center">
                                <h5 class="text-capitalize">Ajmer</h5>
                                <p>500 Carpenters, 200 Manufactures & Exporters</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-12  col-md-4">
                    <a href="">
                        <div class="inner_block zoom">
                            <img src="{{ asset('public/front/images/jaipur-city.jpg') }}" alt="jaipur-city"
                                class="img-fluid alignleft size-medium wp-image-7000">
                            <div class="city_content text-center">
                                <h5 class="text-capitalize">jaipur</h5>
                                <p>500 Carpenters, 200 Manufactures & Exporters</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-12 text-center">
                    <a href="" class="explore_all" title="Explore All">Explore All</a>
                </div>
            </div>
        </div>
    </section>
    <!-- how it work -->
    <section class="how_work common_sections">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <h4 class="main_heading">How it Works</h4>
                    <p class="content">Explore some of the best business from around the world from our partners and
                        friends</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-12 col-md-4">
                    <div class="how_work_block text-center">
                        <img src="{{ asset('public/front/images/step-1-icon.png') }}" alt="step-1-icon">
                        <h5>Search Recruitment</h5>
                        <p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel ignota fierent
                            eloquentiam
                            id.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-12 col-md-4">
                    <div class="how_work_block text-center">
                        <img src="{{ asset('public/front/images/step-2-icon.png') }}" alt="step-2-icon">
                        <h5>View Information</h5>
                        <p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel ignota fierent
                            eloquentiam
                            id.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-12 col-md-4">
                    <div class="how_work_block text-center">
                        <img src="{{ asset('public/front/images/step-3-icon.png') }}" alt="step-3-icon">
                        <h5>Book, Reach or Call</h5>
                        <p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel ignota fierent
                            eloquentiam
                            id.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start  Fature Category -->
    <section class="featured_cat common_sections">
        <div class="container">
            <div class="row">
                <div class="col-xl-12  text-center">
                    <h4 class="main_heading">Feature Category</h4>
                    <p class="content">Discover our special products. The values make up this brand</p>
                </div>
            </div>
            <div class="row down_panel">
                <div class="col-xl-8 col-12 col-md-8">
                    <a href="">
                        <div class="feature_inner_block  zoom">
                            <img src="{{ asset('public/front/images/Living-Room-img.jpg') }}" alt="Living-Room-img"
                                class="img-fluid alignleft size-medium wp-image-7000">
                            <div class="feature_content text-center">
                                <h5 class="text-capitalize">Living Room</h5>
                            </div>
                        </div>
                    </a>
                    <div class="row">
                        <div class="col-xl-6 col-12 col-md-6">
                            <a href="">
                                <div class="feature_inner_block feature_inner_block2 zoom">
                                    <img src="{{ asset('public/front/images/Kitchen-img.jpg') }}" alt="Kitchen-img"
                                        class="img-fluid alignleft size-medium wp-image-7000">
                                    <div class="feature_content text-center">
                                        <h5 class="text-capitalize">Kitchen</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-6 col-12 col-md-6">
                            <a href="">
                                <div class="feature_inner_block feature_inner_block2 zoom">
                                    <img src="{{ asset('public/front/images/Office-img.jpg') }}" alt="Office-img"
                                        class="img-fluid alignleft size-medium wp-image-7000">
                                    <div class="feature_content text-center">
                                        <h5 class="text-capitalize">Office</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12 col-md-4">
                    <a href="">
                        <div class="feature_inner_block zoom feature_inner_block-big">
                            <img src="{{ asset('public/front/images/Decor-img.jpg') }}" alt="Decor-img"
                                class="img-fluid alignleft size-medium wp-image-7000">
                            <div class="feature_content text-center">
                                <h5 class="text-capitalize">Decor</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-12 text-center">
                    <a href="" class="explore_all" title="Explore All">Explore All</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Start of team section -->
    <section class="team-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4 class="main_heading">
                        Our Experts Team of Craftmen</h4>
                    <p class="content">Handimarts is India&#39;s largest online marketplace, connecting buyers with
                        suppliers
                        and sell your products easily.</p>
                    <!-- </h6> -->
                </div>
            </div>
        </div>
        <ul class="team-carousel">
            <li>
                <div class="box">
                    <div class="img-holder"> <img src="{{ asset('public/front/images/profile-img-01.jpg') }}" /> </div>
                    <div class="box-content">
                        <div class="dealer-experience text-right"> <a href="javaScript:void(0)" class="pull-right"> 6+
                                <small>Years</small> </a> </div>
                        <div class="dealer-details">
                            <div class="dealer-name"> Vinod Sharma </div>
                            <div class="dealer-category"> Interior Designer </div>
                            <ul class="star-ratings">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="box">
                    <div class="img-holder"> <img src="{{ asset('public/front/images/profile-img-02.jpg') }}" /> </div>
                    <div class="box-content">
                        <div class="dealer-experience text-right"> <a href="javaScript:void(0)" class="pull-right"> 6+
                                <small>Years</small> </a> </div>
                        <div class="dealer-details">
                            <div class="dealer-name"> Yashwant Singh </div>
                            <div class="dealer-category"> Interior Designer </div>
                            <ul class="star-ratings">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="box">
                    <div class="img-holder"> <img src="{{ asset('public/front/images/profile-img-03.jpg') }}" /> </div>
                    <div class="box-content">
                        <div class="dealer-experience text-right"> <a href="javaScript:void(0)" class="pull-right"> 6+
                                <small>Years</small> </a> </div>
                        <div class="dealer-details">
                            <div class="dealer-name"> Bhawook Jangid </div>
                            <div class="dealer-category"> Interior Designer </div>
                            <ul class="star-ratings">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="box">
                    <div class="img-holder"> <img src="{{ asset('public/front/images/profile-img-04.jpg') }}" /> </div>
                    <div class="box-content">
                        <div class="dealer-experience text-right"> <a href="javaScript:void(0)" class="pull-right"> 6+
                                <small>Years</small> </a> </div>
                        <div class="dealer-details">
                            <div class="dealer-name"> Vinod Sharma </div>
                            <div class="dealer-category"> Interior Designer </div>
                            <ul class="star-ratings">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="box">
                    <div class="img-holder"> <img src="{{ asset('public/front/images/profile-img-05.jpg') }}" /> </div>
                    <div class="box-content">
                        <div class="dealer-experience text-right"> <a href="javaScript:void(0)" class="pull-right"> 6+
                                <small>Years</small> </a> </div>
                        <div class="dealer-details">
                            <div class="dealer-name"> Yashwant Singh </div>
                            <div class="dealer-category"> Interior Designer </div>
                            <ul class="star-ratings">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </section>
    <!-- END of team-section -->
    <!-- start scale Business -->
    <section class="scales">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-12 px-0">
                    <a href="">
                        <div class="scales_inner">
                            <img src="{{ asset('public/front/images/registration-banner.jpg') }}"
                                alt="registration-banner" class="img-fluid">
                            <div class="scale_content ">
                                <span>Looking for job?</span>
                                <h4>Scale your business</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="or">
                    <span> OR</span>
                </div>
                <div class="col-xl-6 col-md-6 col-12 px-0">
                    <a href="">
                        <div class="scales_inner">
                            <img src="{{ asset('public/front/images/customer-registration-banner.jpg') }}"
                                alt="customer-registration-banner" class="img-fluid">
                            <div class="scale_content scale_content2">
                                <span>You need project done?</span>
                                <h4>Get the job done</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- valuable tips & Tricks -->
    <section class="valuable_tips common_sections">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <h4 class="main_heading">Valuable Tips & Tricks</h4>
                    <p class="content">Learn more about work, craftsman & clients</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4 col-12">
                    <div class="tips_block ">
                        <a href="">
                            <img src="{{ asset('public/front/images/great-book.jpg') }}" alt="great-book"
                                class="img-fluid alignleft size-medium wp-image-7000">
                            <div class="down_panel_trick">
                                Great online book about measurement
                                <p>July 6, 2019 - Ask Expert</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-12">
                    <div class="tips_block  tips_block_none">
                        <a href="">
                            <img src="{{ asset('public/front/images/great-book.jpg') }}" alt="great-book"
                                class="img-fluid alignleft size-medium wp-image-7000">
                            <div class="down_panel_trick">
                                Great online book about measurement
                                <p>July 6, 2019 - Ask Expert</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-12">
                    <div class="tips_block tips_block_none">
                        <a href="">
                            <img src="{{ asset('public/front/images/great-book.jpg') }}" alt="great-book"
                                class="img-fluid alignleft size-medium wp-image-7000">
                            <div class="down_panel_trick">
                                Great online book about measurement
                                <p>July 6, 2019 - Ask Expert</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-12 text-center viewall_btn">
                    <a href="" class="explore_all " title="Explore All">View All</a>
                </div>
            </div>
        </div>
    </section>
@endsection --}}
