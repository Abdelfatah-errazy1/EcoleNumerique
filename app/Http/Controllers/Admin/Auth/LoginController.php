<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Enums\AdminStatus;
use App\Helpers\Sessionable;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public $session;

    public function __construct()
    {
        $this->session = new Sessionable('mrx');
    }

    /***
     * Show admin login view
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function index()
    {

    //    Admin::factory(10)->create();
        return view('admin.auth.sign_in', [
            'session' => $this->session
        ]);
    }


    /***
     * check entred credentials
     * @return \Illuminate\Http\RedirectResponse
     */
    function check(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::guard('admin')->attempt($validated)) {
            if (auth()->guard('admin')->user()->status != AdminStatus::ACTIVE) {
                auth()->guard('admin')->logout();
                $this->session->set('message', 'account is inactive or blocked', true);
                return back()->withInput();
            }
            return redirect('admin/dashboard');
        }
        $this->session->set('message', trans('messages.try_again_message'), true);
        return back()->withInput();

    }


}
