<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Auth;
use App\WebLog;
use Carbon\Carbon;
use Throwable;

class DashboardController extends Controller
{
    protected Carbon $today;

    protected int $userTotalWebView = 0;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->today = Carbon::now();
        $this->middleware('auth');
        try {
            $this->userTotalWebView = Schema::hasTable('web_logs')
                ? WebLog::count()
                : 0;
        } catch (Throwable) {
            $this->userTotalWebView = 0;
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
       
          // total view web 
          $userTodayWebViews = WebLog::whereDate('created_at','>=',$this->today)->count();
          $userTotalView = $this->userTotalWebView;
        // if no admin login, send to home
        if(Auth::user()->role_id != '1'){
             return redirect()->route('index');
        }
        return view('home', compact('userTodayWebViews','userTotalView'));
    }

    public function logout(Request $request) {
        
        Auth::logout();
        
        return redirect()->route('index');
        // return redirect()->route('dashboard.login');
    }
}
