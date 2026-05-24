<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::DASHBOARDHOME;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function getAdminLogin()
    { 
        //comment
        return view('auth.adminLogin');
    }

    public function adminAuth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        { 
            if(Auth::user()->role_id != '1'){ // disable front user login
                $request->session()->flash('error', "Invalid Login");
                Auth::logout();
                return redirect('blackhole');
            }
            // $this->guard()->user()->update([
            //     'last_login_at' => now(),
            //     'last_login_ip' => $request->getClientIp()
            // ]);
          
            // if($this->guard()->user()->hasRole(['admin','subadmin'])){
                $request->session()->flash('success', trans('flash.success.your_account_has_been_successfully_loggedin'));
                return redirect()->route('home');
            // }else{ 
            //     $this->guard()->logout();
            //     $request->session()->invalidate();
            //     $request->session()->flash('error', 'this_is_user_login_area_you_cant_login');
            //     return redirect(RouteServiceProvider::ADMIN_LOGIN);
            // }
        }else{
              $request->session()->flash('error', 'invalid login');
              return redirect()->route('dashboard.login');
        }
    }

    protected function guard() // And now finally this is our custom guard name
    {
         return auth()->guard('admin');
    }
}