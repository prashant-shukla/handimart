<?php
    
namespace App\Http\Controllers;
    
use App\ContactContent;
use App\User;
use App\Country;
use App\State;
use App\City;
use App\ContactList;
use Auth;
use Hash;
use File;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
    
class ContactusController extends Controller
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
        $status = 'readnot';
        $contact_list = ContactList::latest()->get();
        $unread_count = ContactList::where('status','=','unread')->get();
        return view('contact.index',compact('contact_list', 'status','unread_count'));
    }

    public function read(Request $request, $id){
        $status = 'read';
        $contact = ContactList::find($id);
        $contact->status = 'read';
        $contact->save();
        //$size = File::size($PATH_OF_FILE);
        $unread_count = ContactList::where('status','=','unread')->get();

        if(!empty($contact->attachments)){
            $files = explode(',', $contact->attachments);
            $files_count = count($files);

            return view('contact.index', compact('contact', 'unread_count','files','files_count', 'status'));
        }
        return view('contact.index', compact('contact', 'unread_count', 'status'));
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