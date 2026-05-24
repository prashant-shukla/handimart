@extends('layouts.front')

@section('content')
    <!-- Filter Content In Hiddn SideBar -->
    <div class="lefttside-hidden-bar">
        <div class="hsidebar-header bdrb1">
            <h4 class="list-title">All filters</h4>
            <div class="sidebar-close-icon"><span class="far fa-times"></span></div>
        </div>
        <div class="hsidebar-content">
            <div class="widget-wrapper">
                <div class="sidebar-accordion">
                    <div class="accordion" id="accordionExample2">
                        <div class="card mb20 pb10">
                            <div class="card-header active" id="headingZero">
                                <h4>
                                    <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseZero" aria-expanded="true"
                                        aria-controls="collapseZero">Skills</button>
                                </h4>
                            </div>
                            <div id="collapseZero" class="collapse show" aria-labelledby="headingZero"
                                data-parent="#accordionExample">
                                <div class="card-body card-body px-0 pt-0">
                                    <div class="checkbox-style1">
                                        <label class="custom_checkbox">Designer
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(1,945)</span>
                                        </label>
                                        <label class="custom_checkbox">Web Developers
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(8,136)</span>
                                        </label>
                                        <label class="custom_checkbox">Illustrators
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(917)</span>
                                        </label>
                                        <label class="custom_checkbox">Node.js
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(240)</span>
                                        </label>
                                        <label class="custom_checkbox">Project Managers
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(2,460)</span>
                                        </label>
                                    </div>
                                    <a class="text-thm" href="#">+20 more</a>
                                </div>
                            </div>
                        </div>
                        <div class="card mb20 pb0">
                            <div class="card-header" id="headingOnes">
                                <h4>
                                    <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOnes" aria-expanded="true"
                                        aria-controls="collapseOnes">Price</button>
                                </h4>
                            </div>
                            <div id="collapseOnes" class="collapse" aria-labelledby="headingOnes"
                                data-parent="#accordionExample">
                                <div class="card-body card-body px-0 pt-0">
                                    <!-- Range Slider Mobile Version -->
                                    <div class="range-slider-style2">
                                        <div class="range-wrapper">
                                            <div class="mb10 mt15" id="slider"></div>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <span id="slider-range-value1"></span><i
                                                    class="fa-sharp fa-solid fa-minus mx-2 dark-color icon"></i>
                                                <span id="slider-range-value2"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb20 pb5">
                            <div class="card-header" id="headingTwos">
                                <h4>
                                    <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwos" aria-expanded="true"
                                        aria-controls="collapseTwos">Location</button>
                                </h4>
                            </div>
                            <div id="collapseTwos" class="collapse" aria-labelledby="headingTwos"
                                data-parent="#accordionExample">
                                <div class="card-body card-body px-0 pt-0">
                                    <div class="search_area mb15">
                                        <input type="text" class="form-control" placeholder="What are you looking for?">
                                        <label><span class="flaticon-loupe"></span></label>
                                    </div>
                                    <div class="checkbox-style1 mb15">
                                        <label class="custom_checkbox">United States
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(1,945)</span>
                                        </label>
                                        <label class="custom_checkbox">United Kingdom
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(8,136)</span>
                                        </label>
                                        <label class="custom_checkbox">Canada
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(917)</span>
                                        </label>
                                        <label class="custom_checkbox">Germany
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(240)</span>
                                        </label>
                                        <label class="custom_checkbox">Turkey
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">((2,460)</span>
                                        </label>
                                    </div>
                                    <a class="text-thm" href="#">+20 more</a>
                                </div>
                            </div>
                        </div>
                        <div class="card mb20 pb5">
                            <div class="card-header" id="headingThrees">
                                <h4>
                                    <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThrees" aria-expanded="true"
                                        aria-controls="collapseThrees">Languange</button>
                                </h4>
                            </div>
                            <div id="collapseThrees" class="collapse" aria-labelledby="headingThrees"
                                data-parent="#accordionExample">
                                <div class="card-body card-body px-0 pt-0">
                                    <div class="checkbox-style1 mb15">
                                        <label class="custom_checkbox">Turkish
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(1,945)</span>
                                        </label>
                                        <label class="custom_checkbox">English
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(8,136)</span>
                                        </label>
                                        <label class="custom_checkbox">Italian
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(917)</span>
                                        </label>
                                        <label class="custom_checkbox">Spanish
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(240)</span>
                                        </label>
                                    </div>
                                    <a class="text-thm" href="#">+20 more</a>
                                </div>
                            </div>
                        </div>
                        <div class="card mb20 pb5">
                            <div class="card-header" id="headingFours">
                                <h4>
                                    <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFours" aria-expanded="true"
                                        aria-controls="collapseFours">Level</button>
                                </h4>
                            </div>
                            <div id="collapseFours" class="collapse" aria-labelledby="headingFours"
                                data-parent="#accordionExample">
                                <div class="card-body card-body px-0 pt-0">
                                    <div class="checkbox-style1">
                                        <label class="custom_checkbox">Top Rated Seller
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(1,945)</span>
                                        </label>
                                        <label class="custom_checkbox">Level Two
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(8,136)</span>
                                        </label>
                                        <label class="custom_checkbox">Level One
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(917)</span>
                                        </label>
                                        <label class="custom_checkbox">New Seller
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <span class="right-tags">(240)</span>
                                        </label>
                                    </div>
                                    <a class="text-thm" href="#">+20 more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Filter Content In Hiddn SideBar -->
    <div class="hiddenbar-body-ovelay"></div>

    <!-- Mobile Nav  -->
    <div id="page" class="mobilie_header_nav stylehome1">
        <div class="mobile-menu">
            <div class="header bdrb1">
                <div class="menu_and_widgets">
                    <div class="mobile_menu_bar d-flex justify-content-between align-items-center">
                        <a class="mobile_logo" href="#"><img src="images/header-logo-dark.svg" alt=""></a>
                        <div class="right-side text-end">
                            <a class="" href="page-login.html">join</a>
                            <a class="menubar ml30" href="#menu"><img src="images/mobile-dark-nav-icon.svg"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="posr">
                    <div class="mobile_menu_close_btn"><span class="far fa-times"></span></div>
                </div>
            </div>
        </div>
        <!-- /.mobile-menu -->
        <nav id="menu" class="">
            <ul>
                <li><span>Home</span>
                    <ul>
                        <li><a href="index.html">Home V1</a></li>
                        <li><a href="index2.html">Home V2</a></li>
                        <li><a href="index3.html">Home V3</a></li>
                        <li><a href="index4.html">Home V4</a></li>
                        <li><a href="index5.html">Home V5</a></li>
                        <li><a href="index6.html">Home V6</a></li>
                        <li><a href="index7.html">Home V7</a></li>
                        <li><a href="index8.html">Home V8</a></li>
                        <li><a href="index9.html">Home V9</a></li>
                        <li><a href="index10.html">Home V10</a></li>
                    </ul>
                </li>
                <li><span>Browse Jobs</span>
                    <ul>
                        <li><span>Services</span>
                            <ul>
                                <li><a href="page-service-v1.html">Service v1</a></li>
                                <li><a href="page-service-v2.html">Service v2</a></li>
                                <li><a href="page-service-v3.html">Service v3</a></li>
                                <li><a href="page-service-v4.html">Service v4</a></li>
                                <li><a href="page-service-v5.html">Service v5</a></li>
                                <li><a href="page-service-v6.html">Service v6</a></li>
                                <li><a href="page-service-v7.html">Service v7</a></li>
                                <li><a href="page-service-all.html">Service All</a></li>
                                <li><a href="page-service-single.html">Service Single</a></li>
                            </ul>
                        </li>
                        <li><span>Projects</span>
                            <ul>
                                <li><a href="page-project-v1.html">Project v1</a></li>
                                <li><a href="page-project-single.html">Project Single</a></li>
                            </ul>
                        </li>
                        <li><span>Job View</span>
                            <ul>
                                <li><a href="page-job-list-v1.html">Job list v1</a></li>
                                <li><a href="page-job-list-v2.html">Job list v2</a></li>
                                <li><a href="page-job-list-v3.html">Job list V3</a></li>
                                <li><a href="page-job-list-single.html">Job Single</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><span>Users</span>
                    <ul>
                        <li><span>Dashboard</span>
                            <ul>
                                <li><a href="page-dashboard.html">Dashboard</a></li>
                                <li><a href="page-dashboard-proposal.html">Proposal</a></li>
                                <li><a href="page-dashboard-save.html">Saved</a></li>
                                <li><a href="page-dashboard-message.html">Message</a></li>
                                <li><a href="page-dashboard-reviews.html">Reviews</a></li>
                                <li><a href="page-dashboard-invoice.html">Invoice</a></li>
                                <li><a href="page-dashboard-payouts.html">Payouts</a></li>
                                <li><a href="page-dashboard-statement.html">Statement</a></li>
                                <li><a href="page-dashboard-manage-service.html">Manage Service</a></li>
                                <li><a href="page-dashboard-add-service.html">Add Services</a></li>
                                <li><a href="page-dashboard-manage-jobs.html">Manage Jobs</a></li>
                                <li><a href="page-dashboard-manage-project.html">Manage Project</a></li>
                                <li><a href="page-dashboard-create-project.html">Create Project</a></li>
                                <li><a href="page-dashboard-profile.html">My Profile</a></li>
                            </ul>
                        </li>
                        <li><span>Employee</span>
                            <ul>
                                <li><a href="page-employee-v1.html">Employee V1</a></li>
                                <li><a href="page-employee-v2.html">Employee V2</a></li>
                                <li><a href="page-employee-single.html">Employee Single</a></li>
                            </ul>
                        </li>
                        <li><span>Freelancer</span>
                            <ul>
                                <li><a href="page-freelancer-v1.html">Freelancer V1</a></li>
                                <li><a href="page-freelancer-v2.html">Freelancer V2</a></li>
                                <li><a href="page-freelancer-v3.html">Freelancer V3</a></li>
                                <li><a href="page-freelancer-single.html">Freelancer Single</a></li>
                            </ul>
                        </li>
                        <li><a href="page-become-seller.html">Become Seller</a></li>
                    </ul>
                </li>
                <li><span>Pages</span>
                    <ul>
                        <li><span>About</span>
                            <ul>
                                <li><a href="page-about.html">About v1</a></li>
                                <li><a href="page-about-v2.html">About v2</a></li>
                            </ul>
                        </li>
                        <li><span>Shop</span>
                            <ul>
                                <li><a href="page-shop.html">List</a></li>
                                <li><a href="page-shop-single.html">Single</a></li>
                                <li><a href="page-shop-cart.html">Cart</a></li>
                                <li><a href="page-shop-checkout.html">Checkout</a></li>
                                <li><a href="page-shop-order.html">Order</a></li>
                            </ul>
                        </li>
                        <li><a href="page-contact.html">Contact</a></li>
                        <li><a href="page-error.html">404</a></li>
                        <li><a href="page-faq.html">Faq</a></li>
                        <li><a href="page-help.html">Help</a></li>
                        <li><a href="page-invoice.html">Invoices</a></li>
                        <li><a href="page-login.html">Login</a></li>
                        <li><a href="page-pricing.html">Pricing</a></li>
                        <li><a href="page-register.html">Register</a></li>
                        <li><a href="page-terms.html">Terms</a></li>
                        <li><a href="page-ui-element.html">UI Elements</a></li>
                    </ul>
                </li>
                <li><span>Blog</span>
                    <ul>
                        <li><a href="page-blog-v1.html">List V1</a></li>
                        <li><a href="page-blog-v2.html">List V2</a></li>
                        <li><a href="page-blog-v3.html">List V3</a></li>
                        <li><a href="page-blog-single.html">Single</a></li>
                    </ul>
                </li>
                <!-- Only for Mobile View -->
            </ul>
        </nav>
    </div>

    <div class="body_content">

        <!-- Breadcumb Sections -->
        <section class="breadcumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcumb-style1">
                            <div class="breadcumb-list">
                                <a href="{{ url('/') }}">Home</a>
                                <a href="#">Services</a>
                                <a href="#">Design & Creative</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcumb Sections -->
        <section class="breadcumb-section pt-0">
            <div
                class="cta-service-v1 cta-banner mx-auto maxw1700 pt120 pb120 bdrs16 position-relative overflow-hidden d-flex align-items-center mx20-lg px30-lg">
                <img class="left-top-img wow zoomIn" src="images/vector-img/left-top.png" alt="">
                <img class="right-bottom-img wow zoomIn" src="images/vector-img/right-bottom.png" alt="">
                <img class="service-v1-vector bounce-y d-none d-lg-block" src="images/vector-img/vector-service-v1.png"
                    alt="">
                <div class="container">
                    <div class="row wow fadeInUp">
                        <div class="col-xl-5">
                            <div class="position-relative">
                                <h2>Craftmens</h2>
                                <p class="text mb-0">All the Lorem Ipsum generators on the Internet tend to repeat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Listings All Lists -->
        <section class="pt30 pb90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="list-sidebar-style1 d-none d-lg-block">
                            <div class="accordion" id="accordionExample">
                                <div class="card mb20 pb10 mt-0">
                                    <div class="card-header active" id="heading0">
                                        <h4>
                                            <button class="btn btn-link ps-0 pt-0" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse0"
                                                aria-expanded="true" aria-controls="collapse0">Skills</button>
                                        </h4>
                                    </div>
                                    <div id="collapse0" class="collapse show" aria-labelledby="heading0"
                                        data-parent="#accordionExample">
                                        <div class="card-body card-body px-0 pt-0">
                                            <div class="checkbox-style1 mb15">
                                                <label class="custom_checkbox">UX Designer
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">(1,945)</span>
                                                </label>
                                                <label class="custom_checkbox">Web Developers
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">(8,136)</span>
                                                </label>
                                                <label class="custom_checkbox">Illustrators
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">(917)</span>
                                                </label>
                                                <label class="custom_checkbox">Node.js
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">(240)</span>
                                                </label>
                                                <label class="custom_checkbox">Project Managers
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">((2,460)</span>
                                                </label>
                                            </div>
                                            <a class="text-thm" href="#">+20 more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb20 pb0">
                                    <div class="card-header active" id="heading1">
                                        <h4>
                                            <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse1" aria-expanded="true"
                                                aria-controls="collapse1">Price</button>
                                        </h4>
                                    </div>
                                    <div id="collapse1" class="collapse show" aria-labelledby="heading1"
                                        data-parent="#accordionExample">
                                        <div class="card-body card-body px-0 pt-0">
                                            <!-- Range Slider Desktop Version -->
                                            <div class="range-slider-style1">
                                                <div class="range-wrapper">
                                                    <div class="slider-range mb10 mt15"></div>
                                                    <div class="text-center">
                                                        <input type="text" class="amount" placeholder="$20"><span
                                                            class="fa-sharp fa-solid fa-minus mx-2 dark-color"></span>
                                                        <input type="text" class="amount2" placeholder="$70987">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb20 pb5">
                                    <div class="card-header active" id="heading2">
                                        <h4>
                                            <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse2" aria-expanded="true"
                                                aria-controls="collapse2">Location</button>
                                        </h4>
                                    </div>
                                    <div id="collapse2" class="collapse show" aria-labelledby="heading2"
                                        data-parent="#accordionExample">
                                        <div class="card-body card-body px-0 pt-0">
                                            <div class="search_area mb15">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <label><span class="flaticon-loupe"></span></label>
                                            </div>
                                            <div class="checkbox-style1 mb15">
                                                <label class="custom_checkbox">United States
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">(1,945)</span>
                                                </label>
                                                <label class="custom_checkbox">United Kingdom
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">(8,136)</span>
                                                </label>
                                                <label class="custom_checkbox">Canada
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">(917)</span>
                                                </label>
                                                <label class="custom_checkbox">Germany
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">(240)</span>
                                                </label>
                                                <label class="custom_checkbox">Turkey
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">((2,460)</span>
                                                </label>
                                            </div>
                                            <a class="text-thm" href="#">+20 more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb20 pb5">
                                    <div class="card-header active" id="heading3">
                                        <h4>
                                            <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse3" aria-expanded="true"
                                                aria-controls="collapse3">Languange</button>
                                        </h4>
                                    </div>
                                    <div id="collapse3" class="collapse show" aria-labelledby="heading3"
                                        data-parent="#accordionExample">
                                        <div class="card-body card-body px-0 pt-0">
                                            <div class="checkbox-style1 mb15">
                                                <label class="custom_checkbox">Turkish
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">(1,945)</span>
                                                </label>
                                                <label class="custom_checkbox">English
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">(8,136)</span>
                                                </label>
                                                <label class="custom_checkbox">Italian
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">(917)</span>
                                                </label>
                                                <label class="custom_checkbox">Spanish
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">(240)</span>
                                                </label>
                                            </div>
                                            <a class="text-thm" href="#">+20 more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb20 pb5">
                                    <div class="card-header active" id="heading4">
                                        <h4>
                                            <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse4" aria-expanded="true"
                                                aria-controls="collapse4">Level</button>
                                        </h4>
                                    </div>
                                    <div id="collapse4" class="collapse show" aria-labelledby="heading4"
                                        data-parent="#accordionExample">
                                        <div class="card-body card-body px-0 pt-0">
                                            <div class="checkbox-style1">
                                                <label class="custom_checkbox">Top Rated Seller
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">(1,945)</span>
                                                </label>
                                                <label class="custom_checkbox">Level Two
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">(8,136)</span>
                                                </label>
                                                <label class="custom_checkbox">Level One
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">(917)</span>
                                                </label>
                                                <label class="custom_checkbox">New Seller
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="right-tags">(240)</span>
                                                </label>
                                            </div>
                                            <a class="text-thm" href="#">+20 more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row align-items-center mb20">
                            <div class="col-md-6">
                                <div class="text-center text-md-start">
                                    <p class="text mb-0 mb10-sm"><span class="fw500">5,512</span> services available</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div
                                    class="page_control_shorting d-md-flex align-items-center justify-content-center justify-content-md-end">
                                    <div class="dropdown-lists d-block d-lg-none me-2 mb10-sm">
                                        <ul class="p-0 mb-0 text-center text-md-start">
                                            <li>
                                                <!-- Advance Features modal trigger -->
                                                <button type="button" class="open-btn filter-btn-left"> <img
                                                        class="me-2" src="images/icon/all-filter-icon.svg"
                                                        alt=""> All Filter</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pcs_dropdown dark-color pr10 text-center text-md-end"><span>Sort by</span>
                                        <select class="selectpicker show-tick">
                                            <option>Best Selling</option>
                                            <option>Recommended</option>
                                            <option>New Arrivals</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xl-4">
                                <div class="freelancer-style1 text-center bdr1 hover-box-shadow">
                                    <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                                        <img class="rounded-circle mx-auto" src="images/team/fl-1.png" alt="">
                                        <span class="online"></span>
                                    </div>
                                    <div class="details">
                                        <h5 class="title mb-1">Robert Fox</h5>
                                        <p class="mb-0">Nursing Assistant</p>
                                        <div class="review">
                                            <p><i class="fas fa-star fz10 review-color pr10"></i><span
                                                    class="dark-color fw500">4.9</span> (595 reviews)</p>
                                        </div>
                                        <div class="skill-tags d-flex align-items-center justify-content-center mb5">
                                            <span class="tag">Figma</span>
                                            <span class="tag mx10">Sketch</span>
                                            <span class="tag">HTML5</span>
                                        </div>
                                        <hr class="opacity-100 mt20 mb15">
                                        <div class="fl-meta d-flex align-items-center justify-content-between">
                                            <a class="meta fw500 text-start">Location<br><span
                                                    class="fz14 fw400">London</span></a>
                                            <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">$90 /
                                                    hr</span></a>
                                            <a class="meta fw500 text-start">Job Success<br><span
                                                    class="fz14 fw400">%98</span></a>
                                        </div>
                                        <div class="d-grid mt15">
                                            <a href="page-freelancer-single.html" class="ud-btn btn-light-thm">View
                                                Profile<i class="fal fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="freelancer-style1 text-center bdr1 hover-box-shadow">
                                    <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                                        <img class="rounded-circle mx-auto" src="images/team/fl-2.png" alt="">
                                        <span class="online"></span>
                                    </div>
                                    <div class="details">
                                        <h5 class="title mb-1">Kristin Watson</h5>
                                        <p class="mb-0">Dog Trainer</p>
                                        <div class="review">
                                            <p><i class="fas fa-star fz10 review-color pr10"></i><span
                                                    class="dark-color fw500">4.9</span> (595 reviews)</p>
                                        </div>
                                        <div class="skill-tags d-flex align-items-center justify-content-center mb5">
                                            <span class="tag">Figma</span>
                                            <span class="tag mx10">Sketch</span>
                                            <span class="tag">HTML5</span>
                                        </div>
                                        <hr class="opacity-100 mt20 mb15">
                                        <div class="fl-meta d-flex align-items-center justify-content-between">
                                            <a class="meta fw500 text-start">Location<br><span
                                                    class="fz14 fw400">London</span></a>
                                            <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">$90 /
                                                    hr</span></a>
                                            <a class="meta fw500 text-start">Job Success<br><span
                                                    class="fz14 fw400">%98</span></a>
                                        </div>
                                        <div class="d-grid mt15">
                                            <a href="page-freelancer-single.html" class="ud-btn btn-light-thm">View
                                                Profile<i class="fal fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="freelancer-style1 text-center bdr1 hover-box-shadow">
                                    <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                                        <img class="rounded-circle mx-auto" src="images/team/fl-3.png" alt="">
                                        <span class="online"></span>
                                    </div>
                                    <div class="details">
                                        <h5 class="title mb-1">Darrell Steward</h5>
                                        <p class="mb-0">Medical Assistant</p>
                                        <div class="review">
                                            <p><i class="fas fa-star fz10 review-color pr10"></i><span
                                                    class="dark-color fw500">4.9</span> (595 reviews)</p>
                                        </div>
                                        <div class="skill-tags d-flex align-items-center justify-content-center mb5">
                                            <span class="tag">Figma</span>
                                            <span class="tag mx10">Sketch</span>
                                            <span class="tag">HTML5</span>
                                        </div>
                                        <hr class="opacity-100 mt20 mb15">
                                        <div class="fl-meta d-flex align-items-center justify-content-between">
                                            <a class="meta fw500 text-start">Location<br><span
                                                    class="fz14 fw400">London</span></a>
                                            <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">$90 /
                                                    hr</span></a>
                                            <a class="meta fw500 text-start">Job Success<br><span
                                                    class="fz14 fw400">%98</span></a>
                                        </div>
                                        <div class="d-grid mt15">
                                            <a href="page-freelancer-single.html" class="ud-btn btn-light-thm">View
                                                Profile<i class="fal fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="freelancer-style1 text-center bdr1 hover-box-shadow">
                                    <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                                        <img class="rounded-circle mx-auto" src="images/team/fl-1.png" alt="">
                                        <span class="online"></span>
                                    </div>
                                    <div class="details">
                                        <h5 class="title mb-1">Robert Fox</h5>
                                        <p class="mb-0">Nursing Assistant</p>
                                        <div class="review">
                                            <p><i class="fas fa-star fz10 review-color pr10"></i><span
                                                    class="dark-color fw500">4.9</span> (595 reviews)</p>
                                        </div>
                                        <div class="skill-tags d-flex align-items-center justify-content-center mb5">
                                            <span class="tag">Figma</span>
                                            <span class="tag mx10">Sketch</span>
                                            <span class="tag">HTML5</span>
                                        </div>
                                        <hr class="opacity-100 mt20 mb15">
                                        <div class="fl-meta d-flex align-items-center justify-content-between">
                                            <a class="meta fw500 text-start">Location<br><span
                                                    class="fz14 fw400">London</span></a>
                                            <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">$90 /
                                                    hr</span></a>
                                            <a class="meta fw500 text-start">Job Success<br><span
                                                    class="fz14 fw400">%98</span></a>
                                        </div>
                                        <div class="d-grid mt15">
                                            <a href="page-freelancer-single.html" class="ud-btn btn-light-thm">View
                                                Profile<i class="fal fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="freelancer-style1 text-center bdr1 hover-box-shadow">
                                    <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                                        <img class="rounded-circle mx-auto" src="images/team/fl-2.png" alt="">
                                        <span class="online"></span>
                                    </div>
                                    <div class="details">
                                        <h5 class="title mb-1">Kristin Watson</h5>
                                        <p class="mb-0">Dog Trainer</p>
                                        <div class="review">
                                            <p><i class="fas fa-star fz10 review-color pr10"></i><span
                                                    class="dark-color fw500">4.9</span> (595 reviews)</p>
                                        </div>
                                        <div class="skill-tags d-flex align-items-center justify-content-center mb5">
                                            <span class="tag">Figma</span>
                                            <span class="tag mx10">Sketch</span>
                                            <span class="tag">HTML5</span>
                                        </div>
                                        <hr class="opacity-100 mt20 mb15">
                                        <div class="fl-meta d-flex align-items-center justify-content-between">
                                            <a class="meta fw500 text-start">Location<br><span
                                                    class="fz14 fw400">London</span></a>
                                            <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">$90 /
                                                    hr</span></a>
                                            <a class="meta fw500 text-start">Job Success<br><span
                                                    class="fz14 fw400">%98</span></a>
                                        </div>
                                        <div class="d-grid mt15">
                                            <a href="page-freelancer-single.html" class="ud-btn btn-light-thm">View
                                                Profile<i class="fal fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="freelancer-style1 text-center bdr1 hover-box-shadow">
                                    <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                                        <img class="rounded-circle mx-auto" src="images/team/fl-3.png" alt="">
                                        <span class="online"></span>
                                    </div>
                                    <div class="details">
                                        <h5 class="title mb-1">Darrell Steward</h5>
                                        <p class="mb-0">Medical Assistant</p>
                                        <div class="review">
                                            <p><i class="fas fa-star fz10 review-color pr10"></i><span
                                                    class="dark-color fw500">4.9</span> (595 reviews)</p>
                                        </div>
                                        <div class="skill-tags d-flex align-items-center justify-content-center mb5">
                                            <span class="tag">Figma</span>
                                            <span class="tag mx10">Sketch</span>
                                            <span class="tag">HTML5</span>
                                        </div>
                                        <hr class="opacity-100 mt20 mb15">
                                        <div class="fl-meta d-flex align-items-center justify-content-between">
                                            <a class="meta fw500 text-start">Location<br><span
                                                    class="fz14 fw400">London</span></a>
                                            <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">$90 /
                                                    hr</span></a>
                                            <a class="meta fw500 text-start">Job Success<br><span
                                                    class="fz14 fw400">%98</span></a>
                                        </div>
                                        <div class="d-grid mt15">
                                            <a href="page-freelancer-single.html" class="ud-btn btn-light-thm">View
                                                Profile<i class="fal fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="freelancer-style1 text-center bdr1 hover-box-shadow">
                                    <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                                        <img class="rounded-circle mx-auto" src="images/team/fl-1.png" alt="">
                                        <span class="online"></span>
                                    </div>
                                    <div class="details">
                                        <h5 class="title mb-1">Robert Fox</h5>
                                        <p class="mb-0">Nursing Assistant</p>
                                        <div class="review">
                                            <p><i class="fas fa-star fz10 review-color pr10"></i><span
                                                    class="dark-color fw500">4.9</span> (595 reviews)</p>
                                        </div>
                                        <div class="skill-tags d-flex align-items-center justify-content-center mb5">
                                            <span class="tag">Figma</span>
                                            <span class="tag mx10">Sketch</span>
                                            <span class="tag">HTML5</span>
                                        </div>
                                        <hr class="opacity-100 mt20 mb15">
                                        <div class="fl-meta d-flex align-items-center justify-content-between">
                                            <a class="meta fw500 text-start">Location<br><span
                                                    class="fz14 fw400">London</span></a>
                                            <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">$90 /
                                                    hr</span></a>
                                            <a class="meta fw500 text-start">Job Success<br><span
                                                    class="fz14 fw400">%98</span></a>
                                        </div>
                                        <div class="d-grid mt15">
                                            <a href="page-freelancer-single.html" class="ud-btn btn-light-thm">View
                                                Profile<i class="fal fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="freelancer-style1 text-center bdr1 hover-box-shadow">
                                    <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                                        <img class="rounded-circle mx-auto" src="images/team/fl-2.png" alt="">
                                        <span class="online"></span>
                                    </div>
                                    <div class="details">
                                        <h5 class="title mb-1">Kristin Watson</h5>
                                        <p class="mb-0">Dog Trainer</p>
                                        <div class="review">
                                            <p><i class="fas fa-star fz10 review-color pr10"></i><span
                                                    class="dark-color fw500">4.9</span> (595 reviews)</p>
                                        </div>
                                        <div class="skill-tags d-flex align-items-center justify-content-center mb5">
                                            <span class="tag">Figma</span>
                                            <span class="tag mx10">Sketch</span>
                                            <span class="tag">HTML5</span>
                                        </div>
                                        <hr class="opacity-100 mt20 mb15">
                                        <div class="fl-meta d-flex align-items-center justify-content-between">
                                            <a class="meta fw500 text-start">Location<br><span
                                                    class="fz14 fw400">London</span></a>
                                            <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">$90 /
                                                    hr</span></a>
                                            <a class="meta fw500 text-start">Job Success<br><span
                                                    class="fz14 fw400">%98</span></a>
                                        </div>
                                        <div class="d-grid mt15">
                                            <a href="page-freelancer-single.html" class="ud-btn btn-light-thm">View
                                                Profile<i class="fal fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <div class="freelancer-style1 text-center bdr1 hover-box-shadow">
                                    <div class="thumb w90 mb25 mx-auto position-relative rounded-circle">
                                        <img class="rounded-circle mx-auto" src="images/team/fl-3.png" alt="">
                                        <span class="online"></span>
                                    </div>
                                    <div class="details">
                                        <h5 class="title mb-1">Darrell Steward</h5>
                                        <p class="mb-0">Medical Assistant</p>
                                        <div class="review">
                                            <p><i class="fas fa-star fz10 review-color pr10"></i><span
                                                    class="dark-color fw500">4.9</span> (595 reviews)</p>
                                        </div>
                                        <div class="skill-tags d-flex align-items-center justify-content-center mb5">
                                            <span class="tag">Figma</span>
                                            <span class="tag mx10">Sketch</span>
                                            <span class="tag">HTML5</span>
                                        </div>
                                        <hr class="opacity-100 mt20 mb15">
                                        <div class="fl-meta d-flex align-items-center justify-content-between">
                                            <a class="meta fw500 text-start">Location<br><span
                                                    class="fz14 fw400">London</span></a>
                                            <a class="meta fw500 text-start">Rate<br><span class="fz14 fw400">$90 /
                                                    hr</span></a>
                                            <a class="meta fw500 text-start">Job Success<br><span
                                                    class="fz14 fw400">%98</span></a>
                                        </div>
                                        <div class="d-grid mt15">
                                            <a href="page-freelancer-single.html" class="ud-btn btn-light-thm">View
                                                Profile<i class="fal fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mbp_pagination mt30 text-center">
                                <ul class="page_navigation">
                                    <li class="page-item">
                                        <a class="page-link" href="#"> <span class="fas fa-angle-left"></span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item d-inline-block d-sm-none"><a class="page-link"
                                            href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item d-none d-sm-inline-block"><a class="page-link"
                                            href="#">...</a></li>
                                    <li class="page-item d-none d-sm-inline-block"><a class="page-link"
                                            href="#">20</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><span class="fas fa-angle-right"></span></a>
                                    </li>
                                </ul>
                                <p class="mt10 mb-0 pagination_page_count text-center">1 – 20 of 300+ property available
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
