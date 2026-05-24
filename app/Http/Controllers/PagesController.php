<?php
    
namespace App\Http\Controllers;
    
use App\ContactContent;
use App\User;
use App\Country;
use App\State;
use App\City;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
    
class PagesController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user= Auth::user();
            // check user only craftman and 
            if($this->user->role_id != '1'){
                return redirect()->route('index');
            }
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "to be there.";
        return redirect()->route('pages.contact-us');
        // $company_setting = CompanySetting::first();
        // return view('setting.index',compact('company_setting'));
    }


    public function contact_us()
    {
        $contact_us_contents = ContactContent::first();
        return view('pages.contact_us',compact('contact_us_contents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contact_submit(Request $request)
    {
        
        request()->validate([
            'heading_line' => 'required',
            'contact_heading' => 'required',
            'address_heading' => 'required',
            'work_with_us_heading' => 'required',
            'form_heading' => 'required'
        ]);
        $input = $request->all();
        $contact_us_contents = ContactContent::first();
        
        if(isset($contact_us_contents)) {
            $contact_us_contents->update($input);
        } else {
            ContactContent::create($input);
        }

    
        return redirect()->route('pages.contact-us')
                        ->with('success','Contents updated successfully.');
    }


}