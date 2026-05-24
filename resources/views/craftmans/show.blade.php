@extends('layouts.app_craftmans')

@section('content')
    <div class="profile-page ">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="profile-header">
                    <div class="cover">
                        <div class="gray-shade"></div>
                        <figure>
                            <img src="https://via.placeholder.com/1148x272" class="img-fluid" alt="profile cover">
                        </figure>
                        <div class="cover-body d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                <img class="profile-pic" src="{{ $user->image_thumb_path }}" alt="profile">
                                <span class="profile-name mt-4">{{ ucfirst($user->name) }} <span
                                        class="useridsection">({{ $user->user_id }})</span><br>
                                    <span class="userpnsection">{{ ucfirst($user->public_name) }}</span></span>
                            </div>
                            @if ($user->id != $id)
                                <div class="d-none d-md-block">
                                    <a href="{{ url('dashboard/craftmans/enquiries/start_chat/' . $id . '/' . $user->id) }}"
                                        class="btn btn-primary btn-icon-text btn-edit-profile">
                                        <i data-feather="mail" class="btn-icon-prepend"></i> Contact
                                    </a>
                                </div>
                            @else
                                <div class="d-none d-md-block">
                                    <a href="{{ url('dashboard/craftmans/enquiries/' . $id) }}"
                                        class="btn btn-primary btn-icon-text btn-edit-profile">
                                        <i data-feather="mail" class="btn-icon-prepend"></i> Enquiries
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="header-links">
                        <ul class="links d-flex align-items-center mt-3 mt-md-0" role="tablist" id="pills-tab">
                            <!-- <li class="header-link-item d-flex align-items-center active">
                                        <i class="mr-1 icon-md" data-feather="columns"></i>
                                        <a class="pt-1px d-none d-md-block" data-toggle="tab" href="#profile-body-section" role="tab" aria-controls="profile-body-section" aria-selected="true" id="profile-body-tab">Timeline</a>
                                    </li>
                                    <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                        <i class="mr-1 icon-md" data-feather="user"></i>
                                        <a class="pt-1px d-none d-md-block" data-toggle="tab" href="#about-company-section" role="tab" aria-controls="about-company-section" aria-selected="true" id="about-company-tab">About Company</a>
                                    </li>
                                     <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                        <i class="mr-1 icon-md" data-feather="image"></i>
                                        <a class="pt-1px d-none d-md-block" href="#">Photos</a>
                                    </li>
                                    <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                        <i class="mr-1 icon-md" data-feather="video"></i>
                                        <a class="pt-1px d-none d-md-block" href="#">Videos</a>
                                    </li>  -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="row profile-body profile-body-tabs active show" id="profile-body-section" role="tabpanel"
                aria-labelledby="profile-body-tab">
                <!-- left wrapper start -->
                <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper ">
                    <div class="card rounded">
                        <div class="card-body">

                            @if (!empty($user->biographical_info))
                                <div class="d-flex align-items-center justify-content-between mb-2 mt-3">
                                    <h6 class="card-title mb-0">About</h6>
                                </div>
                                <p class="text-muted">{{ $user->biographical_info }}</p>
                            @endif
                            @if (!empty($user->dob))
                                <div class="mt-3">
                                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Date Of Birth:</label>
                                    <p class="text-muted">{{ date('d-m-Y', strtotime($user->dob)) }}</p>
                                </div>
                            @endif
                            @if (!empty($user->address))
                                <div class="mt-3">
                                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Address:</label>
                                    <p class="text-muted">{{ $user->address }} {{ $user->city_name }}</p>
                                    <p class="text-muted">{{ $user->state_name }} {{ $user->country_name }}
                                        ({{ $user->zip_code }})</p>
                                </div>
                            @endif
                            @if (!empty($user->email))
                                <div class="mt-3">
                                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Email:</label>
                                    <p class="text-muted">{{ $user->email }}</p>
                                </div>
                            @endif
                            @if (!empty($user->phone))
                                <div class="mt-3">
                                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Phone:</label>
                                    <p class="text-muted">{{ $user->ccode }}-{{ $user->phone }}</p>
                                </div>
                            @endif

                            <div class="mt-3 d-flex social-links">
                                @if (!empty($user->facebook))
                                    <a href="{{ $user->facebook }}"
                                        class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github"
                                        target="_blank">
                                        <img src="{{ asset('admin/assets/images/icons/facebook.svg') }}" width="18"
                                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather" />
                                    </a>
                                @endif
                                @if (!empty($user->instagram))
                                    <a href="{{ $user->instagram }}"
                                        class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram"
                                        target="_blank">
                                        <img src="{{ asset('admin/assets/images/icons/instagram.svg') }}" width="18"
                                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather" />
                                    </a>
                                @endif
                                @if (!empty($user->website))
                                    <a href="{{ $user->website }}"
                                        class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github"
                                        target="_blank">
                                        <img src="{{ asset('admin/assets/images/icons/google_plus.svg') }}"
                                            width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather" />
                                    </a>
                                @endif
                                @if (!empty($user->pinterest))
                                    <a href="{{ $user->pinterest }}"
                                        class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram"
                                        target="_blank">
                                        <img src="{{ asset('admin/assets/images/icons/pinterest.svg') }}" width="18"
                                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather" />
                                    </a>
                                @endif
                                @if (!empty($user->twitter))
                                    <a href="{{ $user->twitter }}"
                                        class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon twitter"
                                        target="_blank">
                                        <img src="{{ asset('admin/assets/images/icons/twitter.svg') }}" width="18"
                                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-twitter" />
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left wrapper end -->
                <!-- middle wrapper start -->
                <div class="col-md-8 col-xl-6 middle-wrapper">
                    <div class="row">
                        @if (isset($image_gallery))
                            @foreach ($image_gallery as $images)
                                <div class="col-md-12 grid-margin">
                                    <div class="card rounded">
                                        <div class="card-header">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <img class="img-xs rounded-circle"
                                                        src="{{ $user->image_thumb_path }}" alt="">
                                                    <div class="ml-2">
                                                        <p>{{ ucfirst($user->name) }}</p>
                                                        <p class="tx-11 text-muted">
                                                            {{ $images->created_at->diffForHumans() }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <p class=" tx-14">{{ $images->description }}</p>
                                            <img class="img-fluid" src="{{ url('uploads/business/' . $images->images) }}"
                                                alt="">
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
                <!-- middle wrapper end -->
                <!-- right wrapper start -->
                <div class="d-none d-xl-block col-xl-3 right-wrapper">
                    <div class="row">

                        <div class="col-md-12 grid-margin">
                            <div class="card rounded">
                                <div class="card-body">
                                    <h6 class="card-title">Business Details</h6>
                                    @if (isset($business_detail))
                                        @if ($business_detail->company_name != '')
                                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                                <div class="d-flex align-items-center hover-pointer">
                                                    <img class="img-xs"
                                                        src="{{ asset('admin/assets/images/icons/') }}/company_name.png"
                                                        alt="">
                                                    <div class="ml-2">
                                                        <p>{{ $business_detail->company_name }}</p>
                                                        <p class="tx-11 text-muted">Company Name</p>
                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                        @if ($business_detail->website != '')
                                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                                <div class="d-flex align-items-center hover-pointer">
                                                    <img class="img-xs"
                                                        src="{{ asset('admin/assets/images/icons/') }}/company_website.png"
                                                        alt="">
                                                    <div class="ml-2">
                                                        <p>{{ $business_detail->website }}</p>
                                                        <p class="tx-11 text-muted">Company Website</p>
                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                        @if ($business_detail->email != '')
                                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                                <div class="d-flex align-items-center hover-pointer">
                                                    <img class="img-xs"
                                                        src="{{ asset('admin/assets/images/icons/') }}/company_email.png"
                                                        alt="">
                                                    <div class="ml-2">
                                                        <p>{{ $business_detail->email }}</p>
                                                        <p class="tx-11 text-muted">Email</p>
                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                        @if ($business_detail->experience != '')
                                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                                <div class="d-flex align-items-center hover-pointer">
                                                    <img class="img-xs"
                                                        src="{{ asset('admin/assets/images/icons/') }}/experience.png"
                                                        alt="">
                                                    <div class="ml-2">
                                                        <p>{{ $business_detail->experience }}</p>
                                                        <p class="tx-11 text-muted">Work Experience</p>
                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                        @if ($business_detail->job_done != '')
                                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                                <div class="d-flex align-items-center hover-pointer">
                                                    <img class="img-xs"
                                                        src="{{ asset('admin/assets/images/icons/') }}/job_done.png"
                                                        alt="">
                                                    <div class="ml-2">
                                                        <p>{{ $business_detail->job_done }}</p>
                                                        <p class="tx-11 text-muted">Overall Job Done</p>
                                                    </div>
                                                </div>

                                            </div>
                                        @endif


                                        @if ($business_detail->team_size != '')
                                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                                <div class="d-flex align-items-center hover-pointer">
                                                    <img class="img-xs"
                                                        src="{{ asset('admin/assets/images/icons/') }}/users.png"
                                                        alt="">
                                                    <div class="ml-2">
                                                        <p>{{ $business_detail->team_size }}</p>
                                                        <p class="tx-11 text-muted">Team Member</p>
                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                        @if ($business_detail->number_employee != '')
                                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                                <div class="d-flex align-items-center hover-pointer">
                                                    <img class="img-xs"
                                                        src="{{ asset('admin/assets/images/icons/') }}/users.png"
                                                        alt="">
                                                    <div class="ml-2">
                                                        <p>{{ $business_detail->number_employee }}</p>
                                                        <p class="tx-11 text-muted">Team Member</p>
                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                        @if ($business_detail->per_day_fee != '')
                                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                                <div class="d-flex align-items-center hover-pointer">
                                                    <img class="img-xs"
                                                        src="{{ asset('admin/assets/images/icons/') }}/charge_day.png"
                                                        alt="">
                                                    <div class="ml-2">
                                                        <p><strong>{{ $business_detail->per_day_fee }}</strong></p>
                                                        <p class="tx-11 text-muted">Charges for a Day</p>
                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                    @else
                                        Business Details not available
                                    @endif

                                    <!-- <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center hover-pointer">
                                                    <img class="img-xs rounded-circle"
                                                        src="https://via.placeholder.com/37x37" alt="">
                                                    <div class="ml-2">
                                                        <p>Mike Popescu</p>
                                                        <p class="tx-11 text-muted">12 Mutual Friends</p>
                                                    </div>
                                                </div>
                                                <button class="btn btn-icon"><i data-feather="user-plus"
                                                        data-toggle="tooltip" title="Connect"></i></button>
                                            </div> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right wrapper end -->

            </div>
            <!-- <div class="row about-company about-company-tabs" id="about-company-section" role="tabpanel" aria-labelledby="about-company-tab">
                        Its My Company Details
                    </div> -->
        </div>
    </div>
@endsection
