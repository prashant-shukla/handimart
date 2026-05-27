@extends('layouts.front')

@section('content')
    <!-- Breadcumb Sections -->
    <section class="breadcumb-section wow fadeInUp mt40">
        <div
            class="cta-commmon-v1 cta-banner bgc-thm2 mx-auto maxw1700 pt120 pb120 bdrs16 position-relative overflow-hidden d-flex align-items-center mx20-lg">
            <img class="left-top-img wow zoomIn" src="images/vector-img/left-top.png" alt="">
            <img class="right-bottom-img wow zoomIn" src="images/vector-img/right-bottom.png" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="position-relative wow fadeInUp" data-wow-delay="300ms">
                            <h2 class="text-white">Contact us</h2>
                            <p class="text mb0 text-white">We'd love to talk about how we can help you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Contact Info -->
    <section class="pt-0">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="300ms">
                <div class="col-lg-6">
                    <div class="position-relative mt40">
                        <div class="main-title">
                            <h4 class="form-title mb25">Keep In Touch With Us.</h4>
                            <p class="text">For in-depth information, explore our website or contact us directly
                            </p>
                        </div>
                        @if ($content)
                            <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                                <div class="icon flex-shrink-0"><span class="flaticon-tracking"></span></div>
                                <div class="details">
                                    <h5 class="title">Address</h5>
                                    <p class="mb-0 text">{{ $content->address }}, {{ $content->city }},<br>
                                        {{ $content->state }},
                                        {{ $content->country }}, {{ $content->zip_code }}
                                    </p>
                                </div>
                            </div>
                            <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                                <div class="icon flex-shrink-0"><span class="flaticon-call"></span></div>
                                <div class="details">
                                    <h5 class="title">Phone</h5>
                               
                                    <p class="mb-0 text ">+(91) {{ $content->phone }} , +(91) {{ $content->mobile }}</p>
                                </div>
                            </div>
                            <div class="iconbox-style1 contact-style d-flex align-items-start mb30">
                                <div class="icon flex-shrink-0"><span class="flaticon-mail"></span></div>
                                <div class="details">
                                    <h5 class="title">Email for Inquiries & Job</h5>
                                    <p class="mb-0 text " >{{ $content->email }} , {{ $content->career_email }}</p>
                                </div>
                            </div>
                        @else
                            <p class="text">Company contact details will appear here once saved in the admin settings.</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-page-form default-box-shadow1 bdrs8 bdr1 p50 mb30-md bgc-white">
                        <h4 class="form-title mb25">Tell us about yourself</h4>
                        <p class="text mb30">Whether you have questions or you would just like to say hello, contact us.
                        </p>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('contact_submit') }}" method="post" class="form-style1">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb20">
                                        <label class="heading-color ff-heading fw500 mb10" for="">Full Name</label>
                                        <input type="text" name="sender_name" class="form-control"
                                            placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb20">
                                        <label class="heading-color ff-heading fw500 mb10" for="">Email
                                            Address</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="example@email.com">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb20">
                                        <label class="heading-color ff-heading fw500 mb10" for="">Phone
                                            Number</label>
                                        <input type="numb" name="phone" class="form-control" placeholder="12345 67890">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb20">
                                        <label class="heading-color ff-heading fw500 mb10" for="">Messages</label>
                                        <textarea name="message" id="" cols="30" rows="6" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <button type="submit" class="ud-btn btn-thm" href="page-contact.html">Send
                                            Messages<i class="fal fa-arrow-right-long"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Map -->
    <section class="p-0 wow fadeInUp" data-wow-delay="300ms">
        <div class="mx-auto maxw1700 bdrs16 position-relative mx20-lg">
            <iframe class="contact-page-map" loading="lazy"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14304.602125638285!2d73.06580100484454!3d26.32162472346856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39418d4f53cf6ca9%3A0x158aa378c6375da7!2sNarayan%20Art%20%26%20Craft!5e0!3m2!1sen!2sin!4v1779873697905!5m2!1sen!2sin"
                title="London Eye, London, United Kingdom" aria-label="London Eye, London, United Kingdom"></iframe>
        </div>
    </section>

    <!-- Faq -->
    <section class="pb70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto wow fadeInUp" data-wow-delay="300ms">
                <div class="main-title text-center">
                    <h2 class="title">Frequently Asked Questions</h2>
                    <p class="paragraph mt10">
                        Find answers about HandiMart registration, services, and professionals.
                    </p>
                </div>
            </div>
        </div>

        <div class="row wow fadeInUp" data-wow-delay="300ms">
            <div class="col-lg-8 mx-auto">
                <div class="ui-content">
                    <div class="accordion-style1 faq-page">

                        <div class="accordion" id="accordionExample">

                            <!-- FAQ 1 -->
                            <div class="accordion-item active">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne"
                                        aria-expanded="true"
                                        aria-controls="collapseOne">
                                        What is HandiMart?
                                    </button>
                                </h2>

                                <div id="collapseOne"
                                    class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne"
                                    data-parent="#accordionExample">

                                    <div class="accordion-body">
                                        HandiMart connects customers with craftsmen, designers,
                                        photographers, painters, manufacturers, exporters,
                                        and creative professionals across India.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 2 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo"
                                        aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Is registration free on HandiMart?
                                    </button>
                                </h2>

                                <div id="collapseTwo"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">

                                    <div class="accordion-body">
                                        Yes, registration is completely free for all craftsmen,
                                        freelancers, manufacturers, exporters, and service professionals.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 3 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree"
                                        aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Who can join HandiMart?
                                    </button>
                                </h2>

                                <div id="collapseThree"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingThree"
                                    data-parent="#accordionExample">

                                    <div class="accordion-body">
                                        Carpenters, furniture makers, artists, photographers,
                                        painters, interior designers, manufacturers, exporters,
                                        and all skilled professionals can join HandiMart.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 4 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour"
                                        aria-expanded="false"
                                        aria-controls="collapseFour">
                                        Can I upload my portfolio and business details?
                                    </button>
                                </h2>

                                <div id="collapseFour"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingFour"
                                    data-parent="#accordionExample">

                                    <div class="accordion-body">
                                        Yes, users can upload portfolio images, services,
                                        business information, and contact details to showcase their work.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 5 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive"
                                        aria-expanded="false"
                                        aria-controls="collapseFive">
                                        How can customers contact professionals?
                                    </button>
                                </h2>

                                <div id="collapseFive"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingFive"
                                    data-parent="#accordionExample">

                                    <div class="accordion-body">
                                        Customers can directly contact professionals through
                                        phone, WhatsApp, email, or inquiry forms available on profiles.
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
