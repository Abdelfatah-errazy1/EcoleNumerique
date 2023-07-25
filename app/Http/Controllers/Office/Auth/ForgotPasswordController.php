<?php

namespace App\Http\Controllers\Office\Auth;

use App\Helpers\Sessionable;
use App\Http\Controllers\Controller;
use App\Mail\Admin\ResetPassword;
use App\Models\Admin;
use App\Models\OfficeAccount;
use Illuminate\Http\Request;
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
            'login' => 'required|string|max:255'
        ]);


        $office = OfficeAccount::query()->where(config('tables.office.columns.login'), $res['login'])->first();
        if (isset($office)) {
            $token = \Str::random(65);
            $now = now();
            $office->update([
                config('tables.office.columns.token') => $token,
                config('tables.office.columns.token_created_at') => $now->toDateTimeString(),
            ]);
            $data = [
                'url' => route('office.resetPassword.check.token', [
                    $token,
                    'url' => \Str::random(255),
                    'stype' => fake()->postcode,
                    'sname' => fake()->countryCode,
                ]),
                'expires_at' => $now->addMinutes(config('configs.reset_password_expiration_link')),

            ];

            \Mail::to('ayoubaithmad77@gmail.com')
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
