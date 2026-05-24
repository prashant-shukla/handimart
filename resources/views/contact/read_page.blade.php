<div class="col-lg-9 email-content">
    <div class="email-inbox-header">
        <div class="email-head-subject">
            <div class="title d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <a class="active" href="#"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-star text-primary-muted">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg></span></a>
                    <span>{{ $contact->message_heading }}</span>
                </div>
                <div class="icons">
                    <a href="#" class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-share text-muted hover-primary-muted" data-toggle="tooltip"
                            title="" data-original-title="Forward">
                            <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                            <polyline points="16 6 12 2 8 6"></polyline>
                            <line x1="12" y1="2" x2="12" y2="15"></line>
                        </svg></a>
                    <a href="#" class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer text-muted"
                            data-toggle="tooltip" title="" data-original-title="Print">
                            <polyline points="6 9 6 2 18 2 18 9"></polyline>
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                            <rect x="6" y="14" width="12" height="8"></rect>
                        </svg></a>
                    <a href="#" class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash text-muted"
                            data-toggle="tooltip" title="" data-original-title="Delete">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="email-head-sender d-flex align-items-center justify-content-between flex-wrap">
        <div class="d-flex align-items-center">
            <div class="avatar">
                <img src="https://www.nobleui.com/html/template/assets/images/faces/face5.jpg" alt="Avatar"
                    class="rounded-circle user-avatar-md">
            </div>
            <div class="sender d-flex align-items-center">
                <a href="#">{{ $contact->sender_name }}</a> <span>to</span><a href="#">me</a>
                <div class="actions dropdown">
                    <a class="icon" href="#" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg></a>
                    <div class="dropdown-menu" role="menu">
                        <div class="dropdown-divider"></div>
                        <p class="dropdown-item">from: <b>{{ $contact->email }}</b></p>
                        <p class="dropdown-item">subject: <b>{{ $contact->message_heading }}</b></p>
                        <p class="dropdown-item">date: <b>{{ $contact->created_at }}</b></p>
                        <div class="dropdown-divider"></div>
                        <!-- <a class="dropdown-item text-danger" href="#">Delete</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="date" style="float:right">{{ date_format($contact->created_at, 'D M Y') }}</div>
    </div>



    <div class="email-body">
        <p>{{ $contact->message }}</p>
    </div>

    <div class="email-attachments">
        @if ($contact->attachments !== null)
            <div class="title">Attachments <span>({{ $files_count }} files)</span></div>
            <ul>
                @foreach ($files as $file)
                    <li><a href="{{ url('contact/files') . '/' . $file }}" target="_blank"><span
                                data-feather="file"></span> {{ $file }} <span
                                class="text-muted tx-11"></span></a> <span data-feather="download"></span></li>
                @endforeach
            </ul>
        @endif
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="email-body">
            <h5 class="mb-2">Reply: </h5><span style="color:#c4c4c4;">({{ $contact->email }})</span>
            <div class="form-contact-box" style="padding: 1rem 0rem !important;">

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <textarea class="description" name="description"></textarea>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="mail"></i>
                    Send
                </button>

            </div>
        </div>
    </form>




    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea.description',
            height: 180,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>
