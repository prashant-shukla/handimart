<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\User;
use App\CompanySetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARDHOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getFrontLogin()
    { 
        $content = CompanySetting::first();
        session(['backlink' => url()->previous()]);
        return view('auth.login', compact('content'));
    }

    public function frontAuth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        { 
            if($this->guard()->user()->role_id == '1') { // disable admin login
                $request->session()->flash('error', "Invalid Login");
                Auth::logout();
                return redirect('login');
            } else if($this->guard()->user()->role_id == '7') { // allow client to direct login without approval
                $request->session()->flash('success', "Login Success");
                return redirect('/');
            } 
            else if($this->guard()->user()->is_approved == 0) {
                $request->session()->flash('error', "Admin Approval pending.");
                Auth::logout();
                return redirect('login');
            } 
            else {
                $request->session()->flash('success', "Login Success");
                return redirect('/');
            }
            // Auth::logout();

            // if($this->guard()->user()->hasRole(['admin','subadmin'])){
                // $request->session()->flash('success', "Login Success");
                // if($this->guard()->user()->role_id == '1') {
                //     return redirect()->route('home');
                // } else if(session()->has('backlink')) {
                //     return redirect(session('backlink'));
                // } else {
                    // return redirect('/');
                // }

                /*if($this->guard()->user()->role_id == '1') {
                    return redirect()->route('home');
                } else if($this->guard()->user()->role_id == '2') {   
                    return redirect()->route('craftmans.my-profile',$this->guard()->user()->id);
                } else if($this->guard()->user()->role_id == '3') {   
                    return redirect()->route('manufacturers.my-profile',$this->guard()->user()->id);
                } else if($this->guard()->user()->role_id == '4') {   
                    return redirect()->route('exporters.my-profile',$this->guard()->user()->id);
                } else if($this->guard()->user()->role_id == '5') {   
                    return redirect()->route('designers.my-profile',$this->guard()->user()->id);
                } else if($this->guard()->user()->role_id == '6') {   
                    return redirect()->route('painters.my-profile',$this->guard()->user()->id);
                } else if($this->guard()->user()->role_id == '7') {   
                    return redirect()->route('clients.my-profile',$this->guard()->user()->id);
                } else if($this->guard()->user()->role_id == '8') {   
                    return redirect()->route('photographers.my-profile',$this->guard()->user()->id);
                }*/
            // }else{ 
            //     $this->guard()->logout();
            //     $request->session()->invalidate();
            //     $request->session()->flash('error', 'this_is_user_login_area_you_cant_login');
            //     return redirect(RouteServiceProvider::ADMIN_LOGIN);
            // }
        }else{
              $request->session()->flash('error', 'Invalid Login');
              return redirect()->route('login');
        }
    }
}
