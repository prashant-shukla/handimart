@extends('layouts.app_photographers')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('warning'))
<div class="alert alert-warning">
  <p>{{ $message }}</p>
</div>
@endif
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

<div class="row chat-wrapper">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row position-relative">
                    <div class="col-lg-4 chat-aside border-lg-right">
                        <div class="aside-content">
                            <div class="aside-header">
                                <div class="d-flex justify-content-between align-items-center pb-2 mb-2">
                                    <div class="d-flex align-items-center">
                                        <figure class="mr-2 mb-0">
                                            <img src="{{$user_details->image_thumb_path}}" class="img-sm rounded-circle width43"
                                                alt="profile">
                                            <!-- <div class="status online"></div> -->
                                        </figure>
                                        <div>
                                            <h6>{{ucfirst($user_details->first_name)}} {{ucfirst($user_details->last_name)}}</h6>
                                            <p class="text-muted tx-13">{{ucfirst($user_details->public_name)}}</p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <form class="search-form" id="searchFormChat">
                                    <div class="input-group border rounded-sm">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-0 rounded-sm">
                                                <i data-feather="search" class="icon-md cursor-pointer"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control  border-0 rounded-sm" id="searchFormInput"
                                            placeholder="Search New contacts...">
                                    </div>
                                </form>
                            </div>
                            <div class="aside-body chatSearchBody" style="display: none;"></div>
                            <div class="aside-body chatNavBody">
                                <ul class="nav nav-tabs mt-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="chats-tab" data-toggle="tab" href="#chats"
                                            role="tab" aria-controls="chats" aria-selected="true">
                                            <div class="d-flex flex-row flex-lg-column flex-xl-row align-items-center">
                                                <i data-feather="message-square"
                                                    class="icon-sm mr-sm-2 mr-lg-0 mr-xl-2 mb-md-1 mb-xl-0"></i>
                                                <p class="d-none d-sm-block">Chats</p>
                                            </div>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" id="contacts-tab" data-toggle="tab" href="#contacts"
                                            role="tab" aria-controls="contacts" aria-selected="false">
                                            <div class="d-flex flex-row flex-lg-column flex-xl-row align-items-center">
                                                <i data-feather="users"
                                                    class="icon-sm mr-sm-2 mr-lg-0 mr-xl-2 mb-md-1 mb-xl-0"></i>
                                                <p class="d-none d-sm-block">Contacts</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-3">
                                    <div class="tab-pane fade show active" id="chats" role="tabpanel"
                                        aria-labelledby="chats-tab">
                                        <div>
                                            <p class="text-muted mb-1">Recent chats</p>
                                            <ul class="list-unstyled chat-list px-1">
                                                @if(isset($all_messages))
                                                @foreach($all_messages as $message_data)
                                                    <li class="chat-item pr-1">
                                                        <a href="{{ url('dashboard/photographers/enquiries/'.$id.'/'.$message_data->contact_id) }}" class="d-flex align-items-center">
                                                            <figure class="mb-0 mr-2">
                                                                <img src="{{ $message_data->messages_user_data->image_thumb_path }}"
                                                                    class="img-xs rounded-circle width37" alt="user" >
                                                                <!-- <div class="status online"></div> -->
                                                            </figure>
                                                            <div
                                                                class="d-flex justify-content-between flex-grow border-bottom">
                                                                <div>
                                                                    <p class="text-body font-weight-bold">{{ ucfirst($message_data->messages_user_data->name) }}</p>
                                                                    <p class="text-muted tx-13">{{ \Illuminate\Support\Str::limit($message_data->message, $limit = 26, $end = '...') }}</p>
                                                                </div>
                                                                <div class="d-flex flex-column align-items-end">
                                                                    <p class="text-muted tx-13 mb-1">{{ $message_data->created_at->diffForHumans() }}</p>
                                                                    @if($message_data->unread_count > 0)
                                                                    <div class="badge badge-pill badge-primary ml-auto">{{ $message_data->unread_count }}
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contacts" role="tabpanel"
                                        aria-labelledby="contacts-tab">
                                        <p class="text-muted mb-1">Contacts</p>
                                        <ul class="list-unstyled chat-list px-1">
                                            @if(isset($contact_list))
                                            @foreach($contact_list as $contact_data)
                                                <li class="chat-item pr-1">
                                                    <div class="d-flex align-items-center aasdiv">
                                                        <figure class="mb-0 mr-2">
                                                            <img src="{{ $contact_data->contact_user_data->image_thumb_path }}"
                                                                class="img-xs rounded-circle width37" alt="user" >
                                                            
                                                        </figure>
                                                        <div
                                                            class="d-flex align-items-center justify-content-between flex-grow border-bottom">
                                                            <div>
                                                                <p class="text-body">{{ ucfirst($contact_data->contact_user_data->name) }}</p>
                                                                <div class="d-flex align-items-center">
                                                                    <p class="text-muted tx-13"> {{ ucfirst($contact_data->contact_user_data->public_name) }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-end text-body">
                                                                <a href="{{ url('dashboard/photographers/enquiries/start_chat/'.$id.'/'.$contact_data->contact_user_data->id) }}">
                                                                    <i  data-feather="message-square" class="icon-md text-success mr-2" data-toggle="tooltip"
                                                                    title="Start Chat"></i>
                                                                </a>
                                                                <a href="{{ url('dashboard/photographers/enquiries/remove_contact/'.$id.'/'.$contact_data->contact_user_data->id.'/'.$enq_id) }}">
                                                                    <i data-feather="trash" class="icon-md text-danger" data-toggle="tooltip" title="Remove from contacts"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($messages_user_data_all != '')
                    <div class="col-lg-8 chat-content">
                        <div class="chat-header border-bottom pb-2">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <i data-feather="corner-up-left" id="backToChatList"
                                        class="icon-lg mr-2 ml-n2 text-muted d-lg-none"></i>
                                    <figure class="mb-0 mr-2">
                                        <img src="{{ $messages_user_data_all->image_thumb_path }}" class="img-sm rounded-circle width43"
                                            alt="image" >
                                        <!-- <div class="status online"></div>
                                        <div class="status online"></div> -->
                                    </figure>
                                    <div>
                                        <p>{{ ucfirst($messages_user_data_all->name) }}</p>
                                        <p class="text-muted tx-13">{{ ucfirst($messages_user_data_all->public_name) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mr-n1">
                                    @if($added_contact == 1) 
                                    <a href="{{ url('dashboard/photographers/enquiries/remove_contact/'.$id.'/'.$messages_user_data_all->id.'/'.$enq_id) }}" class="d-none d-sm-block">
                                        <i data-feather="user-minus" class="icon-lg text-muted" data-toggle="tooltip"
                                            title="Remove from contacts"></i>
                                    </a>
                                    @else
                                    <a href="{{ url('dashboard/photographers/enquiries/save_contact/'.$id.'/'.$messages_user_data_all->id.'/'.$enq_id) }}" class="d-none d-sm-block">
                                        <i data-feather="user-plus" class="icon-lg text-muted" data-toggle="tooltip"
                                            title="Add to contacts"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="chat-body">
                            <ul class="messages">
                                @if(isset($messages_list))
                                    @foreach($messages_list as $message_list_data)
                                        @if($message_list_data->sender == 'other')
                                        <li class="message-item  friend ">
                                            <img src="{{ $messages_user_data_all->image_thumb_path }}" class="img-xs rounded-circle"
                                                alt="avatar">
                                            <div class="content">
                                                <div class="message">
                                                    @if($message_list_data->chat_img_path != '')
                                                    
                                                    <img class="chat_img" src="{{$message_list_data->chat_img_path}}"><br>
                                                    @else

                                                    <div class="bubble">
                                                        <p>{{ $message_list_data->message }}</p>
                                                        
                                                    </div>
                                                    @endif
                                                    <span>{{ $message_list_data->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </li>
                                        @else
                                        <li class="message-item  me ">
                                            <img src="{{ $user_details->image_thumb_path }}" class="img-xs rounded-circle"
                                                alt="avatar">
                                            <div class="content">
                                                <div class="message">
                                                    @if($message_list_data->chat_img_path != '')
                                                    <img class="chat_img" src="{{$message_list_data->chat_img_path}}">
                                                    @else
                                                    
                                                    <div class="bubble">
                                                        <p>{{ $message_list_data->message }}
                                                        </p>
                                                        
                                                        
                                                    </div>
                                                    @endif
                                                    <span>{{ $message_list_data->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </li>
                                        @endif 
                                    @endforeach
                                @endif  
                            </ul>
                        </div>
                        <div class="chat-footer d-flex">
                            
                            <div class="d-none d-md-block">
                                <input type="file" id="imgupload" name="imgupload" accept="image/jpg,image/png,image/jpeg,image/gif" style="display:none"/> 
                                <button type="button" class="btn border btn-icon rounded-circle mr-2" data-toggle="tooltip" title="Attatch files" id="imguploadBtn">
                                    <i data-feather="paperclip" class="text-muted"></i>
                                </button>
                            </div>
                            
                            <form class="search-form flex-grow mr-2">
                                <div class="input-group">
                                    <input type="text" class="form-control rounded-pill" id="chatForm" placeholder="Type a message">
                                    <input type="hidden" class="" id="receiver_id" value="{{ $messages_user_data_all->id }}">
                                    <input type="hidden" class="" id="sender_id" value="{{ $id }}">
                                    <input type="hidden" class="" id="contact_id" value="{{ $enq_id }}">
                                </div>
                            </form>
                            <div>
                                <button type="button" class="btn btn-primary btn-icon rounded-circle chatSendNow">
                                    <i data-feather="send"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @else 
                    <input type="hidden" class="" id="sender_id" value="{{ $id }}">
                    <input type="hidden" class="" id="contact_id" value="{{ $enq_id }}">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var root_path = "{{URL::to('dashboard/photographers/enquiries')}}";
    var csrf_token = "{{ csrf_token() }}";
</script>
@endsection