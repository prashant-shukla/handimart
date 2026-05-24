@extends('layouts.app_designers')

@section('content')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
        <!-- <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
              <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
              <input type="text" class="form-control">
            </div>
            <button type="button" class="btn btn-outline-info btn-icon-text mr-2 d-none d-md-block">
              <i class="btn-icon-prepend" data-feather="download"></i>
              Import
            </button>
            <button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="printer"></i>
              Print
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="download-cloud"></i>
              Download Report
            </button>
          </div> -->
    </div>

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Total Views</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2 mt-3">{{ $user->total_views }}</h3>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7 text-right">
                                    <img class="img-dashboard-icon"
                                        src="{{ asset('admin/assets/images/icons/') }}/total_views.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Clients Review</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2 mt-3">{{ $total_reviews }}</h3>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7 text-right">
                                    <img class="img-dashboard-icon"
                                        src="{{ asset('admin/assets/images/icons/') }}/total_reviews.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Posted Job </h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2 mt-3">{{ $total_jobs }}</h3>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7 text-right">
                                    <img class="img-dashboard-icon"
                                        src="{{ asset('admin/assets/images/icons/') }}/job_posted.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Saved Contact</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2 mt-3">{{ $total_contacts }}</h3>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7 text-right">
                                    <img class="img-dashboard-icon"
                                        src="{{ asset('admin/assets/images/icons/') }}/saved_contact.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- row -->


    <div class="row">
        <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2 top-border-custom">
                        <h6 class="card-title mt-2">Inbox</h6>

                    </div>
                    <div class="d-flex flex-column">
                        @if (isset($all_messages) && count($all_messages) > 0)
                            @foreach ($all_messages as $message_data)
                                <a href="{{ url('dashboard/designers/enquiries/' . $id . '/' . $message_data->contact_id) }}"
                                    class="d-flex align-items-center border-bottom py-3">
                                    <div class="mr-3">
                                        <img src="{{ $message_data->messages_user_data->image_thumb_path }}"
                                            class="img-xs rounded-circle width37" alt="user">
                                    </div>
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="text-body">{{ ucfirst($message_data->messages_user_data->name) }}
                                            </h6>
                                            <p class="text-muted tx-12">{{ $message_data->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                        @if ($message_data->message == '' && $message_data->file != '')
                                            <p class="text-muted tx-13">Photo shared</p>
                                        @else
                                            <p class="text-muted tx-13">
                                                {{ \Illuminate\Support\Str::limit($message_data->message, $limit = 18, $end = '...') }}
                                            </p>
                                        @endif

                                    </div>
                                </a>
                            @endforeach
                        @else
                            <div class="d-none d-md-block text-center no-msg-block">
                                <!-- <hr style="margin-top: -10px;"> -->
                                <img src="{{ asset('admin/assets/images/icons/') }}/chat-icon.png" alt="">
                                <h6>No messages yet</h6>
                                <p class="no-msg-txt">Get or send a message and it shows up here</p>
                                <a href="{{ url('dashboard/designers/enquiries/' . $id) }}"
                                    class="btn btn-primary btn-icon-text btn-edit-profile">
                                    <i data-feather="mail" class="btn-icon-prepend"></i> Start Chat
                                </a>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-xl-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Requirements</h6>
                        <a class="btn btn-sm btn-primary add-new-button"
                            href="{{ url('dashboard/designers/jobs_a/create/' . $id) }}"><i class="btn-icon-prepend"
                                data-feather="plus-circle"></i> Add Requirement</a>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Title</th>
                                    <th class="pt-0">Date Posted</th>
                                    <th class="pt-0">Date Expire</th>
                                    <th class="pt-0">Applications</th>
                                    <th class="pt-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($job_listing) > 0)
                                    @foreach ($job_listing as $key => $job_data)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $job_data->name }}</td>
                                            <td>{{ date('F jS, Y', strtotime($job_data->created_at)) }}</td>
                                            <td>{{ date('F jS, Y', strtotime($job_data->closing_date)) }}</td>
                                            <td>{{ $job_data->applications ?? '0' }}</td>
                                            <td><span
                                                    class="badge badge-success">{{ $job_data->status ?? 'New Posted' }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">>Requirements not available.</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
