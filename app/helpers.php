<?php

use App\CompanySetting;
use App\Auth;
use App\User;
use App\EnquiryContact;
use App\EnquiryRoom;
use App\EnquiryMessage;


if (! function_exists('get_user_profile_pic')) {
  /**
   * Helper to grab the application name
   *
   * @return mixed
   */
  function get_user_profile_pic($id) {
    $userData = User::find($id);
    if(isset($userData) && $userData->image != ''&& file_exists(public_path('uploads/users/').$userData->image) ) {
      return asset('uploads/users/thumb/').'/'.$userData->image;
    } else {
      return asset('uploads/users/no-image.jpg');
    }
  }
}

if (! function_exists('get_user_name')) {
  /**
   * Helper to grab the application name
   *
   * @return mixed
   */
  function get_user_name($id) {
    $userData = User::find($id);
    return ucfirst($userData->first_name.' '.$userData->last_name);
  }
}

if (! function_exists('get_user_id')) {
  /**
   * Helper to grab the application name
   *
   * @return mixed
   */
  function get_user_id($id) {
    $userData = User::find($id);
    return $userData->user_id;
  }
}
if (! function_exists('get_user_recent_chat')) {
  /**
   * Helper to grab the application name
   *
   * @return mixed
   */
  function get_user_recent_chat($id) {
    
    $room_list = EnquiryRoom::where('user_id',$id)->orWhere('room_user_id',$id)->get();
    $roomIds = array();
    if(isset($room_list)) {
        foreach ($room_list as $value) {
            if(!in_array($value->id,$roomIds)) {
                array_push($roomIds, $value->id);
            }
        }   
    }
    $all_messages = EnquiryMessage::whereIn('contact_id',$roomIds)
    ->orderBy('created_at', 'desc')->limit(5)
    ->get()->unique('contact_id');
    if(isset($all_messages)) {
        foreach ($all_messages as $value) {
            if($id == $value->sender_id) {
                $messages_user_data = User::select('id','user_id','image','name','public_name')->find($value->receiver_id);
                
            } else {
                $messages_user_data = User::select('id','user_id','image','name','public_name')->find($value->sender_id);
            }
            if($messages_user_data->image != '' && file_exists(public_path('uploads/users/').$messages_user_data->image)){
                $messages_user_data->image_thumb_path = asset('uploads/users/thumb/').'/'.$messages_user_data->image;
            } else {
                $messages_user_data->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
            }
            $value->messages_user_data = $messages_user_data;
        }
    }
    
    return $all_messages;
  }
}


  if (! function_exists('get_dark_logo')) {
    /**
     * Helper to grab the application name
     *
     * @return mixed
     */
    function get_dark_logo() {
      $company_settings = CompanySetting::first();
      if(isset($company_settings) && $company_settings->dark_logo != ''&& file_exists(public_path('uploads/logo/').$company_settings->dark_logo) ) {
        return asset('uploads/logo/thumb/').'/'.$company_settings->dark_logo;
      } else {
        return asset('admin/assets/images/logo-dark.png');
      }
    }
  }

  if (! function_exists('get_light_logo')) {
    /**
     * Helper to grab the application name
     *
     * @return mixed
     */
    function get_light_logo() {
      $company_settings = CompanySetting::first();
      if(isset($company_settings) && $company_settings->logo != ''&& file_exists(public_path('uploads/logo/').$company_settings->logo) ) {
        return asset('uploads/logo/thumb/').'/'.$company_settings->logo;
      } else {
        return asset('admin/assets/images/logo-dark.png');
      }
    }
  }

  if (! function_exists('admin_favicon')) {
    /**
     * Helper to grab the application name
     *
     * @return mixed
     */
    function admin_favicon() {
      $company_settings = CompanySetting::first();
      if(isset($company_settings) && $company_settings->favicon != ''&& file_exists(public_path('uploads/favicon/thumb/').$company_settings->favicon) ) {
        return asset('uploads/favicon/thumb/').'/'.$company_settings->favicon;
      } else {
        return asset('admin/assets/images/favicon.png');
      }
    }
  }

  if (! function_exists('get_profile_path')) {
    /**
     * Helper to grab the application name
     *
     * @return mixed
     */
    function get_profile_path() {
      $user = auth()->user();
      if($user->role_id == '1') {
        return 'dashboard/home';
      } else if($user->role_id == '2') {   
        return 'dashboard/craftmans/my-profile/profile/'.$user->id;
      } else if($user->role_id == '3') {   
        return 'dashboard/manufacturers/my-profile/profile/'.$user->id;
      } else if($user->role_id == '4') {   
        return 'dashboard/exporters/my-profile/profile/'.$user->id;
      } else if($user->role_id == '5') {   
        return 'dashboard/designers/my-profile/profile/'.$user->id;
      } else if($user->role_id == '6') {   
        return 'dashboard/painters/my-profile/profile/'.$user->id;
      } else if($user->role_id == '7') {   
        return 'dashboard/clients/my-profile/profile/'.$user->id;
      } else if($user->role_id == '8') {   
        return 'dashboard/photographers/my-profile/profile/'.$user->id;
      } 
    }
  }

  if (! function_exists('get_dashboard_path')) {
    /**
     * Helper to grab the application name
     *
     * @return mixed
     */
    function get_dashboard_path() {
      $user = auth()->user();
      if($user->role_id == '1') {
        return 'dashboard/home';
      } else if($user->role_id == '2') {   
        return 'dashboard/craftmans/my-profile/'.$user->id;
      } else if($user->role_id == '3') {   
        return 'dashboard/manufacturers/my-profile/'.$user->id;
      } else if($user->role_id == '4') {   
        return 'dashboard/exporters/my-profile/'.$user->id;
      } else if($user->role_id == '5') {   
        return 'dashboard/designers/my-profile/'.$user->id;
      } else if($user->role_id == '6') {   
        return 'dashboard/painters/my-profile/'.$user->id;
      } else if($user->role_id == '7') {   
        return 'dashboard/clients/my-profile/profile/'.$user->id;
      } else if($user->role_id == '8') {   
        return 'dashboard/photographers/my-profile/'.$user->id;
      } 
    }
  }


function active_class($path, $active = 'active') {
  return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function is_active_route($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

function show_class($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}

