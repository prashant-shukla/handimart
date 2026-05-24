<?php

namespace App\Http\Controllers;

use Auth;
use App\City;
use App\Role;
use App\User;
use App\Comment;
use App\Country;
use App\ContactList;
use App\ImageGallery;
use App\CraftmanSkill;
use GuzzleHttp\Client;
use App\CompanySetting;
use App\ContactContent;
use App\BusinessDetails;
use App\CraftmanCategory;
use App\PromotionalVideo;
use Illuminate\Http\Request;
// use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use Throwable;

class HomeController extends Controller
{
    protected $content;

    protected $user;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        try {
            $this->content = Schema::hasTable('company_settings')
                ? CompanySetting::first()
                : null;
        } catch (Throwable) {
            $this->content = null;
        }

        try {
            $this->user = User::with(['businessDetails'])->get();
        } catch (Throwable) {
            $this->user = collect();
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {



        $users = $this->user->where('role_id','>',1)->where('membership','yes');
        $cityUser = City::has('users')->withCount('users')->get();

        $roles = Role::where('id','>',1)->where('id','!=',7)->get();
        $content = CompanySetting::first();

        $craftsman_count = User::where('role_id', 2)->count();
        $Designer_count = user::where('role_id', 5)->count();
        $Photographer_count = user::where('role_id', 8)->count();
        $painter_count = user::where('role_id', 6)->count();
        $exporters_count = user::where('role_id', 2)->count();
        $manufacturer_count = user::where('role_id', 3)->count();
      

        return view('front/welcome', compact('content','users','roles','cityUser', 'craftsman_count' ,'Designer_count','Photographer_count','painter_count','exporters_count','manufacturer_count'));
    }

    public function contact_us()
    {
        $content = CompanySetting::first();
        $contact_us_contents = ContactContent::first();

       

        return view('front/contact_us',compact('contact_us_contents','content'));
    }

    public function about_us()
    {
        $content = CompanySetting::first();
        $contact_us_contents = ContactContent::first();
        $company_setting_contents = CompanySetting::first();
        $craftsman_count = User::where('role_id', 2)->count();
        $Designer_count = user::where('role_id', 5)->count();
        $Photographer_count = user::where('role_id', 8)->count();
        $painter_count = user::where('role_id', 6)->count();
        $exporters_count = user::where('role_id', 4)->count();
        $manufacturer_count = user::where('role_id', 3)->count();
        return view('front/about_us',compact('contact_us_contents','company_setting_contents','content','craftsman_count' ,'Designer_count','Photographer_count','painter_count','exporters_count','manufacturer_count'));
    }

    public function craftman(Request $request)
    {
        $input = $request->input('category');
        $craftmanCategorys = CraftmanCategory::withCount('users')->get();
        $content = CompanySetting::first();
        $userCountryBaseCounts = Country::has('users')->select('countries.name as country_name', DB::raw('COUNT(users.id) as total_users'))
                                                    ->leftJoin('users', 'countries.id', 'users.country_id')
                                                    ->groupBy('countries.id', 'countries.name')
                                                    ->paginate(4);


        $craftmans = User::where('role_id','2')->with(['craftmanSkills', 'cities', 'states'])->orderBy('id','DESC')->get();
        foreach ($craftmans as $value) {
            if($value->image != '' && file_exists(public_path('uploads/users/').$value->image)){
                $value->image_thumb_path = asset('uploads/users/thumb/').'/'.$value->image;
            } else {
                $value->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
            }
        }
        // if ($craftmans->isNotEmpty()) {
        //     foreach($craftmans as $craftman) {
        //         $b_details = BusinessDetails::where('user_id', $craftman->id)->first();
        //         session()->flash('userId', $firstCraftman->id);
                
        //         $skills = $b_details ? explode(",", $b_details->skills) : [];
                
        //         $user = User::where('id', $firstCraftman->id)->with('comments')->first();
        //     }
        //     $firstCraftman = $craftmans;
        //     $b_details = BusinessDetails::where('user_id', $firstCraftman->id)->first();
        //     session()->flash('userId', $firstCraftman->id);
            
        //     $skills = $b_details ? explode(",", $b_details->skills) : [];
            
        //     $user = User::where('id', $firstCraftman->id)->with('comments')->first();
        // } else {
        //     $b_details = null;
        //     $skills = [];
        //     $user = null;
        // }
    

        return view('pages/search-craftman',compact('content','craftmans','craftmanCategorys','userCountryBaseCounts'));
    }

    public function craftman_detail($id)
    {

        $image_gallery = ImageGallery::where('user_id',$id)->get();
        $video = PromotionalVideo::where('user_id',$id)->get();
        $b_details = BusinessDetails::where('user_id',$id)->first();
        session()->flash('userId', $id);
        if($b_details)
        $skills = explode(",",$b_details->skills);
        else
        $skills = array();
        $user = User::where('id',$id)->with('comments')->first();

        $content = CompanySetting::first();
        return view('pages/craftman-detail',compact('content','image_gallery','video','user','b_details','skills'));
    }

    public function designer()
    {

        $craftmanCategorys = CraftmanCategory::withCount('users')->get();
        $content = CompanySetting::first();
        $userCountryBaseCounts = Country::has('users')->select('countries.name as country_name', DB::raw('COUNT(users.id) as total_users'))
                                                    ->leftJoin('users', 'countries.id', '=', 'users.country_id')
                                                    ->groupBy('countries.id', 'countries.name')
                                                    ->paginate(4);


        $designers = User::where('role_id','5')->with(['craftmanSkills'])->orderBy('id','DESC')->get();
        foreach ($designers as $value) {
            if($value->image != '' && file_exists(public_path('uploads/users/').$value->image)){
                $value->image_thumb_path = asset('uploads/users/thumb/').'/'.$value->image;
            } else {
                $value->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
            }
        }
        return view('pages/search-designer',compact('content','designers','craftmanCategorys','userCountryBaseCounts'));
    }

    public function designer_detail($id)
    {
        $image_gallery = ImageGallery::where('user_id',$id)->get();
        $video = PromotionalVideo::where('user_id',$id)->get();
        $b_details = BusinessDetails::where('user_id',$id)->get()->first();
        if($b_details)
        $skills = explode(",",$b_details->skills);
        else
        $skills = array();

        $user = User::where('id',$id)->get()->first();
        $content = CompanySetting::first();
        return view('pages/designer-detail',compact('content','image_gallery','video','user','b_details','skills'));
    }

    public function painter()
    {
        $content = CompanySetting::first();
        $user_list = User::where('role_id','6')->orderBy('id','DESC')->get();
        foreach ($user_list as $value) {
            if($value->image != '' && file_exists(public_path('uploads/users/').$value->image)){
                $value->image_thumb_path = asset('uploads/users/thumb/').'/'.$value->image;
            } else {
                $value->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
            }
        }
        //$contact_us_contents = ContactContent::first();
        //$company_setting_contents = CompanySetting::first();
        return view('pages/search-painter',compact('content','user_list'));
    }

    public function painter_detail($id)
    {
        $image_gallery = ImageGallery::where('user_id',$id)->get();
        $video = PromotionalVideo::where('user_id',$id)->get();
        $b_details = BusinessDetails::where('user_id',$id)->get()->first();
        if($b_details)
        $skills = explode(",",$b_details->skills);
        else
        $skills = array();

        $user = User::where('id',$id)->get()->first();
        $content = CompanySetting::first();
        //$contact_us_contents = ContactContent::first();
        //$company_setting_contents = CompanySetting::first();
        return view('pages/painter-detail',compact('content','image_gallery','video','user','b_details','skills'));
    }

    public function photographer()
    {
        $content = CompanySetting::first();
        $user_list = User::where('role_id','8')->orderBy('id','DESC')->get();
        foreach ($user_list as $value) {
            if($value->image != '' && file_exists(public_path('uploads/users/').$value->image)){
                $value->image_thumb_path = asset('uploads/users/thumb/').'/'.$value->image;
            } else {
                $value->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
            }
        }
        //$contact_us_contents = ContactContent::first();
        //$company_setting_contents = CompanySetting::first();
        return view('pages/search-photographer',compact('content','user_list'));
    }

    public function photographer_detail($id)
    {
        $image_gallery = ImageGallery::where('user_id',$id)->get();
        $video = PromotionalVideo::where('user_id',$id)->get();
        $b_details = BusinessDetails::where('user_id',$id)->get()->first();
        if($b_details)
        $skills = explode(",",$b_details->skills);
        else
        $skills = array();

        $user = User::where('id',$id)->get()->first();
        $content = CompanySetting::first();
        //$contact_us_contents = ContactContent::first();
        //$company_setting_contents = CompanySetting::first();
        return view('pages/photographer-detail',compact('content','image_gallery','video','user','b_details','skills'));
    }

    public function manufacture_exporter()
    {
        $content = CompanySetting::first();
        $user_list = User::whereIn('role_id',['3','4'])->orderBy('id','DESC')->get();
        foreach ($user_list as $key => $value) {
            $b_details = BusinessDetails::where('user_id',$value->id)->get()->first();
            $user_list[$key]['b_details'] = $b_details;
            if($value->image != '' && file_exists(public_path('uploads/users/').$value->image)){
                $value->image_thumb_path = asset('uploads/users/thumb/').'/'.$value->image;
            } else {
                $value->image_thumb_path = asset('uploads/users/').'/'.'no-image.jpg';
            }
        }
        //print_r($user_list);die;
        //$contact_us_contents = ContactContent::first();
        //$company_setting_contents = CompanySetting::first();
        return view('pages/manufacture-exporter',compact('content','user_list'));
    }

    public function manufacture_exporter_detail($id)
    {
        $content = CompanySetting::first();
        $b_details = BusinessDetails::where('user_id',$id)->get()->first();
        $user = User::where('id',$id)->get()->first();
        //$contact_us_contents = ContactContent::first();
        //$company_setting_contents = CompanySetting::first();
        return view('pages/manufacture-exporter-details',compact('content','b_details','user'));
    }

    public function privacy_policy()
    {
        $content = CompanySetting::first();
        //$contact_us_contents = ContactContent::first();
        //$company_setting_contents = CompanySetting::first();
        return view('pages/privacy-policy',compact('content'));
    }

    public function contact_submit(Request $request)
    {

        // request()->validate([
        //     'sender_name' => 'required',
        //     'email' => 'required|email',
        //     'message_heading' => 'required',
        //     'message' => 'required',

        //     'attachments.*' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:5120'
        // ]);
        $input = $request->all();

        $files = [];
        if ($request->hasfile('attachments')) {
            $f = $request->file('attachments');
            foreach ($f as $image) {
              $name  = 'FILE'.uniqid().'.'.$image->getClientOriginalExtension();

              $destinationPath = 'contact/files';
              $image->move($destinationPath, $name);

              $files[] = $name;
            }
            $comma_separated = implode(",", $files);
            $input['attachments'] = isset($comma_separated) ? $comma_separated : '';
        }

        ContactList::create($input);
        session()->flash('success', 'Thanks for contacting us! We will be in touch with you shortly.');
        return redirect()->route('contactus')
                        ->with('success','Thanks for contacting us! We will be in touch with you shortly.');
    }

    public function commentStore(Request $request)
    {

        Comment::create(
            [
               'userId'  => session()->get('userId'),
               'senderName' => $request->name,
               'senderEmail' => $request->email,
               'description' => $request->description,
               'jobId' =>  2
        ]);

         return redirect()->back();
    }



}
