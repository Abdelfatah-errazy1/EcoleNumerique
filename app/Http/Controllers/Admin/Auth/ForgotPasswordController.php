<?php

namespace App\Http\Controllers\Admin\Auth;

use Str;
use App\Models\Admin;
use App\Helpers\Sessionable;
use Illuminate\Http\Request;
use App\Mail\Admin\ResetPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
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
//        session()->flush();

//        Admin::factory()->create();
        return view('admin.auth.forgot-password', [
            'session' => $this->session
        ]);
    }


    /***
     * check entred credentials
     * @return \Illuminate\Http\RedirectResponse
     */
    function check(Request $request)
    {
        $res = $request->validate([
            'email' => 'required|string|max:255'
        ]);
        
        $admin = Admin::query()->where(config('tables.admins.columns.email'), $res['email'])->first();
        if (isset($admin)) {
            $token = Password::getRepository()->create($admin);
            dd($admin);
            $now = now();
            $admin->update([
                config('tables.admins.columns.token') => $token,
                config('tables.admins.columns.token_create_at') => $now->toDateTimeString(),
            ]);
            $data = [
                'url' => route('admin.resetPassword.check.token', [
                    $token,
                    'url' => Str::random(255),
                    'stype' => fake()->postcode,
                    'sname' => fake()->countryCode,
                ]),
                'expires_at' => $now->addMinutes(config('configs.reset_password_expiration_link')),

            ];

            \Mail::to('errazy.abdelfatah@gmail.com')
                ->send(new ResetPassword($data));

            $this->session->set('message', [
                'message' => trans('mail.password_reset_mail'),
                'type' => 'success'
            ], true);
            return redirect()->back();

        }
        $this->session->set('message', [
            'message' => trans('auth.failed'),
            'type' => 'danger'
        ], true);
        return redirect()->back();
    }

}
