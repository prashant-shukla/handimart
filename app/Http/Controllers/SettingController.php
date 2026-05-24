<?php
    
namespace App\Http\Controllers;
    
use App\CompanySetting;
use App\User;
use App\Country;
use App\State;
use App\City;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
    
class SettingController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        $company_setting = CompanySetting::first();
        return view('setting.index',compact('company_setting'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }

        request()->validate([
            'company_name' => 'required',
            'contact_person' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
        ]);
        $input = $request->all();
        $company_setting = CompanySetting::first();
        
        
        if(isset($company_setting)) {
            $company_setting->update($input);
        } else {
            CompanySetting::create($input);
        }

    
        return redirect()->route('setting')
                        ->with('success','Company settings updated successfully.');
    }

    public function change_password()
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        return view('setting.change_password');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function password_submit(Request $request)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }

        $this->validate($request, [
            'new_password' => 'required|same:confirm_password',
            'old_password' => 'required|password',
            
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        
        $input['password'] = Hash::make($request->new_password);
        $user->update($input);

    
        return redirect()->route('setting')
                        ->with('success','Password updated successfully.');
    }

    public function theme_setting()
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        $company_setting = CompanySetting::first();
        if(!isset($company_setting)) {
            return redirect()->route('setting')
            ->with('warning','Settings not found, Please add settings first.');
        }
        if($company_setting->logo != '' && file_exists(public_path('uploads/logo/').$company_setting->logo)){
            $company_setting->logo_thumb_path = asset('uploads/logo/thumb/').'/'.$company_setting->logo;
        } else {
            $company_setting->logo_thumb_path = "https://via.placeholder.com/100x100";
        }
        if($company_setting->dark_logo != '' && file_exists(public_path('uploads/logo/').$company_setting->dark_logo)){
            $company_setting->dark_logo_thumb_path = asset('uploads/logo/thumb/').'/'.$company_setting->dark_logo;
        } else {
            $company_setting->dark_logo_thumb_path = "https://via.placeholder.com/100x100";
        }
        if($company_setting->favicon != '' && file_exists(public_path('uploads/favicon/').$company_setting->favicon)){
            $company_setting->favicon_thumb_path = asset('uploads/favicon/thumb/').'/'.$company_setting->favicon;
        } else {
            $company_setting->favicon_thumb_path = "https://via.placeholder.com/50x50";
        }
        return view('setting.theme_setting',compact('company_setting'));
    }
    
    public function theme_submit(Request $request)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }

        request()->validate([
            'logo_file' => 'mimes:jpg,jpeg,png|max:2048',
            'dark_logo_file' => 'mimes:jpg,jpeg,png|max:2048',
            'favicon_file' => 'mimes:jpg,jpeg,png,ico|max:2048',
        ]);
        $input = $request->all();
        $company_setting = CompanySetting::first();
        
        if(isset($request->logo_file)) {
            $fileName = 'logo_'.time().'.'.$request->logo_file->extension();  
            $thumb = Image::make($request->logo_file->getRealPath())->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });
            $request->logo_file->move(public_path('uploads/logo'), $fileName);
            $thumb->save(public_path('uploads/logo/thumb/').$fileName);
        } else{
            $fileName = $company_setting->logo;
        }
        unset($input['logo_file']);
        $input['logo'] = $fileName;

        if(isset($request->dark_logo_file)) {
            $fileNameD = 'logo_'.time().'.'.$request->dark_logo_file->extension();  
            $thumb = Image::make($request->dark_logo_file->getRealPath())->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });
            $request->dark_logo_file->move(public_path('uploads/logo'), $fileNameD);
            $thumb->save(public_path('uploads/logo/thumb/').$fileNameD);
        } else{
            $fileNameD = $company_setting->dark_logo;
        }
        unset($input['dark_logo_file']);
        $input['dark_logo'] = $fileNameD;

        if(isset($request->favicon_file)) {
            $fileName_fav = 'favicon_'.time().'.'.$request->favicon_file->extension();  
            $thumb = Image::make($request->favicon_file->getRealPath())->resize(50, 50, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });
            $request->favicon_file->move(public_path('uploads/favicon'), $fileName_fav);
            $thumb->save(public_path('uploads/favicon/thumb/').$fileName_fav);
        } else{
            $fileName_fav = $company_setting->favicon;
        }
        unset($input['favicon_file']);
        $input['favicon'] = $fileName_fav;
        $company_setting->update($input);
       
        return redirect()->route('setting')
                        ->with('success','Theme settings updated successfully.');
    }

    // regins manager
    public function regions(Request $request)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        $countries = Country::orderBy('name', 'ASC')->get();
        $country_id = 0;
        $state_id = 0;
        if(isset($request['country']) && $request['country'] != '0') {
            $country_id = $request['country'];
            $CountryData = Country::find($country_id);
        } else {
            $CountryData = Country::where('short_name','IN')->first();
            if(isset($CountryData) ) {
                $country_id = $CountryData->id; 
            } else {
                $CountryData = Country::first();
                $country_id = $CountryData->id; 
            }
        }
        
        if(isset($request['state']) && $request['state'] != '0' && $request['state'] != null) {
            $state_id = $request['state'];
            $StateData = State::find($state_id);
        } else {
            $StateData = State::where('country_id',$country_id)->orderBy('name', 'ASC')->first(); 
            if(isset($StateData)) {
                $state_id = $StateData->id;
            }
        }
        $states = State::where('country_id',$country_id)->orderBy('name', 'ASC')->get();  
        $cities = City::where('state_id',$state_id)->orderBy('name', 'ASC')->get();
        if(count($cities) > 0)
        foreach ($cities as $city) {
            // get counts of each each types of coustomers
            $city->craftsman_count = $craftsman_count = User::where('role_id',2)->where('city',$city->id)->count();
            $city->manufacturer_count = $manufacturer_count = User::where('role_id',3)->where('city',$city->id)->count();
            $city->exporters_count = $exporters_count = User::where('role_id',4)->where('city',$city->id)->count();
            $city->designer_count = $designer_count = User::where('role_id',5)->where('city',$city->id)->count();
            $city->painter_count = $painter_count = User::where('role_id',6)->where('city',$city->id)->count();
            $city->clients_count = $clients_count = User::where('role_id',7)->where('city',$city->id)->count();
            $city->clients_count = $clients_count = User::where('role_id',7)->where('city',$city->id)->count();
            $city->photographers_count = $photographers_count = User::where('role_id',7)->where('city',$city->id)->count();
        }

        return view('setting.regions',compact('countries','states','cities','country_id','state_id','CountryData','StateData'));
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

    public function store_country(Request $request)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        request()->validate([
            'name' => 'required',
            'short_name' => 'required',
            'country_code' => 'required',
        ]);
        $input = $request->all();
        $country = Country::create($input);
        
        return redirect()->route('setting.regions')
                        ->with('success','Country Added successfully.');
    }
    
    public function store_state(Request $request)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        request()->validate([
            'name' => 'required',
            'country' => 'required',
        ]);
        $input = $request->all();
        $input['country_id'] = $input['country'];
        unset($input['country']);
        $state = State::create($input);
        
        return redirect()->route('setting.regions')
                        ->with('success','State Added successfully.');
    }

    public function store_city(Request $request)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        request()->validate([
            'name' => 'required',
            'country' => 'required',
            'state' => 'required',
        ]);
        $input = $request->all();

        if($request->hasFile('background')) {
            $fileName = 'city_'.time().'.'.$request->background->extension();  
                
            $thumb = Image::make($request->background->getRealPath())->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });

            $request->background->move(public_path('uploads/cities'), $fileName);
            $thumb->save(public_path('uploads/cities/thumb/').$fileName);
        } else{
            $fileName = '';
        }

        $input['country_id'] = $input['country'];
        $input['state_id'] = $input['state'];
        $input['background_image'] = $fileName;
        unset($input['country']);
        unset($input['state']);
        $state = City::create($input);
        
        return redirect()->route('setting.regions')
                        ->with('success','City Added successfully.');
    }

    
    public function edit_country(Request $request, $id)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        $country_data = Country::find($id);
        
        if(!isset($country_data)) {
            return redirect()->route('setting.regions')
            ->with('warning','Country not found');
        }

        return view('setting.edit_country',compact('country_data','id'));
    }


    public function update_country(Request $request, $id)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        request()->validate([
            'name' => 'required',
            'short_name' => 'required',
            'country_code' => 'required',
        ]);

        $country_data = Country::find($id);
        $input = $request->all();
        
        $country_data->update($input);

        return redirect()->route('setting.regions')
                        ->with('success','Country updated successfully');
    }

    public function edit_state(Request $request, $id)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        $countries = Country::orderBy('name', 'ASC')->get();
        $state_data = State::find($id);
        
        if(!isset($state_data)) {
            return redirect()->route('setting.regions')
            ->with('warning','State not found');
        }

        return view('setting.edit_state',compact('countries','state_data','id'));
    }


    public function update_state(Request $request, $id)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        request()->validate([
            'name' => 'required',
            'country' => 'required',
        ]);

        $state_data = State::find($id);
        $input = $request->all();
        $input['country_id'] = $input['country'];
        unset($input['country']);
        $state_data->update($input);

        return redirect()->route('setting.regions')
                        ->with('success','State updated successfully');
    }

    public function delete_state($id) {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        State::where('id',$id)->delete();
        return redirect()->route('setting.regions')
                        ->with('success','State deleted successfully');
    }

    public function edit_city(Request $request, $id)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        $countries = Country::orderBy('name', 'ASC')->get();
        $city_data = City::find($id);
        
        
        if(!isset($city_data)) {
            return redirect()->route('setting.regions')
            ->with('warning','City not found');
        }
        $country_id = $city_data->country_id;
        $states = State::where('country_id',$country_id)->orderBy('name', 'ASC')->get();

        return view('setting.edit_city',compact('countries','states','city_data','id'));
    }


    public function update_city(Request $request, $id)
    {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        request()->validate([
            'name' => 'required',
            'country' => 'required',
            'state' => 'required',
        ]);
        
        $city_data = City::find($id);

        if($request->hasFile('background')) {
            $fileName = 'city_'.time().'.'.$request->background->extension();  
                
            $thumb = Image::make($request->background->getRealPath())->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });

            $request->background->move(public_path('uploads/cities'), $fileName);
            $thumb->save(public_path('uploads/cities/thumb/').$fileName);
        } else{
            $fileName = $city_data->background_image;
        }

        $input = $request->all();
        $input['country_id'] = $input['country'];
        unset($input['country']);
        $input['state_id'] = $input['state'];
        unset($input['state']);
        $input['background_image'] = $fileName;
        
        $city_data->update($input);

        return redirect()->route('setting.regions')
                        ->with('success','City updated successfully');
    }

    public function delete_city($id) {
        if(Auth::user()->role_id != '1'){
            return redirect()->route('index');
        }
        City::where('id',$id)->delete();
        return redirect()->route('setting.regions')
                        ->with('success','City deleted successfully');
    }

}