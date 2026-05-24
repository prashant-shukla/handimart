<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Country;
use App\State;
use App\City;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Auth;

// use Intervention\Image\ImageManagerStatic;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     if(Auth::user()->role_id != '1'){
    //         return redirect()->route('index');
    //     }
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        // $user_list = User::where('role_id','7')->orderBy('id','DESC')->get();
        $user_list = User::where('role_id','!=','1')->with('roles')->orderBy('id','DESC')->get();

        // Pre-load all roles as an id→name map to avoid per-user queries
        $roleMap = Role::pluck('name', 'id');

        foreach ($user_list as $value) {
            if($value->image != '' && file_exists(public_path('uploads/users/').$value->image)){
                $value->image_thumb_path = asset('uploads/users/thumb/').'/'.$value->image;
            } else {
                $value->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
            }

            // Resolve role name: Spatie relationship → role_id lookup → '-'
            $value->role_display_name = $value->roles->first()->name
                ?? $roleMap[$value->role_id]
                ?? '-';
        }

        return view('users.index',compact('user_list'))
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
        $roles = Role::pluck('name','name')->all();

        $countries = Country::orderBy('name', 'ASC')->get();
        // $states = State::orderBy('name', 'ASC')->get();
        // $cities = City::orderBy('name', 'ASC')->get();
        $states = $cities = array();
        return view('users.create',compact('roles','countries','states','cities'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'email|unique:users,email',
            'password' => 'required|same:confirm_password',
            'roles' => 'required',
            'phone' => 'required',
            'country_id' => 'nullable',
            'state_id'   => 'nullable',
            'city_id'    => 'nullable',
            'avatar' => 'mimes:jpg,jpeg,png',
        ]);

        if($request->hasFile('avatar')) {
            $fileName = 'user_avatar_'.time().'.'.$request->avatar->extension();  
                
            $thumb = Image::make($request->avatar->getRealPath())->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });

            $fullImage = Image::make($request->avatar->getRealPath())->resize(null, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });
            $fullImage->interlace(true);
            $fullImage->save(public_path('uploads/users/').$fileName,40);
            $thumb->save(public_path('uploads/users/thumb/').$fileName,60);
        } else {
            $fileName = '';
        }
        $input = $request->all();

        $role = Role::find($input['roles']);
        $public_name = $role ? $role->name : '';
        $input['password'] = Hash::make($input['password']);
        $input['role_id'] = $input['roles'];
        $input['phone_verified'] = '1'; // after opt functional we will do confirmation here
        $input['public_name'] = $public_name;
        $input['user_id'] = 'HM'.date('d').date('m').date('Y');
        $input['name'] = $input['first_name'].' '.$input['last_name'];
        $input['image']=$fileName;
        $input['membership'] = $input['membership'] ?? 'no';
        $user = User::create($input);
        $user->assignRole($role);
            
        $user->user_id = $user->user_id.'0'.$user->id;
        $user->save();

        return redirect()->route('users')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
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

        $countries = Country::orderBy('name', 'ASC')->get();
        $states = State::where('country_id',$user->country_id)->orderBy('name', 'ASC')->get();
        $cities = City::where('state_id',$user->state)->orderBy('name', 'ASC')->get();

        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        
        return view('users.edit',compact('user','roles','userRole','countries','states','cities'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $valid_otp = "123456";
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            // 'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm_password',
            'roles' => 'required',
            'phone' => 'required',
            // 'otp' => 'in:'.$valid_otp,
            'avatar' => 'mimes:jpg,jpeg,png',
        ]);
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('users')
            ->with('warning','User not found');
        }
        if($request->hasFile('avatar')) {
            
        
            $fileName = 'user_avatar_'.time().'.'.$request->avatar->extension();  
            
           
            $thumb = Image::make($request->avatar->getRealPath())->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });
            
            $fullImage = Image::make($request->avatar->getRealPath())->resize(null, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });
            $fullImage->interlace(true);
            $fullImage->save(public_path('uploads/users/').$fileName,40);
            $thumb->save(public_path('uploads/users/thumb/').$fileName);
        } else{
            $fileName = $user->image;
        }
        $input = $request->all();
        $role = Role::find($input['roles']);
        $public_name = $role ? $role->name : '';
        $input['role_id'] = $input['roles'];
        $input['phone_verified'] = '1'; // after opt functional we will do confirmation here
        $input['public_name'] = $public_name;
        $input['name'] = $input['first_name'].' '.$input['last_name'];
        $input['image']=$fileName;  
        $input['membership'] = $input['membership'];
        unset($input['otp']);
        unset($input['username']);
        unset($input['avatar']);
        unset($input['user_id']);
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            unset($input['password']);
            unset($input['confirm_password']);
        }
        
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($role);
    
        return redirect()->route('users')
                        ->with('success','User updated successfully');
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
        return redirect()->route('users')
                            ->with('success','User deleted successfully');
        
    }

    public function get_states(Request $request)
    {
        $id = $request['id'];
        $states = State::where('country_id',$id)->get();
        $state_html = '<option>Select State</option>';
        if(count($states) > 0) {
            foreach ($states as $state) {
                $state_html .= '<option value="'.$state->id.'">'.$state->name.'</option>';
            }
        }
        return response()->json(array('status'=> 'success','data'=>$states,'state_html'=>$state_html), 200);

    }

    public function get_cities(Request $request)
    {
        $id = $request['id'];
        $cities = City::where('state_id',$id)->get();
        $city_html = '<option>Select City</option>';
        if(count($cities) > 0) {
            foreach ($cities as $city) {
                $city_html .= '<option value="'.$city->id.'">'.$city->name.'</option>';
            }
        }
        return response()->json(array('status'=> 'success','data'=>$cities,'city_html'=>$city_html), 200);

    }
}