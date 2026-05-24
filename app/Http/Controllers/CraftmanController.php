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
use App\PromotionalVideo;
use App\JobCategory;
use App\JobType;
use App\JobImage;
use App\Job;
use App\Review;
use App\ReviewImage;
use App\ReviewReply;
use App\ContactList;
use App\EnquiryContact;
use App\EnquiryRoom;
use App\EnquiryMessage;
use App\CraftmanCategory;
use App\CraftmanSkill;
use DB;
use Hash;
use View;
use Auth;
// use Intervention\Image\ImageManagerStatic;
use Intervention\Image\Facades\Image;

class CraftmanController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user= Auth::user();
            // check user only craftman and 
            if($this->user->role_id != '2' && $this->user->role_id != '1'){
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if no admin login, send to home
        if($this->user->role_id != '1'){
            return redirect()->route('index');
        }
        $user_list = User::where('role_id','2')->where('new_added','0')->orderBy('id','DESC')->get();
        foreach ($user_list as $value) {
            if($value->image != '' && file_exists(public_path('uploads/users/').$value->image)){
                $value->image_thumb_path = asset('uploads/users/thumb/').'/'.$value->image;
            } else {
                $value->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
            }
        }

        return view('craftmans.index',compact('user_list'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Display a listing of the new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new(Request $request)
    {
        // if no admin login, send to home
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        $user_list = User::where('role_id','2')->where('new_added','1')->orderBy('id','DESC')->get();
        foreach ($user_list as $value) {
            if($value->image != '' && file_exists(public_path('uploads/users/').$value->image)){
                $value->image_thumb_path = asset('uploads/users/thumb/').'/'.$value->image;
            } else {
                $value->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
            }
            
        }

        return view('craftmans.index',compact('user_list'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        $this->layout = View::make('layouts.app_craftmans');
        // $this->layout->content = View::make('craftmans.create');
        $roles = Role::pluck('name','name')->all();
        // return View::make('layouts.app_craftsman', array())
        // ->nest('craftmans.create',compact('roles'));
        return view('craftmans.create',compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid_otp = "123456";
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'email|unique:users,email',
            'password' => 'required|same:confirm_password',
            'roles' => 'required',
            'phone' => 'required|unique:users,phone',
            'otp' => 'required|in:'.$valid_otp,
            'avatar' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        if($request->hasFile('avatar')) {
            $fileName = 'user_avatar_'.time().'.'.$request->avatar->extension();  
                
            $thumb = Image::make($request->avatar->getRealPath())->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });

            $request->avatar->move(public_path('uploads/users'), $fileName);
            $thumb->save(public_path('uploads/users/thumb/').$fileName);
        } else{
            $fileName = '';
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['role_id'] = $input['roles'];
        $input['phone_verified'] = '1'; // after opt functional we will do confirmation here
        $input['user_id'] = 'HM'.date('d').date('m').date('Y');
        $input['name'] = $input['first_name'].' '.$input['last_name'];
        $input['image']=$fileName;  
        $input['instagram']='';  
        
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
            
        $user->user_id = $user->user_id.'0'.$user->id;
        $user->save();

        return redirect()->route('craftmans.new')
                        ->with('success','Craftman created successfully');
    }


    public function categories(Request $request)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        $categories_list = CraftmanCategory::all();
        $parent_categories = CraftmanCategory::where('parent_id', '0')->get();
        return view('craftmans.categories',compact('categories_list','parent_categories'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function category_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);

        $input = $request->all();
        $str = $input['slug'];
        $delimiter = '-';
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        $input['slug'] = $slug;
        $category = CraftmanCategory::create($input);

        return redirect()->route('craftmans.categories')
                        ->with('success','Category created successfully');
    }

    public function category_edit(Request $request, $id)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        $caegories_data = CraftmanCategory::find($id);
        $parent_categories = CraftmanCategory::where('parent_id', '0')->where('id', '!=', $id)->get();
        if(!isset($caegories_data)) {
            return redirect()->route('craftmans.categories')
            ->with('warning','Category not found');
        }

        return view('craftmans.category_edit',compact('caegories_data','id','parent_categories'));
    }

    public function category_update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);

        $caegories_data = CraftmanCategory::find($id);
        $input = $request->all();
        $str = $input['slug'];
        $delimiter = '-';
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        $input['slug'] = $slug;
        $caegories_data->update($input);

        return redirect()->route('craftmans.categories')
                        ->with('success','Category updated successfully');
    }


    public function skills(Request $request)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        $skills_list = CraftmanSkill::all();
        return view('craftmans.skills',compact('skills_list'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function skill_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();
        $skill = CraftmanSkill::create($input);

        return redirect()->route('craftmans.skills')
                        ->with('success','Skill created successfully');
    }

    public function skill_edit(Request $request, $id)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        $skill_data = CraftmanSkill::find($id);
        
        if(!isset($skill_data)) {
            return redirect()->route('craftmans.skills')
            ->with('warning','Skill data not found');
        }

        return view('craftmans.skill_edit',compact('skill_data','id'));
    }


    public function skill_update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $skill_data = CraftmanSkill::find($id);
        $input = $request->all();
        
        $skill_data->update($input);

        return redirect()->route('craftmans.skills')
                        ->with('success','Skill Data updated successfully');
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
            return redirect()->route('craftmans')
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
        
        return view('craftmans.show',compact('user','roles','userRole','id','user_id','page_title','countries','states','cities','image_gallery','business_detail'));
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
        
        return view('craftmans.dashboard',compact('user','id','total_reviews','total_jobs','total_contacts','all_messages','job_listing'));
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
            return redirect()->route('craftmans')
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
        $user_country_data = Country::select('name')->find($user->country);
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
        return view('craftmans.edit',compact('user','roles','userRole','id','page_title','countries','states','cities'));
    }
    public function social_detail($id)
    {
        $page_title = 'social-detail';
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('craftmans')
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
        
        return view('craftmans.edit',compact('user','roles','userRole','id','page_title','countries','states','cities'));
    }
    
    public function update_password($id)
    {
        $page_title = 'update-password';
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('craftmans')
            ->with('warning','User not found');
        }
        if($user->image != '' && file_exists(public_path('uploads/users/').$user->image)){
            $user->image_thumb_path = asset('uploads/users/thumb/').'/'.$user->image;
        } else {
            $user->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
        }

        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        
        return view('craftmans.edit',compact('user','roles','userRole','id','page_title'));
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
            return redirect()->route('craftmans')
            ->with('warning','Craftmans not found');
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
        return redirect()->route('craftmans.personal-detail',$id)
            ->with('success','Craftmans updated successfully');
    }

    public function social_submit(Request $request, $id)
    {

        
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('craftmans')
            ->with('warning','Craftmans not found');
        }        
        $input = $request->all();
        $input['new_added'] = '0';
        $user->update($input);
        return redirect()->route('craftmans.personal-detail',$id)
            ->with('success','Craftmans updated successfully');
    }


    public function password_submit(Request $request, $id)
    {

        $this->validate($request, [
            'new_password' => 'required|same:confirm_password',
            'old_password' => 'required|password',
            
        ]);
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('craftmans')
            ->with('warning','Craftmans not found');
        }
        
        $input['password'] = Hash::make($request->new_password);
        $user->update($input);

        return redirect()->route('craftmans.personal-detail',$id)
            ->with('success','Craftmans updated successfully');
    }

    public function business_detail($id)
    {
        $page_title = 'business-detail';
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('craftmans')
            ->with('warning','User not found');
        }
        if($user->image != '' && file_exists(public_path('uploads/users/').$user->image)){
            $user->image_thumb_path = asset('uploads/users/thumb/').'/'.$user->image;
        } else {
            $user->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
        }
        $craftman_categories = CraftmanCategory::all();
        $craftman_skills = CraftmanSkill::all();
        // echo "<pre>";
        // print_r($craftman_skills->toArray());die;
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        
        $business_detail = BusinessDetails::where('user_id',$id)->first();

        return view('craftmans.business_details',compact('user','roles','userRole','id','page_title','business_detail','craftman_categories','craftman_skills'));
    }

    public function business_submit(Request $request, $id)
    {
        $this->validate($request, [
            'phone' => 'required',
            'email' => 'nullable|email',
            'category' => 'required',
            'experience' => 'required',
            'job_done' => 'required',
            'team_size' => 'required',
            'per_day_fee' => 'required',
        ]);

        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('craftmans')
            ->with('warning','Craftmans not found');
        }
        $business_detail = BusinessDetails::where('user_id',$id)->first();
        if(isset($request->logo)) {

            $logofileName = 'business_logo_'.time().'.'.$request->logo->extension();  
                
            $thumb = Image::make($request->logo->getRealPath())->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });

            $request->logo->move(public_path('uploads/business'), $logofileName);
            $thumb->save(public_path('uploads/business/thumb/').$logofileName);
        } else{
            if(isset($business_detail)) {
                $logofileName = $business_detail->logo;
            } else {
                $logofileName = '';
            }
        }
        $input = $request->all();
        $input['logo'] = $logofileName;
        if(isset($input['skills']) && count($input['skills']) > 0) {
            $skills = implode(', ',$input['skills']);
            $input['skills'] = $skills;   
        } else {
            $input['skills'] = '';
            
        }
        $userUpdate['is_approved'] = '0';
        $user->update($userUpdate);
        $new_added = 0;
        if(isset($business_detail)){
            $business_detail->update($input);
        } else {
            $new_added = 1;
            $input['user_id'] = $id;
            $business_detail = BusinessDetails::create($input);
        }
        
        if($new_added == 1) {
            $response_message = 'Business details added successfully';
        } else {
            $response_message = 'Business details updated successfully';
        }
        return redirect()->route('craftmans.business-detail',$id)
                        ->with('success',$response_message);
        
    }

    public function approve_account($id)
    {
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('craftmans')
            ->with('warning','User not found');
        }
        $input['is_approved'] = '1';
        $input['new_added'] = '0';
        $user->update($input);

        return redirect()->route('craftmans')
                        ->with('success',"Account approved successfully.");

    }
    

    public function image_gallery($id)
    {
        $page_title = 'image-gallery';
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('craftmans')
            ->with('warning','User not found');
        }
        $result=ImageGallery::where('user_id',$id)->get();

        return view('craftmans.image-gallery',compact('result','id','page_title','user'));
    }


    public function image_add(Request $request,$id){
    	$this->validate($request, [
			'photos'=>'required',
		]);
		if($request->hasFile('photos'))
		{
			$i=1;
			$allowedfileExtension=['pdf','jpg','png','jpeg'];
			$files = $request->file('photos');
            $input = $request->all();
            $description = $input['description'];
			foreach($files as $file){
                // check user limits
                $imageCount=ImageGallery::where('user_id',$id)->count();
                if($imageCount < 16) {

                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $check=in_array($extension,$allowedfileExtension);				
                    $custom=$i.time().'.'.$extension;
                            //$filename = $photo->store('/business');
                    $file->move(public_path('uploads/business'), $custom);
                    // $file->storeAs('/business',$custom);
                    $data=array(
                        'images'=>$custom,
                        'user_id'=>$id,
                        'description'=>$description
                    );
                    // check if images 
                    ImageGallery::create($data);
                    $i++;
                }
    		}
    	}
    	// $result=ImageGallery::where('user_id',$id)->get();
    	return back();
    }

    public function get_image_details(Request $request)
    {
        $image_id = $request['image_id'];
        
        if($image_id != '') {

            $image_data = ImageGallery::select('id','description')->find($image_id);
            if(isset($image_data)) {
                return response()->json(array('status'=> 'success','data'=>$image_data), 200);
            }
            
        }
        return response()->json(array('status'=> 'fail','data'=>''), 200);
        // return true; 
        
    }

    public function image_update(Request $request)
    {
        $image_id = $request['image_id'];
        $review_title = $request['review_title'];
        $review_description = $request['review_description'];
        $review_ratings = $request['review_ratings'];

        if($image_id != '') {
            $input['description'] = $request['image_description'];

            $image_data = ImageGallery::find($image_id);
            $statuss = $image_data->update($input);
            if(isset($image_data)) {

                return response()->json(array('status'=> 'success','data'=>$image_data), 200);
            }
        }
        return response()->json(array('status'=> 'fail','data'=>''), 200);
    }

    function image_delete($id,$image_id){
    	// $userId=session('USER_ID');
    	ImageGallery::where('id',$image_id)->delete();
    	return back();
    }
    

    function promotional_video($id){
        $page_title = 'image-gallery';
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('craftmans')
            ->with('warning','User not found');
        }
    	$result=PromotionalVideo::where('user_id',$id)->get();
        foreach ($result as $value) {
            if($value->video_type == 'youtube') {
                $value->video_new_link = preg_replace("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", "$1", $value->video_link);

            } else {
                $value->video_new_link = $value->video_link;
            }
        }

    	return view('craftmans.promotional-video',compact('result','id','page_title','user'));
    }

    function promotional_add(Request $request,$id){
        $this->validate($request, [
			'title'=>'required',
			'video_link'=>'required',
			'description'=>'required',
		]);

        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('craftmans')
            ->with('warning','Craftmans not found');
        }

    	$input = $request->all();
        $input['user_id'] = $id;
        $input['video_type'] = 'youtube';
        $PromotionalVideo = PromotionalVideo::create($input);

		return back();
    }

    function delete_promotional($id,$promo_id){
    	$userId=session('USER_ID');
    	PromotionalVideo::where('id',$promo_id)->delete();
    	return back();
    }


    public function address($id)
    {
        $page_title = 'address';
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('craftmans')
            ->with('warning','User not found');
        }
        return view('craftmans.address',compact('id','page_title','user'));
    }

    
    function save_address(Request $request,$id){
        $this->validate($request, [
			'map_address'=>'required'
		]);

        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('craftmans')
            ->with('warning','Craftmans not found');
        }

    	$input = $request->all();
        $user->google_address = $input['map_address'];
        $user->save();
        
		return back();
    }


    // Jobs Section

    public function jobs($id)
    {
        $job_listing = Job::where('user_id',$id)->get();
        foreach ($job_listing as $value) {
            $jobImages = JobImage::where('job_id',$value->id)->get();
            if(isset($jobImages) && count($jobImages) > 0) {
                foreach ($jobImages as $image) {
                    if($image->image != '' && file_exists(public_path('uploads/jobs/').$image->image)){
                        $image->image_thumb_path = asset('uploads/jobs/').'/'.$image->image;
                    } else {
                        $image->image_thumb_path = asset('uploads/jobs/').'/'.'no-image.jpg';
                    }
                }
            }
            $value->images = $jobImages;
        }
       
        return view('craftmans.jobs',compact('id','job_listing'));
    }


    public function job_create($id)
    {
        $job_categories = JobCategory::all();
        return view('craftmans.job_create',compact('id','job_categories'));
    }
    
    public function job_store(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'email' => 'email|unique:users,email',
            'phone' => 'required',
            'job_category' => 'required',
        ]);

        $input = $request->all();
        $input['category_id']=$input['job_category'];
        $input['user_id'] = $id;
        unset($input['job_category']);
        $job = Job::create($input);
        $job_id = $job->id;
        
        if($request->hasFile('photos'))
		{
			$i=1;
			$allowedfileExtension=['jpg','png','jpeg'];
			$files = $request->file('photos');
			foreach($files as $file){
                if($i <= 6) {

                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $check=in_array($extension,$allowedfileExtension);				
                    $custom=$i.time().'.'.$extension;
                    $file->move(public_path('uploads/jobs'), $custom);
                    $data=array(
                        'image'=>$custom,
                        'job_id'=>$job_id
                    );
                    JobImage::create($data);
                    $i++;
                }
    		}
    	}

        // return back();
        return redirect()->route('craftmans.jobs',[$id])
                        ->with('success','Job created successfully');
    }

    public function job_edit($id, $user_id)
    {
        $job_categories = JobCategory::all();
        $job_data = Job::find($id);
        if(!isset($job_data)) {
            return redirect()->route('craftmans.jobs',$user_id)
            ->with('warning','Job not found');
        }
        $jobImages = JobImage::where('job_id',$job_data->id)->get();
        if(isset($jobImages) && count($jobImages) > 0) {
            foreach ($jobImages as $image) {
                if($image->image != '' && file_exists(public_path('uploads/jobs/').$image->image)){
                    $image->image_thumb_path = asset('uploads/jobs/').'/'.$image->image;
                } else {
                    $image->image_thumb_path = asset('uploads/jobs/').'/'.'no-image.jpg';
                }
            }
        }
        $job_images = $jobImages;


        return view('craftmans.job_edit',compact('id','user_id','job_categories','job_data','job_images'));
    }

    public function job_update(Request $request, $id, $user_id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'email' => 'email|unique:users,email',
            'phone' => 'required',
            'job_category' => 'required',
        ]);

        $input = $request->all();
        $input['category_id']=$input['job_category'];
        unset($input['job_category']);
        $job = Job::find($id);
        $job->update($input);

        // $job = Job::create($input);
        $job_id = $job->id;
        
        if($request->hasFile('photos'))
		{
            $job_image_count = JobImage::where('job_id', $job_id)->count();
			$i=$job_image_count;
			$allowedfileExtension=['jpg','png','jpeg'];
			$files = $request->file('photos');
			foreach($files as $file){
                if($i < 6) {

                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $check=in_array($extension,$allowedfileExtension);				
                    $custom=$i.time().'.'.$extension;
                    $file->move(public_path('uploads/jobs'), $custom);
                    $data=array(
                        'image'=>$custom,
                        'job_id'=>$job_id
                    );
                    JobImage::create($data);
                    $i++;
                }
    		}
    	}

        // return back();
        return redirect()->route('craftmans.jobs',[$user_id])
                        ->with('success','Job created successfully');
    }

    public function job_image_destroy($image_id, $id)
    {
        $job_image = JobImage::find($image_id);
        $job_id = $job_image->job_id;
        $job_image->delete();
        return redirect()->route('craftmans.job_preview', ['job_id' => $job_id, 'id' => $id] )
                            ->with('success','Job image deleted successfully');
    }
    public function job_image_destroy_edit($image_id, $id)
    {
        $job_image = JobImage::find($image_id);
        $job_id = $job_image->job_id;
        $job_image->delete();
        return redirect()->route('craftmans.job_a_edit', ['job_id' => $job_id, 'id' => $id] )
                            ->with('success','Job deleted successfully');
    }

    public function job_destroy($id, $user_id)
    {
        $job = Job::find($id);
        if(!isset($job)) {
            return redirect()->route('craftmans.jobs',$user_id)
            ->with('warning','Job not found');
        }
        $job->delete();
        return redirect()->route('craftmans.jobs',$user_id)
                            ->with('success','Job deleted successfully');
    }

    /// New Job Section

    public function jobs_a($id)
    {
        $job_listing = Job::where('user_id',$id)->get();
       
        return view('craftmans.jobs_a',compact('id','job_listing'));
    }

    public function job_a_create($id)
    {
        $job_categories = JobCategory::all();
        $job_types = JobType::all();
        return view('craftmans.job_a_create',compact('id','job_categories','job_types'));
    }

    public function job_store_a(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'email' => 'required|email|unique:users,email',
            'job_category' => 'required',
            'job_type' => 'required',
            'url_email' => 'required',
            'closing_date' => 'required',
            'company_name' => 'required',
            'budget' => 'required',
        ]);

        $input = $request->all();
        $input['category_id']=$input['job_category'];
        $input['user_id'] = $user_id = $id;
        unset($input['job_category']);
        
        if($request->hasFile('logo'))
		{
            $fileName = 'logo_'.time().'.'.$request->logo->extension();  
                
            $thumb = Image::make($request->logo->getRealPath())->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });

            $request->logo->move(public_path('uploads/jobs'), $fileName);
            $thumb->save(public_path('uploads/jobs/thumb/').$fileName);
        } else {
            $fileName = '';
        }
        $input['logo'] = $fileName;
        $input['previewed'] = 0;
        $input['statue'] = 'new';
        $job = Job::create($input);
        $job_id = $job->id;
        
        if($request->hasFile('photos'))
		{
			$i=1;
			$allowedfileExtension=['jpg','png','jpeg'];
			$files = $request->file('photos');
			foreach($files as $file){
                if($i <= 6) {

                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $check=in_array($extension,$allowedfileExtension);				
                    $custom=$i.time().'.'.$extension;
                    $file->move(public_path('uploads/jobs'), $custom);
                    $data=array(
                        'image'=>$custom,
                        'job_id'=>$job_id
                    );
                    JobImage::create($data);
                    $i++;
                }
    		}
    	}

        // return back();
        return redirect()->route('craftmans.job_preview',[$job_id,$id]);
    }

    public function job_preview($job_id, $id)
    {
        $job_categories = JobCategory::all();
        $job_types = JobType::all();
        $jobs = Job::find($job_id);
        
        if(!isset($jobs)) {
            return redirect()->route('craftmans.jobs_a',$user_id)
            ->with('warning','Job not found');
        }

        if($jobs->logo != '' && file_exists(public_path('uploads/jobs/').$jobs->logo)){
            $jobs->image_thumb_path = asset('uploads/jobs/').'/'.$jobs->logo;
        } else {
            $jobs->image_thumb_path = asset('uploads/jobs/').'/'.'no-image.jpg';
        }
        $job_category = JobCategory::find($jobs->category_id);
        if(isset($job_category)) {
            $jobs->category_name = $job_category->name;
        } else {
            $jobs->category_name = '';
        }
        $job_type = JobType::find($jobs->job_type);
        if(isset($job_type)) {
            $jobs->type_name = $job_type->name;
        } else {
            $jobs->type_name = '';
        }
        $user_data = User::find($jobs->user_id);
        if($user_data->image != '' && file_exists(public_path('uploads/users/').$user_data->image)){
            $user_data->image_thumb_path = asset('uploads/users/').'/'.$user_data->image;
        } else {
            $user_data->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
        }
        $job_images = JobImage::where('job_id',$jobs->id)->get();
        if(isset($job_images) && count($job_images) > 0) {
            foreach ($job_images as $image) {
                if($image->image != '' && file_exists(public_path('uploads/jobs/').$image->image)){
                    $image->image_thumb_path = asset('uploads/jobs/').'/'.$image->image;
                } else {
                    $image->image_thumb_path = asset('uploads/jobs/').'/'.'no-image.jpg';
                }
            }
        }
        $jobs->map_location = 'http://maps.google.com/maps?q='.urlencode($jobs->address).'&zoom=14&size=512x512&maptype=roadmap&sensor=false';
        return view('craftmans.job_preview',compact('job_id','id','job_categories','job_types','jobs','job_images','user_data'));
    }

    public function job_a_edit($job_id, $id)
    {
        $job_categories = JobCategory::all();
        $job_types = JobType::all();
        $job_data = Job::find($job_id);
        if(!isset($job_data)) {
            return redirect()->route('craftmans.jobs',$id)
            ->with('warning','Job not found');
        }
        $jobImages = JobImage::where('job_id',$job_data->id)->get();
        if(isset($jobImages) && count($jobImages) > 0) {
            foreach ($jobImages as $image) {
                if($image->image != '' && file_exists(public_path('uploads/jobs/').$image->image)){
                    $image->image_thumb_path = asset('uploads/jobs/').'/'.$image->image;
                } else {
                    $image->image_thumb_path = asset('uploads/jobs/').'/'.'no-image.jpg';
                }
            }
        }
        $job_images = $jobImages;

        return view('craftmans.job_a_edit',compact('job_id','id','job_categories','job_types','job_data','job_images'));
    }

    public function job_a_update(Request $request, $job_id, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'email' => 'required|email|unique:users,email',
            'job_category' => 'required',
            'job_type' => 'required',
            'url_email' => 'required',
            'closing_date' => 'required',
            'company_name' => 'required',
            'budget' => 'required',
        ]);

        $input = $request->all();
        $input['category_id']=$input['job_category'];
        unset($input['job_category']);
        $job = Job::find($job_id);
        if($request->hasFile('logo'))
		{
            $fileName = 'logo_'.time().'.'.$request->logo->extension();  
                
            $thumb = Image::make($request->logo->getRealPath())->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });

            $request->logo->move(public_path('uploads/jobs'), $fileName);
            $thumb->save(public_path('uploads/jobs/thumb/').$fileName);
        } else {
            $fileName = '';
        }
        if($fileName != '') {
            $input['logo'] = $fileName;
        }
        $job->update($input);

        // $job = Job::create($input);
        $job_id = $job->id;
        
        if($request->hasFile('photos'))
		{
            $job_image_count = JobImage::where('job_id', $job_id)->count();
			$i=$job_image_count;
			$allowedfileExtension=['jpg','png','jpeg'];
			$files = $request->file('photos');
			foreach($files as $file){
                if($i < 6) {
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $check=in_array($extension,$allowedfileExtension);				
                    $custom=$i.time().'.'.$extension;
                    $file->move(public_path('uploads/jobs'), $custom);
                    $data=array(
                        'image'=>$custom,
                        'job_id'=>$job_id
                    );
                    JobImage::create($data);
                    $i++;
                }
    		}
    	}

        // return back();
        
        return redirect()->route('craftmans.job_preview',[$job_id,$id])
                        ->with('success','Requirement updated successfully');
    }

    public function job_post($job_id, $id)
    {
        $jobs = Job::find($job_id);
        
        if(!isset($jobs)) {
            return redirect()->route('craftmans.jobs_a',$user_id)
            ->with('warning','Job not found');
        }
        $input['previewed'] = 1;
        $jobs->update($input);
        return redirect()->route('craftmans.jobs_a',[$id])->with('success','Requirement posted successfully');
    }

    public function job_a_destroy($id, $job_id)
    {
        $job = Job::find($job_id);
        if(!isset($job)) {
            return redirect()->route('craftmans.jobs_a',$id)
            ->with('warning','Job not found');
        }
        $job->delete();
        return redirect()->route('craftmans.jobs_a',$id)
                            ->with('success','Requirement deleted successfully');
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
        
        return view('craftmans.reviews',compact('id','received_reviews','sent_reviews'));
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
        // return redirect()->route('craftmans.reviews',$id)->with('success','Review deleted successfully');
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
                    $messages_user_data->image_thumb_path = asset('public/uploads/users/thumb/').'/'.$messages_user_data->image;
                } else {
                    $messages_user_data->image_thumb_path = asset('public/uploads/users/').'/'.'no-image.jpg';
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
                    $value->chat_img_path = asset('public/uploads/chat/').'/'.$value->file;
                } else {
                    $value->chat_img_path = "";
                }
                
            }
        }
        // echo $enq_id;die;
        if(!isset($messages_user_data_all)) {
            $enquiry_room_data = EnquiryRoom::find($enq_id);
            if(isset($enquiry_room_data)) {

                $messages_user_data_all = User::select('id','user_id','image','name','public_name')->find($enquiry_room_data->room_user_id);
            }
        }
        if(isset($messages_user_data_all)) {
            if($messages_user_data_all->image != '' && file_exists(public_path('uploads/users/').$messages_user_data_all->image)){
                $messages_user_data_all->image_thumb_path = asset('public/uploads/users/thumb/').'/'.$messages_user_data_all->image;
            } else {
                $messages_user_data_all->image_thumb_path = asset('public/uploads/users/').'/'.'no-image.jpg';
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
       
        return view('craftmans.enquiries',compact('id','enq_id','user_details','contact_list','all_messages','messages_list','messages_user_data_all','added_contact'));
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
        return redirect()->route('craftmans.enquiries',[$id,$enq_id]);
        
    }

    public function save_contact($id,$contact_user_id, $enq_id)
    {
        $already_contact = EnquiryContact::where('user_id',$id)->where('contact_user_id',$contact_user_id)->count();
        if($already_contact == 0) {
            $input['user_id'] = $id;
            $input['contact_user_id'] = $contact_user_id;
            EnquiryContact::create($input);
        } 

        return redirect()->route('craftmans.enquiries',[$id,$enq_id])
                        ->with('success','Contact Added successfully');
        
    }

    public function remove_contact($id,$contact_user_id, $enq_id)
    {
        $already_contact = EnquiryContact::where('user_id',$id)->where('contact_user_id',$contact_user_id)->delete();
        return redirect()->route('craftmans.enquiries',[$id,$enq_id])
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
                            $user_data->image_thumb_path = asset('public/uploads/users/thumb/').'/'.$user_data->image;
                        } else {
                            $user_data->image_thumb_path = asset('public/uploads/users/').'/'.'no-image.jpg';
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
                                        href="'.url("dashboard/craftmans/enquiries/start_chat/".$id."/".$user_data->id).'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square icon-md text-success mr-2" data-toggle="tooltip" title="" data-original-title="Start Chat"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                    </a>
                                    <a
                                        href="'.url("dashboard/craftmans/enquiries/save_contact/".$id."/".$user_data->id."/".$enq_id).'">
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
        // return true; 
        
    }

    // chat related function end

    public function delete_enquiry($enquiry_id, $id) {
        ContactList::where('id',$enquiry_id)->delete();
        return redirect()->route('craftmans.enquiries',$id)
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
            return redirect()->route('craftmans')
            ->with('warning','Craftmans not found');
        }
        
        $user->delete();
        return redirect()->route('craftmans')
                            ->with('success','Craftman deleted successfully');
        
    }

    
}