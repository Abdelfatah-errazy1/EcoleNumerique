<?php

namespace App\Http\Controllers\Office\Auth;

use App\Enums\AdminStatus;
use App\Helpers\Sessionable;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public $session;


    public function username()
    {
        return 'login';
    }


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

//        dd(\Hash::make(12346579));
        return view('office.auth.sign_in', [
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
            'login' => 'required',
            'password' => 'required',
        ]);


        if (Auth::guard('office')->attempt($validated)) {
            return redirect('office/dashboard');
        }
        $this->session->set('message', trans('messages.try_again_message'), true);
        return back()->withInput();

    }


}
