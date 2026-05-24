<div class="col-lg-9 email-content">
                        <div class="email-inbox-header">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="email-title mb-2 mb-md-0"><span class="icon"><i
                                                data-feather="inbox"></i></span> Inbox <span class="new-messages">(@if ( count($unread_count)!==0) {{count($unread_count)}} @else 0 @endif new
                                            messages)</span> </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="email-search">
                                    <form action="search" method="POST" role="search">
                                    {{ csrf_field() }}
                                        <div class="input-group input-search">
                                            <input class="form-control" name="q" value="{{ request()->has('q') ? $q : '' }}" type="text" placeholder="Search mail..."><span
                                                class="input-group-btn">
                                                <button class="btn btn-outline-secondary" type="submit"><i
                                                        data-feather="search"></i></button></span>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="email-list">
                    @if($contact_list!==null)
                    @if(!$contact_list->isEmpty())
                        @foreach($contact_list as $rec)
                            <div class="email-list-item {{$rec->status=='read' ? 'email-list-item' : 'email-list-item--unread' }}">
                                <div class="email-list-actions">
                                    <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">
                                        </label>
                                    </div>
                                    <a class="favorite" href="#"><span><i data-feather="star"></i></span></a>
                                </div>
                                <a href="{{ url('dashboard/read-contact',$rec->id) }}" class="email-list-detail">
                                    <div>
                                        <span class="from">{{ $rec->sender_name }}</span>
                                        <p class="msg">{{ $rec->message_heading }}</p>
                                    </div>
                                    <span class="date">
                                        @if($rec->attachments !== null)
                                        <span class="icon"><i data-feather="paperclip"></i> </span>
                                        @endif
                                        {{ date_format($rec->created_at,'D d M y') }}
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    @else
                    <div class="no_records_found">
                        No records found yet.
                    </div>
                    @endif
                    @else
                    <div class="no_records_found">
                        No matched records found yet.
                    </div>
                    @endif
                        </div>

                        <div class="email-filters d-flex align-items-center justify-content-between flex-wrap">
                            <div class="email-filters-left flex-wrap d-none d-md-flex">
                                <!-- <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                    </label>
                                </div>
                                <div class="btn-group ml-3">
                                    <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown"
                                        type="button"> With selected <span class="caret"></span></button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#">Mark as read</a>
                                        <a class="dropdown-item" href="#">Mark as unread</a><a class="dropdown-item"
                                            href="#">Spam</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                            href="#">Delete</a>
                                    </div>
                                </div>
                                <div class="btn-group mb-1 mb-md-0">
                                    <button class="btn btn-outline-primary" type="button">Archive</button>
                                    <button class="btn btn-outline-primary" type="button">Span</button>
                                    <button class="btn btn-outline-primary" type="button">Delete</button>
                                </div>
                                <div class="btn-group mb-1 mb-md-0 d-none d-xl-block">
                                    <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown"
                                        type="button">Order by <span class="caret"></span></button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="#">Date</a>
                                        <a class="dropdown-item" href="#">From</a>
                                        <a class="dropdown-item" href="#">Subject</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Size</a>
                                    </div>
                                </div> -->
                            </div>
                            <div class="email-filters-right"><span class="email-pagination-indicator">1-50 of 253</span>
                                <div class="btn-group email-pagination-nav">
                                    <button class="btn btn-outline-secondary btn-icon" type="button"><i
                                            data-feather="chevron-left"></i></button>
                                    <button class="btn btn-outline-secondary btn-icon" type="button"><i
                                            data-feather="chevron-right"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>