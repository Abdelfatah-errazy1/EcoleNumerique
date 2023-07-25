<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Helpers\Sessionable;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{

    public $session;

    public function __construct()
    {
        $this->session = new Sessionable('mrx');
    }


    public function checkToken($token)
    {
        $admin = Admin::query()
            ->where(config('tables.admins.columns.token'), $token)
            ->first();
        if (isset($admin)) {
            $from = Carbon::parse($admin[config('tables.admins.columns.token_create_at')]);

            if (now()->diffInMinutes($from) > config('configs.reset_password_expiration_link')) {
                abort('404');
            } else {
                $this->session->set('admin_id', $admin[config('tables.admins.columns.id')]);
                return view('admin.auth.new_password');
            }

        }
        return redirect(route('admin.login.view'));

    }

    public function changePassword(Request $request)
    {
        $admin = Admin::query()->findOrFail($this->session->get('admin_id'));
        if (isset($admin)) {
            $from = Carbon::parse($admin[config('tables.admins.columns.token_create_at')]);

            if (now()->diffInMinutes($from) > config('configs.reset_password_expiration_link')) {
                abort('404');
            } else {
                $res = $request->validate([
                    'password' => 'required|same:confirm-password',
                    'confirm-password' => 'required||same:confirm-password',
                ]);
                $admin->update([
                    'password' => \Hash::make($res['password']),
                    'updated_by' => $this->session->get('admin_id'),
                ]);
                \Auth::guard('admin')->login($admin);
                return redirect(route('admin.dashboard'));
            }

        }
    }
}
