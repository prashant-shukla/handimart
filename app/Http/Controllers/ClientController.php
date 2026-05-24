<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\User;
use App\Country;
use App\State;
use App\City;
use App\BusinessDetails;
use App\ImageGallery;
use App\Review;
use App\ReviewImage;
use App\ReviewReply;
use App\ContactList;
use App\EnquiryContact;
use App\EnquiryRoom;
use App\EnquiryMessage;
use DB;
use Hash;
use View;
Use Auth;
// use Intervention\Image\ImageManagerStatic;
use Intervention\Image\Facades\Image;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user= Auth::user();
            // check user only craftman and 
            if($this->user->role_id != '7' && $this->user->role_id != '1'){
                return redirect()->route('index');
            }
            if($this->user->role_id != '1') {
                if(isset($request->id) && $request->id != 0) {
                    if($this->user->id != $request->id) {
                        return redirect()->route('index');
                    }
                }
            }
            return $next($request);
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id,$user_id = 0)
    {
        if($user_id == 0) {
            $user_id = $id;
        }
        $user = User::find($user_id);
        $business_detail = BusinessDetails::where('user_id',$user_id)->first();
        $page_title = 'profile-page';
        if(!isset($user)) {
            return redirect()->route('clients')
            ->with('warning','User not found');
        }
        if($user->image != '' && file_exists(public_path('uploads/users/').$user->image)){
            $user->image_thumb_path = asset('uploads/users/thumb/').'/'.$user->image;
        } else {
            $user->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
        }
        $user_city_data = City::select('name')->find($user->city);
        if(isset($user_city_data)) {
            $user->city_name = $user_city_data->name.',';
        } else {
            $user->city_name = '';
        }
        $user_state_data = State::select('name')->find($user->state);
        if(isset($user_state_data)) {
            $user->state_name = $user_state_data->name.',';
        } else {
            $user->state_name = '';
        } 
        $user_country_data = Country::select('name')->find($user->country_id);
        if(isset($user_country_data)) {
            $user->country_name = $user_country_data->name;
        } else {
            $user->country_name = '';
        }
        
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $countries = Country::orderBy('name', 'ASC')->get();
        $states = State::where('country_id',$user->country_id)->orderBy('name', 'ASC')->get();
        $cities = City::where('state_id',$user->state)->orderBy('name', 'ASC')->get();
        
        $image_gallery=ImageGallery::where('user_id',$user_id)->orderBy('id','DESC')->get();
        
        return view('clients.show',compact('user','roles','userRole','id','user_id','page_title','countries','states','cities','image_gallery','business_detail'));
    }

    public function dashboard($id)
    {
        $user = User::find($id);
        $total_reviews = Review::where('receiver_id',$id)->count();
        $total_jobs = Job::where('user_id',$id)->count();
        $total_contacts = EnquiryContact::where('user_id',$id)->count();
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
        ->orderBy('created_at', 'desc')->limit(7)
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

        $job_listing = Job::where('user_id',$id)->limit(10)->get();
        
        return view('clients.dashboard',compact('user','id','total_reviews','total_jobs','total_contacts','all_messages','job_listing'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function personal_detail($id)
    {
        $page_title = 'personal-detail';
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('users')
            ->with('warning','User not found');
        }
        if($user->image != '' && file_exists(public_path('uploads/users/').$user->image)){
            $user->image_thumb_path = asset('uploads/users/thumb/').'/'.$user->image;
        } else {
            $user->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
        }

        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $countries = Country::orderBy('name', 'ASC')->get();
        $states = State::where('country_id',$user->country_id)->orderBy('name', 'ASC')->get();
        $cities = City::where('state_id',$user->state)->orderBy('name', 'ASC')->get();
        return view('clients.edit',compact('user','roles','userRole','id','page_title','countries','states','cities'));
    }
    public function social_detail($id)
    {
        $page_title = 'social-detail';
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('users')
            ->with('warning','User not found');
        }
        if($user->image != '' && file_exists(public_path('uploads/users/').$user->image)){
            $user->image_thumb_path = asset('uploads/users/thumb/').'/'.$user->image;
        } else {
            $user->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
        }

        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $countries = Country::orderBy('name', 'ASC')->get();
        $states = State::where('country_id',$user->country_id)->orderBy('name', 'ASC')->get();
        $cities = City::where('state_id',$user->state)->orderBy('name', 'ASC')->get();
        
        return view('clients.edit',compact('user','roles','userRole','id','page_title','countries','states','cities'));
    }
    
    public function update_password($id)
    {
        $page_title = 'update-password';
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('users')
            ->with('warning','User not found');
        }
        if($user->image != '' && file_exists(public_path('uploads/users/').$user->image)){
            $user->image_thumb_path = asset('uploads/users/thumb/').'/'.$user->image;
        } else {
            $user->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
        }

        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        
        return view('clients.edit',compact('user','roles','userRole','id','page_title'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function personal_submit(Request $request, $id)
    {

        $valid_otp = "123456";
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            // 'aadhar1' => 'required',
            // 'aadhar2' => 'required',
            // 'aadhar3' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            // 'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'required|unique:users,phone,'.$id,
            // 'otp' => 'in:'.$valid_otp,
            'avatar' => 'mimes:jpg,jpeg,png|max:2048',
        ]);
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('users')
            ->with('warning','Users not found');
        }
        if(isset($request->avatar)) {
            
        
            $fileName = 'user_avatar_'.time().'.'.$request->avatar->extension();  
                
            $thumb = Image::make($request->avatar->getRealPath())->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });

            $request->avatar->move(public_path('uploads/users'), $fileName);
            $thumb->save(public_path('uploads/users/thumb/').$fileName);
        } else{
            $fileName = $user->image;
        }
        $input = $request->all();

        $input['phone_verified'] = '1'; // after opt functional we will do confirmation here
        $input['name'] = $input['first_name'].' '.$input['last_name'];
        $input['image']=$fileName;  
        unset($input['otp']);
        unset($input['username']);
        unset($input['avatar']);
        unset($input['user_id']);
       
        $user->update($input);
        
        return redirect()->route('clients.personal-detail',$id)
                        ->with('success','Clients updated successfully');
    }

    public function social_submit(Request $request, $id)
    {
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('users')
            ->with('warning','Clients not found');
        }        
        $input = $request->all();
        $input['new_added'] = '0';
        $user->update($input);
        return redirect()->route('clients.personal-detail',$id)
                        ->with('success','Clients social detail updated successfully');
    }


    public function password_submit(Request $request, $id)
    {

        $this->validate($request, [
            'new_password' => 'required|same:confirm_password',
            'old_password' => 'required|password',
        ]);
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('users')
            ->with('warning','Clients not found');
        }
        
        $input['password'] = Hash::make($request->new_password);
        $user->update($input);

        return redirect()->route('clients.personal-detail',$id)
                        ->with('success','Clients password updated successfully');
    }

    public function business_detail($id)
    {
        $page_title = 'business-detail';
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('users')
            ->with('warning','User not found');
        }
        if($user->image != '' && file_exists(public_path('uploads/users/').$user->image)){
            $user->image_thumb_path = asset('uploads/users/thumb/').'/'.$user->image;
        } else {
            $user->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
        }
        
        $roles = Role::whereNotIn('name', ['Admin','clients'])->get();
        
        
        $userRole = $user->roles->pluck('name','name')->all();
        return view('clients.business_details',compact('user','roles','userRole','id','page_title'));
    }

    public function service_submit(Request $request, $id)
    {
        $this->validate($request, [
            'service_type' => 'required'
        ]);

        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('users')
            ->with('warning','User not found');
        }
        $new_role_id = $request->input('service_type');
        //code here for save user role and redirect to specific route 
        $user->assignRole($new_role_id);
            
        $user->role_id = $new_role_id;
        $user->save();
        $response_message = 'Service Provided successfully, Please fill business details and can start service.';
        if($new_role_id == '2') {
            return redirect()->route('craftmans.business-detail',$id)
                        ->with('success',$response_message);
        } else if($new_role_id == '3') {
            return redirect()->route('manufacturers.business-detail',$id)
                        ->with('success',$response_message);
        } else if($new_role_id == '4') {
            return redirect()->route('exporters.business-detail',$id)
                        ->with('success',$response_message);
        } else if($new_role_id == '5') {
            return redirect()->route('designers.business-detail',$id)
                        ->with('success',$response_message);
        } else if($new_role_id == '6') {
            return redirect()->route('painters.business-detail',$id)
                        ->with('success',$response_message);
        } else if($new_role_id == '8') {
            return redirect()->route('photographers.business-detail',$id)
                        ->with('success',$response_message);
        } else {
            return redirect()->route('clients.business-detail',$id)
                       ->with('success',$response_message);
        }
        
    }

    // Reviews Section Start
    public function reviews($id)
    {
        $received_reviews = Review::where('receiver_id',$id)->get();
        //get sender data
        foreach ($received_reviews as $value) {
            // get replies here
            $review_reply = ReviewReply::join('users','users.id', '=', 'review_replies.sender_id')->select('review_replies.*','users.name','users.user_id','users.image','users.public_name')->where('review_replies.review_id',$value->id)->get();

            if(isset($review_reply)) {
                foreach ($review_reply as $value_reply) {
                    if($value_reply->image != '' && file_exists(public_path('uploads/users/').$value_reply->image)){
                        $value_reply->user_image_thumb_path = asset('uploads/users/thumb/').'/'.$value_reply->image;
                    } else {
                        $value_reply->user_image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
                    }
                }
                $value->review_reply = $review_reply;
            }

            $sender_data = User::select('user_id','image','name','public_name')->find($value->sender_id);
            if($sender_data->image != '' && file_exists(public_path('uploads/users/').$sender_data->image)){
                $sender_data->image_thumb_path = asset('uploads/users/thumb/').'/'.$sender_data->image;
            } else {
                $sender_data->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
            }
            $value->sender_data = $sender_data;
            $review_images = ReviewImage::where('review_id',$value->id)->get();
            if(isset($review_images)) {
                foreach ($review_images as $key => $image_val) {
                    if(file_exists(public_path('uploads/review/').$image_val->image)) {
                        $image_val->image_path = asset('uploads/review/').'/'.$image_val->image;
                    } else {
                        $image_val->image_path = asset('uploads/review/').'/'.'no-image.jpg';
                    }
                }
            }
            $value->$review_images;
        }
        $sent_reviews = Review::where('sender_id',$id)->get();

        foreach ($sent_reviews as $value) {
            // get replies here
            $review_reply = ReviewReply::join('users','users.id', '=', 'review_replies.sender_id')->select('review_replies.*','users.name','users.user_id','users.image','users.public_name')->where('review_replies.review_id',$value->id)->get();

            if(isset($review_reply)) {
                foreach ($review_reply as $value_reply) {
                    if($value_reply->image != '' && file_exists(public_path('uploads/users/').$value_reply->image)){
                        $value_reply->user_image_thumb_path = asset('uploads/users/thumb/').'/'.$value_reply->image;
                    } else {
                        $value_reply->user_image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
                    }
                }
                $value->review_reply = $review_reply;
            }
            
            $receiver_data = User::select('user_id','image','name','public_name')->find($value->receiver_id);
            if($receiver_data->image != '' && file_exists(public_path('uploads/users/').$receiver_data->image)){
                $receiver_data->image_thumb_path = asset('uploads/users/thumb/').'/'.$receiver_data->image;
            } else {
                $receiver_data->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
            }
            $value->receiver_data = $receiver_data;
            $review_images = ReviewImage::where('review_id',$value->id)->get();
            if(isset($review_images)) {
                foreach ($review_images as $key => $image_val) {
                    if(file_exists(public_path('uploads/review/').$image_val->image)) {
                        $image_val->image_path = asset('uploads/review/').'/'.$image_val->image;
                        $image_val->image_thumb_path = asset('uploads/review/thumb/').'/'.$image_val->image;
                    } else {
                        $image_val->image_path = asset('uploads/review/').'/'.'no-image.jpg';
                        $image_val->image_thumb_path = asset('uploads/review/thumb/').'/'.'no-image.jpg';
                    }
                }
                $value->review_images = $review_images;
            }
        }
        
        return view('clients.reviews',compact('id','received_reviews','sent_reviews'));
    }


    public function get_review_details(Request $request)
    {
        $review_id = $request['review_id'];
        
        if($review_id != '') {

            $review_data = Review::select('id','title','description','ratings')->find($review_id);
            if(isset($review_data)) {
                return response()->json(array('status'=> 'success','data'=>$review_data), 200);
            }
            
        }
        return response()->json(array('status'=> 'fail','data'=>''), 200);
        // return true; 
        
    }

    public function update_review_details(Request $request)
    {
        $review_id = $request['review_id'];
        $review_title = $request['review_title'];
        $review_description = $request['review_description'];
        $review_ratings = $request['review_ratings'];
        
        if($review_id != '') {
            $input['title'] = $review_title;
            $input['description'] = $review_description;
            $input['ratings'] = $review_ratings;

            $review_data = Review::find($review_id);
            $statuss = $review_data->update($input);
            if(isset($review_data)) {
                $rating_html = '';

                for($i=1;$i<=$review_data->ratings;$i++) {

                    $rating_html .= '<i class="fa fa-star fa-yellow" ></i>';
                }
                if($review_data->ratings < 5) {

                    $less_rating = 5 - $review_data->ratings;
                    for($i=1;$i<=$less_rating;$i++) {
                        $rating_html .= '<i class="fa fa-star fa-gray" ></i>';
                    }
                }
                
                return response()->json(array('status'=> 'success','data'=>$review_data,'rating_html' => $rating_html), 200);
            }
        }
        return response()->json(array('status'=> 'fail','data'=>''), 200);

    }

    public function review_reply(Request $request)
    {
        $review_id = $request['review_id'];
        $review_reply = $request['review_reply'];
        $id_for_reply = $request['id_for_reply'];
        
        if($review_id != '') {
            $input['review_id'] = $review_id;
            $input['sender_id'] = $id_for_reply;
            $input['reply'] = $review_reply;

            $review_data = ReviewReply::create($input);
            if(isset($review_data)) {
                $userData = User::find($review_data->sender_id);
                if($userData->image != '' && file_exists(public_path('uploads/users/').$userData->image)){
                    $userData->user_image_thumb_path = asset('uploads/users/thumb/').'/'.$userData->image;
                } else {
                    $userData->user_image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
                }

                $reply_html = '<div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                  <img class="img-xs rounded-circle" src="'.$userData->user_image_thumb_path.'" alt="">
                  <div class="ml-2">
                    <p><a href="#" class=" userNameReview" style="display: inline-block;">'.ucfirst($userData->name).',
                      <span>('.$userData->user_id.')</span></a></p>
                    <p class="tx-11 text-muted">'.ucfirst($userData->public_name).'</p>
                  </div>
                </div>
              </div>
              <p class=" tx-14 replytag">'.$review_data->reply.'</p>
            <label class="review-reply-date">
            <i class="dateicon" data-feather="calendar"></i> '.date('F jS, Y', strtotime($review_data->created_at)) .'
            </label>
            <hr class="mt-2">';

                return response()->json(array('status'=> 'success','data'=>$review_data,'reply_html'=>$reply_html), 200);
            }
        }
        return response()->json(array('status'=> 'fail','data'=>''), 200);
        // return true; 
        
    }

    public function delete_review($review_id, $id) {
        Review::where('id',$review_id)->delete();
        return response()->json(array('status'=> 'success','data'=>''), 200);
        // return redirect()->route('clients.reviews',$id)->with('success','Review deleted successfully');
    }
    // Reviews Section end
    
    // chat related function start
    public function enquiries($id,$enq_id=0)
    {
        $user_details = User::find($id);

        if($user_details->image != '' && file_exists(public_path('uploads/users/').$user_details->image)){
            $user_details->image_thumb_path = asset('uploads/users/thumb/').'/'.$user_details->image;
        } else {
            $user_details->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
        }
        $contact_list = EnquiryContact::where('user_id',$id)->get();
        $contactds = array();
        if(isset($contact_list)) {
            foreach ($contact_list as $value) {
                if(!in_array($value->id,$contactds)) {
                    array_push($contactds, $value->id);
                }
                $contact_user_data = User::select('id','user_id','image','name','public_name')->find($value->contact_user_id);
                if($contact_user_data->image != '' && file_exists(public_path('uploads/users/').$contact_user_data->image)){
                    $contact_user_data->image_thumb_path = asset('uploads/users/thumb/').'/'.$contact_user_data->image;
                } else {
                    $contact_user_data->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
                }
                $value->contact_user_data = $contact_user_data;
                
                
            }   
        }
        
        
        $room_list = EnquiryRoom::where('user_id',$id)->orWhere('room_user_id',$id)->get();
        $roomIds = array();
        if(isset($room_list)) {
            foreach ($room_list as $value) {
                if(!in_array($value->id,$roomIds)) {
                    array_push($roomIds, $value->id);
                }
                if($value->room_user_id == $id) {
                    $room_user_data = User::select('user_id','image','name','public_name')->find($value->user_id);
                } else {
                    $room_user_data = User::select('user_id','image','name','public_name')->find($value->room_user_id);
                }
                if($room_user_data->image != '' && file_exists(public_path('uploads/users/').$room_user_data->image)){
                    $room_user_data->image_thumb_path = asset('uploads/users/thumb/').'/'.$room_user_data->image;
                } else {
                    $room_user_data->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
                }
                $value->room_user_data = $room_user_data; 
            }   
        }
        $all_messages = EnquiryMessage::whereIn('contact_id',$roomIds)
        ->orderBy('created_at', 'desc')
        ->get()->unique('contact_id');
        if(isset($all_messages)) {
            foreach ($all_messages as $value) {
                if($enq_id == 0) {
                    $enq_id = $value->contact_id;
                    $value->unread_count = 0;
                } 
                $value->unread_count = EnquiryMessage::where('contact_id',$value->contact_id)
                ->where('read_status','0')->count();

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
        $messages_list = EnquiryMessage::where('contact_id',$enq_id)
        ->get();
        if(isset($messages_list)) {
            // mark read
            EnquiryMessage::where('contact_id',$enq_id)->update(['read_status'=>'1']);
            foreach ($messages_list as $value) {
                if(!isset($messages_user_data_all)) {
                    
                    if($id == $value->sender_id) {
                        $messages_user_data_all = User::select('id','user_id','image','name','public_name')->find($value->receiver_id);
                    } else {
                        $messages_user_data_all = User::select('id','user_id','image','name','public_name')->find($value->sender_id);
                    }
                }
                if($id == $value->sender_id) {
                    $value->sender = 'me';
                } else {
                    $value->sender = 'other';
                }
                if($value->file != '' && file_exists(public_path('uploads/chat/').$value->file)){
                    $value->chat_img_path = asset('uploads/chat/').'/'.$value->file;
                } else {
                    $value->chat_img_path = "";
                }
            }
        }
        
        if(!isset($messages_user_data_all)) {
            $enquiry_room_data = EnquiryRoom::find($enq_id);
            if(isset($enquiry_room_data)) {

                $messages_user_data_all = User::select('id','user_id','image','name','public_name')->find($enquiry_room_data->room_user_id);
            }
        }
        if(isset($messages_user_data_all)) {
            if($messages_user_data_all->image != '' && file_exists(public_path('uploads/users/').$messages_user_data_all->image)){
                $messages_user_data_all->image_thumb_path = asset('uploads/users/thumb/').'/'.$messages_user_data_all->image;
            } else {
                $messages_user_data_all->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
            }
        } else {
            $messages_user_data_all = '';
        }
        $added_contact = 0;
        if(isset($contactds) && $enq_id != 0) {
            if(in_array($enq_id, $contactds)) {
                $added_contact = 1;
            }
        }
       
        return view('clients.enquiries',compact('id','enq_id','user_details','contact_list','all_messages','messages_list','messages_user_data_all','added_contact'));
    }

    public function start_chat($id,$room_user_id)
    {
        $already_contact = EnquiryRoom::where('user_id',$id)->where('room_user_id',$room_user_id)->count();
        if($already_contact == 0) {

            $already_contact1 = EnquiryRoom::where('user_id',$room_user_id)->where('room_user_id',$id)->count();
            if($already_contact1 == 0) {
                $input['user_id'] = $id;
                $input['room_user_id'] = $room_user_id;
                $enquiry_data = EnquiryRoom::create($input);
            } else {
                $enquiry_data = EnquiryRoom::where('user_id',$room_user_id)->where('room_user_id',$id)->first();
            }
        }  else {
            $enquiry_data = EnquiryRoom::where('user_id',$id)->where('room_user_id',$room_user_id)->first();
        }
        $enq_id = $enquiry_data->id;
        return redirect()->route('clients.enquiries',[$id,$enq_id]);
        
    }

    public function save_contact($id,$contact_user_id, $enq_id)
    {
        $already_contact = EnquiryContact::where('user_id',$id)->where('contact_user_id',$contact_user_id)->count();
        if($already_contact == 0) {
            $input['user_id'] = $id;
            $input['contact_user_id'] = $contact_user_id;
            EnquiryContact::create($input);
        } 

        return redirect()->route('clients.enquiries',[$id,$enq_id])
                        ->with('success','Contact Added successfully');
        
    }

    public function remove_contact($id,$contact_user_id, $enq_id)
    {
        $already_contact = EnquiryContact::where('user_id',$id)->where('contact_user_id',$contact_user_id)->delete();
        return redirect()->route('clients.enquiries',[$id,$enq_id])
                        ->with('success','Contact Deleted successfully');
        
    }
    
    public function save_chat(Request $request)
    {
        $input['contact_id'] = $request['contact_id'];
        $input['sender_id'] = $request['sender_id'];
        $input['receiver_id'] = $request['receiver_id'];
        $input['message'] = $request['message'];
        $input['read_status'] = '1';

        $user = EnquiryMessage::create($input);

        return true; 
        
    }
    public function send_file_chat(Request $request)
    {
        if($request->hasFile('file')) {
            $fileName = 'chat_'.time().'.'.$request->file->extension();  
                
            
            $request->file->move(public_path('uploads/chat'), $fileName);
        
            $input['contact_id'] = $request['contact_id'];
            $input['sender_id'] = $request['sender_id'];
            $input['receiver_id'] = $request['receiver_id'];
            $input['message'] = "";
            $input['file'] = $fileName;
            $input['read_status'] = '1';
            $user = EnquiryMessage::create($input);
        }


        return true; 
        
    }

    public function search_users(Request $request)
    {
        $search_val = $request['search_val'];
        $enq_id = $request['enq_id'];
        $id = $request['id'];
        $response_html = '';
        if($search_val != '') {
            $user_list = User::select('id','user_id','image','name','public_name')->where('name', 'like', '%' . $search_val . '%')->orWhere('user_id', 'like', '%' . $search_val . '%')->orderBy('name','ASC')->get();
            if(isset($user_list)) {
                $response_html .= '<ul class="nav nav-tabs mt-3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="chats-tab" data-toggle="tab" href="#chats"
                        role="tab" aria-controls="chats" aria-selected="true">
                        <div class="d-flex flex-row flex-lg-column flex-xl-row align-items-center">
                            
                            <p class="d-none d-sm-block">Search</p>
                        </div>
                    </a>
                </li>

            </ul>
            <div class="tab-content mt-3 ps ps--active-y ps--scrolling-y">
                <div class="tab-pane fade show active" id="chats" role="tabpanel"
                    aria-labelledby="chats-tab">
                    <div class="chatsearchresult">
                        <p class="text-muted mb-1">Search Result</p>
                        <ul class="list-unstyled chat-list px-1 ">';
                if(count($user_list) > 0) {
                    foreach ($user_list as $user_data) {
                    
                        if($user_data->image != '' && file_exists(public_path('uploads/users/').$user_data->image)){
                            $user_data->image_thumb_path = asset('uploads/users/thumb/').'/'.$user_data->image;
                        } else {
                            $user_data->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
                        }

                        $response_html .= '<li class=" chat-item pr-1">
                        <div class="d-flex align-items-center aasdiv">
                            <figure class="mb-0 mr-2">
                                <img src="'.$user_data->image_thumb_path.'" class="img-xs rounded-circle width37"
                                    alt="user">
                            </figure>
                            <div class="d-flex align-items-center justify-content-between flex-grow border-bottom">
                                <div>
                                    <p class="text-body">'. ucfirst($user_data->name) .'</p>
                                    <div class="d-flex align-items-center">
                                        <p class="text-muted tx-13">'.$user_data->user_id.'</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end text-body">
                                    <a
                                        href="'.url("dashboard/clients/enquiries/start_chat/".$id."/".$user_data->id).'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square icon-md text-success mr-2" data-toggle="tooltip" title="" data-original-title="Start Chat"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                    </a>
                                    <a
                                        href="'.url("dashboard/clients/enquiries/save_contact/".$id."/".$user_data->id."/".$enq_id).'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus icon-md text-primary mr-2" data-toggle="tooltip" title="" data-original-title="Add to contacts"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>';

                    }
                } else {
                    $response_html .= 'No users found. Please try again.';
                }
                $response_html .= '</ul>
                </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
                <div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>
                                </div>
                            </div>';
            }
            

            
        }
        return response()->json(array('status'=> 'success','data'=>$user_list,'response_html'=>$response_html), 200);
        
    }

    // chat related function end

    public function delete_enquiry($enquiry_id, $id) {
        ContactList::where('id',$enquiry_id)->delete();
        return redirect()->route('clients.enquiries',$id)
                        ->with('success','Enquiry deleted successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('users')
            ->with('warning','User not found');
        }
        
        $user->delete();
        return redirect()->route('User')
                            ->with('success','User deleted successfully');
        
    }
}